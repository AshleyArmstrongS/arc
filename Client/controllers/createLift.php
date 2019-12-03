<?php return function($req, $res) {
    require('./lib/FormUtils.php');
    require('./models/User.php');
    require('./models/Car.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();


    

}
?>