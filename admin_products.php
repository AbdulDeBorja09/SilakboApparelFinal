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

    if(isset($_POST['add_product'])){
        $product_name = mysqli_real_escape_string($conn, $_POST['name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['price']);
        $product_detail = mysqli_real_escape_string($conn, $_POST['detail']);
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'image/'.$image;

        $select_prodcut_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = 'product_name' ") or die ('query failed');
        if(mysqli_num_rows($select_prodcut_name)>0){
            $message[] = 'Product name already exist';
        }else{
            $insert_product = mysqli_query($conn, "INSERT INTO `products` (`name`, `price`, `product_detail`, `image` )
             VALUES ('$product_name', '$product_price', '$product_detail', '$image')") or die ('query failed');
            if($insert_product){
                if ($image_size > 2000000 ){
                    $message[] = 'Image Is Too Large';
                }else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'Product added successfully';
                }
            }
        }
    }
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
        $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
        unlink('image/'.$fetch_delete_image['image']);
    
        mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die ('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die ('query failed');
        mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die ('query failed');
        header('location:admin_products.php');
    }
    if(isset($_POST['update_product'])){
        $update_id = $_POST['update_id'];
        $update_name = $_POST['update_name'];
        $update_price = $_POST['update_price'];
        $update_detail = $_POST['update_detail'];
        $update_image = $_FILES['update_image']['name'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder='image/'.$update_image;

        $update_query = mysqli_query($conn, "UPDATE `products` SET `id` = '$update_id', `name` = '$update_name', `price` = '$update_price', 
        `product_detail` = '$update_detail', `image` = '$update_image' WHERE id = '$update_id'") or die ('query failed');

        if($update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            header('location:admin_products.php');
        }

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
      <h1 class="text-center">ADD PRODUCT</h1>
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
      <form method="POST" enctype="multipart/form-data">
        <label for="name" style="font-weight: 700">Product Name: </label>
        <input class="form-control" type="text" name="name" required />
        <br />
        <label for="price" style="font-weight: 700">Product Price:</label>
        <input class="form-control" type="text" name="price" required />
        <br />
        <label for="detail" style="font-weight: 700">Product Detail:</label>
        <textarea
          class="form-control"
          name="detail"
          cols="30"
          rows="10"
          required
        ></textarea>
        <br />
        <label for="iamge" style="font-weight: 700">Product Image: </label>
        <input class="form-control" type="file" name="image" accept="image/jpg, image/png, image/webp" required />
        <div class="container text-center" style="padding: 20px;">
          <input class="btn btn-outline-dark w-100" type="submit" name="add_product" value="Add Product">
        </div>
      </form>
    </div>
    <div style="padding: 50px;"></div>
        <?php
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$edit_id'") or die ('query failed');

            if(mysqli_num_rows($edit_query)>0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <section class="update-container">
            <div class="container shadow-lg text-center" style="padding: 50px;">
            <h1 >Edit Product</h1>
            <form method="POST" enctype="multipart/form-data" class="d-flex flex-column">
                <img src="image/<?php echo $fetch_edit['image'];?>" class="w-25 mx-auto">
                <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id']; ?>">
                <input class="form-control" danger type="text" name="update_name" value="<?php echo $fetch_edit['name']; ?>">
                <input class="form-control" type="number" name="update_price" min="0" value="<?php echo $fetch_edit['price']; ?>">
                <textarea class="form-control" name="update_detail" id="" cols="30" rows="10"><?php echo $fetch_edit['product_detail']; ?></textarea>
                <input class="form-control" type="file" name="update_image" accept="image/jpg, image/png, image/webp " src="image/<?php echo $fetch_edit['image'];?>">
                <br><br>
                <div class="container d-flex">
                    <input class="form-control btn btn-dark m-2" type="submit" name="update_product" value="update" >
                    <input class="form-control btn btn-outline-dark m-2" type="reset" name="cancel" id="close-form" >
                </div>
            </form>
            </div>
        <?php    
                }
            }
            echo "<script>document.querySelector('.update-container').style.display='block'</script>";
        }
        ?>
        <script>
            const closeBtn = document.querySelector("#close-form");
            closeBtn.addEventListener("click", () => {
            document.querySelector(".update-container").style.display = "";
            });
        </script>
        </section>
        

    </section>
    <div style="padding: 50px;"></div>
    <section>
        <div class=" shadow-lg">
            <h1 class="text-center" style="padding: 50px;">SILAKBO PRODUCTS</h1>
                <div class="row text-center justify-content-evenly">
                    <?php 
                        $select_prodcuts = mysqli_query($conn, "SELECT * FROM `products`") or die ('query failed');
                        if(mysqli_num_rows($select_prodcuts)>0){
                            while($fetch_products = mysqli_fetch_assoc($select_prodcuts)){
                    ?>
                    <div class="card col-5 p-3 text-center" >
                        <img src="image/<?php echo $fetch_products['image']; ?>" class="w-50 mx-auto">
                        <h4><?php echo $fetch_products['name']; ?></h4>
                        <p>Php <?php echo $fetch_products['price']; ?></p>
                        <details><summary>Details</summary><?php echo $fetch_products['product_detail']; ?></details>
                        <br>
                        <div class="d-flex justify-content-evenly">
                            <a href="admin_products.php?edit=<?php echo $fetch_products['id']; ?>" class="edit">Edit</a>
                            <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete" onclick="return confirm('Delete this product?')">Delete</a>
                        </div>
                    </div>
                    <?php 
                    }
                        }else{
                            echo '
                            <div class="container text-center" style="padding: 100px;">
                                <h1>No Product Added yet</h1>
                            </div>
                            ';  
                        }
                    ?> 
            </div>
        </div>
    </section>
    <div></div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
