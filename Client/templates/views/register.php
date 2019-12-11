<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->

<style>
body {
  background: url("../Client/assets/images/test.png") no-repeat center center fixed;
}

.card {
  background-color: :#8DCAFF;
  margin-top: 10px;
  margin-bottom: auto;
  border: 2px solid rgb(95, 88, 88);
  padding-top:5px;
  padding-bottom:5px;
  padding-left: 20px;
  padding-right: 20px;
}

.panel-title {
  margin: 0;
  padding: 0;
}

#header-name {
  background: none;
  margin: 0;
  padding-bottom: 0;
}

.imgcontainer {
  text-align: center;
  margin-top: 0;
  margin-bottom: 6px;
}

img.avatar {
  width: 40%;
}

input select {
  margin: 10px;
  padding: 10px;
  font-size: 17px;
  font-family: Helvetica;
  border: 1px solid #aaaaaa;
}

.btn {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  margin: 5px 5px 5px 5px;
}

.btn:hover {
  background-color: #ddd;
  color: black;
}

</style>
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
            <?php foreach($locals['form_error_messages'] as $errors) { ?>
            <p class='error' ><?=  $errors ?></p>
            <?php } ?>
            <div class="input-group form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                    </div>

                    <div class="input-group form-group">
                        <input type="name" name="name" id="name" class="form-control input-sm" placeholder="Full Name">
                    </div>
                    
                    <div class="row">
  
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password">
                                <!-- <div class="tooltip"><i class="fas fa-info-circle"></i><span class="tooltiptext">Password must be at least 8 characters, include a lower case, an upper case, a number and a special character</span></div>
                    -->
                            </div>
                            
                             </div>
                    </div>
                    <div class="form-group">
                    <select name="college"  class="form-control">
                            <option value="">College</option>
                            <option value="Dundalk Institute of Technology">Dundalk Institute of Technology</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" id="description" class="form-control input-sm" placeholder="Description of yourself">
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="age" id="age" class="form-control" placeholder="Age" min="17" max="130">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                        <select name="gender"  class="form-control">
                            <option value="">Biological Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                    </select>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <input type="text" name="starting_location" id="starting_location" class="form-control" placeholder="Starting Address">
                    </div>

                    
                    <div class="form-group">
                    <select name="userType"  class="form-control">
                            <option value="">User Type</option>
                            <option value="D">Driver</option>
                            <option value="P">Passenger</option>
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <select name="avail"  class="form-control">
                            <option value="">Available?</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                    </select>
                    </div>
                    <input type="submit" value="Register" class="btn btn-info btn-block">
                
                </form>
                </div>
	    		</div>
    		</div>
    	</div>
    </div>


