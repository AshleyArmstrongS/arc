<?php return function($req, $res) {

$req->sessionStart();
$db = \Rapid\Database::getPDO();
require('./models/User.php');

$gender = $req->query('filter');
$users = User::getDriversByGender($db, $gender)
print_r($users);

// $res->render('main', 'viewUser', [
//     'pageTitle' => 'View Users',
//     'viewUsers'  => $users

// ]);

} ?>