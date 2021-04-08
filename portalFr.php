<?php
    session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
    <title>Portail</title>
</head>
<body>
    <div class="inner">
        <nav class="nav">
            <a href="portal.php" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="portal.php" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
            <div>
                <div style="float: left; margin-left: 60px;">
                    <h1 style="color: #165788; font-style: italic;" >Bonjour <?php echo $user_data['user_name'];?>! </h1>            
                </div>
                <div style="float: right;">
                    <a href="logout.php" style="text-decoration:none; text-align: right; color: red; margin-right: 60px; "> Se Déconnectez</a>
                </div>
            </div>
        </nav>

        <br><br> <br>

        <div class="portal-content">
            <p>LIENS RAPIDES >></p>
            <div class="portal-info">
                <a href="reportsHomeFr.html">
                    <button>Signalez un Problèm</button>
                </a> <br>
                <a href="suggestFr.php">
                    <button>Suggérez</button>
                </a> <br>
                <a href="voteFr.html">
                    <button>Votez</button>
                </a> <br>
                <a href="faqFr.html">
                    <button>Questions Fréquentes</button>
                </a> <br>
                <a href="contactusFr.html">
                    <button>Contactez</button>
                </a><br>
                <a href="mailto:?subject=Regardez CYPRESS&body=Signalez les problèmes que vous rencontrez dans votre région avec une extrême précision en utilisant CYPRESS à www.toronto.ca/cypress" {{view_as_page_URL}}>
                    <button>Direz à un Ami</button>
                </a> <br>
                <a href="profileFr.php">
                    <button>Supprimez Votre Profil</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>