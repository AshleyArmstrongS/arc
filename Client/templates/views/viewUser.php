<script type ="text/javascript" >
$(document).ready(function()
{
        $("#filteritems").click(function(){
            // var radioValue = $("input[name='gender']:checked").val();
            // var checkValue = $("input[name='check_list']:checked").val();
            // if(radioValue){
            //   $('#result').html(radioValue);
            // }
            // if(checkValue){
            //   $('#result2').html(checkValue);
            // }

            

  $.ajax({url: "./filter",data:$("#filter_form").serialize(),type:"post", success: function(result){
    $("#usersResult").html(result);
  }});
        });

    
});
</script>

<div class="card-body">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">

            <form action='search'>
                <div class="input-group form-group">
                    <input type="search" name="search" class="form-control input-sm" placeholder="Name">
                </div>
                <div class="row">
                
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" value="search"  class="btn btn-info btn-block">
                    </div>
                    </form>
                    <form action='filter'>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"> </i></button>
                    <div id="result" type ="result" name="result"></div>
                    <div id="result2"></div>
                    </div>
                </div>

                <div id ="usersResult">
                <?php foreach ($locals['viewUsers'] as $user) { ?>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $user->getName(); ?> <i class="fas fa-comment-alt"></i> </h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='filter_form'>
          <div class="form-group">
          <!-- https://www.w3schools.com/php/php_form_complete.asp -->
            <label for="gender" class="col-form-label">Gender:  </label><br/>
            <input id = "gender" type="radio" name="gender"
            <?php if (isset($gender) && $gender=="female") echo "checked";?> value="F">Female
            <input  id ="gender" type="radio" name="gender"
            <?php if (isset($gender) && $gender=="male") echo "checked";?> value="M">Male
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Day:  </label><br/>
            <input type="checkbox" id="check_list" name="check_list" value="Monday"><label>Monday</label><br/>
            <input type="checkbox" id="check_list" name="check_list" value="Tuesday"><label>Tuesday</label><br/>
            <input type="checkbox" id="check_list" name="check_list" value="Wednesday"><label>Wednesday</label><br/>
            <input type="checkbox" id="check_list" name="check_list" value="Thursday"><label>Thursday</label><br/>
            <input type="checkbox" id="check_list" name="check_list" value="Friday"><label>Friday</label><br/>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="filteritems" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

