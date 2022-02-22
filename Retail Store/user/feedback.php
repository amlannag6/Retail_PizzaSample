<?php
session_start(); //start session
include("../connection.php");
if(!isset($_SESSION['loggedusername'])){
  echo "<script>alert('Kindly Login First!'); window.location = '../signin.php';</script>";
  die();
}
if (isset($_POST['add'])) {
  $uname = $_SESSION['loggedusername'];
  $ufullname = $_POST['name'];
  $rating = $_POST["rating"];
  $details = $_POST['feedbackdetails'];
  $sql = "insert into feedback (feedbackusername,feedbackuserfullname,rating,feedbackdetails) values ('".$uname."','".$ufullname."','".$rating."','".$details."')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Feedback Submitted!'); window.location = 'feedback.php';</script>";
  } else {
    echo "<script>alert('Incorrect Details, Try Again!'); window.location = 'feedback.php';</script>";
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
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
                <li class="page-on"><a href="feedback.php">Feedback</a></li>
                <li class=""><a href="profile.php">Profile</a></li>
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
          <h3 class="heading text-capitalize mb-md-5 mb-4">Feedback <span></span></h3>
          <form name="website-reach-form" class="website-reach-form" action="#" method="post">
            <div class="form-group">
              <p>Name *</p>
              <input input type="text" name="name" class="form-control" value="<?php echo $_SESSION['loggeduserfname']; ?>" readonly>
            </div>
            <div class="form-group">
              <div class="rateyo" id= "rating"
              data-rateyo-rating="4"
              data-rateyo-num-stars="5"
              data-rateyo-score="3">
            </div>
            <span class='result' style="color:white;">0</span>
            <input type="hidden" class="form-control" name="rating">
          </div>
          <div class="form-group">
            <p>Feedback Details *</p>
            <textarea name="feedbackdetails" class="form-control" placeholder="Enter Feedback Details" required=""></textarea>
          </div>
          <div class="form-group mb-0">
            <input type="submit" class="btn btn-default" name="add" value="Add">
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
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.rateyo.min.js"></script>
<script>
$(function () {
  $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
    var rating = data.rating;
    $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
    $(this).parent().find('.result').text('rating :'+ rating);
    $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
  });
});
</script>
</body>
</html>
