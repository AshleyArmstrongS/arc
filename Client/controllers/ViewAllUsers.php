<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {

    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === True) {
        $db = \Rapid\Database::getPDO();
        require('./models/User.php');

        $Users = User::getAllUsers($db);


        //print_r($Users);
        $res->render('main', 'viewUser', [
            'pageTitle' => 'View Users',
            'viewUsers'  => $Users

        ]);
    } else {
        $res->render('main', '404', []);
    }
} ?>