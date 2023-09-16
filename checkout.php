<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
        header('location:index.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:index.php');
    }

    if(isset($_POST['order'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $number = mysqli_real_escape_string($conn, $_POST['contact']);
      $method = mysqli_real_escape_string($conn, $_POST['method']);
      $address =  mysqli_real_escape_string($conn,'flate no. '.$_POST['house'].','.$_POST['street'].','.$_POST['city'].','.$_POST['state'].','.$_POST['postal'].','.$_POST['country']);
      $placed_on = date('d-M-Y');
      $cart_total = 0;
      $cart_product[] = '';

      $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die ('query failed');
      if(mysqli_num_rows($cart_query)>0){
        while($cart_item=mysqli_fetch_assoc($cart_query)){
          $cart_product[] = $cart_item['name'].' ('.$cart_item['quantity'].')';
          $sub_total = ($cart_item['price']* $cart_item['quantity']);
          $cart_total += $sub_total;
        }
      } 
      $total_products = implode(',', $cart_product);
      mysqli_query($conn, "INSERT INTO `order` ( `user_id`, `name`, `email`, `number`, `method`, `address`, `total_products`, `total_price`, `placed_on`) VALUES 
      ('$user_id', '$name', '$email', '$number', '$method', '$address', '$total_products', '$cart_total', '$placed_on')");
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'");
      $message[] = 'order placed successfully';
      header('location:checkout.php');
    }
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="Resources/silakbologo.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/8a364c3095.js"
      crossorigin="anonymous"
    ></script>
    <script src="main.js"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Arsenal&family=Poiret+One&family=Rajdhani:wght@300&display=swap");
    </style>
    <link rel="stylesheet" href="path/to/sweetalert2.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Silakbo | Check Out</title>
  </head>
  <body>
    <?php include 'header.php' ?>

    <div class="container">
      <h3 class="p-3 text-center">CHECK OUT</h3>
    </div>
    <div class="row"></div>
  <form method="POST">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-6 col-sm-12 shadow">
          <div class="container">
            <form action="">
              <div class="row">
                <h3 class="p-2 text-center">SHIPPING ADDRESS</h3>
                <div class="col-lg-6 col-md-12">
                  <label for="name">Name: </label>
                  <input type="text" class="form-control" name="name" required />
                </div>
                <div class="col-lg-6 col-md-12">
                  <label for="name">Email: </label>
                  <input type="text" class="form-control" name="email" required />
                </div>
                <div class="col-lg-6 col-md-12">
                  <label for="contact">Contact No: </label>
                  <input
                    type="number"
                    class="form-control"
                    name="contact"
                    required
                  />
                </div>
                <div class="col-lg-6 col-md-12">
                  <label for="house">House No: </label>
                  <input type="text" class="form-control" name="house" required />
                </div>
                <div class="col-lg-6 col-md-12">
                  <label for="house">Street: </label>
                  <input type="text" class="form-control" name="street" required />
                </div>
                <div class="col-lg-6 col-md-12">
                  <label for="city">City: </label>
                  <input type="text" class="form-control" name="city" required />
                </div>
                <div class="col-lg-6 col-md-12">
                  <label for="state">State/Province: </label>
                  <input type="text" class="form-control" name="state" required />
                </div>

                <div class="col-lg-6 col-md-12">
                  <label for="postal">Postal: </label>
                  <input
                    type="number"
                    class="form-control"
                    name="postal"
                    required
                  />
                </div>
                <div class="col-lg-12">
                  <label for="country">Country: </label>
                  <input
                    type="text"
                    class="form-control"
                    name="country"
                    required
                  />
                </div>
                <div
                  class="d-flex justify-content-between"
                  style="padding-top: 20px"
                >
                  <h5>Payment Options</h5>
                  <select id="size" name="method" style="border-radius: 5px">
                    <option selected="COD">Cash On Delivery</option>
                    <option value="Bank">Bank Payment</option>
                    <option value="CreditCard">Credit Card</option>
                    <option value="Gcash">Gcash</option>
                  </select>
                </div>
                <br />
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    <p>Express Local (3-5 Days)</p>
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault2"
                    checked
                  />
                  <label class="form-check-label" for="flexRadioDefault2">
                    <p>Standard Local (10-15 Days)</p>
                  </label>
                </div>
              </div>
    
          </div>
        </div>
        <br />
        &nbsp;
        <div class="col-lg-5 col-sm-12 shadow p-3">
          <div class="container">
            <h3 class="text-center">Shopping Checkout</h3>
          </div>
          <br />
          <input type="hidden" name="cmd" value="_cart" />
          <input type="hidden" name="upload" value="1" />
          <input
            type="hidden"
            name="business"
            value="seller@dezignerfotos.com"
          />
          <table class="table table-hover ">
           
              <tr class="text-center">
                <th>Name</th>
                <th>Qty.</th>
                <th>Cost</th>
                <th class="text-xs-right">Subtotal</th>
              </tr>
              <?php 
            $select_cart=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die ('query failed');
            $total = 0;
            $grand_total = 0;
            if (mysqli_num_rows($select_cart)>0){
              while ($fetch_cart = mysqli_fetch_assoc($select_cart)){
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total = $total+=$total_price;
            
            ?>
            <tr>
              <td>
                <b><?php echo $fetch_cart ['name']; ?></b>
              </td>
              <td class="text-center">
                <?php echo $fetch_cart ['quantity']; ?>
              </td>
              <td class="text-center">
                <?php echo $fetch_cart ['price']; ?>
              </td>
              <td class="text-center">
              <b><?php echo $total_amt = ($fetch_cart['price']*$fetch_cart['quantity']) ?></b>
              </td>
            </tr>

            <?php
            
            


              }
            }
          ?> 
          </table>
          <div class="d-flex justify-content-between" >
            <h4> <b>&nbsp;Total:</b></h4>
            <h4 style="padding-right: 45px;"><b>Php <?= $grand_total?></b></h4>
          </div>
          <div class="d-flex justify-content-evenly">
            <a href="product.html" class="btn btn-outline-dark"
              >Continue Shopping</a
            >
          
          </div>
          <br />
        
          <div class="d-flex justify-content-center">
            <img src="Resources/p1.png" style="width: 50px" class="p-2" />
            <img src="Resources/p3.png" style="width: 45px" class="p-2" />
            <img src="Resources/p2.png" style="width: 50px" class="p-2" />
          </div>
          <br />
          <div class="container text-center">
            <button type="submit" name="order" class="btn btn-dark w-75">PLACE ORDER</button>
          </div>
        </div>
      </div>
    </div>
  </form>
    <br /><br />
    <?php include 'footer.php' ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
