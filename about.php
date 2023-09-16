<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

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
    <title>Silakbo | About Us</title>
  </head>
  <body>
    <?php 
      include 'header.php';
    ?>
    <div class="container">
      <h3 class="text-center m-5" style="font-size: 40px; font-weight: 700">
        ABOUT US
      </h3>
      <div class="container" style="font-size: 20px">
        <p>
          "At least 3.6 million Filipinos are battling mental health issues
          as the Philippines continues to grapple with the COVID-19
          pandemic, the Department of Health (DOH) said. About 1.14 million
          Filipinos have depression, 847,000 are battling alcohol-use
          disorders, while 520,000 others were diagnosed with bipolar
          disorder."
        </p>
          <figcaption class="blockquote-footer">
            Frances Prescilla Cuevas,
            <cite title="Source Title"
              >chief health program officer of the DOH's Disease Prevention and
              Control Bureau..</cite
            >
          </figcaption>
        <p style="font-size: 20px">
          There are many types of mental illnesses, which range in severity and
          how they impact everyday life. There is no single cause for mental
          illness, and it is commonly caused by multiple factors, many of which
          are out of an individual’s control. Diagnosis requires a healthcare
          professional, who can also advise on treatment options.
        </p>
        <p style="font-size: 20px">
          For many, existing financial struggles means that accessing mental
          health services fall low on the priority list. There need to be more
          resources, more awareness into this and the connection, especially
          understanding this connection between the pandemic and everything it
          causes beyond physical health. <em>Silakbo</em> is a startup company
          which aims to promote mental health awareness to every Filipino and
          hopefully the Whole world. Part of our profits are invested to public
          mental health services.
        </p>
        </figure>
        <br />
        <img src="Resources/about.png" class="w-100" style="border-radius: 10px" />
      </div>
    </div>
    <br /><br />
    <div class="container bg-light">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <br />
          <br />
          <h3 class="text-center" style="font-weight: 700">MISSION</h3>
          <p style="font-size: 20px" class="p-3">
            <em>Silakbo</em> aims to educate every Filipino that mental
            illnesses can be diagnosed and treated. To reduce stigma and
            discrimination against those with mental illnesses. Everyone
            suffering from mental ilness can be cured and live meaningful lives
            in their communities.
          </p>
          <br /><br />
        </div>
        <div class="col-lg-6">
          <br /><br />
          <h3 class="text-center" style="font-weight: 700">VISION</h3>
          <p style="font-size: 20px" class="p-3">
            To make <em>Silakbo</em> and our <em>cause</em> be recognized
            worldwide brand. To eradicate the stigma on mental health issues. To
            lessen or better yet, eradicate mental illness and all of its form.
            And To further our cause not only here in the Philippines but also
            in every parts of the world
          </p>
          <br /><br />
        </div>
        <div class="col-lg-6">
          <br />
          <h3 class="text-center" style="font-weight: 700">GOAL</h3>
          <p style="font-size: 20px" class="p-3">
            Inform and educate everyone that Mental Illness exist and can affect
            anyone. But Mental Ilness is curable. To make the world a better and
            more beautiful place, through our brands and designs
          </p>
          <br /><br />
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
