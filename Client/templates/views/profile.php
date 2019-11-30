<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn_up {
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
</style>

<?php $user = $locals['user'];
echo $user->getImage_name();
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
                            <span><img src="../Client/assests/user_images/?=<?= $user->getImage_name(); ?>" alt=""></i></span>
                        <?php }
                        if ($user->getUser_id() === $_SESSION['Id']) { ?>
                            <form action='' method='post' class="form" enctype="multipart/form-data">
                                <div class="upload-btn-wrapper">
                                    <button class="btn_up btn-dark btn-xs"><i class="fas fa-edit"></i></button>
                                    <input type="file" name="image" placeholder="" required>
                                </div>
                                <input type="submit" value="Upload" name="image" class="btn">
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