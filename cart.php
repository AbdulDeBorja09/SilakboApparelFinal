<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
        header('location:login.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:index.php?');
    }

    if (isset($_POST['add_to_cart'])){
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image' ];
      $product_quantity = 1;
      
      $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');

      if(mysqli_num_rows($cart_num)>0){
        $message[] = 'Product Already exist in cart';
      }else{
        mysqli_query($conn, "INSERT INTO `cart` ( `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
        $message[] = 'Product successfuly added in your cart';
      }
    }

    if(isset($_POST['update_qty_btn'])){
        $update_qty_id = $_POST['update_qty_id'];
        $update_value = $_POST['update_qty'];

        $update_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value'") or die ('query failed');
        if($update_query){
            header('location:cart.php');
        }
    }



    if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id' ") or die ('query failed');
      header('location:cart.php');

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
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Arsenal&family=Poiret+One&family=Rajdhani:wght@300&display=swap");
    </style>
    <title>Silakbo | Products</title>
    <style>
      th, td{
        padding: 20px;
      }
    </style>
  </head>
  <body>
    <?php 
      include 'header.php' 
    ?>
    <div class="container">
      <div class="container" style="padding-top: 30px;">
      <div>
        <button class="fas fa-arrow-left fs-5 text-black p-2 btn" onclick="history.back()"></button>
      </div>
        <br /><br />
        <div class="container bg-light shadow-lg">
          <div class="text-center" style="padding: 20px">
            <h1 class="">MY CART</h1>
            <hr>
          </div>
          <div class="row text-center">
            <?php 
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die ('query failed');
            if(mysqli_num_rows($select_cart)>0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 20px;">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <img src="image/<?php echo $fetch_cart['image']; ?>" class="w-100">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                            <br>
                            <h3 class="title" style="font-weight: 700"><?php echo $fetch_cart['name']; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 20px;">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <form method="POST">
                                <a href="cart.php?delete=<?php echo $fetch_cart['id'] ?>" class="btn" onclick="return confrim('Do you want to remove this product from your wishlist?')"><i class="fa-solid fa-xmark" style="color: #000000;"></i></a>
                                <input name="update_qty_id" type="hidden" name="" value="<?php echo $fetch_cart['id'] ?>">
                                <input  name="update_qty" style="width: 30px;" type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                                <button name="update_qty_btn" class="btn" type="submit" value=""><i class="fa-solid fa-check" style="color: #000000;"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <p class=""><?php echo $fetch_cart['price'] ?></p>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                        <h5 class="text-danger"><?php echo $total_amt = ($fetch_cart['price']*$fetch_cart['quantity']) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php  
                $grand_total+=$total_amt;
                }
              }else{
                echo '
                <div class="container text-center" style="padding: 100px;">
                    <h1>No Product In Your Cart</h1>
                </div>
                ';  
              }
            ?>
                <div class="align-items-center">
                <hr>
                <div class="d-flex justify-content-between" style="padding: 10px;">
                    <h2><b>Total: </b></h2>
                    <h2><?php echo $grand_total; ?></h2>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <a href="product.php" class="btn btn-outline-dark p-2">Continue Shopping</a>
                    <a href="checkout.php" class="btn btn-dark p-2 <?php echo ($grand_total>1)?'':'disabled'?>" >Proceed to Checkout</a>
                </div>
            </div>
            <div style="padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div style="padding: 50px;">
    </div>
    <?php 
        include 'footer.php'
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
