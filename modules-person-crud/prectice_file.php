<?php
include_once '../connection.php';

$query = "select d_person.id, d_person.firstname, d_person.lastname, d_person.email, d_person.mobile, d_users.fname from d_person inner join d_users where d_users.id = 9";
$sql = mysqli_query($con, $query);
$row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
echo "<pre>";
print_r($row);













