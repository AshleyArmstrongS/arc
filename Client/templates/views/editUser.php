<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->
<?php $user = $locals['user'];

require_once('./models/Location.php');?>

<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Edit Profile</h3>
                </div>
            </div>

            <div class="card-body">
                <form id='editUser' action='' method='post'>
                    <?php foreach ($locals['form_error_messages'] as $errors) { ?>
                        <p class='error'><?= $errors ?></p>
                    <?php } ?>
                    <div class="input-group form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" value='<?= $user->getEmail(); ?>'>
                    </div>

                    <div class="input-group form-group">
                        <input type="name" name="name" id="name" class="form-control input-sm" value='<?= $user->getName(); ?>'>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password1" id="password1" class="form-control"placeholder="Password" >
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="college" class="form-control">
                            <option value='<?= $user->getCollege(); ?>'><?= $user->getCollege(); ?></option>
                            <option value="Dundalk Institute of Technology">Dundalk Institute of Technology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" id="description" class="form-control input-sm" value='<?= $user->getDescription(); ?>'>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="age" id="age" class="form-control" value='<?= $user->getAge(); ?>'>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <select name="gender" class="form-control">
                                <option value=<?php $user->getGender(); ?>><?= $user->getGender(); ?></option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <?php $db = \Rapid\Database::getPDO();?>
                    <?php $address = Location::returnAddressById($db,$user->getLocation()); ?>
                    <div class="form-group">
                        <input type="text" name="starting_location" id="starting_location" class="form-control" value="<?= $address['address'] ?>">
                    </div>


                    <div class="form-group">
                        <select name="userType" class="form-control">
                            <option value=<?php $user->getUser_type(); ?>><?= $user->getUser_type(); ?></option>
                            <option value="D">Driver</option>
                            <option value="P">Passenger</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="avail" class="form-control">
                            <option value=<?php $user->getAvailable(); ?>><?=$user->getAvailable();?></option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    <input type="submit" value="submit" class="btn btn-info btn-block">

                </form>
            </div>
        </div>
    </div>
</div>
</div>