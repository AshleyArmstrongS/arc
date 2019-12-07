<?php return function($req, $res) {
   require('./lib/FormUtils.php');
   require('./models/Car.php');
   require('./models/User.php');
   require('./models/Schedules.php');
   $req->sessionStart();
   $db = \Rapid\Database::getPDO();

   
   $user = User::getUserByUser_ID($_SESSION['Id'], $db);
   if($user->getUser_type() === "D"){
    $car_id = Car::getCar_idByDriver_id($user->getUser_id(), $db);
    $schedDriver = Schedules::getLiftsByCar_idP($car_id, $db);
}
else{
    $schedDriver = NULL;
}
    $schedPassenger = Schedules::getLiftsByUser_id($user->getUser_id(), $db);


   $res->render('main', 'lifts', [
    'pageTitle' => 'lifts',
    'schedDriver' =>    $schedDriver,
    'schedPassenger' => $schedPassenger
]);
   }
?>
