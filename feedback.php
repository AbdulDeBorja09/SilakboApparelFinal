<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
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
</body>
</html>
