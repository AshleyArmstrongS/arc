<?php return function($req, $res) {
    require('./lib/FormUtils.php');
    require('./models/Group.php');
    require('./models/Message.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();





}?>