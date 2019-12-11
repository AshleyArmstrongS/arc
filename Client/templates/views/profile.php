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

a:hover {
  background: none;
}
</style>


<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>GoCollege</h3>
      </div>
      <a class="nav-link" style="color:black; font-weight:bold"><i id="person"><?= $user->getName(); ?>'s
            Account</i></a>
      <div class="card-body">
        <form id='home' action='' method='post'>
          <?php if ($user->getUser_id() === $_SESSION['Id']) { ?>
          <div class="col-sm-15">
            <div class="card">
              <a class="nav-link" style="color:black; padding:30px;" href='<?= SITE_BASE_DIR ?>/lifts'>Lifts
                Scheduled</a>
            </div>
          </div>
          <div class="col-sm-15">
            <div class="card">
              <a class="nav-link" style="color:black; padding:30px;" href='<?= SITE_BASE_DIR ?>/inbox'>Messages</a>
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