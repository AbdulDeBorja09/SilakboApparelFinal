<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['admin_name'];

    if (!isset($admin_id)){
        header('location:login.php');
    }
    
    if (isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
    
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die ('query failed');
        header('location:admin_messages.php');
    }
?>

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
    <title>Admin</title>
  </head>
  <body>
    <?php include 'admin_header.php'; ?>

    <div class="line4"></div>
    <section>
      <div class="container shadow-lg" style="padding: 50px">
        <h1 class="text-center">CUSTOMER MESSAGES</h1>
        <?php
        if(isset($message)){
          foreach ($message as $message) {
          echo'
              <div class="alert alert-dark" role="alert text-center p-3"  >
              '.$message.'
              </div>
            ';
          }
      
        }
    ?>
    <div class="row justify-content-between" style="padding: 20px">
    <?php 
        $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die ('query failed');
        if(mysqli_num_rows($select_message)>0){
          while($fetch_message = mysqli_fetch_assoc($select_message)){

    ?>
          <div class="col-lg-4 col-sm-12 col-md-6 card" style="padding: 10px">
            <h5>
              <b>Name: </b
              ><?php echo $fetch_message['name']; ?>
            </h5>
            <h6>
              <b>User ID: </b
              ><?php echo $fetch_message['id']; ?>
            </h6>
            <h6>
              <b>Email: </b
              ><?php echo $fetch_message['email']; ?>
            </h6>
            <h6>
              <b>Subject: </b
              ><?php echo $fetch_message['subject']; ?>
            </h6>
            <details>
              <summary>Message: </summary>
              <?php echo $fetch_message['message'];?>
            </details>
            <br />
            <a
              href="admin_messages.php?delete=<?php echo $fetch_message['id']; ?>;"
              onclick="return confirm('Delete this message?');"
              class="btn w-75 mx-auto btn-outline-dark"
            >
              Delete</a
            >
          </div>
          <?php 
      }
          }else{
              echo '
              <div class="container text-center" style="padding: 100px;">
                  <h1>No Messages Available</h1>
              </div>
              ';  
          }
      ?> 
       </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
