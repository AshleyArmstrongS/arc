<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php return function ($req, $res) {

    $req->sessionStart();

    if ($_SESSION['LOGGED_IN'] === TRUE) {

        $db = \Rapid\Database::getPDO();
        require('./models/User.php');
        require('./models/Location.php');
        $gender = $_POST["gender"] ?? NULL;
        $day = $_POST["check_list"] ?? NULL;


        $currentUser = User::getUserByEmail($_SESSION['Email'], $db);
        $location_of_user = Location::returnLatLongById($db, $currentUser->getLocation());
        if ($gender != NULL && $day != NULL) {
            $users = User::getDriversByDayAndGender($db, $day, $gender);
        } else if ($gender != NULL && $day == NULL) {
            $users = User::getDriversByGender($db, $gender);
        } else {
            $users = User::getDriversByDay($db, $day);
        }

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
                        foreach ($users as $user) { ?>
                <div class="col-sm-12">
                    <div class="card">
                         
                            <h5 class="card-header col-sm-12 "> <a href="/arc/Client/profile?user_id=<?= $user["driver_id"]; ?>" ><i class="fas fa-user" style="font-weight:normal;"><?= $user["name"]; ?></i></a> </h5></a>
                            <a href="/arc/Client/createGroup?recipient_id=<?= $user["driver_id"]; ?>"class="col-sm-12"><i class="fas fa-comment-alt" style="font-weight:normal;"> Message</i></a>
                            <a href="https://www.google.com/maps/dir/?api=1&origin=<?= $location_of_user[0] ?>,<?= $location_of_user[1] ?>&destination=<?= Location::returnLatLongById($db, $user["location_id"])[0] ?>,<?= Location::returnLatLongById($db, $user["location_id"])[1] ?>"  class="col-sm-12"><i class="far fa-map" style="font-weight:normal;"> Location</i></a>
                  
                            <h6 class="col-sm-12"><?php $distance = Location::calculateDistance($db, $user["location_id"], $location_of_user[0], $location_of_user[1])[0] ?> 
                            <?=printf("%.1f", $distance); ?> km away from you</h6>
                        </div>
                </div>
<?php }
        }
    }
} ?>
