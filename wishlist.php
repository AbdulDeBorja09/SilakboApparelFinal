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

    if (isset($_POST['add_to_cart'])){
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image' ];
      $product_size = $_POST['product_size'];
      $product_quantity = 1;
      
      $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');

      if(mysqli_num_rows($cart_num)>0){
        $message[] = 'Product Already exist in cart';
      }else{
        mysqli_query($conn, "INSERT INTO `cart` ( `user_id`, `pid`, `name`, `price`, `quantity`, `image`, `size`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$product_size')");
        $message[] = 'Product successfuly added in your cart';
      }
    }
    if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id' ") or die ('query failed');
      header('location:wishlist.php');

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
        <div class="container bg-light shadow-lg">
          <div class="text-center" style="padding: 20px">
            <h1 class="">MY WISHLIST</h1>
          </div>
          <?php
              if(isset($message)){
                foreach ($message as $message) {
                echo'
                    <div class="alert alert-dark" role="alert text-center p-3"  >
                    '.$message.'
                    </div>
                  ';
                }
              }
          ?>
          <div class="row">
            <?php 
              $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die ('query failed');
              if(mysqli_num_rows($select_wishlist)>0){
                  while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){
            ?>
            <div class="col-lg-4 col-md-5 col-sm-12 text-center" >
              <form method="post">
                <a href="view_page.php?pid=<?php echo $fetch_wishlist['pid']; ?>" class="text-black">
                <br>
                <img src="image/<?php echo $fetch_wishlist['image']; ?>" class="Productimg">
                <br><br>
                <h5 class="title" style="font-weight: 700"><?php echo $fetch_wishlist['name']; ?></h5>
                <p>Size: <?php echo $fetch_wishlist['size']; ?></p>
                <h3 class="text-danger">Php <?php echo $fetch_wishlist['price']; ?></h3>
                <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                <input type="hidden" name="product_size" value="<?php echo $fetch_wishlist['size']; ?>">
                <div class="button  text-white d-flex mx-auto justify-content-evenly align-items-center">
                  <button  class="btn btn-outline-dark" name="add_to_cart" > ADD TO CART &nbsp; <i class="fa-brands fa-opencart" style="color: #000000"></i></button>
                  <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id'] ?>" class="btn btn-dark" onclick="return confrim('Do you want to remove this product from your wishlist?')"><i class="fa-regular fa-trash-can" style="color: #e8e8e8;"></i></a>
                  <br /><br />
                </div>
                <br>
                </a>
              </form>
            </div>
            <?php
                }
              }else{
                echo '
                <div class="container text-center" style="padding: 100px;">
                    <h1>No Product In Your Wishlist</h1>
                </div>
                ';  
              }
            ?>
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
