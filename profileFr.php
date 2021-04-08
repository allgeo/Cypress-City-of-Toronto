<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);

    json_encode($user_data);

    if(isset($_POST['delete'])){
        $id = $user_data['user_id'];

        $query = "delete from users where user_id='$id'";
        
        mysqli_query($con,$query);

        header("Emplacement: loginFr.php");
        die;
    } 
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
            <a href="" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
            <div>
                <div style="float: right;">
                    <a href="logout.php" style="text-decoration:none; text-align: right; color: red; margin-right: 60px; "> Se Déconnectez</a>
                </div>
                <div style="float: left; margin-left: 60px; margin-top:50px; ">
                    <h1 style="color: #165788; font-style: italic;">Êtes-vous sûr de vouloir supprimez votre profil?</h1>            
                </div>
               
            </div>
        </nav>

        <br><br> <br><br>

        <div class="porfile-content">
            <div style="margin-left: 60px; font-size: 22px; margin-top:51px;" class="porfile-info">
                <form action="" method="post">
                    <div class="profile-submit">
                        <input style="border-radius: 20px; border: 1px solid #165788; width:250px; height: 30px; padding-left: 10px; color: black; font-size: 18px; margin-bottom: 8px; text-align: center;" type="text" name="user_name" value="<?php echo $user_data['user_name'];?>"> <br>
                        <input style="border: none; background-color: red; color:#fff; font-size: 18px;" type="submit" name="delete" value="Delete Profile"> 
                    </div>
                 
                </form>
            </div>
        </div>
    </div>
</body>
</html>
