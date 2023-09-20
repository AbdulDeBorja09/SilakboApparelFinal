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
    <script src="main.js"></script>
    <title>Silakbo | Home</title>
  </head>
  <body>
   <?php include 'header.php' ?>
    <section id="sectionhome">
      <div class="container-">
        <div id="carousels" class="carousel slide">
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carousels"
              data-bs-slide-to="0"
              class="buttonsss active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carousels"
              data-bs-slide-to="1"
              aria-label="Slide 2"
              class="buttonsss"
            ></button>
            <button
              type="button"
              data-bs-target="#carousels"
              data-bs-slide-to="2"
              aria-label="Slide 3"
              class="buttonsss"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="Resources/c1.png" />
              <div class="carousel-caption">
                <h5>SILAKBO APPAREL</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Resources/c2.png" />
              <div class="carousel-caption">
                <h5>HIGH QUALITY</h5>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Resources/c3.png" />
              <div class="carousel-caption">
                <h5>AFFORDABLE</h5>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carousels"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carousels"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <div class="container">
      <h1 class="m-5 text-center">BEST SELLERS</h1>
      <div class="container text-center">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <img src="Resources/BestSeller/Mindful moment.png" />
              <div class="card-body">
                <br />
                <h5 class="card-title" style="font-weight: 700">
                  Mindful Moment
                </h5>
                <h6><s>Php 999.00</s></h6>
                <p class="card-text text-danger">PHP 700.00</p>
              </div>
              <div class="button text-center">
                <button type="button" class="btn bg-black m-3">
                  <a href="product.php" class="text-white">BUY NOW</a>
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="Resources/BestSeller/Peace Love.png" />
              <div class="card-body">
                <br />
                <h5 class="card-title" style="font-weight: 700">
                  Peace Loved
                </h5>
                <h6><s>Php 999.00</s></h6>
                <p class="card-text text-danger">PHP 700.00</p>
              </div>
              <div class="button text-center">
                <button type="button" class="btn bg-black m-3">
                  <a href="product.php" class="text-white">BUY NOW</a>
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
            <img src="Resources/BestSeller/Radiate Kindness.png" />
              <div class="card-body">
                <br />
                <h5 class="card-title" style="font-weight: 700">
                  Radiate Kindness
                </h5>
                <h6><s>Php 999.00</s></h6>
                <p class="card-text text-danger">PHP 700.00</p>
              </div>
              <div class="button text-center">
                <button type="button" class="btn bg-black m-3">
                  <a href="product.php" class="text-white">BUY NOW</a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br /><br /><br />
    <div class="container-{breakpoint}">
      <img src="Resources/arrivals.png" class="w-100" />
      <img src="Resources/Quality.png" class="w-100" />
      <i class="fa-sharp fa-solid fa-bags-shopping"></i>
    </div>
    <br /><br />
    <div class="container bg-light p-5">
      <div class="container">
        <div class="row">
          <div class="col-lg">
            <h2 style="font-weight: 700">OUR STORY</h2>
            <p class="fs-5">
              For many, existing financial struggles means that accessing mental
              health services fall low on the priority list. There need to be
              more resources, more awareness into this and the connection,
              especially understanding this connection between the pandemic and
              everything it causes beyond physical health. <em>Silakbo</em> is a
              startup company which aims to promote mental health awareness to
              every Filipino and hopefully the Whole world. Part of our profits
              are invested to public mental health services.
            </p>
          </div>
          <div class="col-lg text-center">
            <img src="Resources/poster.png" class="w-100" />
          </div>
        </div>
      </div>
    </div>
    <br /><br /><br />
  <?php include 'footer.php' ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
