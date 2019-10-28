<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->

<div class="container">
    <div class="d-flex justify-content-center h-100">
		<div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Please sign up for GoCollege</h3>
                </div>
            </div>
            
            <?php
    $form_error_messages = $locals['form_error_messages'];
    if (count($form_error_messages) > 0) {
        foreach ($form_error_messages as $error_message) {
            ?>
            <p class='error'><?= $error_message ?></p>
            <?php
        }
    }
    ?>
             <div class="card-body">
                <form role="form">
                 <div class="input-group form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                    </div>

                    <div class="input-group form-group">
                        <input type="name" name="name" id="name" class="form-control input-sm" placeholder="Full Name">
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password1" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="college" id="college" class="form-control input-sm" placeholder="Name Of College">
                    </div>
                    <div class="form-group">
                        <input type="text" name="descritpion" id="descritpion" class="form-control input-sm" placeholder="Description of yourself">
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
                        <input type="text" name="starting_location" id="starting_location" class="form-control" placeholder="Starting Location ID">
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





