<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {

$req->sessionStart();

$driver_id = 1;//= $req->query('driver_id');
    
 $res->render('main', 'leaveAReview', [
 'pageTitle' => 'Review',
 'driver_id' => $driver_id
  ]);
}?>