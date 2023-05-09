<?php
require '../authentication/user_authentication.php';
require '../connection.php';
include_once '../common_files/header.php';
require_once '../common_files/functions.php';
$row = getpersonId($con);
// print_r()
?>
<div class="main">
   <?php if(!empty($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
   } 
  ?>
         <div class="content milk_quantity">
            <h1>Add Milk Quantity</h1>
            <p>Fill this form carefully</p>
            <form action="./milk_crud.php" method="post">
                <select name="personId" id="personList" >
                    <option value="" desabled selected hidden >Chose the name of customer..</option>
                    <?php foreach($row as $key=>$value){  ?>
                    <option value="<?php echo $value['firstname']." (" .$value['lastname'].")"; ?>"><?php echo $value['firstname']." (" .$value['lastname'].")";  ?></option>
                <?php } ?>
                </select><br>
                <input class="box" type="number" name="morningQty" value="" placeholder="Morning quantity in Kg.." ></br>
                <input class="box" type="number" name="eveningQty" value="" placeholder="Evening quantity in Kg.." ></br>
                <input class="box" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" ></br>
                <input class="box" type="submit" value="Submit" name="submit">

            </form>
            <p>Go to person list <a href="./list_person.php" >Click here</a></p>
        </div>
    </div>
<?php
include_once '../common_files/footer.php';
?>







