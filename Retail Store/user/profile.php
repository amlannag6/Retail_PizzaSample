<?php
session_start(); //start session
include("../connection.php");
if(!isset($_SESSION['loggedusername'])){
  echo "<script>alert('Kindly Login First!'); window.location = '../signin.php';</script>";
  die();
}
$info="select * from users where username='".$_SESSION['loggedusername']."'";
$data=mysqli_fetch_array(mysqli_query($conn,$info),MYSQLI_ASSOC);
$getfullname=$data["userfullname"];
$getpassword=$data["userpassword"];
$getemailid=$data["useremailid"];
$getcontactnumber=$data["usercontactnumber"];
if (isset($_POST['updateprofile'])) {
  $fname = ucwords(strtolower($_POST['userfullname']));
  $pass = $_POST['userpassword'];
  $emailid = $_POST['useremailid'];
  $contact = $_POST['usercontactnumber'];
  $sql = "update users set userfullname='".$fname."',userpassword='".$pass."',useremailid='".$emailid."',usercontactnumber='".$contact."' where username='".$_SESSION['loggedusername']."'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Profile Updated!'); window.location = 'profile.php';</script>";
  } else {
    echo "<script>alert('Incorrect Details, Try Again!'); window.location = 'profile.php';</script>";
  }
}
if (isset($_POST['deleteprofile'])) {
  $sql = "delete from users where username='".$_SESSION['loggedusername']."'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Profile Deleted!'); window.location = '../logout.php';</script>";
  } else {
    echo "<script>alert('Try Again!'); window.location = 'profile.php';</script>";
  }
}
?>
<html>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Syros Pizza</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <meta name="keywords" content="Pizza" />
  <link rel="stylesheet" href="../css/bootstrap.css"><!-- Bootstrap-Core-CSS -->
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font-Awesome-Icons-CSS -->
  <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="../js/cart.js"></script>
</head>
<body>
  <div class="website-background">
    <!-- header -->
    <header>
      <!-- website logo -->
      <div class="container my-lg-4 mb-4">
        <div class="website-logo text-center">
          <a href="index.php"><img src="../images/logo.png" alt="logo"></a>
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
                <li class=""><a href="feedback.php">Feedback</a></li>
                <li class="page-on"><a href="profile.php">Profile</a></li>
                <li>
                  <i class="fa fa-shopping-cart" style="color:rgba(219, 0, 33, 1);">
                    <a href="#" class="cart-box" id="cart-info" title="View Cart">
                      <?php
                      if(isset($_SESSION["products"])){
                        echo count($_SESSION["products"]);
                      }else{
                        echo 0;
                      }
                      ?>
                    </a>
                  </i>
                  <div class="shopping-cart-box">
                    <a href="#" class="close-shopping-cart-box" >Close</a>
                    <h3>Your Shopping Cart</h3>
                    <div id="shopping-cart-results">
                    </div>
                  </div>
                </li>
                <li class=""><a href="orders.php">Orders</a></li>
                <li class=""><a href="../logout.php">Logout</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- container -->
    <div class="container">
      <section class="website-reach">
        <div>
          <h3 class="heading text-capitalize mb-md-5 mb-4">Profile <span></span></h3>
          <form name="website-reach-form" class="website-reach-form" action="#" method="post">
            <div class="form-group">
              <p>Full Name *</p>
              <input type="text" class="form-control" placeholder="Enter Full Name" value="<?php echo $getfullname; ?>" name="userfullname" required="">
            </div>
            <div class="form-group">
              <p>Username *</p>
              <input type="text" class="form-control" value="<?php echo $_SESSION['loggedusername']; ?>" name="username" readonly>
            </div>
            <div class="form-group">
              <p>Password *</p>
              <input type="text" class="form-control" placeholder="Enter Password" value="<?php echo $getpassword; ?>" name="userpassword" required="">
            </div>
            <div class="form-group">
              <p>Email *</p>
              <input type="email" class="form-control" placeholder="Enter Email ID" value="<?php echo $getemailid; ?>" name="useremailid" required="">
            </div>
            <div class="form-group">
              <p>Contact Number *</p>
              <input type="number" class="form-control" placeholder="Enter Contact Number" value="<?php echo $getcontactnumber; ?>" name="usercontactnumber" required="">
            </div>
            <div class="form-group mb-0">
              <input type="submit" class="btn btn-default" name="updateprofile" value="Update">
            </div>
            <div class="form-group text-right mb-0">
              <input type="submit" class="btn btn-default" name="deleteprofile" value="Unsubscribe (Delete Profile)" onClick="if(confirm('This action cannot be undone. Are you sure you want to delete your account?')){ return true; }else{ return false; }">
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
