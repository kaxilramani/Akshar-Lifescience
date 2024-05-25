<?php
if (empty($_SESSION['nm'])) {
	// header("location:login.php");
	// exit();
}
// print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title> Akshar Lifescience </title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="images/menu-arrow.jpg" type="image/x-icon">
	<link rel="apple-touch-icon" href="menu-arrow.jpg">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/pogo-slider.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/custom.css">

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

	<div id="preloader">
		<div class="loader">
			<img src="images/1495.gif" alt="" />
		</div>
	</div>

	<!-- Start top bar -->
	<div class="main-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="left-top">
						<!-- <div class="mail-b"><a class="new-btn-d br-2" href="#"><span>Book Appointment</span></a></div> -->
						<div class="mail-b"><a href="#"><i class="fa fa-envelope-o" aria-hidden="true" href="mailto:aksharlifescience@gmail.com"></i> Aksharlifescience@gmail.com </a></div>
						<div class="mail-b"><a href="#"><i class="fa fa-map-marker" aria-hidden="true" href=""></i> Ahmedabad, India </a></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="wel-nots">
						<p>Welcome to Akshar Lifescience Pharma !</p>
					</div>
					<div class="right-top">
							<!-- <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End top bar -->

	<!-- Start header -->
	<header class="top-header">
		<nav class="navbar header-nav navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="index.php"><img src="images/logo3.png" alt="image"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
					<ul class="navbar-nav">
						<li><a class="nav-link <?php print_active($page, "home"); ?>" href="index.php">Home</a></li>
						<li><a class="nav-link <?php print_active($page, "Products"); ?>" href="products.php">Products</a></li>
						<li><a class="nav-link <?php print_active($page, "about"); ?>" href="about.php">About</a></li>
						<!-- <li><a class="nav-link <?php print_active($page, "contact"); ?>" href="contact.php">Contact</a></li> -->
						
						<?php
						if (isset($_SESSION["user_id"])) {
						?>
						    <li><a class="nav-link <?php print_active($page, "my-cart"); ?>" href="my-cart.php">My Cart</a></li>
							<li><a class="nav-link <?php print_active($page, "my-orders"); ?>" href="my-orders.php">My Orders</a></li>
							<li><a class="nav-link <?php print_active($page, "logout"); ?>" href="logout.php">Logout</a></li>
							<div class="nav-link">
								<div class="sb-nav-link-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                               <?php echo $_SESSION["user_name"] ?>
                            </div>
							<!-- <li><a class="nav-link <?php print_active($page, "view_profile"); ?>" href="view_profile.php">My Profile</a></li> -->
						<?php
						} else {
						?>
							<li><a class="nav-link <?php print_active($page, "login"); ?>" href="login.php">Login</a></li>
							<!-- <li><a class="nav-link <?php print_active($page, "admin-login"); ?>" href="admin/index.php">Admin Login</a></li> -->
							<li><a class="nav-link <?php print_active($page, "register"); ?>" href="register.php">Register</a></li>
							<li><a class="nav-link <?php print_active($page, "contact"); ?>" href="contact.php">Contact Us</a></li>
							
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->