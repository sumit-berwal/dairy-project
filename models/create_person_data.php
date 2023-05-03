<?php
session_start();
include_once '../connection.php';

if(isset($_POST)){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $enterdBy = $_SESSION['users']['id'];
    
    $message = '';
    $hasError = false;

    if(empty($firstName)){
        $hasError = true;
        $message .= "Please fill the first name. ";
    }
    if(empty($lastName)){
        $hasError = true;
        $message .= "Please fill the last name. ";
    }
    if(empty($email)){
        $hasError = true;
        $message .= "Plese fill the email Id. ";
    }
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $hasError = true;
        $message .= "Please fill the correct email id. ";
    }

    if(empty($mobile)){
        $hasError = true;
        $message .= "Please fill the mobile number. ";
    }
    // print_r( $_SESSION['users']['id']); exit;
    if(!$hasError){
        $message .= "You are successfully add the person. ";
        $sql = "INSERT INTO d_person (firstname, lastname, email, mobile, enterdby)
                VALUES ('$firstName', '$lastName', '$email', '$mobile', '$enterdBy')";
        $result = mysqli_query($con,$sql);
        if(!$result){
            $hasError = true;
            $message .= "You data not stored properly. Please try again. ";
        }
        // echo $_SESSION['users']; exit;
        header('location: ../modules-person-crud/create_person.php');
    }
    if($hasError){
        header('location: ../modules-person-crud/create_person.php');
    }

    echo $message;
    $_SESSION["message"] = $message;

}










?>