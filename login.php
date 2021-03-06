<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password)) {
            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con,$query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password) {

                        $_SESSION['user_id'] = $user_data['user_id'];

                        header("Location: portal.php");
                        die;
                    }
                }
            }

            echo "Wrong username or password!";
        }else {
            echo "Please enter valid info";
        }
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
    <title>login</title>
</head>
<body>
    <div class="inner">
        <nav class="nav">
            <a href="index.php" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="index.php" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
        </nav>
        <div class="log-content">
            <p>You are currenlty at the Cypress Login Page. By logging into this system,<br> 
                you will be able to report a variety of problems as you have witnessed on <br> 
                the streets of Toronto. 
            </p>
            <div class="log">
                <form action="" method="post">
                    <div class="log-username">
                        <label for="username">Username:</label> 
                        <input type="text" name="user_name"> @cypress.on.ca
                    </div>
                    
                    <div class="log-password">
                        <label for="pass">Password :</label>
                        <input type="password" name="password">
                    </div>
                    
                    <div class="log-submit">
                        <input type="submit" value="Login">
                        <br>
                        <button style="margin-left: 94px; background-color: #165788; font-size: 18px; border-radius: 20px; 
                        border: 1px solid #165788; width: 250px; height: 30px;">
                            <a style="text-decoration:none; color: white;" href="register.php">Register here!</a> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>