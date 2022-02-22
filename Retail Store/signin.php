<?php
session_start();
include_once('connection.php');
if (isset($_POST['loginhere'])) {
	$uname = strtolower($_POST['username']);
	$pass = $_POST['userpassword'];
	$sql = "select * from users where username='".$uname."' and userpassword='".$pass."'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		$_SESSION['loggedusername'] = $uname;
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$_SESSION['loggeduserfname'] = $row['userfullname'];
		$_SESSION['loggeduseremailid'] = $row['useremailid'];
		$_SESSION['loggedusercontact'] = $row['usercontactnumber'];
		echo "<script>alert('Login Successful!'); window.location = 'user/index.php';</script>";
	} else {
		echo "<script>alert('Incorrect Details, Try Again!'); window.location = 'signin.php';</script>";
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
								<li class=""><a href="contact.php">Contact Us</a></li>
								<li class="page-on"><a href="signin.php">Sign In</a></li>
								<li class=""><a href="signup.php">Sign Up</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!-- container -->
		<div class="container">
			<!-- sign in -->
			<section class="website-reach">
				<div>
					<h3 class="heading text-capitalize mb-4">Sign In <span></span></h3>
					<form name="website-reach-form" class="website-reach-form" method="post" action="#">
						<div class="form-group">
							<p>Username *</p>
							<input type="text" class="form-control" placeholder="Enter Your Username" name="username" required="">
						</div>
						<div class="form-group">
							<p>Password *</p>
							<input type="password" class="form-control" placeholder="Enter Your Password" name="userpassword" required="">
						</div>
						<div class="form-group mb-0">
							<input type="submit" class="btn btn-default" name="loginhere" value="Login">
						</div>
					</form>
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
