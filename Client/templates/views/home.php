

<?php require('./models/User.php'); ?>
<?php foreach ($locals['user'] as $user) { ?>

    <li class="list-group-item text-right"><a href="#" class="pull-left"></a> <?php // print_r($user);  ?>
        <?php foreach ($user as $messages) { ?>      
            <?php print_r($messages); ?>
        <?php } ?>    
    </li>


<?php } ?>


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
                            <a class="nav-link"style="color:black;"> Hi,<?= $_SESSION['Name']; ?></a>
                        </div>
                    </div>
                    <div class="col-sm-15">
                        <div class="card">
                            <a class="nav-link"style="color:black; padding:30px;" href='<?= SITE_BASE_DIR ?>/lifts'>Lifts Scheduled</a>
                        </div>
                    </div>
                    <div class="col-sm-15">
                        <div class="card">
                            <a class="nav-link"style="color:black; padding:30px;" href='<?= SITE_BASE_DIR ?>/inbox'>Messages</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a  class='btn btn-dark btn-xs' href='<?= SITE_BASE_DIR ?>/login'> Edit Profile</a>
                    </div>
            </div>
        </div>
