<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
        content: '★ ';
    }
</style>

<?php $user = $locals['user'];
?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>GoCollege</h3>
            </div>
            <div class="card-body">
                <form id='home' action='' method='post'>
                    <div class="input-group form-group">
                        <?php if ($user->getUser_id === $_SESSION['Id']) { ?>
                            <a class="nav-link" style="color:black; padding:30px;" href='<?= SITE_BASE_DIR ?>/inbox'>
                                <?php if ($user->getImage_name($user->getUser_id(), $db) === NULL) { ?>
                                    <span><i class="fas fa-user fa-4x"></i></span>
                                <?php } else { ?>
                                    <span><img src="../Client/assests/images/?=<?= $user->getImage_name(); ?>" alt=""></i></span>
                            </a>
                        <?php }
                        } else {
                            if ($user->getImage_name() === NULL) { ?>
                            <span><i class="fas fa-user fa-4x"></i></span>
                        <?php } else { ?>
                            <span><img src="../Client/assests/images/?=<?= $user->getImage_name(); ?>" alt=""></i></span>
                    <?php }
                    } ?>
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
                    <?php  }
                    foreach ($locals['ratings'] as $rating) { ?>
                        <div class="card">

                            <div><?= $rating['name'] ?></div>
                            <div class="rate">
                            <?php for ($x = 0; $x < $rating['star_rating']; $x++) { ?>
                                <div class="rate">★ </div>
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