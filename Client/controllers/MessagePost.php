<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Model.php');
  require('./models/User.php');
  $db = \Rapid\Database::getPDO();
  
  // get the groups [groups]
  // get the names of the persons [p1,p2,p3,...pn] in each group
  // get the last message of that chat
  // get the date



  $res->render('main', 'message', [
    'pageTitle' => 'Message',
    'messages' => $messages
  ]);

} ?>