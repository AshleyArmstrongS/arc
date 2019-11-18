<?php return function($req, $res) {
   require('./lib/FormUtils.php');
   require('./models/Message.php');
   
   require('./models/Group.php');
   require('./models/User.php');
   $req->sessionStart();
   $db = \Rapid\Database::getPDO();
   
   $user_email = $_SESSION['Email'];
   $user_id = User::getUserByEmail($user_email, $db);
   $messageInfo = array();
   $group_messages = array();
   $last_user_with_message = array();
   $user_ids= array();
   $userInGroup = Group::getGroupsByUser_id($user_id->getUser_id(), $db);
 

   foreach ($userInGroup as $userGroup) {
      array_push($group_messages, Message::getLastMessagesByGroup_id($userGroup['group_id'], $db));
   }
   
   $res->render('main', 'inbox', [
   'pageTitle' => 'Inbox',
   'message_info' => $group_messages
   ]);
 
} ?>