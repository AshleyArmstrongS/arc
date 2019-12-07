<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Schedules.php');
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  $car_id = $req->query('car_id');
  $user_id = $req->query('user_id');
  Schedules::deleteScheduleByCar_idAndUser_id($car_id, $user_id, $db);

 
        $res -> redirect('/lifts?success=1');


}
?>