<?php
include("./config.php");
if (isset($_POST["login"])) {
	$email = mysqli_real_escape_string($con, post_string("email"));
	$password = post_string("password");

	// Need to Login
	$qry = "SELECT * FROM `admin` WHERE `a_email` = '$email'";
	$res = mysqli_query($con, $qry);
	if (mysqli_num_rows($res) > 0) {
		$admin = mysqli_fetch_assoc($res);
		if ($admin["a_password"] == $password) {
			$_SESSION["admin_id"] = $admin["a_id"];
			$_SESSION["admin_name"] = $admin["a_name"];
		}else{
			
		}
		header("location:index.php");
		exit();
	} else {
		$_SESSION["error"][] = "User Not Found";
		header("location:login.php");
		exit();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title><?php echo WEBSITE_SHORT_NAME ?> Admin Login</title>
	<link rel="shortcut icon" href="../images/menu-arrow.jpg" type="../image/x-icon">
	<link rel="apple-touch-icon" href="menu-arrow.jpg">
	<link href="public/css/styles.css" rel="stylesheet" />
	<script src="public/vendors/fontawesome/js/all.min.js"></script>
</head>

<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Login</h3>
								</div>
								<div class="card-body py-5 px-5">
									<form method="post">
										<div class="form-floating mb-3">
											<input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required data-error="Please enter your name">
											<label for="inputEmail">Email address</label>
										</div>
										<div class="form-floating mb-3">
											<input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required data-error="Please enter your password">
											<label for="inputPassword ">Password</label>
										</div>
										<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
											<input type="submit" name="login" value="Login" class="btn btn-primary btn-lg">
     										<input type="reset" name="Reset" value="Reset" class="btn btn-secondary btn-lg">
                                        </div>
                                        
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script src="public/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="public/js/scripts.js"></script>

</body>
</html>