<?php return function($req, $res) {
 $req->sessionStart();

 $db = \Rapid\Database::getPDO();
  require('./models/User.php');

  $user_id    = $_SESSION['Id'];
  $user       = User::getUserById($user_id, $db);

 $res->render('main', 'editUser', [
 'pageTitle' => 'Register',
 'user' => $user
 
 ]);
 
} ?>