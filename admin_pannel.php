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
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <div class="line4"></div>
    <section class="dashboard">
    <div class="container">
      <div class="row justify-content-around text-center p-5 shadow-lg">
        <div class="card col-lg-3 col-sm-12 col-md-6">
            <?php $total_pendings = 0; 
                $select_pendings = mysqli_query($conn, "SELECT * FROM `order` WHERE payment_status = 'pending'") or die ('query failed');
                while ($fetch_pending = mysqli_fetch_assoc($select_pendings)){
                    $total_pendings += $fetch_pending['total_price'];
                }
            ?>
            <h3>$
                <?php echo $total_pendings; ?>
            </h3>
            <p>Total Pendings</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php $total_completes = 0; 
                    $select_completes = mysqli_query($conn, "SELECT * FROM `order` WHERE payment_status = 'completes'") or die ('query failed');
                    while ($fetch_completes = mysqli_fetch_assoc($select_completes)){
                        $total_completes += $fetch_completes['total_price'];
                    }
                ?>
            <h3>$ <?php echo $total_completes; ?></h3>
            <p>Total Completes</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php 
                    $select_orders = mysqli_query($conn, "SELECT * FROM `order` ") or die ('query failed');
                    $num_of_orders = mysqli_num_rows($select_orders);
                ?>
            <h3><?php echo $num_of_orders; ?></h3>
            <p>Order placed</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php 
                    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die ('query failed');
                    $num_of_products = mysqli_num_rows($select_products);
                ?>
            <h3><?php echo $num_of_products; ?></h3>
            <p>Product added</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php 
                    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die ('query failed');
                    $num_of_users = mysqli_num_rows($select_users);
                ?>
            <h3><?php echo $num_of_users; ?></h3>
            <p>Total Normal User</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php 
                    $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die ('query failed');
                    $num_of_admin = mysqli_num_rows($select_admin);
                ?>
            <h3><?php echo $num_of_admin; ?></h3>
            <p>Total  Admin</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php 
                    $select_users = mysqli_query($conn, "SELECT * FROM `users` ") or die ('query failed');
                    $num_of_users = mysqli_num_rows($select_users);
                ?>
            <h3><?php echo $num_of_users; ?></h3>
            <p>Total users</p>
        </div>
        <div class="card col-lg-3 col-sm-12 col-md-6">
                <?php 
                    $select_messages = mysqli_query($conn, "SELECT * FROM `message` ") or die ('query failed');
                    $num_of_message = mysqli_num_rows($select_messages);
                ?>
            <h3><?php echo $num_of_message; ?></h3>
            <p>Total messages</p>
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
