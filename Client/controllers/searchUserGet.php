<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {

    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === True) {
        $db = \Rapid\Database::getPDO();
        require('./models/User.php');

        $name = $req->query('search');
        //echo($name);
        $users = User::searchUsersByName($name, $db);
        //print_r($users);

        $res->render('main', 'viewUser', [
            'pageTitle' => 'View Users',
            'users'  => $users

        ]);
    } else {
        $res->render('main', '404', []);
    }
} ?>