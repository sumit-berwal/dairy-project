<?php
function personList($con, $keyword){
    $query = "SELECT * FROM d_person WHERE firstname LIKE '%$keyword%' OR email LIKE '%$keyword%' ORDER BY 'firstname', 'email', 'mobile'";
    $sql = mysqli_query($con, $query);
    
    if(mysqli_num_row($sql) > 0){
        $row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    }
    return  $sql;
}


		// $query = mysqli_query($con, "SELECT * FROM `d_person` WHERE `firstname` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' ORDER BY `firstname`, `email`,`mobile`") or die(mysqli_error());'