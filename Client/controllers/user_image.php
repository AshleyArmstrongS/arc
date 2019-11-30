<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/User.php');
 $db = \Rapid\Database::getPDO();
 $req->sessionStart();
 
$user = USER::getUserByUser_ID($_SESSION['Id'], $db);
$image = $req->body('user_image');
$user->setImage_name($image);

 USER::updateUserImage_name($user, $db);

  $res->redirect('/');
};