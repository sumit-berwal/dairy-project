<?php
$server = "localhost";
$username= "root";
$password = "root";
// $dbname = "mypractice";

$con = mysqli_connect("$server","$username","$password", 'mypractice');

// mysqli_query($con, "CREATE TABLE IF NOT EXISTS my_team(ID INT, First_Name VARCHAR(255), Last_Name VARCHAR(255), Place_Of_Birth VARCHAR(255), Country VARCHAR(255))");
// print("Table Created ..."."\n");

// //Inserting a records into the my_team table
// mysqli_query($con, "insert into my_team values(1, 'Shikhar', 'Dhawan', 'Delhi', 'India')");
// mysqli_query($con, "insert into my_team values(2, 'Jonathan', 'Trott', 'CapeTown', 'SouthAfrica')");
// mysqli_query($con, "insert into my_team values(3, 'Kumara', 'Sangakkara', 'Matale', 'Srilanka')");
// mysqli_query($con, "insert into my_team values(4, 'Virat', 'Kohli', 'Delhi', 'India')");

// print("Records Inserted ..."."\n");

// //Closing the connection
// mysqli_close($con);

if(!$con){
    echo "Your connection is failed!";
}

// mysqli_close($con);
