<?php return function($req, $res) {
    $user_id = $req->query('user');
    require('./lib/FormUtils.php');
    require('./models/Group.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();
    
    $recipient_id   =  $req->query('recipient_id');
    $admin_id       =  $_SESSION['Id'];

    $group = new Group([
        'group_id'      => NULL,
        'admin_id'      => $admin_id,
        'recipient_ids' => $recipient_id
    ]);

    $group_id = Group::addGroup($group, $db);

    $res->redirect('/message?to_id='.$group_id);
}
?>