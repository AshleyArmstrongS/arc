<div class="container">
    <div class="d-flex justify-content-center h-100">
		<div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Please check your emails </h3>
                </div>
            </div>
            
            <div class="card-body">
                <form id='authUser' action='' method='post'>
                <?php foreach ($locals['form_error_messages'] as $errors) { ?>
                        <p class='error'><?= $errors ?></p>
                    <?php } ?>
            <div class="form-group">
                        <input type="text" name="code" id="code" class="form-control" placeholder="Authentication Code">
            </div>
            <input type="submit" value="Submit" class="btn btn-info btn-block">
            </form>
            </div>
            </div>
            </div>
            </div>