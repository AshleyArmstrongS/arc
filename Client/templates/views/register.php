<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->

<div class="container">
    <div class="d-flex justify-content-center h-100">
		<div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Please sign up for GoCollege</h3>
                </div>
            </div>
            
            <div class="card-body">
                <form id='signup_form' action='' method='post'>
            <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php foreach($locals['form_error_messages'] as $errors) { ?>
            <p><?= $errors ?></p>
            <?php } ?>
            </div>
                <div class="input-group form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                    </div>

                    <div class="input-group form-group">
                        <input type="name" name="name" id="name" class="form-control input-sm" placeholder="Full Name">
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="password1" id="password1" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="password2" id="password2" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="college" id="college" class="form-control input-sm" placeholder="Name Of College">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" id="description" class="form-control input-sm" placeholder="Description of yourself">
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="age" id="age" class="form-control" placeholder="Age">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="gender" id="gender" class="form-control" placeholder="Female(F) or Male(M)">
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="starting_location" id="starting_location" class="form-control" placeholder="Starting Address">
                    </div>

                    <div class="form-group">
                        <input type="text" name="userType" id="userType" class="form-control" placeholder="Passenger (P) or Driver(D)">
                    </div>
                    <!-- 

                     -->
                    
                    <input type="submit" value="Register" class="btn btn-info btn-block">
                
                </form>
                </div>
	    		</div>
    		</div>
    	</div>
    </div>