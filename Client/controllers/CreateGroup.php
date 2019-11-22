<?php return function($req, $res) {
    $user_id = $req->query('user');
    require('./lib/FormUtils.php');
    require('./models/Group.php');
    $db = \Rapid\Database::getPDO();
    $req->sessionStart();
    $recipients_ids = [];
    $admin_id = $_SESSION['Id'];

    array_push($recipients_ids, $req->body('user_id'));
    array_push($recipients_ids, $admin_id);
    $user = new Group([
        'admin_id' => $admin_id,
        'recipients_ids' => $recipients_ids
    ])

    $group_id = Group::addGroup($group, $db);

    $res->redirect('/message?to_id='.$group_id);
}
?>