<?php return function($req, $res) {

$req->sessionStart();
$db = \Rapid\Database::getPDO();
require('./models/User.php');

$Users = User::getAllUsers($db);


//print_r($Users);
$res->render('main', 'viewUser', [
    'pageTitle' => 'View Users',
    'viewUsers'  => $Users

]);

} ?>