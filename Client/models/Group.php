<<?php require_once('Model.php'); ?>
<?php

class Group {
    private $group_id;
    private $admin_id;
    private $recipients_ids;

    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('User constructor requires an array');
        }
        $this->group_id         = $args['group_id'] ?? NULL;
        $this->recipient_ids    = $args['recipient_ids'] ?? NULL;
        $this->admin_id          = $args['admin_id'] ?? NULL;
    }
    public function getGroup_id()
        {
            return $this->group_id;
        }
        public function getRecipient_ids()
        {
            return $this->recipient_ids;
        }
        public function getAdmin_id()
        {
            return $this->admin_id;
        }

        public function setGroup_id($group_id)
        {
            if ($group_id === NULL) {
                $this->to_igroup_idd = NULL;
                return;
            }
            $this->group_id = $group_id;
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
        public function setAdmin_id($admin_id)
        {
            if ($admin_id === NULL) {
                $this->admin_id = NULL;
                return;
            }
            $this->admin_id = $admin_id;
        }
        public function addGroup($group, $db)
        {
            $statement = $db->prepare('INSERT into groups (admin_id) VALUES(:admin_id)')
            $statement->execute([
                'admin_id' => $$group->getAdmin_id()
            ]);
            $saved = $statement->rowCount() === 1;

            if ($saved) {
                $group->setGroup_id($db->lastInsertId());
            }
            $recipient_ids_temp = $group->getRecipient_ids();
            foreach($recipient_ids_temp['user_id'] as $recipient){
                $statement2 = $db->prepare('INSERT into userspergroup (group_id, user_id) VALUES(:group_id, :user_id)')
                $statement2->execute([
                    'admin_id' => $group->getAdmin_id(),
                    'user_id' => $recipient
                ]);
            }
            $saved = $statement->rowCount() === size_of($recipient_ids_temp);
            if($saved)
            {
                return TRUE;
            }
        }
        public function getUsersByGroup_id($group_id, $db)
        {
            $group_id = (int)$group_id;

            $query = $db->prepare('SELECT u.user_id, u.name, p.group_id from userspergroup p inner join users u on p.user_id = u.user_id where p.group_id = :group_id;'););
            $query->execute([
                'group_id' => $group_id;
            ]);
            $users = array_push($query->fetchAll());
            
            return $users;
        }
        
        public function getGroupsByUser_id($user_id, $db)
        {
            $user_id = (int)$user_id;

            
            $query = $db->prepare('SELECT p.group_id, p.user_id, g.admin_id from userspergroup p inner join groups g on p.group_id = g.group_id where p.user_id = :user_id;'););
            $query->execute([
                'user_id' => $user_id;
            ]);
            $inbox = array_push($query->fetchAll());
            
            return $inbox;
        }
        