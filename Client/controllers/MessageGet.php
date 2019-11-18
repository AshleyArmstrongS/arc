<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/Message.php');
 require('./models/User.php');
 $db = \Rapid\Database::getPDO();

 $group_id = 1;
 $messages_info = Message::getMessagesByGroup_id($group_id, $db);
 //$users = Users::ByUsersGroup_id();


 $res->render('main', 'message', [
  'pageTitle' => 'message',
  'messages' => $messages_info
  //'users' => $users
  ]);
 }?>