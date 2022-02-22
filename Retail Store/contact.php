<?php
include_once('connection.php');
if (isset($_POST['submit'])) {
	$name = ucwords(strtolower($_POST['name']));
	$emailid = $_POST['email'];
	$message = $_POST['message'];
	$sql = "insert into contactpage (name,email,message) values ('".$name."','".$emailid."','".$message."')";
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Successfully Submitted!'); window.location = 'contact.php';</script>";
	} else {
		echo "<script>alert('Incorrect Details, Try Again!'); window.location = 'contact.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Syros Pizza</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Pizza" />
	<link rel="stylesheet" href="css/bootstrap.css"><!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font-Awesome-Icons-CSS -->
</head>
<body>
	<div class="website-background">
		<!-- header -->
		<header>
			<!-- website logo -->
			<div class="container my-lg-4 mb-4">
				<div class="website-logo text-center">
					<a href="index.php"><img src="images/logo.png" alt="logo"></a>
				</div>
			</div>
			<div class="container">
				<div class="header d-lg-flex">
					<div class="mt-lg-3">
						<nav>
							<label for="resp-menu" class="convert-menu mt-lg-0 mt-sm-1">Menu</label>
							<input type="checkbox" id="resp-menu" />
							<ul class="website-navigation">
								<li class=""><a href="index.php">Home</a></li>
								<li class="page-on"><a href="contact.php">Contact Us</a></li>
								<li class=""><a href="signin.php">Sign In</a></li>
								<li class=""><a href="signup.php">Sign Up</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!-- container -->
		<div class="container">
			<!-- contact us -->
			<section class="website-reach">
				<div>
					<h3 class="heading text-capitalize mb-4">Get In Touch <span></span></h3>
					<form name="website-reach-form" class="website-reach-form" method="post" action="#">
						<div class="row">
							<div class="col-md-3">
								<p>Contact Number</p>
								<p>+1 250 376 1224</p>
								<p class="mt-5">Address</p>
								<p>133 Palm St, Kamloops, BC V2B 8J8, Canada</p>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<p>Name *</p>
									<input type="text" class="form-control" placeholder="Enter Your Name" name="name" required="">
								</div>
								<div class="form-group">
									<p>Email *</p>
									<input type="email" class="form-control" placeholder="Enter Your Email Id" name="email" required="">
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<p>Send a Message *</p>
									<textarea name="message" class="form-control" placeholder="Enter Your Message" required=""></textarea>
								</div>
							</div>
						</div>
						<div class="form-group text-right mb-0">
							<input type="submit" class="btn btn-default" name="submit" value="Submit">
						</div>
					</form>
				</div>
				<div class="pt-5">
					<iframe class="embed-responsive" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10111.385313561606!2d-120.3562107!3d50.6856774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2b649bcb9936f0db!2sSyros%20Pizza%20Spaghetti%20%26%20Steak%20House%20Ltd!5e0!3m2!1sen!2sin!4v1605008444071!5m2!1sen!2sin"></iframe>
				</div>
			</section>
		</div>
		<!-- footer -->
		<div class="container">
			<footer>
				<div class="border-top">
					<p class="website-copyright text-center py-4">&copy; 2020 Syros Pizza. All Rights Reserved
					</p>
				</div>
			</footer>
		</div>
	</div>
</body>
</html>
