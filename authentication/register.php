<?php
session_start();
// echo $_SESSION['message'];
// unset($_SESSION['message']);
if(!empty($_SESSION['message'])){
echo  $_SESSION['message'];
unset($_SESSION['message']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Form</title>
    <link rel="stylesheet" type="text/css" href="../assets/register_style.css">
</head>
<body>
    <div class="main">
        <div class="content">
            <h1>Registeration Form</h1>
            <p>Fill this form carefully</P>
            <form action="../models/user_register.php" method="post">
                <input class="box" type="text" name="fname" placeholder="Your first name" ></br>
                <input class="box" type="text" name="lname" placeholder="Your last name" ></br>
                <input class="box" type="email" name="email" placeholder="Your email id" ></br>
                <input class="box" type="password" name="password" placeholder="Your password" ></br>
                <input class="box" type="conform password" name="cPassword" placeholder="Conform your password" ></br>
                <input class="box" type="number" name="mobile" placeholder="Your mobile number" ></br>
                <input class="box" type="submit" value="Submit" name="submit">

            </form>
            <p>If you already registerd, go to <a href="../authentication/login.php" > login page</a></p>
        </div>
    </div>
    
</body>
</html>