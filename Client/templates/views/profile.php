<?php $user = $locals['user']; ?>

<style>
body {
  background: url("../Client/assets/images/test.png") no-repeat center center fixed;
}

#submit_req a {
  margin: 5px;
  padding: 5px;
}

#person {
  padding: 0;
  margin: 0;
}

.card {
  margin-top: 20px;
  margin-bottom: auto;
  background-color: #8DCAFF;
  border: 2px solid rgb(95, 88, 88);
  padding-top: 20px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 30px;
  box-shadow: 5px 10px 8px slategray;
}

i {
  font-weight: bold;

}

#links_background a:hover {
  background: none;
  color: black;
}

</style>


<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>GoCollege</h3>
      </div>
      <i id="person"><?= $user->getName(); ?>'s
        Account</i>
      <div class="card-body">
        <form id='home' action='' method='post'>
          <?php if ($user->getUser_id() === $_SESSION['Id']) { ?>
          <div class="col-sm-15">
            <div class="card">
              <?php if($locals['hasSched'] === true) { ?>
              <a class="nav-link" style="color:black; padding:30px;" id="links_background" href='<?= SITE_BASE_DIR ?>/lifts'>Lifts
                Scheduled</a>
              <?php } else { ?>
              <p class="nav-link" style="color:black; padding:30px;" id="links_background" >No Lifts Scheduled</p>
              <?php } ?>
            </div>
          </div>
          <div class="col-sm-15">
            <div class="card">
              <a class="nav-link" style="color:black; padding:30px;" id="links_background"  href='<?= SITE_BASE_DIR ?>/inbox'>Messages</a>
            </div>
          </div>
          <div class="card-footer">
            <a class='btn btn-dark btn-xs' href='<?= SITE_BASE_DIR ?>/editUser'> Edit Profile</a>
          </div>
          <?php } else { ?>
          <div class="card" id="submit_req">
            <a class='btn btn-dark btn-xs'
              href='<?= SITE_BASE_DIR ?>/createGroup?recipient_id=<?= $user->getUser_id(); ?>'> Send Message</a>
            <a class='btn btn-dark btn-xs'
              href='<?= SITE_BASE_DIR ?>/leaveReview?driver_id=<?= $user->getUser_id(); ?>'> Leave Review</a>
          </div>
          <?php  }
                    foreach ($locals['ratings'] as $rating) { ?>
          <div class="card">

            <div><?= $rating['name'] ?></div>
            <div class="">
              <?php for ($x = 0; $x < $rating['star_rating']; $x++) { ?>
              ★
              <?php } ?>
            </div>
            <div class="">
              <p><?= $rating['review']; ?></p>
            </div>
            <div class="">
              <?php if ($rating['reccommend'] === N) { ?>
              <div class="cad"> This person would not reccommend this driver.</div>
              <?php } else { ?>
              <div class=""> This person would reccommend this driver. </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
      </div>
    </div>