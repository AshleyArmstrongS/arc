
<br>
<br>
<br>
<br>
<div>
<h2 class="glyphicon glyphicon-exclamation-sign">   Sorry, the page requested can not be found!</h2 >
</div>
<?php if ($_SESSION['LOGGED_IN'] === TRUE) { ?>
<h3 class="glyphicon glyphicon-circle-arrow-right">  Go back to <a href='<?= SITE_BASE_DIR ?>/home'> Home </a></h3>
<?php }  else{?>
    <h3 class="glyphicon glyphicon-circle-arrow-right">  Go back to <a href='<?= SITE_BASE_DIR ?>/login'> Login </a></h3>
    <?php }?>

</div>

</div>