<?php
require_once '../authentication/user_authentication.php';
require_once '../connection.php';
$id = $_GET['Id'];

$query = "delete from d_milk where Id = $id";
$sql = mysqli_query($con, $query);
header('location: ../modules-person-crud/show_milk_quantity.php');