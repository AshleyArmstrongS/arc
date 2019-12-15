<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {
 $req->sessionStart();

 if ($_SESSION['LOGGED_IN'] === FALSE) {
    
$res->render('main', 'authUser', [
    'pageTitle' => 'VerifyUser'
]);
 }
}?>