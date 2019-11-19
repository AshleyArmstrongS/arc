<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Message.php');
  require('./models/User.php');
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  $group_id = $req->body('group_id');
  $ms = $req->body('message');
  $from_id = $_SESSION['Id'];
  $group_id =1;

  $message = new Message([
    'message' => $ms,
    'from_id' => $from_id,
    'group_id' => $group_id
  ]); 

   $sm = Message::submitMessage($message, $db);
    
   if($sm !== FALSE)
   {
      $res->redirect('/message?to_id='.$group_id);
   }
   else
   {
      $res->redirect('/inbox?success=0');
   }

} ?>