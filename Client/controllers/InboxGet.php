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
 //print_r($userGroups);

   foreach ($userInGroup as $userGroup) {
      array_push($group_messages, Message::getLastMessagesByGroup_id($userGroup['group_id'], $db));
   }

   foreach ($group_messages as $message) {
      array_push($user_ids, $message->getFrom_id());
   }

   foreach ($user_ids as $user) {
      array_push($last_user_with_message, User::getUserById($user, $db));
   }
   
   $res->render('main', 'inbox', [
   'pageTitle' => 'Inbox',
   'message_info' => $group_messages,
   'user' => $last_user_with_message
   ]);
 
} ?>