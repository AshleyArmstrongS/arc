<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/Message.php');
 
 require('./models/Group.php');
 require('./models/User.php');
 $db = \Rapid\Database::getPDO();
 
 // get the groups [groups]
 // get the names of the persons [p1,p2,p3,...pn] in each group
 // get the last message of that chat
 // get the date
 $user_id = 1;
 $usersGroup = array();
 $messageInfo = array();
 $group_messages = array();
 $last_user_with_message = array();
 $user_ids= array();
 $userInGroup = Group::getGroupsByUser_id($user_id, $db);
 //print_r($userGroups);

  foreach ($userInGroup as $userGroup) {
      array_push($group_messages, Message::getLastMessagesByGroup_id($userGroup['group_id'], $db));
      $usersGroup= Group::getUsersByGroup_id($userGroup['group_id'], $db);
      $messageInfo = Message::getMessagesByGroup_id($userGroup['group_id'], $db);
   }


   foreach ($group_messages as $message) {
      array_push($user_ids, $message->getFrom_id());
   }

   foreach ($user_ids as $user) {
      array_push($last_user_with_message, User::getUserById($user, $db));
   }
   
   $res->render('main', 'inbox', [
   'pageTitle' => 'Inbox',
   'group_users' => $usersGroup,
   'message_info' => $group_messages,
   'user' => $last_user_with_message
   ]);
 
} ?>