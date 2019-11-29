<?php $user = $locals['user'] ?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>GoCollege</h3>
            </div>
            <div class="card-body">
                <form id='home' action='' method='post'>

                    <div class="input-group form-group">

                        <span><i class="fas fa-user fa-4x"></i></span>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <a class="nav-link" style="color:black;"> <?= $user->getName(); ?></a>
                        </div>
                    </div>
                    <?php if ($user->getUser_id() === $_SESSION['Id']) { ?>
                        <div class="col-sm-15">
                            <div class="card">
                                <a class="nav-link" style="color:black; padding:30px;" href='<?= SITE_BASE_DIR ?>/lifts'>Lifts Scheduled</a>
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
                        <div class="card">
                            <a class='btn btn-dark btn-xs' href='<?= SITE_BASE_DIR ?>/leaveReview?driver_id=<?= $user->getUser_id(); ?>'> Leave review</a>
                        </div>
                    <?php  } ?>
            </div>
        </div>