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
 $usersInGroup = array();
 $messageInfo = array();
 $userGroups = Group::getGroupsByUser_id($user_id, $db);
  foreach ($userGroups as $userGroup) {
    //  foreach ($userGroup as $group_id) {      
    //    array_push($group_messages, Message::getMessagesByGroup_id($group_id, $db));
    //  }
    foreach ($userGroup as $group_id) {
      array_push($usersInGroup, Group::getUsersByGroup_id($group_id, $db));
      }
    }
  foreach ($usersInGroup as $users){
    foreach($users as $user){
      $messageInfo = Message::getMessagesByGroup_id($user['group_id'], $db);
    }
  } 
 

 $res->render('main', 'message', [
 'pageTitle' => 'Message',
 'group_users' => $usersInGroup,
 'messages' => $messageInfo
 ]);
 
} ?>