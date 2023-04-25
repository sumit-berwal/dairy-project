<?php
session_start();
echo"<br>";
$email= "";
$pass = "";
echo $_POST['fname'];
include_once'../connection.php';
if(isset($_POST)){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cPass = $_POST['cPassword'];
    $mobile = $_POST['mobile'];

    $hasError = false;
    $message = '';
    if(empty($firstName)){
        $hasError = true;
        $message .= 'Please! enter first name';
    }
    if(empty($lastName)){
        $hasError = true;
        $message .= 'Please! Enter last name';
    }
    if(empty($email)){
        $hasError = true;
        $message .= 'Please! Enter email Id';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $hasError = true;
        $message .= 'Please! Enter a valid email address';
    }
    if(empty($pass)){
        $hasError = true;
        $message .= 'Please! Enter you password';
    }else if(!empty(($pass) && strlen($pass)<=6)){
        $hasError = true;
        $message .= 'Please! Enter minimum six cracter in password';
    }
    if(empty($cPass)){
        $hasError = true;
        $message .= 'Please! Conferm you password';
    }elseif($pass != $cPass){
        $hasError = true;
        $message .= 'Sorry! Your password does not match';
    }
    if(empty($mobile)){
        $hasError = true;
        $message .= 'Please! Enter mobile number';
    }
    if(!$hasError){
        $hasdPass = md5($pass);
        $query = "INSERT INTO d_users(fname,lname,email,pass,mobile) 
        VALUES('$firstName','$lastName','$email','$hasdPass','$mobile')";
        $result = mysqli_query($con, $query);
        // print_r($result);exit;
        $message = $result
        ? 'You have been registerd successfully'
        : 'Sorry! You registeration is falled';

        $hasError = !$result;

    }
    $_SESSION['message']= $message;
    $_SESSION['submitdata'] = $_POST;
    $_SESSION['hasError'] = $_POST;
    header('location: ../authentication/register.php');

}