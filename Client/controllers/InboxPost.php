<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Message.php');
  require('./models/User.php');
  $db = \Rapid\Database::getPDO();
  
  // get the groups [groups]
  // get the names of the persons [p1,p2,p3,...pn] in each group
  // get the last message of that chat
  // get the date
  $user_id = 1;

  $userGroups = Message::getGroupsByUser_id($user_id, $db);
  foreach ($userGroups as $user) {
    foreach ($user as $messages) {      
      print_r($messages);
    } 
  }

  // $res->render('main', 'home', [
  //   'pageTitle' => 'Message',
  //   'user' => $userGroups
  // ]);

} ?>