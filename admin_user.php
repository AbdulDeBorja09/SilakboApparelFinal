<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['admin_name'];

    if (!isset($admin_id)){
        header('location:index.php');
    }

    if (isset($_POST['logout'])){
        session_destroy();
        header('location:index.php');
    }
    
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die ('query failed');
        $message[] = 'user removed successfuly';
        header('location:admin_user.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Resources/silakbologo.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script
      src="https://kit.fontawesome.com/8a364c3095.js"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    
    <div class="line4"></div>
    <section>
    <div class="container shadow-lg" style="padding: 50px">
      <h1 class="text-center">TOTAL USER ACCOUNTS</h1>
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
    <div class="row justify-content-between " style="padding: 20px;">
    <?php 
        $select_user = mysqli_query($conn, "SELECT * FROM `users`") or die ('query failed');
        if(mysqli_num_rows($select_user)>0){
          while($fetch_user = mysqli_fetch_assoc($select_user)){

    ?>
    
        <div class="col-lg-4 col-sm-12 col-md-6 card " style="padding: 10px">
          <h5><b>Name: </b><?php echo $fetch_user['name']; ?></h5>
          <h6><b>User ID: </b><?php echo $fetch_user['id']; ?></h6>
          <h6><b>Email: </b><?php echo $fetch_user['email']; ?></h6>
          <h6><b>Phone: </b><?php echo $fetch_user['phone_num']; ?></h6>
          <h6><b>User Type: </b> <?php echo $fetch_user['user_type']; ?></h6>
          <br>
          <a name="delete" href="admin_user.php?delete=<?php echo $fetch_user ['id']; ?>;" onclick="return confirm('Delete this message?');" class="btn w-75 mx-auto btn-outline-dark"> Delete</a>
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
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
