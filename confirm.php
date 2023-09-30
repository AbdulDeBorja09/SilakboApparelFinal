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
    <link rel="stylesheet" href="path/to/sweetalert2.min.css" />
    <title>Thank you!!</title>
    <style>
      .check {
        width: 20%;
      }
      .box{
        padding-top: 100px;
      }
    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <br>
    <br>
    <div class="container text-center shadow-lg" style="padding: 20px;">
      <div class="container align-items-center">
        <img src="Resources/check.jpg" class="check" />
      </div>
      <div class="text-center" style="padding-top: 20px;">
            <h1><b>Your order is complete!</b></h1>
            <h5>You will be receiving confirmation email with order details</h5>
    </div>
      <div class="container" style="padding-top: 20px;">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 10px">
            <a href="rate.php" class="btn form-control btn-outline-dark w-75">
              Rate Silakbo Service
            </a>
          </div>
          <div  class="col-lg-6 col-md-12 col-sm-12" style="padding: 10px">
            <a href="home.php#sectionhome" class="btn form-control btn-dark w-75">
              Go Home
            </a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>

    <?php include 'footer.php' ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
