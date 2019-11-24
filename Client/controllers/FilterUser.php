<?php return function($req, $res) {

$req->sessionStart();
$db = \Rapid\Database::getPDO();
require('./models/User.php');
$gender = $_POST["gender"] ?? NULL;
$day = $_POST["check_list"] ?? NULL;

if($gender != NULL && $_POST["check_list"] != NULL)
{
    
    $day = $_POST["check_list"];
    $users = User::getDriversByDayAndGender($db,$day,$gender);
}
else if($gender != NULL && $_POST["check_list"] == NULL)
{
    
    $users = User::getDriversByGender($db, $gender);
}
else 
{
    $day = $_POST["check_list"];
    $users = User::getDriversByDay($db,$day);
}

if ($users == NULL) { ?>
    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Unfortunately no users exist relating to your search.</h5>
                            </div>
                        </div>
                    </div>
<?php  }
else {
    foreach ($users as $user) {
        ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <a href="/arc/Client/createGroup?recipient_id= <?= $user->getUser_id() ?>">
                                            <h5 class="card-title"> <?= $user->getName(); ?> <i class="fas fa-comment-alt"></i> </h5>
                </div>
            </div>
        </div>
    <?php } ?>


<?php }
} ?>
