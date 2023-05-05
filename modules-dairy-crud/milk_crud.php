<?php
require_once '../authentication/user_authentication.php';
require_once '../connection.php';

if(isset($_POST['submit'])){
    // print_r($_POST);
    $personId = $_POST['personId'];
    $morningQty = $_POST['morningQty'];
    $eveningQty = $_POST['eveningQty'];
    $purchaseDate = $_POST['date'];
    $enterdBy = $_SESSION['users']['id'];

    $hasError = false;
    $message = '';
    if(empty($personId)){
        $hasError .= true;
        $message .= "Please, chose the person name. ";
    }
    if(empty($morningQty) && empty($eveningQty)){
        $hasError .= true;
        $message .= "Please, add milk quantity. ";
    }
    if(!$hasError){
        $query = "insert into d_milk(personId, morningQty, eveningQty, purchaseDate, enterdBy)
                    value('$personId', '$morningQty', '$eveningQty', '$purchaseDate', '$enterdBy')";
        $sql = mysqli_query($con, $query);
        if($sql){
            $message .= "It's done! successfuly. ";
            
        }else{
            $message .= "You failed ! ";
        }
    }
    // echo $message;
    $_SESSION['hasError'] = $hasError;
    $_SESSION["message"] = $message;
    // echo $_SESSION["message"]; exit;
    header('location: ./milk_quantity.php');
}




?>