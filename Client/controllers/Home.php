<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {

$req->sessionStart();
    
if ($_SESSION['LOGGED_IN'] === TRUE) { 
    
$db = \Rapid\Database::getPDO();
$user = User::getUserByUser_ID($_SESSION['Id'], $db);
 $res->render('main', 'profile', [
 'pageTitle' => 'Home',
 'user' => $user
 ]);
}
else{
    $res->render('main', '404', []);
}
} ?>
