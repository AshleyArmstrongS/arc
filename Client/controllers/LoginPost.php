<?php return function($req, $res) {
    
    //$db = \Rapid\Database::getPDO();  
    //require('./models/User.php');
    //require('./lib/utils/FormUtils.php');
    
    //$error['error'] = "Invalid email or password";

    
  

  if($req->body('email') !== NULL || $req->body('password') !== NULL){
    $username = $req->body('username');
    $password = $req->body('password');

    $send = "{\"request\":\"login\", \"username\":\"" . $username . "\", \"password\":\"" . $password . "\"}".PHP_EOL;

    // send to server to validate whether the user exists and has correct passsword
    // have a find one by username that returns a User Object,
    // then use User methods to get password and username and ID
    // validate the password

    // if all ok redirect to home
    // else render the login page again with an error message

    $res->redirect('/home');

  }

  else{
    $res->render('main', 'login', [
      'form_error_messages' => 'Incorrect Username or password'
    ]);
  }

 

  
    
} ?>