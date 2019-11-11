<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Model.php');
  require('./models/User.php');
  $db = \Rapid\Database::getPDO();
}