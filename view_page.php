<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
        header('location:index.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:index.php?');
    }

    if (isset($_POST['add_to_wishlist'])){
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image' ];
      $product_size = $_POST['size'];
     
      $whislist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');
      $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');

      if(mysqli_num_rows($whislist_number)>0){
        $message[]='Product Already exist in Wishlist';
      }else if(mysqli_num_rows($cart_num)>0){
        $message[] = 'Product Already exist in cart';
      }else{
        mysqli_query($conn, "INSERT INTO `wishlist` ( `user_id`, `pid`, `name`, `price`, `image`, `size`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image', '$product_size')") or die ('query failed');
        $message[] = 'Product successfuly added';
      }
    }

    if (isset($_POST['add_to_cart'])){
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image' ];
      $product_quantity = $_POST['product_quantity'];
      $product_size = $_POST['size'];
      
      $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');

      if(mysqli_num_rows($cart_num)>0){
        $message[] = 'Product Already exist in cart';
      }else{
        mysqli_query($conn, "INSERT INTO `cart` ( `user_id`, `pid`, `name`, `price`, `quantity`, `image`, `size`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image' , '$product_size')");
        $message[] = 'Product successfuly added in your cart';
      }
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
  </head>
  <body>
    <?php 
      include 'header.php' 
    ?>
    <div class="container">
      <div class="container" style="padding-top: 30px;">
      <button class="fas fa-arrow-left fs-5 text-black p-2 btn" onclick="history.back()"></button>
        <br /><br />
        <div class="container bg-light shadow-lg ">
          <div class="row">
            <?php 
                if(isset($_GET['pid'])){
                    $pid = $_GET['pid'];
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die ('query failed');
                    if(mysqli_num_rows($select_products)>0){
                        while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            <form method="post" >
              <div class="row">
                <div class="col-md-5">
                    <br /><br />
                    <img src="image/<?php echo $fetch_products['image']; ?>" class="demoimgs w-100" />
                </div>
                <div class="col-md-7 col-sm-12 p-3">
                    <br />
                    <h1 style="font-weight: 700"><?php echo $fetch_products['name']; ?></h1>
                    <h6>By: SikalboApprl</h6>
                    <div class="star">
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <br>
                        <label for="id">Quantity</label>
                        <input  name="product_quantity" type="number" id="size" style="width: 60px" class="form-control" value="1" min="1"></input>
                        <p>Stocks: 435</p>
                        <a href="sizechart.php" class="fs-5">Sizechart</a><br>
                        <label for="size">Size: </label><br>
                        <select id="size" name="size" style="border-radius: 5px; width: 100px" class="form-control">
                          <option value="Small" selected="Small">Small</option>
                          <option value="Medium">Medium</option>
                          <option value="Large">Large</option>
                          <option value="Extra Large">Extra Large</option>
                        </select>
                        <br>
                        <h3 class="text-danger " style="font-weight: 700;">Price: <?php echo $fetch_products['price']; ?></h3>
                        <br />
                        <div class="container text-center" >
                          <button type="submit" name="add_to_cart" class="btn btn-outline-dark " style="width: 60%;"> ADD TO CART &nbsp; <i class="fa-brands fa-opencart" style="color: #000000"></i></button>
                        </div>
                </div>
                <hr />
                <div class="col-12 mx-auto d-flex align-items-center" style="padding-bottom: 10px;">
                    <p class="m-1">Share to: &nbsp;</p>
                    <a href="fb-messenger://share/?link= https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fsharing%2Freference%2Fsend-dialog&app_id=123456789"
                        ><i class="fab fa-facebook-messenger text-black m-2"></i
                    ></a>
                    <a href="#"><i class="fab fa-facebook text-black m-2"></i></a>
                    <a href="#"><i class="fab fa-instagram text-black m-2"></i></a>
                    <p class="m-1">|</p>
                    <button type="submit" name="add_to_wishlist" class="btn far fa-heart text-black"></button>
                    <label for="bookmark" class="m-1">Favorite</label>
                    <br /><br />
                </div>
                <hr>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
              </div>
              <div class="container " style="padding: 40px;">
                <h5><b>Product Description: <?php echo $fetch_products['name']; ?></b></h5>
                <pre style="font-family: Titillium Web, sans-serif;" class="fs-5"><?php echo $fetch_products['product_detail']; ?></pre>
              </div>
            </form>
            <?php
                        }
                    }
                }
            ?>
          </div>
          
        </div>
        </div>
      </div>
    </div>
    <div class="" style="padding: 30px;"></div>
    <div class="container">
    <div class="container text-center">
      <h3>PRODUCT RATINGS</h3>
      <div class="star">
        <i class="fa fa-star checked"></i>
        <i class="fa fa-star checked"></i>
        <i class="fa fa-star checked"></i>
        <i class="fa fa-star checked"></i>
        <i class="fa fa-star-half-o"></i>
      </div>
      <p>4.9</p>
    </div>
    <div class="container">
      <h3 class="text-center">SEND FEEDBACK</h3>
      <form class="row justify-content-center">
        <div class="col-lg-4 col-sm-4">
          <label for="name">Name (Required)</label>
          <input
            type="text"
            class="form-control"
            id="name"
            placeholder="Your name"
            required
          />
        </div>
        <div class="col-lg-4 col-sm-4 m">
          <label for="email">Email (Required)</label>
          <input
            type="email"
            class="form-control"
            id="email"
            placeholder="Your email"
            required
          />
        </div>
        <div class="col-lg-8 col-sm-8 p1">
          <label for="feed">Message</label>
          <textarea
            class="form-control"
            id="feed"
            cols="60"
            rows="5"
          ></textarea>
        </div>
        <div class="col-lg-8 col-sm-8 p1">
          <label for="image">Upload image: </label>
          <input type="file" id="image" class="form-control">
        </div>
      </form>
      <div class="container p-3 text-center">
        <label for="feedback"></label>
        <button class="btn btn-dark">
          <a href="" class="text-white">SEND FEEDBACK</a>
        </button>
      </div>
    </div>
    </div>
    <div class="container" style="padding: 30px;">
    </div>
    <div class="container">
      <div class="text-center" style="padding: 30px;">
        <h1>PRODUCT REVIEW</h1>
      </div>
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
