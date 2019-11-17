<?php return function($req, $res) {

$req->sessionStart();
$res->render('main', 'carDetails', [
    'pageTitle' => 'Car Details'
]);
}
?>