<?php
include "header.php";
?>
<section id="main-content">
	<div class="form">
		<div class="cards">
			<form class="card" action="#">
				<h1>Register</h1>
				<label class="label-form" for="username">Username</label>
				<input class="form-input" type="text" name="username" />
				<label class="label-form" for="password">Password</label>
				<input class="form-input" type="password" name="password" />
				<label class="label-form" for="cpassword">Confirm Password</label>
				<input class="form-input" type="password" name="cpassword" />
				<input class="btn-submit" type="submit" />
			</form>
		</div>
	</div>
</section>
<?php
    include "footer.php";
?>
