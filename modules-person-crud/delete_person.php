<?php
require '../authentication/user_authentication.php';
require '../connection.php';

 $ID = $_GET['Id'];

$query = "delete from d_person where id = $ID ";

$sql = mysqli_query($con, $query);

if($sql){
    header('location: ./list_person.php');
}else{
    echo "Sorry ! There is somthing went wrong";
}



?>