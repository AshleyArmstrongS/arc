<?php return function($req, $res) {
     require_once('lib/Socket.php');
    
  
  
    $username = $req->body('username');
    $password = $req->body('password');
    $send = "{\"request\":\"login\", \"username\":\"" . $username . "\", \"password\":\"" . $password . "\"}".PHP_EOL;
    // send to server to validate whether the user exists and has correct passsword
    // have a find one by username that returns a User Object,
    // then use User methods to get password and username and ID
    // validate the password
    // if all ok redirect to home
    // else render the login page again with an error message
    $read = socketRequest($send, $socket); 
  
  
    
} ?>