<?php
require_once '../connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="../assets/register_style.css">
</head>
<body>
    <div class="main">

    <?php
        if(isset($_GET['key']) && isset($_GET['email'])){
        $key = $_GET['key'];
        $email = $_GET['email'];
        date_default_timezone_set("Asia/kolkata");
        $curDate = date("Y-m-d H:i:s");
        $query = "select * from `password_reset_temp` where `key`= '$key' and `email` ='$email' and `expDate`>= '$curDate'";
        $sql = mysqli_query($con, $query);
        if(!mysqli_num_rows($sql)==1){
            echo  "Invalid Link";
        }else{
            $row = mysqli_fetch_assoc($sql);
            $expDate = $row['expDate'];
            if($expDate >= $curDate){ 
                if(isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['email'])){
                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];
                    $email = $_POST['email'];
                    if(!empty(($pass1) && strlen($pass1)<=6)){
                        
                        echo 'Please! Enter minimum six cracter in password';
                    }
                    if($pass1 != $pass2){
                        echo "Your password should be same";
                    }else{
                        $hasPass = md5($pass1);
                        $query = "UPDATE d_users SET pass='$hasPass' WHERE email='$email'";
                        $sql = mysqli_query($con, $query);
                        // print_r($sql);
                        if($sql){
                    
                    $query = "delete from password_reset_temp where email = '$email'";
                    $sql = mysqli_query($con, $query);
                    if($sql){
                        echo "Your password is successfully reset";
                    }
                }
            }
        } ?>
        <div class="contant">
            <h1>Enter new password</h1>
            <p>Fill you password carfully</p>
            <form action="" method="post" >
                <input class="box" type="password" name="pass1" placeholder=" Enter you new password"></br>
                <input class="box" type="password" name="pass2" placeholder=" Re-enter you new password" ></br>
                <input style="display:none;" class="box" type="email" name="email" placeholder="" value=" <?php echo $email;?>" ></br>
                <input class="box" type="submit" value="Reset Password" name="submit" >
            </form>
            <p>Go to login page<a href="../authentication/login.php"> click here </a> </p>
        </div>
<?php
            }else{
                echo "Link time is expired";
            }
        }
        }


    ?>
       
    </div>
</body>
</html>