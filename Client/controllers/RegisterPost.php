
<?php return function($req, $res) {
 require('lib/FormUtils.php');
require_once('lib/Socket.php');


    $form_was_posted = [];
    $form_was_posted = $req->body('username') !== NULL;

    $form_error_messages = [];

    
    $name = FormUtils::getPostString($req->body('name'));
    $age =  FormUtils::getPostInt($req->body('age'));
    $gender = FormUtils::getPostString($req->body('gender'));
    $email = FormUtils::getPostEmail($req->body('email'));
    $password = FormUtils::getPostString($req->body('password1'));
    $college = FormUtils::getPostString($req->body('college'));
    $userType = FormUtils::getPostString($req->body('userType'));

    //need to do location id, car e.t.c for drivers

    if (!$email['is_valid']) {
        $form_error_messages['email'] = 'Valid email is required';
    }
    if (!$name['is_valid']) {
        $form_error_messages['name'] = 'Valid name is required';
    }
    if (!$password['is_valid']) {
        $form_error_messages['password'] = "A valid password is required";
    }
    if (!$college['is_valid']) {
        $form_error_messages['college'] = "A valid college is required";
    }
    if (!$age['is_valid']) {
        $form_error_messages['age'] = 'Valid age is required';
    }
    if (!$gender['is_valid']) {
        $form_error_messages['gender'] = 'Gender required';
    }
    if (!$userType['is_valid']) {
        $form_error_messages['userType'] = "A valid user type is required";
    }
    if(!($req->body('password1') === $req->body('password2')))
    {
        $form_error_messages['password'] = 'Password and confirm passwords must match';
    }
    else
    {
        $regex = "/(?=^.{8,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W])^.*/";
        //input must be like preg_match below
        if(!preg_match($regex, $password['value'])) 
        {
            $form_error_messages['password'] = 'Invalid Password must be at least 8 characters, include a lower case, an upper case, a number and a special character';
        }
        else
        {
            $passwordhash = password_hash($password['value'],PASSWORD_BCRYPT,['cost' => 12]);
        }

        
    }

    
        

        if(!$form_was_posted || count($form_error_messages) > 0) {
            $res->render('main', 'register', [
              'pageTitle' => 'Register',
              'form_error_messages'   => $form_error_messages
            ]);
        }
    
        else {

            $send = "{\"request\":\"createUser\", \"name\":\"" . $name . "\", \"age\":\"" . $age . "\"}".PHP_EOL;
            $written = socket_write($socket, $send, strlen($send));
            if(!$written){die("error writing\n");}
 
            //wait for repsonse
            $read = socket_read($socket, 2048 );
            if(!$read){die("Error reading\n");}

            // render to view
            $json = (array) json_decode($read, true);
            print_r($json);
            //close socket 
            $close = true;

           
        }
        


}
?>
