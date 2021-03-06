<!DOCTYPE html>
<?php
	require '../dbconfig/config.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<title><i>SYROS Pizza</i></title>
	<title><i>TRADITIONAL PIZZERIA</i></title>
	<title><i>SINCE 1969</i></title>
	<link href="../css/style.css" rel="stylesheet" text="text/css" />
	<meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="author" content="templatemo">   
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" href="css/templatemo-style.css">

	<link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>

</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse">


	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand smoothScroll"><strong> SYROS PIZZA</strong></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">HOME</a></li>
					<li><a href="menu.php">MENU</a></li>
					<li><a href="howItWorks.php">HOW IT WORKS</a></li>
					<li><a href="contactUs.php">CONTACT US</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="images/slider-img1.jpg" alt="Pizza Image 1">
				<div class="flex-caption">
					<br><br><br><br><br><br><br>
			        <h1 class="slider-title">SYROS PIZZA</h1>
			        <h3 class="slider-subtitle">TRADITIONAL PIZZERIA</h3>
					<p class="slider-description">SINCE 1969</p>
				</div>
			</li>
			<li>
				<img src="images/slider-img2.jpg" alt="Pizza Image 2">
				<div class="flex-caption">
					<h2 class="slider-title">Freshly Baked Pizza</h2>
					<h3 class="slider-subtitle">Premium Quality, Finest Ingredients</h3>
					<p class="slider-description"><i>garden fresh veggies to soy chunks, meat balls, prawns, cottage cheese, sun dried tomatoes, jalapenos, corn, mushrooms, fish and lots more</i></p>
				</div>
			</li>
		</ul>
	</div>
	<!-- end flexslider -->
     <section id="mainLogin" class="templatemo-section templatemo-top-150">  
        <div id="mainLogin">
			<center><h2>Login / Register</h2></center>
			<center><img src="../resources/login/Lpizza.jpg" class="LoginImg" /></center>
			
			<form class="lForm" action="index.php" method="post"><br>
				<Label><b>Username</b></Label><br>
				<input name="username" type="text" class="userPass" placeholder="Enter your Username" required /><br><br>
				
				<Label><b>Password</b></Label><br>
				<input name="password" type="password" class="userPass" placeholder="Enter your Password" required /><br><br>
			
				<input name="signIn" type="submit" id="lButton" value="Login" /><br><br>
				<a href="reg.php"><input type="button" id="rButton" value="Register Now!" /></a><br><br><br>
				<a href="adminLogin.php"><input type="button" class = "adminLoginButton" value = "Administrator Login" /></a></form><br>
			<?php
				if(isset($_POST['signIn']))
				{
					$username = $_POST['username'];
					$password = md5($_POST['password']);
					
					$querry = "SELECT username,password FROM usersTable WHERE username = '$username' AND password = '$password'";
					$querry_run = mysqli_query($connect,$querry);
					
					if(mysqli_num_rows($querry_run) == 1)
					{
						session_start();
						$_SESSION['username'] = $username;
						header('location:menuLogin.php');
					}
					else
					{
						echo'<script type="text/javascript">alert("Invalid Credentials, Please check your Username and Password")</script>';
					}
				}
			?>
		</div>
	</section>
	<!-- start about -->
	<section id="about" class="templatemo-section templatemo-top-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="text-uppercase">Your Pizza Shop</h1>
				</div>
				<div class="col-md-6 col-sm-6">					
					<h3 class="text-uppercase padding-bottom-10">About Pizza</h3>
					<p><b>Pizza responsive web template is provided by SYROS PIZZA. The term pizza was first recorded in the 10th century in a Latin manuscript from the Southern Italian town of Gaeta in Lazio, on the border with Campania. Modern pizza was invented in Naples, and the dish and its variants have since become popular in many countries.It has become one of the most popular foods in the world and a common fast food item in Europe and North America, available at pizzerias (restaurants specializing in pizza), restaurants offering Mediterranean cuisine, and via pizza delivery. Many companies sell ready-baked frozen pizzas to be reheated in an ordinary home oven.</b></p>
				</div>
				<div class="col-md-6 col-sm-6">
					<img src="images/about-img1.jpg" class="img-responsive img-bordered img-about" alt="about img">
				</div>
			</div>
		</div>
	</section>
	<!-- end about -->

	<!-- start gallery -->
	<section id="gallery" class="templatemo-section templatemo-light-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center text-uppercase">Gallery</h2>
					<hr>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img1.jpg" class="img-responsive gallery-img" alt="Pizza 1">
						<div class="gallery-des">
							<h3>Neapolitan Pizza </h3>
							<h5>Neapolitan is the original pizza. This delicious pie dates all the way back to 18th century in Naples, Italy. During this time, the poorer citizens of this seaside city frequently purchased food that was cheap and could be eaten quickly. Luckily for them, Neapolitan pizza was affordable and readily available through numerous street vendors.</h5>
						</div>
					</div>
				</div>	
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img2.jpg" class="img-responsive gallery-img" alt="Pizza 2">
						<div class="gallery-des">
							<h3>Chicago Pizza</h3>
							<h5>Chicago pizza, also commonly referred to as deep-dish pizza, gets its name from the city it was invented in. During the early 1900???s, Italian immigrants in the windy city were searching for something similar to the Neapolitan pizza that they knew and loved. Instead of imitating the notoriously thin pie, Ike Sewell had something else in mind. He created a pizza with a thick crust that had raised edges, similar to a pie, and ingredients in reverse, with slices of mozzarella lining the dough followed by meat, vegetables, and then topped with a can of crushed tomatoes. This original creation led Sewell to create the now famous chain restaurant, Pizzeria Uno.
							</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img3.jpg" class="img-responsive gallery-img" alt="Pizza 3">
						<div class="gallery-des">
							<h3>New York-Style Pizza</h3>
							<h5>With its characteristic large, foldable slices and crispy outer crust, New York-style pizza is one of America???s most famous regional pizza types. Originally a variation of Neapolitan-style pizza, the New York slice has taken on a fame all its own, with some saying its unique flavor has to do with the minerals present in New York???s tap water supply.</h5>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="gallery-wrapper">
						<img src="images/gallery-img4.jpg" class="img-responsive gallery-img" alt="Pizza 4">
						<div class="gallery-des">
							<h3>Sicilian Pizza</h3>
							<h5>Sicilian pizza, also known as "sfincione," provides a thick cut of pizza with pillowy dough, a crunchy crust, and robust tomato sauce. This square-cut pizza is served with or without cheese, and often with the cheese underneath the sauce to prevent the pie from becoming soggy. Sicilian pizza was brought to America in the 19th century by Sicilian immigrants and became popular in the United States after the Second World War.</h5>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="gallery-wrapper">
						<img src="images/gallery-img5.jpg" class="img-responsive gallery-img" alt="Pizza 5">
						<div class="gallery-des">
							<h3>Greek Pizza</h3>
							<h5>Greek pizza was created by Greek immigrants who came to America and were introduced to Italian pizza. Greek-style pizza, especially popular in the New England states, features a thick and chewy crust cooked in shallow, oiled pans, resulting in a nearly deep-fried bottom. While this style has a crust that is puffier and chewier than thin crust pizzas, it???s not quite as thick as a deep-dish or Sicilian crust.</h5>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</section>
	<!-- end gallery -->

	<!-- start contact -->
	<section id="contact" class="templatemo-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-uppercase text-center">Contact Us</h2>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="#" method="post" role="form">
						<div class="col-md-6 col-sm-6">
							<input name="name" type="text" class="form-control" id="name" maxlength="60" placeholder="Name">
					    	<input name="email" type="email" class="form-control" id="email" placeholder="Email">
							<input name="message" type="text" class="form-control" id="message" placeholder="Subject">
						</div>
						<div class="col-md-6 col-sm-6">
							<textarea class="form-control" rows="5" placeholder="Message"></textarea>
						</div>
						<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
							<input name="submit" type="submit" class="form-control" id="submit" value="Send">
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4 col-sm-4">
					<b><h3 class="padding-bottom-10 text-uppercase">Visit our shop</h3></b>
					<b><p><i class="fa fa-map-marker contact-fa"></i><br>SYROS PIZZA<br>133 Palm St, Kamloops, BC V2B 8J8<br>(Kamloops, British Columbia)<br><br><br></p></b>
					<p>
						<i class="fa fa-phone contact-fa"></i> 
						<b><a href="tel:010-020-0340" class="contact-link">010-020-0340</a>,</b> 
						<b><a href="tel:080-090-0660" class="contact-link">080-090-0660</a></b>
					</p>			
					<p><i class="fa fa-envelope-o contact-fa"></i> 
                    	<a href="mailto:hello@gmail.com" class="contact-link"><b>syrospizza@gmail.com</b></a></p>
				</div>
				<div class="col-md-4 col-sm-4">
					<b><h3 class="text-uppercase">Opening hours</h3></b>
					<b><p><i class="fa fa-clock-o contact-fa"></i> 10:00 AM - 11:00 PM</p></b>
					<b><p><i class="fa fa-bell-o contact-fa"></i> Monday to Sunday</p></b>
               	</div>
				<div class="col-md-4 col-sm-4">
					<div class="google_map">
						<div id="map-canvas" class="map"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end contact -->

	<!-- start footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="social-icon">
						<li><a href = "https://www.facebook.com/" class = "fa fa-facebook"></a></li>
			            <li><a href = "https://twitter.com/" class = "fa fa-twitter"></a></li>
			            <li><a href = "https://www.instagram.com/" class = "fa fa-instagram"></a></li>
			            <li><a href = "https://m.youtube.com/" class = "fa fa-youtube"></a></li>
			            <br><br><br><br>
			            <center><p class = "imageHead"><a class = "terms" href = "termsofuse.php">Terms of Use</a><br><br><a class = "terms" href = "privacystatements.php">Privacy Statement</a><br><br><a class = "terms" href = "feedbackform.php">Leave Feedback</a><br><br><a class = "terms" href = "aboutus.php">About Us</a></p>
			            </center> 
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>