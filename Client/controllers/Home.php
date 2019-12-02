<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {
    require('./models/User.php');
    require('./models/Rating.php');
    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === TRUE) {

        $db = \Rapid\Database::getPDO();
        $user = User::getUserByUser_ID($_SESSION['Id'], $db);
        $ratings = Rating::getRatingsByDriver_id($user->getUser_id(), $db);
        
        $res->render('main', 'profile', [
            'pageTitle' => 'Home',
            'user' => $user,
            'ratings' =>$ratings
        ]);
    } else {
        $res->render('main', '404', []);
    }
} ?>
