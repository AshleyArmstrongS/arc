<?php return function($req, $res) {
require('./lib/FormUtils.php');
$req->sessionStart();
    $form_error_messages = [];

    $code = FormUtils::getPostString($req->body('code'));
    $auth = $_SESSION['Code'];

    if (!$code['is_valid']) 
    {
        $form_error_messages['code'] = 'Code is required';
    }
    if($code['value']!=$auth)
    {
        $form_error_messages['code'] = 'Valid code is required';
    }


    # Display form
if (count($form_error_messages) > 0) 
{

    $res->render('main', 'authUser', [
        'pageTitle' => 'VerifyUser',
        'form_error_messages' =>$form_error_messages
    ]);
}
else
{
    
    //$req->sessionSet('LOGGED_IN',true);
    $user_id = $_SESSION['Id'];
    //echo($user_id);
    if($code['value'] == $auth)
    {
        
        if($_SESSION['Type'] == 'D')
        {
            
            $res->redirect("/carDetails?user=$user_id");
             
           
         }
         else
         {
            $res->redirect('/');
            //echo($user_id);

         }


    }
    else
    {
        $res->redirect('/login');
    }
    
}

}?>