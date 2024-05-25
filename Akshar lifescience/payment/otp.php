<?php
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
								if($code1!=="$code")
								{
									
									echo
					"
					<div class='alert alert-danger text-center'>
						Invalid Otp
						<button class='close'>&times;</button>
						
					</div>
					";
									
								}
								else
								{
								echo
					"
					<div class='alert alert-success text-center'>
						OTP Correct
						<button class='close'>&times;</button>
						
					</div>
					";		
								echo
					"
					<div class='alert alert-success text-center'>
						Thank You For Order !!
						<button class='close'>&times;</button>
						
					</div>
					";		
						//header('location:order-history.php');
								}
								
							
							}
							?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OTP Varify</title>
	<link rel="website icon" type="jpg"
     href="../images/menu-arrow.jpg">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	
</head>
<body>
							
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="well">
						<form method="post">
                        <h4>OTP VERIFICATION</h4>
                        <p>Type Below this code <br><h2><i><?php $Random_code=rand(); echo$Random_code; ?></i> </h2></p>
						<p>Enter the code<br/></p>
							<input  type="text" name="code1" title="random code" />
							<input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
						<br><br>
					<input type="submit" name="submit" class="btn btn-success btn-large" value="Make Payment">
				    <button type="Re-send OTP" class="btn btn-light btn-large">Resend OTP</button>
					<a href="../index.php" class="new-btn-d br-2">Home</a>
						
						</form>
							
                    </div>
                </div>
            </div>
           
                
                </div>
                    

				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
</body>
</html>

