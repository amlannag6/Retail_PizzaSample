<?php
session_start(); //start session
include("config.inc.php");
if(!isset($_SESSION['loggedusername'])){
  echo "<script>alert('Kindly Login First!'); window.location = '../signin.php';</script>";
  die();
}
date_default_timezone_set('Canada/Pacific');
setlocale(LC_MONETARY,"en_US.utf8"); // US national format (see : http://php.net/money_format)
  include_once('../connection.php');
  if (isset($_POST['placeorder'])) {
    $address = $_POST['orderaddress'];
    $contactnumber = $_POST['ordercontactnumber'];
    $uname = $_SESSION['loggedusername'];
    $details = $_POST['orderdetails'];
    $amount = $_POST['orderamount'];
    $placedate=date("l\, j F Y h:i:s A");
    if (isset($_SESSION["products"]) && count($_SESSION["products"])==0) {
      echo "<script>alert('Empty Cart, Cannot Book Order!'); window.location = 'index.php';</script>";
    } else {
      $sql = "insert into orders (bookingusername,orderaddress,ordercontactnumber,orderdetails,orderamount,ordertime) values ('".$uname."','".$address."','".$contactnumber."','".$details."','".$amount."','".$placedate."')";
      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Order Successfully Placed!'); window.location = 'index.php';</script>";
        $_SESSION["products"] = array();
      } else {
        echo "<script>alert('Incorrect Details, Try Again!'); window.location = 'view_cart.php';</script>";
      }
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
    <link rel="stylesheet" href="../css/bootstrap.css"><!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- Font-Awesome-Icons-CSS -->
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
                  <li class=""><a href="index.php">< Back</a></li>
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
          <section class="items">
            <div class="items-body">
              <h3 class="heading text-capitalize mb-md-5 mb-4">Review & Place Order <span></span></h3>
              <table>
                <tr>
                  <th>Items</th><th>Price</th>
                </tr>
                <?php
                if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
                  $total 			= 0;
                  $list_tax 		= '';
                  $cart_box 		= '';

                  foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
                    $product_name = $product["product_name"];
                    $product_qty = $product["product_qty"];
                    $product_price = $product["product_price"];
                    $product_code = $product["product_code"];
                    if ($product["product_size"] == 'Regular') {
                      $product_size = $product["product_size"];
                    } else if ($product["product_size"] == 'Medium') {
                      $product_size = $product["product_size"];
                      $product_price = $product_price + ($product_price*0.40);
                    } else if ($product["product_size"] == 'Large') {
                      $product_size = $product["product_size"];
                      $product_price = $product_price + ($product_price*0.60);
                    }

                    $item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price

                    $cart_box 		.=  "<tr><td> $product_code &ndash;  $product_name (Qty : $product_qty | $product_size) </td><td> $currency $item_price </td></tr>";

                    $subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
                    $total 			= ($total + $subtotal); //Add up to total price
                  }

                  $grand_total = $total + $shipping_cost; //grand total

                  foreach($taxes as $key => $value){ //list and calculate all taxes in array
                    $tax_amount 	= round($total * ($value / 100));
                    $tax_item[$key] = $tax_amount;
                    $grand_total 	= $grand_total + $tax_amount;
                  }

                  foreach($tax_item as $key => $value){ //taxes List
                    $list_tax .= '<tr><td>'.$key. '</td><td> '. $currency. sprintf("%01.2f", $value).'</td></tr>';
                  }

                  $shipping_cost = ($shipping_cost)?'<tr><td>Delivery Charges</td><td> '.$currency. sprintf("%01.2f", $shipping_cost).'</td></tr>':'';

                  //Print Shipping, VAT and Total
                  $cart_box .= "<tr><td>$shipping_cost  $list_tax </td></tr><tr><td>Payable Amount</td><td> $currency ".sprintf("%01.2f", $grand_total)."</td></tr>";
                  $cart_box .= "";

                  echo $cart_box;
                }else{
                  echo "Your Cart is empty";
                }
                ?>
              </table>
              <h4 class="mt-4">Enter Delivery Details [Only COD (Cash On Delivery) Payment Method Available]</h4>
              <form name="website-reach-form" class="website-reach-form" method="post" action="#">
                <div class="form-group">
                  <textarea name="orderaddress" class="form-control" placeholder="Enter Full Address For Delivery" required=""></textarea>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Enter Contact Number" name="ordercontactnumber" required="">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="orderdetails" value="<?php echo $cart_box; ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="orderamount" value="<?php echo $grand_total; ?>">
                </div>
                <div class="form-group mb-0">
                  <input type="submit" class="btn btn-default" name="placeorder" value="Place Order">
                </div>
              </form>
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
