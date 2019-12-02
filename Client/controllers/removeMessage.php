<?php return function($req, $res) {
  require('./lib/FormUtils.php');
  require('./models/Message.php');
  $req->sessionStart();
  $db = \Rapid\Database::getPDO();
  $message_id = $req->query('message_id');
  $to_id = $req->query('to_id');
  Message::deleteMessage($message_id, $db);

 
        $res -> redirect('/message?to_id='.$to_id);


}
?>