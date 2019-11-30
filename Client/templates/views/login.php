<!-- Reference Bootstrap: https://bootsnipp.com/snippets/vl4R7 -->


<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
			</div>
			<div class="card-body">
				<form id='login_form' action='' method='post'>
					<?php foreach ($locals['form_error_messages'] as $errors) { ?>
						<p><?= $errors ?></p>
					<?php } ?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name='email' value='<?= $email ?>' placeholder="email">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name='password' value='<?= $password ?>' placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a id="regLink" href='<?= SITE_BASE_DIR ?>/userType'>Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a id="regLink" href="<?= SITE_BASE_DIR ?>/404">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>