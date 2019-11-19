<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/Message.php');
 require('./models/Group.php');
 require('./models/User.php');
 $req->sessionStart();
 $db = \Rapid\Database::getPDO();


 $group_id = $req->query('to_id');
 $messages = Message::getMessagesByGroup_id($group_id, $db);
 $users = Group::getUsersByGroup_id($group_id, $db);


$res->render('main', 'message', [
  'pageTitle' => 'message',
  'messages' => $messages,
  'group_id' => $group_id,
  'users' => $users
  ]);
 }
 ?>