<?php
include('config.php');
if (isset($_POST["register"])) {
	$name = post_string("name");
	$password = post_string("password");
	$email = post_string("email");
	$mobile = post_string("mobile");

	$qry = "SELECT * FROM `users` WHERE `u_mobile` = '$mobile' OR `u_email` = '$email'";

	$res = mysqli_query($con, $qry);

	if (mysqli_num_rows($res) > 0) {
		header("location:login.php?s=0");
	} else {
		$res = mysqli_query($con, "INSERT INTO `users`(`u_name`, `u_email`, `u_mobile`, `u_password`) VALUES ('$name', '$email', '$mobile', '$password')");
		if($res){
			$_SESSION["user_id"] = mysqli_insert_id($con);
			$_SESSION["user_name"] = $name;
			header("location:index.php?s=1");
			exit();
		}else{
			header("location:login.php?s=0");
			exit();
		}
	}
}
$page = "register";
include('header.php');
?>
<!-- <div id="preloader">
		<div class="loader">
			<img src="images/66.gif" alt="" />
		</div>
	</div> -->

<!-- Start Contact -->
<div id="contact" class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Register</h2>
					<!-- <p>Join Now</p> -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="contact-block">
					<form method="POST">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="off" required data-error="Please enter your name">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" required data-error="Please enter your email">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" autocomplete="off" required data-error="Please enter your number">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" placeholder="Password" id="password" class="form-control" name="password" autocomplete="off" required data-error="Please enter your password">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn btn-common" name="register" id="register" type="submit">Register</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							<!-- <div class="col-md-12 text-center pt-4 font-weight-bold">
								Or Login Using <br>
								<a href="login.php" class="text-primary">LOGIN</a>
							</div> -->
							
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- End Contact -->
<?php
// include('js/script.php');
include('footer.php');
?>