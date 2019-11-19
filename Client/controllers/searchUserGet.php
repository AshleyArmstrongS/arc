<?php return function($req, $res) {

$req->sessionStart();
$db = \Rapid\Database::getPDO();
require('./models/User.php');

$name = $req->query('search');
$users = User::searchUsersByName($name, $db);
//print_r($users);

$res->render('main', 'viewUser', [
    'pageTitle' => 'View Users',
    'viewUsers'  => $users

]);

} ?>