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
    <script src="main.js"></script>
    <title>Admin</title>
  </head>
  <body>
    <div class="container text-center">
      <img src="Resources/Logo.png" class="w-25 m-3" />
    </div>
    <div class="header">
      <div class="container-{breakpoint} bg-dark">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a
              href="admin_pannel.php"
              class="navbar-brand text-white fs-6"
            >
            <?php echo $_SESSION['admin_name']; ?></a
            >
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#btn"
              aria-controls="btn"
              aria-expanded="false"
              aria-label="Toggle navigation"
              style="border: 0"
            >
              <i class="fa fa-navicon text-white"></i>
            </button>
            <div class="collapse navbar-collapse navigation" id="btn">
              <ul
                class="navbar-nav mx-auto text-white navigation d-flex text-center"
                style="list-style: none"
              >
                <li class="nav-item">
                  <a
                    href="admin_pannel.php"
                    class="nav-link active text-white"
                    aria-current="page"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a href="admin_products.php" class="nav-link text-white"
                    >Product</a
                  >
                </li>
                <li class="nav-item">
                  <a href="admin_orders.php" class="nav-link text-white">Orders</a>
                </li>
                <li class="nav-item">
                  <a href="admin_user.php" class="nav-link text-white">Users</a>
                </li>
                <li class="nav-item">
                  <a href="admin_messages.php" class="nav-link text-white"
                    >Messages</a
                  >
                </li>
              </ul>

              <div class="icons d-flex justify-content-center">
                <div style="list-style-type: none" class="p-2">
                <form method="post">
                  <button class="btn" name="logout">
                    <i
                      class="fa-solid fa-right-to-bracket"
                      style="color: #ffffff"
                    ></i>
                  </button>
                  </form>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="container text-center" style="padding: 50px;">
      <h1>ADMIN DASHBOARD</h1>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

