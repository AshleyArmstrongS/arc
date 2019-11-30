<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {
    require('./models/User.php');
    require('./models/Rating.php');
    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === TRUE) {

        $db = \Rapid\Database::getPDO();
        $user_id = $req->query('user_id');
        $user = User::getUserByUser_ID($user_id, $db);
        $ratings = Rating::getRatingsByDriver_id($user_id, $db);
        
        $res->render('main', 'profile', [
            'pageTitle' => 'Home',
            'user' => $user,
            'ratings' =>$ratings
        ]);
    } else {
        $res->render('main', '404', []);
    }
    $res->render('main', 'profile', [
        'pageTitle' => 'Profile',
        'user' => $user
    ]);
} ?>
