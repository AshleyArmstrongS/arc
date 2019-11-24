<?php return function($req, $res) {

$req->sessionStart();
$db = \Rapid\Database::getPDO();
require('./models/User.php');
$gender = $_POST["gender"];
//$day = $_POST["check_list"];

//$gender = $req->query('filter');
$users = User::getDriversByGender($db, $gender);
//$users = User::getDriversByDayAndGender($db,$day,$gender);

// $res->render('main', 'viewUser', [
//     'pageTitle' => 'View Users',
//     'viewUsers'  => $users

// ]);
foreach ($users as $user) { ?>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <?= $user["name"]; ?> <i class="fas fa-comment-alt"></i> </h5>
            </div>
        </div>
    </div>
<?php } ?>

<?php } ?>