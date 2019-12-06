<?php return function($req, $res) {
    require('./lib/FormUtils.php');
    require('./models/User.php');
    require('./models/Car.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();

    $day            = $req->body('day');
    $morning        = $req->body('morning');
    $evening        = $req->body('evening');
    $driver_id      = $req->body('driver_id');
    $passenger_id   = $req->body('passenger_id');
    
    

}
?>