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

    $car_id = Car::getCar_idByDriver_id($driver_id, $db);

    $lifts = Schedules::getLiftsByCar_id($car_id, $db);

    $no_exsisting = true;

    foreach($lifts as $lift)
    {
      echo($lift['day']);
      echo($lift['user_id']);
      echo $passenger_id;
      echo $day;
        if($lift['user_id']  == $passenger_id && $lift['day'] == $day)
        {
          echo "here";
           $no_exsisting = false; 
        break;
        }
    }
    if($no_exsisting === true){
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
  $res->redirect('/');
}
?>