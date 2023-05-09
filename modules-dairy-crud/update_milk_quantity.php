<?php
require '../authentication/user_authentication.php';
require '../connection.php';
include_once '../common_files/header.php';

$id = $_GET['Id'];

$query = "select * from d_milk where Id = $id";
$sql = mysqli_query($con, $query);
// print_r($sql);
// $result = mysqli_fetch_assoc($sql);
// print_r($result);
if(mysqli_num_rows($sql)>0){
while($row = mysqli_fetch_assoc($sql)){
    $personName= $row['personId'];
    $morningQty= $row['morningQty'];
    $eveningQty= $row['eveningQty'];
    $purchaseDate= $row['purchaseDate'];
}
}

if(isset($_POST['update'])){
    $personName = $_POST['personId'];
    $morningQty = $_POST['morningQty'];
    $eveningQty = $_POST['eveningQty'];
    $purchaseDate = $_POST['date'];

    $hasError = false;
    $message = '';
    if(empty($morningQty) && empty($eveningQty)){
        $hasError .= true;
        $message .= "Milk quantity don't should be empty! ";
    }
    if(empty($purchaseDate)){
        $hasError .= true;
        $message .= "Purchase date don't should be empty! ";
    }
    if(!$hasError){
        $query = "update d_milk set morningQty = '$morningQty', eveningQty = '$eveningQty', purchaseDate = '$purchaseDate' where Id = $id";
        $sql = mysqli_query($con, $query);
        if($sql){
            $message .= "You have been updated Successfuly. ";
        }else{
            $message .= "Something went wrong! ";
        }
    }
    // echo $message;
}
?>
<div class="main">
    <?php
    if(!empty($message)){
     echo $message;
     } ?>
        <div class="content milk_quantity">
            <h1>Update Milk Quantity</h1>
            <p>Fill this form carefully</p>
            <form action="" method="post">
                <select name="personId" id="personList" >
                    <option value="<?php echo $personName; ?>" desabled selected ><?php echo $personName; ?></option>

                </select><br>
                <input class="box" type="number" name="morningQty" value="<?php echo $morningQty; ?>" placeholder="Morning quantity in Ltr.." ></br>
                <input class="box" type="number" name="eveningQty" value="<?php echo $eveningQty; ?>" placeholder="Evening quantity in Ltr.." ></br>
                <input class="box" type="date" name="date" value="<?php echo $purchaseDate; ?>" ></br>
                <input class="box" type="submit" value="Update" name="update">

            </form>
            <p>Go to milk data <a href="../modules-person-crud/show_milk_quantity.php" >Click here</a></p>
        </div>
    </div>
<?php
include_once '../common_files/footer.php';
?>