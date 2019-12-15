<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {
    require('./models/User.php');
    require('./models/Car.php');
    require('./models/Rating.php');
    require('./models/Schedules.php');
    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === TRUE) {

        $db = \Rapid\Database::getPDO();
        $user = User::getUserByUser_ID($_SESSION['Id'], $db);
        $ratings = Rating::getRatingsByDriver_id($_SESSION['Id'], $db);
        $schedU = Schedules::schedulesforUser_id($_SESSION['Id'], $db);
        $user = User::getUserByUser_ID($_SESSION['Id'], $db);
        if ($user->getUser_type() === "D") {
            $car_id = Car::getCar_idByDriver_id($user->getUser_id(), $db);
            $sched = Schedules::schedulesforCar_id($car_id, $db);
        } else {
            $sched = NULL;
        }
        $hasSched = false;
        if ($sched > 0 || $schedU > 0) {
            $hasSched = true;
        }
        $res->render('main', 'profile', [
            'pageTitle' =>      'Home',
            'user' =>           $user,
            'ratings' =>        $ratings,
            'hasSched' => $hasSched
        ]);
    } else {
        $res->render('main', '404', []);
    }
} ?>
