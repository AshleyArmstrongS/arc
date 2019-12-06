<?php return function($req, $res) {
    require('./lib/FormUtils.php');
    require('./models/Schedules.php');
    require('./models/Car.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();

    $day            = $req->body('day');
    $morning        = $req->body('morning');
    $evening        = $req->body('evening');
    $driver_id      = $req->body('driver_id');
    $passenger_id   = $req->body('passenger_id');
    
    $sched = new Schedules([
        'day' => $day,
        'morning' => $morning,
        'evening' => $evening,
        'car_id' =>  $car_id,
        'user_id' => $passenger_id
    ]);

    $pass = Schedules::createSched($sched, $db);

    if($pass){
        $res->redirect('/inbox?success=1');
    }
    $res->redirect('/inbox?success=0');
}
?>