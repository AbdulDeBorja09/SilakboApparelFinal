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
        
        mysqli_query($conn, "DELETE FROM `order` WHERE id = '$delete_id'") or die ('query failed');
        $message[] = 'order removed successfuly';
        header('location:admin_orders.php');
    }
    if(isset($_POST['update_payment'])){
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];

        mysqli_query($conn, "UPDATE `order` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die ('query failed');
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
      <h1 class="text-center">SILAKBO ORDERS</h1>
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
        $select_orders = mysqli_query($conn, "SELECT * FROM `order`") or die ('query failed');
        if(mysqli_num_rows($select_orders)>0){
          while($fetch_orders = mysqli_fetch_assoc($select_orders)){

    ?>
    <div class="col-lg-6 col-sm-12 col-md-12 card" style="padding: 10px">
          <h5><b>Name: </b><?php echo $fetch_orders['name']; ?></h5>
          <h5><b>Address: </b><?php echo $fetch_orders['address']; ?></h5>
          <h6><b>Placed on: </b><?php echo $fetch_orders['placed_on']; ?></h6>
          <h6><b>User ID: </b><?php echo $fetch_orders['user_id']; ?></h6>
          <div class="row">
            <div class="col-lg-6">
              <h6><b>Email: </b><?php echo $fetch_orders['email']; ?></h6>
            </div>
            <div class="col-lg-5 col-sm-12">
              <h6><b>Number: </b><?php echo $fetch_orders['number']; ?></h6>
            </div>
          </div>
          <h6><b>Method: </b><?php echo $fetch_orders['method']; ?></h6>
          <div class="row">
            <div class="col-lg-6">
              <h6><b>Total Product: </b><?php echo $fetch_orders['total_products']; ?></h6>
            </div>
            <div class="col-lg-5 col-sm-12">
              <h6><b>Total Price: </b><?php echo $fetch_orders['total_price']; ?></h6>
            </div>
          </div>
          <form method="POST">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>" />
            <select name="update_payment" class="form-control">
              <option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
              <option value="Pending">Pending</option>
              <option value="completes">Complete</option>
            </select>
            <br>
            <div class="text-center" style="padding: 1px;">
                <input type="submit" name="update_order" value="Update Payment" class="btn btn-outline-dark ">
            </div>
          </form>
          <br />
          <a
            href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>"
            onclick="return confirm('Delete this message?');"
            class="btn w-75 mx-auto btn-dark"
            >Delete</a
          >
        </div>
        
        <?php 
     
      
      }
          }else{
              echo '
              <div class="container text-center" style="padding: 100px;">
                  <h1>No Orders Available</h1>
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
