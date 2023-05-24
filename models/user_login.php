<?php
// print_r($_POST); exit;
session_start();
include_once '../connection.php';
$email = "";
$pass = "";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // echo $email;
    // echo $pass; exit;

    $message = "";
    $hasError = false;

    if(empty($email)){
        $hasError .= true;
        $message .= "Please! Fill the email address";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $hasError .= true;
        $message .= "Please! Enter valid email address";
    }
    if(empty($pass)){
        $hasError .= true;
        $message .= "Please! Enter your password";
    }
    if(!$hasError){
        $hasedPass = md5($pass);
         $query = "SELECT * FROM mypractice.d_users WHERE email= '$email' AND pass='$hasedPass'";
        //  echo $query; exit;
        // $query = "SELECT email, pass FROM d_users";
        $result = mysqli_query($con, $query);
        echo"<pre>";
        print_r($result);

        // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // echo"<pre>";
        // print_r($row); exit;
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            echo"<pre>";
            // print_r($row); exit;
            $message .= "Congratulation! You are successfully logged in";
            unset($row['pass']);
            $_SESSION['users'] = $row;
        }else{
            $hasError .= true;
            $message .= "Your id and password does not match";
        }

        // $_SESSION['message'] = $message;
        // header('location: ../deshboard.php');
    }
    $_SESSION['message'] = $message;
    if($hasError){
        $_SESSION['users'] = $row;
        // echo"<pre>";
        // print_r($row);
        header('location: ../authentication/user_authentication.php'); 
    }
    if($hasError){
        $_SESSION['submitdata']= $_POST;
        $_SESSION['hasError']= $hasError;
        header('location: ../authentication/login.php');
    }else{
        header('location: ../dashboard.php');
    }

    

}




?>

