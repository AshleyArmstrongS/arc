<?php require_once('Model.php'); ?>
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
            $statement = $db->prepare('INSERT into messages (to_id, from_id, time_sent, message) VALUES (:group_id, :from_id, now(), :message);');
            $statement->execute([
                'group_id'      => $message->getGroup_id(),
                'from_id'       => $message->getFrom_id(),
                'message'       => $message->getMessage()
            ]);
            $saved = $statement->rowCount() === 1;

            if ($saved) {
                $message->setMessage_id($db->lastInsertId());
                return TRUE;
            }
            return $saved;
        }
        
        public function getMessagesByGroup_id($group_id, $db)
        {
            $group_id = (int)$group_id;


            $query = $db->prepare('SELECT m.message_id, m.message, m.time_sent, m.from_id, m.to_id, u.name from messages m inner join groups g on m.to_id = g.group_id inner join users u on m.from_id = u.user_id where g.group_id = :group_id;');

            $query->execute([
                'group_id' => $group_id
            ]);

            $messages = $query->fetchAll();
            return $messages;
        }

    
    //the only query for inbox

    public function getLastMessagesByGroup_id($group_id, $db)
    {
        $group_id = (int)$group_id;


        $query = $db->prepare('SELECT m.message, m.time_sent, m.from_id, m.to_id, u.name FROM messages m  INNER JOIN ( SELECT MAX(message_id) AS max_id FROM messages) max ON m.message_id = max.max_id inner join Users u on u.user_id = m.from_id where m.to_id = :group_id;');
        $query->execute([
            'group_id' => $group_id
        ]);


        $message = $query->fetch();
        return $message !== FALSE ? $message : NULL;
        //return $message !== FALSE;

        }

        public function deleteMessage($message_id, $db)
        {
            $message_id = (int)$message_id;
            $query = $db->prepare('DELETE from messages WHERE message_id = :message_id');
            $query->execute([
                'message_id' => $message_id
            ]);

        }
}
?>