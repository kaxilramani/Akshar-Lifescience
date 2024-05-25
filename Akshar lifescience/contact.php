<?php
include('config.php');
if (isset($_POST["send"])) {
	$name = mysqli_real_escape_string($con, post_string("name"));
	$email = mysqli_real_escape_string($con, post_string("email"));
	$mobile = mysqli_real_escape_string($con, post_string("mobile"));
	$message = mysqli_real_escape_string($con, post_string("message"));
	$qry = "INSERT INTO `contacts`(`c_name`, `c_mobile`, `c_email`, `c_message`) VALUES ('$name', '$mobile', '$email', '$message')";
	if (mysqli_query($con, $qry)) {
		header("location:index.php?s=1");
	} else {
		header("location:contact.php?s=0");
	}
	exit();
}
$page = "contact";
$name = "";
$email = "";
$mobile = "";
if (isset($_SESSION["user_id"])) {
	$row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `users` WHERE `u_id` = " . $_SESSION["user_id"]));
	$name = $row["u_name"];
	$email = $row["u_email"];
	$mobile = $row["u_mobile"];
}
include('header.php');
?>
<!-- Start Contact -->
<div id="contact" class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Contact us</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="contact-block">
					<form method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="<?php echo $name; ?>" required data-error="Please enter your name">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Your Email" id="email" class="form-control" name="email" value="<?php echo $email; ?>" required data-error="Please enter your email">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your number" id="number" class="form-control" name="mobile" value="<?php echo $mobile; ?>" required data-error="Please enter your number">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" name="send" id="submit" type="submit">Send Message</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="site-section bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-12"><br>
            <h2 class="h3 text-left hidden">Developed By</h2>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Kaxil Ramani</span>
              <li class="phone"><a href="tel://23923929210">635 527 3428</a></li>
              <li class="email">ramanikaxil29@gmail.com</li>
               <li class="address"> Nr Hinglajmata Mandir, Op. Chandragupt Apartment India Colony, Bapunagar, Ahmedabad, Gujarat 382350</li> 
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Jeel Gajera</span>
              <li class="phone"><a href="tel://23923929210">992 498 8725</a></li>
              <li class="email">jeelgajera7001@gmail.com</li>
              <li class="address"> Nr Hinglajmata Mandir, Op. Chandragupt Apartment India Colony, Bapunagar, Ahmedabad, Gujarat 382350</li>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Jay Parejiya</span>
              <li class="phone"><a href="tel://23923929210">951 030 1688</a></li>
              <li class="email">pateljay34002754@gmail.com</li>
              <li class="address"> Nr Hinglajmata Mandir, Op. Chandragupt Apartment India Colony, Bapunagar, Ahmedabad, Gujarat 382350</li>
            </div><br>
          </div>
        </div>
      </div>
    </div> -->
<!-- End Contact -->
<?php
include('footer.php');
?>