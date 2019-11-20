

<div class="card-body">
<div class="row">
<div class="col-xs-4 col-sm-4 col-md-4">
            <form action='search'>
            <div class="input-group form-group">
            <input type="search" name="search" class="form-control input-sm" placeholder="Name">
            </div>
            <div class="col-sm-6">
            <input type="submit" value="search"  class="btn btn-info btn-block">

</div>
    <?php foreach ($locals['viewUsers'] as $user) { ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <?= $user->getName();?> <i class="fas fa-comment-alt"></i> </h5>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</form>
