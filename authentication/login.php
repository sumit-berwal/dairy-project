<?php
session_start();
function my_alert($message){
    echo "<script>";
    echo  "alert('$message')";
    echo "</script>";
}
if(!empty($_SESSION['message'])){
    $alert = $_SESSION['message'];
    my_alert("$alert");
    unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../assets/register_style.css">
</head>
<body>
    <div class="main">
        <div class="contant">
            <h1>Login Form</h1>
            <p>Fill Your Login Details!</p>
            <form action="../models/user_login.php" method="post" >
                <input class="box" type="eamil" name="email" placeholder="Enter your valid email"></br>
                <input class="box" id="showPassword" type="password" name="password" placeholder="Enter your correct passsword" ></br>
                <input type="checkbox" id ="showButton" >Show Password</br>
                <input class="box" type="submit" value="Submit" name="submit" >
            </form>
            <p>If you not registered,<a href="../authentication/register.php"> do registeration first</a> </p>
            <p>Forget Password,<a href="../models/user_forget_password.php">Click here</a> </p>
        </div>
    </div>
    <script src="../assets/main.js"></script>
</body>
</html>