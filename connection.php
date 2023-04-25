<?php
$server = "localhost";
$username= "root";
$password = "root";
// $dbname = "mypractice";

$con = mysqli_connect("$server","$username","$password", 'mypractice');

if(!$con){
    echo "Sorry! Connection not successful";
}


