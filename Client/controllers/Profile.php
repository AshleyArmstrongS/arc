<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {
    require('./models/User.php');
    $req->sessionStart();
    $db = \Rapid\Database::getPDO();
    //$user_id = query('user_id');
    $user_id = 1;
    $user = User::getUserByUser_ID($user_id, $db);

    $res->render('main', 'profile', [
        'pageTitle' => 'Profile',
        'user' => $user
    ]);
} ?>
