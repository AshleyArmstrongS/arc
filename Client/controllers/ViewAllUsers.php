<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {

    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === True) {
        $db = \Rapid\Database::getPDO();
        require('./models/User.php');

        //echo($_SESSION['Type']);
        if($_SESSION['Type'] == "P")
        {
            $users = User::getDrivers($db,$_SESSION['Id']);
            $res->render('main', 'viewUser', [
            'pageTitle' => 'View Users',
            'users' => $users
             ]);

        }
        else if($_SESSION['Type'] == "D")
        {
            $users = User::getPassengers($db,$_SESSION['Id']);
            $res->render('main', 'viewUser', [
            'pageTitle' => 'View Users',
            'users' => $users
            ]);


        }
        
    } else {
       $res->render('main', '404', []);
    }
} ?>