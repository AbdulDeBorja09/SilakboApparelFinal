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
    if(isset($_POST['add_review'])){
        $customer_name = mysqli_real_escape_string($conn, $_POST['name']);
        $customer_email = mysqli_real_escape_string($conn, $_POST['email']);
        $customer_message = mysqli_real_escape_string($conn, $_POST['message']);
        $date = date('d-M-Y');

        $insert_review = mysqli_query($conn, "INSERT INTO `review` (`user_id`,`name`, `email`, `message`, `date`)
        VALUES ('$user_id','$customer_name', '$customer_email', ' $customer_message', ' $date')") or die ('query failed');
        header('location:testimonial.php');
        
        
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
    <title>Rate Us</title>
  </head>
  <body>
    <?php include 'header.php' ?>
    <br>
    <br>
    <div class="container">
        
    <div class="container text-center">
      <h3> RATE OUR SHOP</h3>
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
      <form method="POST" class="row justify-content-center">
        <div class="col-lg-4 col-sm-4">
          <label for="name">Name (Required)</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
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
            name="email"
            placeholder="Your email"
            required
          />
        </div>
        <div class="col-lg-8 col-sm-8 p1">
          <label for="feed">Message</label>
          <textarea
            class="form-control"
            id="feed"
            name="message"
            cols="60"
            rows="5"
          ></textarea>
        </div>
      <div class="container p-3 text-center">
        <label for="feedback"></label>
        <button class="btn btn-dark" type="submit" name="add_review">
          SEND FEEDBACK
        </button>
      </div>
    </form>
    </div>
    </div>
    <div class="container" style="padding: 30px;">
    </div>
    <div class="container">
      <div class="text-center" style="padding: 30px;">
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
