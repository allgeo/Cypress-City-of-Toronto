<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($name) && !empty($address) && !empty($number) && !empty($user_name) && !empty($password)) {
            //save to database
            $user_id = random_num(20); 
            $query = "insert into users (user_id, name, address, number, user_name, password) values ('$user_id', '$name', '$address', '$number' , '$user_name', '$password')";

            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        } 
        else {
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
    <title>Registration</title>
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
        </nav>
        <div class="reg-content">
                <p>Register Here!</p>
            <div class="reg-info">

                <form action="" method="post">
                    <div class="reg-name">
                        <label for="name">First Name:</label> 
                        <input type="text"  name="name"> 
                    </div>

                    <div class="reg-address">
                        <label for="address">Address:</label> 
                        <input type="text" name="address">    
                    </div>

                    <div class="reg-phonenumber">
                        <label for="phoneNumber">Phone Number:</label> 
                        <input type="text" name="number">
                    </div>

                    <div class="reg-username">
                        <label for="username">Username:</label>
                            <input type="text" name="user_name" > @cypress.on.ca 
                    </div>
                    
                    <div class="reg-password">
                        <label for="password">Password :</label>
                        <input type="password" name="password" >
                    </div>
                
                    <div class="reg-submit">
                        <input type="submit" value="Register">
                        <br>
                        <button style="margin-left: 94px; background-color: #165788; font-size: 18px; border-radius: 20px; 
                        border: 1px solid #165788; width: 250px; height: 30px;">
                            <a style="text-decoration:none; color: white;" href="login.php">Login here!</a> 
                        </button>
                    </div>
                </form>
               
               
            </div>
        </div>
    </div>
</body>
</html>