<style>
    #map_wrapper {
        height: 400px;
    }

    #map_canvas {
        width: 300%;
        height: 100%;
    }
</style>

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
                        <div class="card-body">
                            <h5 class="card-title"> <a href="/arc/Client/profile?user_id=<?= $user["driver_id"]; ?>"> <?= $user["name"]; ?></a> <a href="/arc/Client/createGroup?recipient_id=<?= $user["driver_id"]; ?>"><i class="fas fa-comment-alt"></i> <a href="https://www.google.com/maps/dir/?api=1&origin=<?= $location_of_user[0] ?>,<?= $location_of_user[1] ?>&destination=<?= Location::returnLatLongById($db, $user["location_id"])[0] ?>,<?= Location::returnLatLongById($db, $user["location_id"])[1] ?>"><i class="far fa-map"></i></h5>
                            </a>
                            <h6> <?= Location::calculateDistance($db, $user["location_id"], $location_of_user[0], $location_of_user[1])[0] ?> km away</h6>
                        </div>
                    </div>
                </div>
        <?php }
                }
                ?>
        <div id="map_wrapper">
            <div id="map_canvas" class="mapping"></div>
        </div>
        <script>
            //reference - https://wrightshq.com/playground/placing-multiple-markers-on-a-google-map-using-api-3/
            jQuery(function($) {
                // Asynchronously Load the map API 
                var script = document.createElement('script');
                script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
                document.body.appendChild(script);
            });

            function initialize() {
                var map;
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    mapTypeId: 'roadmap'
                };

                // Display a map on the page
                map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                map.setTilt(45);

                // Multiple Markers
                var markers = [
                    ['CurrentUser', 52.099633, -0.144755],
                    ['User 2', 51.499633, -0.124755]
                ];


                // Display multiple markers on a map
                var infoWindow = new google.maps.InfoWindow(),
                    marker, i;

                // Loop through our array of markers & place each one on the map  
                for (i = 0; i < markers.length; i++) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: markers[i][0]
                    });

                    // Allow each marker to have an info window    
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        }
                    })(marker, i));

                    // Automatically center the map fitting all markers on the screen
                    map.fitBounds(bounds);
                }

                // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                    this.setZoom(14);
                    google.maps.event.removeListener(boundsListener);
                });

            }
        </script>



<?php    }
} ?>