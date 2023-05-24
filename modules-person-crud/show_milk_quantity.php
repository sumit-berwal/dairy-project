<?php
require_once '../authentication/user_authentication.php';
require_once '../connection.php';
require_once '../common_files/functions.php';
include_once '../common_files/header.php'; ?>

<div class="main">
<?php    
$row = showmilkData($con);
// echo"<pre>";
// print_r($row);
 ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
        <input class="box" type="text" name="keyword" placeholder="Search by name only.."  ></br>
        <input class="box" type="submit" value="Search" name="search" >
    </form>

        <div class="content">
            <h1>Milk Quantity</h1>
            <p>You can see your all milk data here</P>
            
    <?php
    if(!empty($row)){ ?>
     <table id="customers">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>MorningQty</th>
            <th>EveningQty</th>
            <th>Enterd By</th>
            <th>Purchase Data</th>
            <th>Reg. Date</th>
            <th colspan = "3">Action</th>
        </tr>
            <?php   foreach($row as $key=>$value){ ?>
            <tr> 
                <td> <?php echo $value["id"]; ?></td>
                <td> <?php echo $value["personId"]; ?> </td>
                <td> <?php echo $value["morningQty"]; ?> Ltr. </td>
                <td> <?php echo $value["eveningQty"]; ?> Ltr. </td>
                <td> <?php echo $value["enterdBy"]; ?> </td>
                <td> <?php echo $value["purchaseDate"]; ?> </td>
                <td> <?php echo $value["reg_date"]; ?> </td> 
                <td> <a href="../modules-dairy-crud/update_milk_quantity.php?Id=<?php echo $value['id']; ?>">Edit</a> </td> 
                <td> <a href="../modules-dairy-crud/view_milk_data.php?fName=<?php echo $value["personId"]; ?>">View</a> </td>
                <td> <a onclick="return myPopup()" href="../modules-dairy-crud/delete_milk_quantity.php?Id=<?php echo $value['id']; ?>">Delete</a> </td> 
            </tr>
            
            <?php   
            // print_r($value['personId']);             
        } ?>
            <tr> 
                <td> <?php echo "sumit" ?></td>
                <td> <?php echo "Total =" ?> </td>
                <td> <?php echo "sumit" ?> Ltr. </td>
                <td> <?php echo "sumit" ?> Ltr. </td>
                <td> <?php echo "sumit" ?> </td>
                <td> <?php echo "sumit" ?> </td>
                <td> <?php echo "sumit" ?> </td> 
            </tr>

        </table>
        <?php    } else{
echo "<h3>Sorry! Nothing found here</h3>";
        } ?>

        </div>
    </div>











<?php
include_once '../common_files/footer.php';
?>