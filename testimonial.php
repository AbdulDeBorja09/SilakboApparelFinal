<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_name'];

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
    <div class="container" style="padding: 50px;">
      <div class="text-center">
        <h1>SILAKBO REVIEW</h1>
      </div>
      <div class="row">
        <?php 
          $select_review = mysqli_query($conn, "SELECT * FROM `review`") or die ('query failed');
          if(mysqli_num_rows($select_review)>0){
              while($fetch_review = mysqli_fetch_assoc($select_review)){
          ?>
              <div class="shadow-sm" style="padding: 30px;">
                <div class="container">
                  <h4><?php echo $fetch_review['name']; ?></h4>
                  <p><?php echo $fetch_review['message']; ?></p>
                  <h6><?php echo $fetch_review['date']; ?></h6>
                </div>
              </div>
            <?php 
              }
            }
          ?>
    </div>
  </div>


   <?php include 'footer.php' ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  </body>
</html>
