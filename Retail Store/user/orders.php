<?php
session_start(); //start session
include("config.inc.php"); //include config file
if(!isset($_SESSION['loggedusername'])){
  echo "<script>alert('Kindly Login First!'); window.location = '../signin.php';</script>";
  die();
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
                <li class="page-on"><a href="index.php">Home</a></li>
                <li class=""><a href="feedback.php">Feedback</a></li>
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
                <li class="page-on"><a href="orders.php">Orders</a></li>
                <li class=""><a href="../logout.php">Logout</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- container -->
    <div class="container">
      <!-- website body -->
      <div class="website-body">
        <!-- items -->
        <section class="items">
          <div class="items-body">
            <h3 class="heading text-capitalize mb-md-5 mb-4">Your Orders <span></span></h3>
            <table>
              <tr>
                <th>Order Address</th>
                <th>Order Contact Number</th>
                <th>Order Details</th>
                <th>Order Time</th>
                <th>Order Amount</th>
              </tr>
              <?php
              include("../connection.php");
              $sql = "select * from orders where bookingusername='".$_SESSION['loggedusername']."'";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td><?php echo $row['orderaddress']; ?></td>
                  <td><?php echo $row['ordercontactnumber']; ?></td>
                  <td>
                    <table>
                      <tr>
                        <th>Items</th><th>Price</th>
                      </tr>
                      <?php echo $row['orderdetails']; ?>
                    </table>
                  </td>
                  <td><?php echo $row['ordertime']; ?></td>
                  <td>$<?php echo $row['orderamount']; ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </section>
      </div>
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
