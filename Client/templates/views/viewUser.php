
<h2>Users</h2>
<div class="row" style="margin-top: 5px;">
    <?php foreach ($locals['viewUsers'] as $user) { ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <?= $user->getName(); ?></h5>
                    <p class="card-text"> <?= $user->getAge() ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
