<style>

body {
    font-family: helvetica;
    font-weight: normal;
    overflow:hidden;
}

#map_wrapper {
  height: 600px;
}

.card-body {
  max-height: 600px;
  overflow-y: scroll;
}

#map_canvas {
  width: 100%;
  height: 100%;
}

#search_filter {
  margin-bottom: 3px;
}

.card-title a {
  background: none;
}

.card-title a:hover {
  color: blue;
}

.card {
  margin: 5px;
  padding: 5px;
}

.card .card-body {
  overflow: hidden;
}

</style>
<?php require('./models/Location.php'); ?>

<script type="text/javascript">
$(document).ready(function() {
  $("#filteritems").click(function() {

    $.ajax({
      url: "./filter",
      data: $("#filter_form").serialize(),
      type: "post",
      success: function(result) {
        $("#usersResult").html(result);
      }
    });
  });


});
</script>

<?php 
   
    $db = \Rapid\Database::getPDO();
    $currentUser = User::getUserByEmail($_SESSION['Email'], $db);
    $location_of_user = Location::returnLatLongById($db, $currentUser->getLocation()); 
    $users = $locals['users'];
?>



<div class="card-body">
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">

      <form action='search'>
        <div class="input-group form-group">
          <input type="search" name="search" class="form-control input-sm" placeholder="Name">

        </div>
        <div class="row">

          <div class="col-xs-6 col-sm-6 col-md-6" id="search_filter">
            <input type="submit" value="Search" class="btn btn-info btn-block">
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6" id="search_filter">

            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal"><i
                class="fas fa-filter"> </i></button>

          </div>
        </div>

        <div id="usersResult">

          <?php
                    if ($users == NULL) {

                        ?>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Unfortunately no users exist relating to your search.</h5>
              </div>
            </div>
          </div>
          <?php
                        } else {
                            foreach ($users as $user) {
                                if ($user->getUser_id() !== $_SESSION['Id']) { ?>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <a href="/arc/Client/profile?user_id= <?= $user->getUser_id(); ?>">
                  <h5 class="card-title">
                </a>
                <div class="input-group form-group">
                  <h5 class="card-title"> <a href="/arc/Client/profile?user_id=<?= $user->getUser_id(); ?>"><i
                        class="fas fa-user" style="font-weight:normal;"></i> <?= $user->getName(); ?></a><br> <a
                      href="/arc/Client/createGroup?recipient_id=<?= $user->getUser_id(); ?>"><i
                        class="fas fa-comment-alt" style="font-weight:normal;"> Message</i> <a
                        href="https://www.google.com/maps/dir/?api=1&origin=<?= $location_of_user[0] ?>,<?= $location_of_user[1] ?>&destination=<?= Location::returnLatLongById($db, $user->getLocation())[0] ?>,<?= Location::returnLatLongById($db, $user->getLocation())[1] ?>"><i
                          class="far fa-map" style="font-weight:normal;"> Location</i></h5></a>

                  <h6>
                    <?= Location::calculateDistance($db, $user->getLocation(), $location_of_user[0], $location_of_user[1])[0] ?>
                    km away from you</h6>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php } else {
                                ?>

          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Unfortunately no users exist relating to your search.</h5>
              </div>

            </div>
          </div>
          <?php }
                        }
                    }
                    ?>
        </div>
      </form>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
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
        var markers = [ <
          ? php
          $first = true;
          foreach($users as $user) {

            if ($user - > getUser_id() !== $_SESSION['Id']) {
              if ($user - > getLocation() != null) {
                $location = Location::returnLatLongById($db, $user - > getLocation());
                if ($first == false) {
                  echo ", ";
                }
                echo "['".$user - > getName().
                "', ".$location[0].
                ",".$location[1].
                "]";
                $first = false;
              }
            }
          } ?
          >
        ];

        // Info Window Content
        var infoWindowContent = [ <
          ? php
          $first = true;
          foreach($users as $user) {

            if ($user - > getUser_id() !== $_SESSION['Id']) {
              if ($user - > getLocation() != null) {
                if ($first == false) {
                  echo ", ";
                }
                echo "[\"<div class='info_content'>".
                "<h6>".$user - > getName().
                "</h6></div>\"]";
                $first = false;
              }
            }
          } ?
          >
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
    </div>

  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='filter_form'>
          <div class="form-group">
            <!-- https://www.w3schools.com/php/php_form_complete.asp -->
            <label for="gender" class="col-form-label">Gender: </label><br />
            <input id="gender" type="radio" name="gender"
              <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="F">Female
            <input id="gender" type="radio" name="gender"
              <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="M">Male
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Day: </label><br />
            <input type="checkbox" id="check_list" name="check_list" value="Monday"><label>Monday</label><br />
            <input type="checkbox" id="check_list" name="check_list" value="Tuesday"><label>Tuesday</label><br />
            <input type="checkbox" id="check_list" name="check_list" value="Wednesday"><label>Wednesday</label><br />
            <input type="checkbox" id="check_list" name="check_list" value="Thursday"><label>Thursday</label><br />
            <input type="checkbox" id="check_list" name="check_list" value="Friday"><label>Friday</label><br />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="filteritems" class="btn btn-primary" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>