<!-- Reference Bootstrap: https://bootsnipp.com/snippets/9Zxl -->
<?php $u = $locals['user']; ?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
		<div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Please add Car Details</h3>
                </div>
            </div>
            
            <div class="card-body">
                <form id='addCar_form' action='' method='post'>
            <?php foreach($locals['form_error_messages'] as $errors) { ?>
            <p class='error' ><?=  $errors ?></p>
            <?php } ?>
            <div class="form-group">
            <input type='text' id='user' name='user' readonly="readonly" value='<?= $u->getEmail()  ?>'class="form-control" placeholder = '<?= $u->getEmail() ?>'>
                    </div>
            <div class="form-group">
                        <input type="text" name="make" id="make" class="form-control" placeholder="Car Make">
                    </div>
                    <div class="form-group">
                        <input type="text" name="model" id="model" class="form-control" placeholder="Car Model">
                    </div>
                    <div class="form-group">
                        <input type="text" name="colour" id="colour" class="form-control" placeholder="Car Colour">
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" name="seats" id="seats" class="form-control" placeholder="Number of Seats">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                                <input type="text" name="payment" id="payment" class="form-control" placeholder="Estimated Payment">
                            </div>
                        </div>
                    </div>
                    
                    <input type="submit" value="Submit" class="btn btn-info btn-block">
                
                </form>
                </div>
	    		</div>
    		</div>
    	</div>
    </div>