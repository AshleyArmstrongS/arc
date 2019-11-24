<?php return function($req, $res) {
    $user_id = $req->query('user');
    require('./lib/FormUtils.php');
    require('./models/Group.php');
    require('./models/Message.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();
    $recipient_id   =  $req->query('recipient_id');
    $admin_id       =  $_SESSION['Id'];

    $admin_groups = Group::getGroupsByUser_id($admin_id, $db);
    $recipient_groups = Group::getGroupsByUser_id($recipient_id, $db);
    

        foreach($admin_groups as $ag)
        {
            foreach($recipient_groups as $rg)
            {
                $is_message = Message::checkMessages($rg, $db);
                if($rg['group_id'] === $ag['group_id'] && $is_message === TRUE)
                {
                    $res->redirect('/inbox');
                }
            }
        }
    
        $group = new Group([
            'group_id'      => NULL,
            'admin_id'      => $admin_id,
            'recipient_ids' => $recipient_id
        ]);

        Group::addGroup($group, $db);
        $res->redirect('/message?to_id='.$group->getGroup_id());
}
?>