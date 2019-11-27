<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {

$req->sessionStart();

if ($_SESSION['LOGGED_IN'] === TRUE) { 
    
$req->sessionDestroy();
$_SESSION = [];
$res->redirect("./login");
}
else
{
    $res->render('main', '404', []);

}

}
?>