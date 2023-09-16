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
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Arsenal&family=Poiret+One&family=Rajdhani:wght@300&display=swap");
    </style>
    <title>Silakbo | Onsite store</title>
  </head>
  <body>
    <?php 
    include 'header.php'
    ?>
    <div class="container">
      <div class="container-fluid">
        <h1 class="m-5" style="text-align: center">OFFICIAL DISTRIBUTORS</h1>
        <div class="row align-content-center m-lg-5" style="padding: 30px;">
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Silakbo Main Branch</h6>
            <p class="fs-">
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;Brgy. Maahas Bay
              Laguna <br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> SilakboPH</a><br />
              <i class="fas fa-phone mr-2"></i> 09612058240
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Silakbo Quezon City</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;Gateway Mall,
              Araneta Center, Cubao<br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> Silakbo Qc</a><br />
              <i class="fas fa-phone mr-2"></i> 09913604691
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Silakbo Makati</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;116 Gamboa
              Street, Legaspi, Makati<br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> Silakbo Makati</a><br />
              <i class="fas fa-phone mr-2"> </i> 0998066734
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Silakbo Iloilo</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;2nd Floor,
              Gaisano City Mall <br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> Silakbo Iloilo</a><br />
              <i class="fas fa-phone mr-2"></i> 0999558930
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Hibla De kalidad</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i>&nbsp;163 Gen Mascardo
              caloocan<br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> HDK Clo.</a><br />
              <i class="fas fa-phone mr-2"></i> 0909238456
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Qualithrift</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;2nd Floor,
              Gaisano City Mall<br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> Qualithrift</a><br />
              <i class="fas fa-phone mr-2"></i> 0991293352
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">House of Local</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;Brgy. Maahas Bay
              Laguna <br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> HouseOfLocal</a><br />
              <i class="fas fa-phone mr-2"></i> 09913604691
            </p>
          </div>
          <div class="col-6 col-sm-3">
            <h6 style="font-weight: 700">Pinoy Drip</h6>
            <p>
              <i class="fas fa-map-marker-alt mr-2"></i> &nbsp;Alabang Town
              Center, muntinlupa<br />
              <a href="https://www.facebook.com/profile.php?id=100095213707424" style="color:black"><i class="fab fa-facebook mr-2"></i> Pdrip Alabang</a> <br />
              <i class="fas fa-phone mr-2"></i> 0992857103
            </p>
          </div>
        </div>
      </div>
    </div>
    <div style="padding: 30px"></div>
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
