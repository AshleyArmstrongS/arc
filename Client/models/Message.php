<<?php require_once('Model.php'); ?>
<?php

class Message {
    private $message_id;
    private $to_id;
    private $recipient_ids;
    private $from_id;
    private $time_sent;
    private $message;

    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('User constructor requires an array');
        }
        $this->message_id       = $args['message_id'] ?? NULL;
        $this->to_id            = $args['to_id'] ?? NULL;
        $this->recipient_ids    = $args['recipient_ids'] ?? NULL;
        $this->from_id          = $args['from_id'] ?? NULL;
        $this->time_sent        = $args['time_sent'] ?? NULL;
        $this->message          = $args['message'] ?? NULL;
    }
        
        public function getMessage_id()
        {
            return $this->message_id;
        }
        public function getTo_id()
        {
            return $this->to_id;
        }
        public function getRecipient_ids()
        {
            return $this->recipient_ids;
        }
        public function getFrom_id()
        {
            return $this->from_id;
        }
        public function getTime_sent()
        {
            return $this->time_sent;
        }
        public function getMessage()
        {
            return $this->message;
        }
        public function setMessage_id($message_id)
        {
            if ($message_id === NULL) {
                $this->message_id = NULL;
                return;
            }
            $this->message_id = $message_id;
        }
        public function setTo_id($to_id)
        {
            if ($to_id === NULL) {
                $this->to_id = NULL;
                return;
            }
            $this->to_id = $to_id;
        }
        public function setRecipient_ids($recipient_ids)
        {
            if ($recipient_ids === NULL) {
                $this->recipient_ids = NULL;
                return;
            }else if(!is_array($recipient_ids))
            {
                $this->recipient_ids = NULL;
                return; 
            }
            $this->recipient_ids = $recipient_ids;
        }
        public function setFrom_id($from_id)
        {
            if ($from_id === NULL) {
                $this->from_id = NULL;
                return;
            }
            $this->from_id = $from_id;
        }
        public function setMessage($message)
        {
            if ($message === NULL) {
                $this->message = NULL;
                return;
            }
            $this->message = $message;
        }
        public function submitMessage($message, $db)
        {
            if($message->getMessage() === NULL)
            {
            throw new Exception('Cannot submit a message without contents');
            }
            $statement = $db->prepare('INSERT into users (to_id, recipients_ids) VALUES ();');
            $statement->excecute([
                
                'to_id'         => $message->getTo_id(),
                'recipient_ids' => $message->getRecipient_ids(),
                'from_id'       => $message->getFrom_id(),
                'time_sent'     => $message->getTime_sent(),
                'message'       => $message->getMessage()
            ]);
            $saved = $statement->rowCount() === 1;

            if ($saved) {
                $message->setMessage_id($db->lastInsertId());
            }
            return $saved;
        }
        public function getInboxByUser_id($user_id, $db)
        {
            $user_id = (int)$user_id;
            $query1 = $db->prepare('SELECT to_id, user_id, WHERE $user_id = :user_id';);
            $query1->execute([
                'user_id' => $user_id;
            ]);
            $query2 = $db->prepare('SELECT , , WHERE $user_id = :user_id ';);
            $query2->execute([
                'user_id' => $user_id;
            ]);

            $inbox = array_push($query1->fetchAll());
            
            return $inbox;
        }
        public function getMessagesByTo_id($to_id, $db)
        {
            $to_id = (int)$to_id;

            $query = $db->prepare('SELECT * FROM message WHERE to_id = :to_id';);
            $query->execute([
                'to_id' => $to_id
            ]);

            $messages = $query->fetchAll();
            return $messages;
        }
    }
?>