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
                <li class=""><a href="index.php">Home</a></li>
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
      <!-- website body -->
      <div class="website-body">
        <!-- items -->
        <section class="items">
          <div class="items-body">
            <h3 class="heading text-capitalize mb-md-5 mb-4">Veggie Pizzas <span></span></h3>
            <div class="row">
              <?php
              //List products from database
              $results = $mysqli_conn->query("SELECT product_name, product_desc, product_code, product_image, product_price FROM products_list where groupdata = 'Veggie Pizzas'");
              if (!$results){
                printf("Error: %s\n", $mysqli_conn->error);
                exit;
              }

              //Display fetched records as you please
              $products_list =  '';

              while($row = $results->fetch_assoc()) {
                $products_list .= <<<EOT
                <div class="col-md-6 items-block text-center mb-5">
                <div class="items-info">
                <div class="items-info-body">
                <form class="form-item">
                <img src="../images/{$row["product_image"]}" class="img-fluid" alt="item-img">
                <h5 class="items-info-title text-uppercase mt-2">{$row["product_name"]}</h5>
                <p class="items-info-text">Price : {$currency} {$row["product_price"]}</p>
                <label>Quantity</label>
                <select name="product_qty" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>
                <label>Size</label>
                <select name="product_size" class="form-control">
                <option value="Regular">Regular</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
                </select>
                <input name="product_code" type="hidden" value="{$row["product_code"]}">
                <button type="submit" class="btn btn-success mt-2">Add to Cart</button>
                </form>
                </div>
                </div>
                </div>
                EOT;
              }
              $products_list .= '';
              echo $products_list;
              ?>
            </div>
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
