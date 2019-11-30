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
                        <?php if ($user->getImage_name() === NULL) { ?>
                            <span><i class="fas fa-user fa-5x"></i></span>
                        <?php } else { ?>
                            <span><img src="../Client/assests/images/?=<?= $user->getImage_name(); ?>" alt=""></i></span>
                        <?php }
                        if ($user->getUser_id()=== $_SESSION['Id']) {?>
                        <form action='' method='post' class="form">
                            <label for="user_image" class="src_only"><i class="fas fa-edit fa-2x"></i></label>
                            <input type="text" name="user_image" class="form-control" placeholder="User Image" value="<?= $user->getImage_name() ?>">
                        </form>
                        <?php } ?>
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