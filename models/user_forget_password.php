<?php
session_start();
require_once '../connection.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if($email){
        $query = "select * from d_users where email = '".$email."'";
        $sql = mysqli_query($con, $query);
        // print_r($sql); 
        
        if(mysqli_num_rows($sql) ==1){
            date_default_timezone_set("Asia/kolkata");
            $expFormat = mktime(
                date("H"), date("i"), date("s"), date("m")+10 ,date("d"), date("Y")
                );
                $expDate = date("Y-m-d H:i:s",$expFormat);
              //  $key = md5(2418*2+$email);
                $addKey = substr(md5(uniqid(rand(),1)),3,10);
              //  $addKey = rand(1,6);
                $key = $addKey;
             // Insert Temp Table
             
              $query = "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
             VALUES ('".$email."', '".$key."', '".$expDate."')";
              $sql = mysqli_query($con, $query);
            //   echo "<pre>";
            //   print_r($sql);
          if($sql){
            echo '<p><a href="http://localhost:10014/project/models/user_reset_password.php?key='.$key.'&email='.$email.'">click here to reset your password </a></p>';
          }  
        }else{
            echo "you email is not exist. ";
        }
    }else{
        echo "email not should be empty! ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="../assets/register_style.css">
</head>
<body>
    <div class="main">
        <div class="contant">
            <h1>Forget Password</h1>
            <p>Fill you registerd email here</p>
            <form action="" method="post" >
                <input class="box" type="eamil" name="email" placeholder="Enter your valid email"></br>
                <input class="box" type="hidden" name="password" placeholder="Enter your correct passsword" ></br>
                <input class="box" type="submit" value="Reset Password" name="submit" >
            </form>
            <p>If you not registered,<a href="../authentication/register.php"> do registeration first</a> </p>
        </div>
    </div>
</body>
</html>