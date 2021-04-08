<?php

// connects to database
$dbServerName = "sql200.epizy.com";
$dbUsername = "epiz_28227108";
$dbPassword = "oHMwN1a0Xu";
$dbName = "epiz_28227108_cypress";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
    <title>Suggest</title>
  </head>
  <body>
    <div class="inner-reg">
        <nav class="nav">
            <a href="/" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="/" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
        </nav>

        <div class="register-content">
          <a href="portal.html" style="float: left; margin: 4%">BACK</a>
          <a href="index.html" style="float: right; margin: 4%">LOGOUT</a>
          <br> <br> <br>

          <?php

              $command = "SELECT * FROM `reports` ORDER BY `reports`.`date` DESC";
               $result = $conn->query($command);

               while ($report = mysqli_fetch_row($result)) {?>

              <div class="inner-reg-2">
                <h2 style="margin-left: 1%"><?php echo "$report[4]"; ?></h2>
                <button type="button" id="<?php echo "$report[0]"; ?>" style="float: right; margin: 2%;
                background: none;" onclick="highlight(this, <?php echo "$report[0]";?>)">
                  <img src="images/like.png" onload="set(<?php echo "$report[0]";?>)" onunload="set(<?php echo "$report[0]";?>)"
                  style="height: 20px; width: 20px" alt="Like"> </button>
                <small style="margin-left: 1%"><?php echo "$report[2]"; ?></small><br>
                <i style="margin-left: 1%"><?php echo "$report[3]"; ?></i>
                <p style="margin-left: 1%"><?php echo "$report[5]"; ?></p>
              </div>

          <?php } ?>
        </div>

        <script type="text/javascript">
          function highlight(elem, id) {
            if (elem.style.background == 'lightgreen') {
              elem.style.background = 'none';
              window.localStorage.setItem(id, false);
            } else {
              elem.style.background = 'lightgreen';
              window.localStorage.setItem(id, true);
            }
          }
          function set(id) {
            if (window.localStorage.getItem(id)) {
              if (window.localStorage.getItem(id).localeCompare("true") == 0) {
                var elem = document.getElementById(id.toString());
                elem.style.background = 'lightgreen';
              }
            }
            else {
              window.localStorage.setItem(id, false);
            }
          }
        </script>
        <a href="faq.html" style="float: right; margin: 4%">FAQ</a>
    </div>


  </body>
</html>
