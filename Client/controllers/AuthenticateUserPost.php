<?php return function($req, $res) {
$db = \Rapid\Database::getPDO();
require('./lib/FormUtils.php');
require('./models/User.php');
$req->sessionStart();

$user = $_SESSION['user'];



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
    
    $req->sessionSet('LOGGED_IN',true);
    
    User::addUser($db, $user);

    $u = User::getUserByEmail(($_SESSION['Email']), $db);
    $user_id = $u->getUser_id();
    $req->sessionSet('Id',$user_id);
    //$req->sessionSet('Id', $user_id);



    if($code['value'] == $auth)
    {
        User::addUser($db, $user);
        if($_SESSION['Type'] == 'D')
        {
            
            $req->sessionSet('Id', $user_id);
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