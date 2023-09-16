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
    if (isset($_POST['add_to_wishlist'])){
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image' ];
     
      $whislist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');
      $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');

      if(mysqli_num_rows($whislist_number)>0){
        $message[]='Product Already exist in Wishlist';
      }else if(mysqli_num_rows($cart_num)>0){
        $message[] = 'Product Already exist in cart';
      }else{
        mysqli_query($conn, "INSERT INTO `wishlist` ( `user_id`, `pid`, `name`, `price`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
        $message[] = 'Product successfuly added';
      }
    }

    if (isset($_POST['add_to_cart'])){
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image' ];
      $product_quantity = $_POST['product_quantity'];
     
      
      $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die ('query failed');

      if(mysqli_num_rows($cart_num)>0){
        $message[] = 'Product Already exist in cart';
      }else{
        mysqli_query($conn, "INSERT INTO `cart` ( `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
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
    <style>
      .carousel-inner {
        padding: 18px;
        border-radius: 25px;
      }
      .carousel-caption {
        position: static;
        color: black;
      }
      .carousel-caption h3 {
        margin-bottom: 15px;
        margin-top: 15px;
        color: black;
      }
    </style>
  </head>
  <body>
    <?php 
      include 'header.php' 
    ?>
    <div class="container align-middle " style="padding-top: 30px;">
      <div class="container d-flex">
        <button class="fas fa-arrow-left fs-5 text-black p-2 btn" onclick="history.back()"></button>
        <div class="container d-flex justify-content-end">
          <h5 class="m-2">
            <b>ITEMS IN CART: </b> <span class="items"></span>
          </h5>
        </div>
      </div>
    </div>
    <br /><br />
    <div class="container bg-light p-3 shadow-lg text-center">
      <h1 class="text-center">OUR PRODUCTS</h1>
      <br />
      <div class="row">
        <?php 
          $select_prodcuts = mysqli_query($conn, "SELECT * FROM `products`") or die ('query failed');
          if(mysqli_num_rows($select_prodcuts)>0){
              while($fetch_products = mysqli_fetch_assoc($select_prodcuts)){
          ?>
      <div class="ProductCard col-lg-3 col-md-6 col-sm-12">
        <form method="POST">
          <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="text-black">
            <br>
            <img src="image/<?php echo $fetch_products['image']; ?>" class="Productimg">
            <br><br>
            <h5 class="title" style="font-weight: 700"><?php echo $fetch_products['name']; ?></h5>
            <p class="text-danger">Php <?php echo $fetch_products['price']; ?></p>
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_quantity" value="1" min="1">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <div class="button  text-white d-flex mx-auto justify-content-evenly">
              <button type="submit" name="add_to_cart" class="btn btn-outline-dark" style="width: 60%;"> ADD TO CART &nbsp; <i class="fa-brands fa-opencart" style="color: #000000"></i></button>
              <button type="submit" name="add_to_wishlist" class="btn btn-dark fa-regular fa-bookmark" style="width: 25%;"></i></button>
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
                  <h1>No Available Products yet</h1>
              </div>
              ';  
          }
      ?> 
      </div>
    </div>    

      <div class="container p-5">
        <nav aria-label="page text-black p-5">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a href="#" class="page-link">Previous</a>
            </li>
            <li class="page-item disabled">
              <a href="product.html" class="page-link text-black">1</a>
            </li>
            <li class="page-item">
              <a href="product2.html" class="page-link text-black">2</a>
            </li>
            <li class="page-item">
              <a href="product3.html" class="page-link text-black">3</a>
            </li>
            <li>
              <a href="product2.html" class="page-link text-black">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <br /><br />
    <?php include 'footer.php' ?>
    
    <!------Modal-------->
    <!-- Modals -->
    <div
      class="modal fade"
      id="cart"
      data-bs-backdrop="static"
      aria-hidden="true"
      tabindex="-1"
      style="backdrop-filter: blur(5px)"
    >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="close btn fs-2"
              data-bs-dismiss="modal"
            >
              &times;
            </button>
            <h4 class="modal-title">Silakbo Cart</h4>
          </div>
          <div class="modal-body">
            <table class="table table-hover">
              <thead class="thead-inverse">
                <tr>
                  <th>Remove</th>
                  <th>Qty</th>
                  <th>Item</th>
                  <th>Cost</th>
                  <th class="text-xs-right">Subtotal</th>
                </tr>
              </thead>
              <tbody id="output"></tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-outline-dark"
              data-bs-dismiss="modal"
            >
              Continue</button
            ><a href="checkout.html" class="btn btn-dark">Checkout</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
