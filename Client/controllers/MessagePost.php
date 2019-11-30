<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Message.php');
  require('./models/User.php');
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  $group_id = $req->query('to_id');
  $ms = $req->body('message');
  $from_id = $_SESSION['Id'];

  $message = new Message([
    'message' => $ms,
    'from_id' => $from_id,
    'group_id' => $group_id
  ]); 

  print_r($message);
   $sm = Message::submitMessage($message, $db);
    
   if($sm !== FALSE)
   {
      $res->redirect('/message?to_id='.$group_id);
   }
   else
   {
     $res->redirect('/inbox?success=0');
   }

} 
?>