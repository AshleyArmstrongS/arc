<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->

<div class="container">
    <div class="d-flex justify-content-center h-100">
		<div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Please sign up for GoCollege</h3>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php foreach($locals['form_error_messages'] as $errors) { ?>
            <p><?= $errors ?></p>
            <?php } ?>
            </div>
                <div class="card-body">
                <form id='signup_form' action='' method='post'>
                    
                    <div class="input-group form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                    </div>

                   
                        
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                    </div>
                
                
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="starting_location" id="starting_location" class="form-control" placeholder="Starting Location">
                    </div>

                    <div class="form-group">
                        <input type="text" name="college" id="college" class="form-control" placeholder="College">
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



