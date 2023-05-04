<?php

require '../authentication/user_authentication.php';
require '../connection.php';
include_once '../common_files/header.php'; ?>

<div class="main">
    <?php

    $id = $_GET['Id'];
    $query = "select firstname, lastname, email, mobile from d_person where id = $id";
    $sql = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($sql);
    $fname = $result['firstname'];
    $lname = $result['lastname'];
    $email = $result['email'];
    $mobile = $result['mobile'];
    


    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $id = $_GET['Id'];
        $query = "update d_person set firstname = '$fname', lastname = '$lname', email = '$email', mobile = '$mobile' where id = $id";
        $sql = mysqli_query($con, $query);
        if($sql){
            echo "<h3>You have been updated successfuly</h3>";
        }else{
            echo "<h3>You have don't updated this person</h3>";
        }

    }
    ?>
        <div class="content">
            <h1>Edit Person</h1>
            <p>Fill this form carefully</p>
            <form action="" method="post">
                <input class="box" type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Your first name" ></br>
                <input class="box" type="text" name="lname" value="<?php echo $lname; ?>" placeholder="Your last name" ></br>
                <input class="box" type="email" name="email" value="<?php echo $email; ?>" placeholder="Your email id" ></br>
                <input class="box" type="number" name="mobile" value="<?php echo $mobile; ?>" placeholder="Your mobile number" ></br>
                <input class="box" type="submit" value="Update" name="submit">

            </form>
            <p>Go to person list <a href="./list_person.php" >Click here</a></p>
        </div>
    </div>








<?php
include_once '../common_files/footer.php';

?>