<?php
session_start();
$module_name = '';
if(empty($_SESSION['users']['id'])){
    header('location: ./authentication/login.php');
}
// echo"this is the user_authentication";



?>
