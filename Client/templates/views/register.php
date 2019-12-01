<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->

<!-- <div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="panel-heading">
        <div class="card-header">
          <h3 class="panel-title">Please sign up for GoCollege</h3>
        </div>
      </div>

      <div class="card-body">
        <form id='signup_form' action='' method='post'>
          <?php //foreach ($locals['form_error_messages'] as $errors) {?>
          <p class='error'><?php //$errors?></p>
          <?php //}?>
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
                <input type="password" name="password2" id="password2" class="form-control"
                  placeholder="Confirm Password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <select name="college" class="form-control">
              <option value="">College</option>
              <option value="Dundalk Institute of Technology">Dundalk Institute of Technology</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="description" id="description" class="form-control input-sm"
              placeholder="Description of yourself">
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="number" name="age" id="age" class="form-control" placeholder="Age">
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <select name="gender" class="form-control">
                <option value="">Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <input type="text" name="starting_location" id="starting_location" class="form-control"
              placeholder="Starting Address">
          </div>


          <div class="form-group">
            <select name="userType" class="form-control">
              <option value="">User Type</option>
              <option value="D">Driver</option>
              <option value="P">Passenger</option>
            </select>
          </div>

          <div class="form-group">
            <select name="avail" class="form-control">
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
</div> -->




<style>

body {
	background-image: url("../Client/assets/images/background-login.jpg");
	background: cover;
	overflow: hidden;
}

.card {
  background-color: #fbeee1;
  opacity: 0.8;
  overflow: hidden;
}

#header-name {
  background: none;
  margin: 0;
  padding-bottom: 0;
}

.imgcontainer {
  text-align: center;
  margin-bottom: 6px;
}

img.avatar {
  width: 40%;
}

/* Style the input fields */
input select {
  margin: 10px;
  padding: 10px;
  font-size: 17px;
  font-family: Helvetica;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid select {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

.btn {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  margin: 5px 5px 5px 5px;
}

.next {
  background-color: #4CAF50;
  color: white;
}

.btn:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}
</style>
<div class="container">
  <div class="d-flex justify-content-center">
    <div class="card">
      <div class="card-header" id="header-name">
        <em>
          <h2>Register</h2>
        </em>
      </div>
      <div class="card-body">

        <form id="register-form" method="post" action="">
          <div class="imgcontainer">
            <img src="../Client/assets/images/user_profile.png" alt="Avatar" class="avatar">
          </div>
          <!-- One "tab" for each step in the form: -->
          <div class="tab"><i style="font-weight: bold;">User Info: </i>
            <p><input type="email" class="form-control" placeholder="Email..." name="email" id="email"
                oninput="this.className = ''" required="">
            </p>
            <p><input type="name" class="form-control" placeholder="Full name..." name="name" id="name"
                oninput="this.className = ''" required=""></p>
            <p><input type="password" class="form-control" placeholder="Password..." name="password1" id="password1"
                oninput="this.className = ''" required=""></p>
            <p><input type="password" class="form-control" placeholder="Confirm Password..." name="password2"
                id="password2" oninput="this.className = ''" required=""></p>
            <p><i style="font-weight: bold;">Birthday: </i></p>
            <p><input type="date" class="form-control" name="bday" id="bday" placeholder="Birthday..." data-relmax="-18"
                required=""></p>
            <p><i style="font-weight: bold;">Gender: </i></p>
            <p><select name="gender" class="form-control">
                <option value="" selected="true" disabled="disabled">Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select></p>
          </div>

          <div class="tab"><i style="font-weight: bold;">College Info: </i>
            <p><select name="college" class="form-control">
                <option value="" selected="true" disabled="disabled">College</option>
                <option value="Dundalk Institute of Technology">Dundalk Institute of Technology</option>
              </select></p>
            <p><input type="text" name="description" id="description" class="form-control input-sm"
                placeholder="Description of yourself"></p>
          </div>

          <div class="tab"><i style="font-weight: bold;">User Type: </i>
            <p><select name="userType" class="form-control">
                <option value="" selected="true" disabled="disabled">User Type</option>
                <option value="D">Driver</option>
                <option value="P">Passenger</option>
              </select></p>
            <p><select name="avail" class="form-control">
                <option value="" selected="true" disabled="disabled">Available?</option>
                <option value="Y">Yes</option>
                <option value="N">No</option>
              </select></p>
          </div>

          <div>
            <div>
              <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn float-right next">Next</button>
              <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn float-right">&laquo;
                Previous</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
<script>
// Reference - https://www.w3schools.com/howto/howto_js_form_steps.asp

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next &raquo;";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("register-form").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("p");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

// Reference - http://jsfiddle.net/trixta/wpb54/

// $(function() {
//   $('input[data-relmax]').each(function() {
//     var oldVal = $(this).prop('value');
//     var relmax = $(this).data('relmax');
//     var max = new Date();
//     max.setFullYear(max.getFullYear() + relmax);
//     $.prop(this, 'max', $(this).prop('valueAsDate', max).val());
//     $.prop(this, 'value', oldVal);
//   });
// });
</script>