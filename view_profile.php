<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
        header('location:login.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
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
    <br /><br />
    <?php 
    include 'header.php'
    ?>
    <div class="container shadow-lg">
      <div class="row" style="padding: 30px">
        <div
          class="col-lg-4 col-md-12 col-sm-12 text-center align-items-center"
        >
          <img
            src="Profile/defaultismssss.png"
            style="border-radius: 50%"
            width="200px"
          />
          <div style="padding: 10px"></div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12" style="padding: 20px">
          <h2><b>Abdul Aziz De Borja</b></h2>
          <h4>abduldb@09gmail.com</h4>
          <h6>1023 sdasd bay laguna 4033</h6>
          <h6>09182312312</h6>
        </div>
        <hr />
        <div
          class="col-lg-6 col-md-12 col-sm-12 text-center"
          style="padding: 5px"
        >
          <button class="btn btn-dark form-control w-75 mx-auto">
            <i class="fa-solid fa-pen" style="color: #ffffff"></i>&nbsp; Edit
            Profile
          </button>
        </div>
        <div
          class="col-lg-6 col-md-12 col-sm-12 text-center"
          style="padding: 5px"
        >
          <button class="btn btn-outline-dark form-control w-75 mx-auto">
            Logout
          </button>
        </div>
      </div>
    </div>
    
    <?php 
      include 'footer.php'
    ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
