<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Message.php');
  require('./models/User.php');
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  
  $ms = $req->body('message');
  $from_id = $_SESSION['Id'];
  $group_id =1;

  $message = new Message([
    'message' => $ms,
    'from_id' => $from_id,
    'group' => $group_id
  ]); 

   $sm = Message::submitMessage($message, $db);
    
   if($sm !== FALSE)
   {
    $res->redirect('/message');
   }
   else
   {
     echo "you cant code for shit m8";
   }

} ?>