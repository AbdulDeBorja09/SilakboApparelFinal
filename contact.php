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
    
    if(isset($_POST['submit-btn'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $subject = mysqli_real_escape_string($conn, $_POST['subject']);
      $message = mysqli_real_escape_string($conn, $_POST['message']);
      $number =  mysqli_real_escape_string($conn, $_POST['number']);

      $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND subject = '$subject' AND message = '$message'") or die ('query failed');
      if(mysqli_num_rows($select_message)>0){
        echo 'message already send';
      }else{
        mysqli_query($conn, "INSERT INTO `message` (`user_id`, `name`, `email`, `subject`, `message`, `number`) VALUES ('$user_id', '$name', '$email', '$subject', '$message', '$email')") or die ('query failed');
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
    <title>Silakbo | Contact</title>
  </head>
  <body>
    <?php
      include 'header.php'
    ?>
    <br>
    <br>
    <div class="container">
      <div class="row p-3">
        <div class="col-sm-5 xl-12">
          <br />
          <h3 style="font-weight: 700">CONTACT US</h3>
          <p style="font-size: 16px">
            We’re happy to answer any questions you have or provide you with an
            estimate. Just send us a message in the contact form with any
            questions you have.
          </p>

          <h3 style="font-weight: 700">EMAIL</h3>
          <p style="font-size: 16px">silakboapparel@gmail.com</p>
          <h3 style="font-weight: 700">TELEPHONE</h3>
          <p style="font-size: 13px">(+63) 969-156-9350</p>
        </div>
        <div class="col-sm-7 xl-12">
          <form
            class="row"
            method="POST"
          >
            <div class="col-12 p-1" style="font-weight: 700">
              <label for="name" class="form-label">Your Name (Required) </label>
              <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Juan Dela Cruz"
                required
              />
              <div class="valid-feedback">Success</div>
              <div class="invalid-feedback">Please enter a valid name!</div>
            </div>
            <div class="col-12 p-1" style="font-weight: 700">
              <label for="email" class="form-label"
                >Your Email (Required)
              </label>
              <input
                type="email"
                class="form-control"
                name="email"
                placeholder="example@gmail.com"
                required
              />
            </div>
            <div class="col-12 p-1" style="font-weight: 700">
              <label for="number" class="form-label">
                Your Contact Number (Required)
              </label>
              <input
                type="number"
                class="form-control"
                name="number"
                placeholder="09123456789"
                required
              />
            </div>
            <div class="col-12 p-1" style="font-weight: 700">
              <label for="subject" class="form-label">
                Subject (Required)
              </label>
              <input
                type="text"
                class="form-control"
                name="subject"
                placeholder="Subject"
                required
              />
              <div class="valid-feedback">Success</div>
            </div>
            <div class="col-12 p-1" style="font-weight: 700">
              <label for="concern" class="form-label">
                Your message (Required)
              </label>
              <textarea
                class="form-control"
                name="message"
                cols="30"
                rows="10"
                placeholder="Message"
                required
              ></textarea>
            </div>
            <div class="container text-center p-4">
              <button name="submit-btn" class="btn btn-dark" type="submit">SUBMIT</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container-{breakpoint} text-center ">
        <h1 style="text-decoration: underline 1px black; ">SILAKBO APPAREL LOCATION</h1>
      <br>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7736.448937414875!2d121.22378996341888!3d14.181626960168582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1690183729762!5m2!1sen!2sph"
        width="600"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
    <br>
    <br>
    <br>
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
