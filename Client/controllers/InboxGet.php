<?php return function($req, $res) {
   require('./lib/FormUtils.php');
   require('./models/Message.php');
   
   require('./models/Group.php');
   require('./models/User.php');
   $req->sessionStart();
   $db = \Rapid\Database::getPDO();

   $group_messages = array();
   $userInGroup = Group::getGroupsByUser_id($_SESSION['Id'], $db);

   //print_r($userInGroup);

   foreach ($userInGroup as $userGroup) {
      $group_id = $userGroup['group_id'];
      $temp = Message::getLastMessagesByGroup_id( $group_id, $db);
     // if($temp['message'] !== NULL)
      //{
      array_push($group_messages, Message::getLastMessagesByGroup_id( $group_id, $db));
     // print_r($temp);
     // }
   }
   
     $res->render('main', 'inbox', [
         'pageTitle' => 'Inbox',
         'message_info' => $group_messages
      ]);
 
} ?>