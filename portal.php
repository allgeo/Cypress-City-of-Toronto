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
    <title>Portal </title>
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
                    <h1 style="color: #165788; font-style: italic;" >Hello <?php echo $user_data['user_name'];?>! </h1>            
                </div>
                <div style="float: right;">
                    <a href="logout.php" style="text-decoration:none; text-align: right; color: red; margin-right: 60px; "> logout</a>
                </div>
            </div>
        </nav>

        <br><br> <br>

        <div class="portal-content">
            <p>QUICK LINKS >></p>
            <div class="portal-info">
                <a href="reportsHome.html">
                    <button>Report a Problem</button>
                </a> <br>
                <a href="suggest.php">
                    <button>Suggest</button>
                </a> <br>
                <a href="vote.html">
                    <button>Vote</button>
                </a> <br>
                <a href="faq.html">
                    <button>FAQ</button>
                </a> <br>
                <a href="contactus.html">
                    <button>Contact Us</button>
                </a><br>
                <a href="mailto:?subject=Check out CYPRESS&body=Report problems you in your area with pinpoint accuracy using CYPRESS at www.toronto.ca/cypress" {{view_as_page_URL}}>
                    <button>Tell a Friend</button>
                </a> <br>
                <a href="profile.php">
                    <button>Delete Profile</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
