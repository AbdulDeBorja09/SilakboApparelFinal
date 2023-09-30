<?php
  include  'connection.php';
  session_start();
  if(isset($_POST['submit-btn'])){
    
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die ('query failed');

    if(mysqli_num_rows($select_user)>0){
      $row = mysqli_fetch_assoc($select_user);
      if($row['user_type'] == 'admin') {
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        $id = $_SESSION['id'];
        header('location:admin_pannel.php');

      }else if($row['user_type'] == 'user') {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        header('location:home.php#sectionhome');
        
      }
    }
    else{
      $message[]= 'Incorrect email or password';
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
    <title>Silakbo | Login</title>
  </head>
  <body>
    <div class="login">
      <div class="container p-lg-5">
        <br /><br /><br />
        <div
          class="row shadow-lg align-middle"
          style="background-color: #ededed"
        >
          <form class="container" method="post">
            <div class="row p-5">
              <div class="container p-3">
                <h1 class="text-center">SILAKBO APPAREL</h1>
              </div>
              <div
                class="col-lg-5 col-md-12 align-middle text-center mx-auto p-1"
              >
                <img src="Resources/loginimage.png" class="w-100" />
              </div>
              <div class="col-lg-6 col-md-12 mx-auto" style="font-size: large">
               <br> 
              <label for="username" style="font-weight: 700" class="m-1">
                  Email:
                </label>
                <input
                  type="text"
                  class="form-control"
                  name="email"
                  placeholder="Example@gmail.com"
                  required
                 
                />
                <label for="password" style="font-weight: 700" class="m-1">
                  <br />
                  Password:
                </label>
                <input
                  type="password"
                  class="form-control hidden"
                  name="password"
                  placeholder="*************"
                />
                <br />
                <br />
                <?php
                    if(isset($message)){
                      foreach ($message as $message) {
                      echo'
                          <div class="alert alert-danger" role="alert text-center p-3"  >
                          '.$message.'
                          </div>
                        ';
                      }
                    }
                ?>
                <br>
                <div class="d-grid gap-2 col-4 mx-auto">
                  <input
                    type="submit"
                    name="submit-btn"
                    class="btn btn-dark form-control"
                    value="Login Now"
                  />
                </div>
                <div class="container">
                  <br />
                  <br>
                </div>
                <hr />
                <div class="container">
                  <p>
                    Don't have an account?
                    <a href="signup.php" class="signup.php">Register here</a>
                  </p>
                </div>
                <br /><br /><br />
              </div>
            </div>
          </form>
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
