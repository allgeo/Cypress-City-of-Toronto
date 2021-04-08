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
    <title>My Reports</title>
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
          <a href="reportsHome.html" style="float: left; margin: 4%">BACK</a>
          <a href="index.html" style="float: right; margin: 4%">LOGOUT</a>
          <br> <br> <br>

          <h1>Reports Ranked from Highest Imporance to Lowest</h1>
          <?php
              $command = "SELECT * FROM `reports` ORDER BY `reports`.`totalR` DESC";
               $result = $conn->query($command);
               $num = mysqli_num_rows($result);
               $sectionLengths = intdiv($num, 3);
               $count = 0;
               while ($report = mysqli_fetch_row($result)) {
                 $count = $count + 1;?>

              <div class="inner-reg-2">
                <h2 style="margin-left: 1%"><?php echo "$report[4]"; ?></h2>
                <?php if ($count <= $sectionLengths) {?>
                  <h3 style="float: right; margin: 2%;">Overall Rating: <mark style="background-color: coral;">BAD</mark> </h3>
                <?php }  elseif ($count > $sectionLengths and $count <= 2*$sectionLengths) {?>
                  <h3 style="float: right; margin: 2%;">Overall Rating: <mark style="background-color: yellow;">MODERATE</mark> </h3>
                <?php } else {?>
                  <h3 style="float: right; margin: 2%;">Overall Rating: <mark style="background-color: lightgreen;">DECENT</mark> </h3>
                <?php } ?>
                <small style="margin-left: 1%"><?php echo "$report[2]"; ?></small><br>
                <i style="margin-left: 1%"><?php echo "$report[3]"; ?></i>
                <p style="margin-left: 1%"><?php echo "$report[5]"; ?></p>
              </div>

          <?php } ?>
        </div>
        <a href="faq.html" style="float: right; margin: 4%">FAQ</a>
    </div>


  </body>
</html>
