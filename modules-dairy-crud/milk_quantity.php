<?php
require '../authentication/user_authentication.php';
require '../connection.php';
include_once '../common_files/header.php'; ?>

<div class="main">
    
        <div class="content">
            <h1>Add Milk Quentity</h1>
            <p>Fill this form carefully</p>
            <form action="" method="post">
                <input class="box" type="text" name="fname" value="" placeholder="Chose person" ></br>
                <input class="box" type="text" name="lname" value="" placeholder="Your last name" ></br>
                <input class="box" type="email" name="email" value="" placeholder="Your email id" ></br>
                <input class="box" type="number" name="mobile" value="" placeholder="Your mobile number" ></br>
                <input class="box" type="submit" value="Submit" name="submit">

            </form>
            <p>Go to person list <a href="./list_person.php" >Click here</a></p>
        </div>
    </div>









<?php
include_once '../common_files/header.php';
?>







