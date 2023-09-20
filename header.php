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
    <style>
      *{
        font-family: "Titillium Web", sans-serif;
      }
    </style>
    <script src="main.js"></script>
    <title>Silakbo | Home</title>
  </head>
  <body>
    <div class="container text-center">
      <img src="Resources/Logo.png" class="w-25 m-3" />
    </div>
    <div class="header">
      <div class="container-{breakpoint} bg-black">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a href="home.php" class="navbar-brand text-white p-0"> Silakbo</a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#btn"
              aria-controls="btn"
              aria-expanded="false"
              aria-label="Toggle navigation"
              style="border: 0"
            >
              <i class="fa fa-navicon text-white"></i>
            </button>
            <div class="collapse navbar-collapse navigation" id="btn">
              <ul
                class="navbar-nav mx-auto text-white navigation d-flex text-center"
                style="list-style: none"
              >
                <li class="nav-item">
                  <a
                    href="home.php#sectionhome"
                    class="nav-link active text-white"
                    aria-current="page"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a href="product.php" class="nav-link text-white">Product</a>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link text-white"
                    nav-link
                    dropdown-toggle
                    role="button"
                    data-bs-toggle="dropdown"
                    >Where to buy</a
                  >
                  <ul class="dropdown-menu">
                    <li>
                      <a href="onsite.php" class="dropdown-item">Onsite</a>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <a href="online.php" class="dropdown-item">Online</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="contact.php" class="nav-link text-white"
                    >Contact Us</a
                  >
                </li>
                <li class="nav-item">
                  <a href="about.php" class="nav-link text-white">About Us</a>
                </li>
              </ul>
              <div class="icons d-flex justify-content-center">
                <li style="list-style-type: none" class="">
                  <button
                    class="btn"
                    data-bs-toggle="modal"
                    data-bs-target="#profile"
                  >
                    >
                    <i class="fa-regular fa-user" style="color: #ffffff"></i>
                  </button>
                </li>
                &nbsp;&nbsp;

               <?php 
                  $select_wishlist = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die ('query failed');
                  $wishlist_num_rows = mysqli_num_rows($select_wishlist);
                ?> 
                <li style="list-style-type: none" class="p-2">
                  <a href="wishlist.php"
                    ><i class="fa-regular fa-heart" style="color: #ffffff"> </i
                    ><sup class="text-white fs-6"
                      ><?php echo $wishlist_num_rows; ?></sup
                    ></a
                  >
                </li>
                <?php 
                  $select_cart = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id = '$user_id'") or die ('query failed');
                  $cart_num_rows = mysqli_num_rows($select_cart);
                ?> 
                <li style="list-style-type: none" class="p-2">
                  <a href="cart.php"
                    ><i
                      class="fa-solid fa-cart-shopping"
                      style="color: #ffffff"
                    >
                    </i
                    ><sup class="text-white fs-6"
                      ><?php echo $cart_num_rows; ?></sup
                    ></a
                  >
                </li>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    
    <div
      class="modal fade"
      id="profile"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body text-center">
            <br />
            <img
              src="Resources/defaultismssss.png"
              width="50%"
              style="border-radius: 50%"
            />
            <br />
            <br />
            <h1><b><?php echo $_SESSION['user_name']; ?></b></h1>
            <h3><?php echo $_SESSION['user_email']; ?></h3>
          </div>
          <div class="row text-center" style="padding: 20px">
            <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 10px">
              <a href="home.php" class="btn btn-outline-dark w-75" >
                Continue Shopping
              </a>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 10px">
              <form method="POST">
                <button class="btn btn-dark w-75" name="logout">Logout</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
