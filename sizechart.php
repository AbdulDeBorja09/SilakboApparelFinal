<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
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
    <title>Silakbo | Products</title>
  </head>
  <body>
    <br /><br />
    <?php 
    include 'header.php'
    ?>
    <div class="container align-middle" style="padding: 20px">
      <div class="container d">
      <button class="fas fa-arrow-left fs-5 text-black p-2 btn" onclick="history.back()"></button>
        <br /><br />
        <div class="bg-light shadow-lg text-center">
          <h1 class="text-center">SIZE CHART</h1>
          <table class="table" style="font-size: 100%">
            <thead>
              <tr>
                <th scope="col">SIZE</th>
                <th scope="col">XS</th>
                <th scope="col">S</th>
                <th scope="col">M</th>
                <th scope="col">L</th>
                <th scope="col">XL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">CHEST</th>
                <td>87</td>
                <td>93</td>
                <td>99</td>
                <td>105</td>
                <td>111</td>
              </tr>
              <tr>
                <th scope="row">WAIST</th>
                <td>75</td>
                <td>81</td>
                <td>87</td>
                <td>93</td>
                <td>99</td>
              </tr>
              <tr>
                <th scope="row">SEAT</th>
                <td>89</td>
                <td>95</td>
                <td>101</td>
                <td>106</td>
                <td>113</td>
              </tr>
              <tr>
                <th scope="row">LENGTH</th>
                <td>78</td>
                <td>80</td>
                <td>82</td>
                <td>84</td>
                <td>86</td>
              </tr>
            </tbody>
          </table>
          <br />
          <button class="btn btn-dark">
            <a href="product.php" class="text-white p-3">CONTINUE SHOPPING</a>
          </button>
          <br /><br /><br />
        </div>
      </div>
    </div>
    <br /><br /><br />
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
