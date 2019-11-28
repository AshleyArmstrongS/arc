<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {

$req->sessionStart();

if ($_SESSION['LOGGED_IN'] === TRUE) { 
    
$res->render('main', 'carDetails', [
    'pageTitle' => 'Car Details'
]);
}
else
{
    $res->render('main', '404', []);
}
}
?>