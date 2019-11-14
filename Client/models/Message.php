<<?php require_once('Model.php'); ?>
<?php

class Message {
    private $message_id;
    private $group_id;
    private $from_id;
    private $time_sent;
    private $message;

    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('User constructor requires an array');
        }
        $this->message_id       = $args['message_id'] ?? NULL;
        $this->group_id         = $args['group_id'] ?? NULL;
        $this->from_id          = $args['from_id'] ?? NULL;
        $this->time_sent        = $args['time_sent'] ?? NULL;
        $this->message          = $args['message'] ?? NULL;
    }
        
        public function getMessage_id()
        {
            return $this->message_id;
        }
        public function getGroup_id()
        {
            return $this->group_id;
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
        public function setGroup_id($group_id)
        {
            if ($group_id === NULL) {
                $this->to_igroup_idd = NULL;
                return;
            }
            $this->group_id = $group_id;
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
            $statement = $db->prepare('INSERT into users (group_id, from_id, time_sent, message) VALUES (:group_id, :from_id, :time_sent, :message);');
            $statement->excecute([
                
                'group_id'      => $message->getGroup_id(),
                'from_id'       => $message->getFrom_id(),
                'time_sent'     => $message->getTime_sent(),
                'message'       => $message->getMessage()
            ]);
            $saved = $statement->rowCount() === 1;

            if ($saved) {
                $message->setMessage_id($db->lastInsertId());
                return TRUE;
            }
<<<<<<< HEAD
            return $saved;
        }
        public function getUsersByGroup_id($group_id, $db)
        {
            $group_id = (int)$group_id;

            
            $query1 = $db->prepare('SELECT user_id, group_id from userspergroup where group_id = :group_id;');
            $query1->execute([
                'group_id' => $group_id
            ]);
            $inbox = array_push($query1->fetchAll());
            
            return $inbox;
        }
        public function getGroupsByUser_id($user_id, $db)
        {
            $user_id = (int)$user_id;

            
            $query1 = $db->prepare('SELECT group_id, user_id from userspergroup where user_id = :user_id;');
            $query1->execute([
                'user_id' => $user_id
            ]);
            $inbox = $query1->fetchAll();
=======
>>>>>>> messaging_system_functions
            
        }
        public function getMessagesByGroup_id($group_id, $db)
        {
            $group_id = (int)$group_id;

            $query = $db->prepare('SELECT * from messages m inner join groups g on m.to_id = g.group_id where g.group_id = :group_id;');
            $query->execute([
                'group_id' => $group_id
            ]);

            $messages = $query->fetchAll();
            return $messages;
        }
    }
?>