<?php
$id = $_POST['delButton'];
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
    <title>Effacez</title>
  </head>
  <body>
    <div class="inner">
        <nav class="nav">
            <a href="/" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="/" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
        </nav>

        <div class="register-content" style="text-align: center">
          <br>
          <p>Voulez-vous vraiment supprimer votre rapport?</p>
          <form class="" action="deleteReportFr.php" method="post" style="margin: 2%">
            <button type="submit" name="delete" id="delete" value=<?php echo "$id"; ?>>Oui</button>
          </form>
          <form class="" action="myReportsFr.php" method="post" style="margin: 2%">
            <button type="submit" name="back" id="back">Non</button>
          </form>
        </div>
    </div>

  </body>
</html>
