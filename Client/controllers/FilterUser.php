<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php return function($req, $res) {

$req->sessionStart();
    
if ($_SESSION['LOGGED_IN'] === TRUE) { 
$db = \Rapid\Database::getPDO();
require('./models/User.php');
$gender = $_POST["gender"] ?? NULL;
$day = $_POST["check_list"] ?? NULL;

    if ($gender != NULL && $day != NULL) {
        $users = User::getDriversByDayAndGender($db, $day, $gender);
    } else if ($gender != NULL && $day == NULL) {
        $users = User::getDriversByGender($db, $gender);
    } else {
        $users = User::getDriversByDay($db, $day);
    }

    if ($users == NULL) { ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Unfortunately no users exist relating to your search.</h5>
                </div>
            </div>
        </div>
        <?php  } else {
                foreach ($users as $user) {
                    ?>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <a href="/arc/Client/createGroup?recipient_id=<?= $user["user_id"]; ?>">
                            <h5 class="card-title"> <?= $user["name"]; ?> <i class="fas fa-comment-alt"></i> </h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>


<?php }
}
}
else{
    $res->render('main', '404', []);
} ?>
