<?php
  include  'connection.php';

  if(isset($_POST['submit-btn'])){
    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($conn, $filter_name);

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die ('query failed');

    if(mysqli_num_rows($select_user)>0){
      $message[] = 'User Already Exist';

    }else{
      if ($password != $cpassword){
        $message[] = 'Wrong Password';
      }else{
        mysqli_query($conn, "INSERT INTO `users` (`name`, `email` , `password`) VALUES ('$name', '$email', '$password')") or die ('query failed');
        $message[] = 'Register Successfully';
        header('location:index.php');
      }
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
    <style>
      * {
        font-weight: bolder;
      }
    </style>
    <title>Silakbo | Sign Up</title>
  </head>
  <body>
    <br /><br /><br /><br /><br />
    <div class="container p-l-5">
      <div class="container shadow-lg" style="background-color: #ededed">
        <div class="container text-center">
          <img src="Resources/Logo.png" class="w-25 m-3" />
        </div>
        <h3 class="ps-3 text-center">SILAKBO APPAREL</h3>
        <br>
        <br>
        
        <form class="row" method="post">
          <div class="col-lg-5 col-md-12 m-2">
            <label for="name">Name: </label>
            <input
              type="text"
              class="form-control"
              name="name"
              placeholder="Dela Cruz"
              required
            />
          </div>
          <div class="col-lg-6 col-md-12 m-2">
            <label for="email">Email</label>
            <input
              type="email"
              class="form-control"
              name="email"
              placeholder="Example@gmail.com"
              required
            />
          </div>
          <div class="col-lg-5 col-md-12 m-2">
            <label for="num">Password: </label>
            <input
              type="password"
              class="form-control"
              name="password"
              placeholder="***********"
              required
            />
          </div>
          <div class="col-lg-6 col-md-12 m-2">
            <label for="pass">Confirm Password: </label>
            <input
              type="password"
              class="form-control"
              name="cpassword"
              placeholder="***********"
              required
            />
          </div>
          
          <div class="container m-2" >
            <input class="form-check-input" type="checkbox" id="stay" required/>
            <label class="form-check-label" for="stay" style="font-size: 15px"
              >I agree to the <a href="terms.php">Terms and Conditions</a> as
              set out by the user agreement</label
            >
            <br><br>
            <a href="index.php" class="p-3">&nbsp; Already have an account?</a>
          </div>
          <div class="container text-center p-3" >
            <input
              type="submit"
              name="submit-btn"
              class="btn btn-dark form-control w-75"
              value="Register now"
              
            />
          </div>
        </form>
      </div>
    </div>
    <br /><br /><br />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
