<?php

require '../authentication/user_authentication.php';
include_once '../common_files/header.php'; ?>

<div class="main">
    <?php if(!empty($_SESSION["message"])){ 
    echo $_SESSION["message"];
    unset($_SESSION["message"]);
    }  ?>
           <div class="content">
            <h1>Add New Person</h1>
            <p>Fill this form carefully</P>
            <form action="../models/create_person_data.php" method="post">
                <input class="box" type="text" spellcheck="true" name="fname" placeholder="Your first name" ></br>
                <input class="box" type="text" spellcheck="true" name="lname" placeholder="Your last name" ></br>
                <input class="box" type="email" name="email" placeholder="Your email id" ></br>
                <input class="box" type="number" name="mobile" placeholder="Your mobile number" ></br>
                <input class="box" type="submit" value="Submit" name="submit">

            </form>
            <p>If you already add, go to <a href="./list_person.php" >Person List</a></p>
        </div>
    </div>








<?php
include_once '../common_files/footer.php';

?>