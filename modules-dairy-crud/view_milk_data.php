<?php
require_once '../authentication/user_authentication.php';
require_once '../connection.php';
// require_once '../common_files/functions.php';
include_once '../common_files/header.php'; ?>

<div class="main">
<?php    
$personName = $_GET['fName'];
print_r($personName);
$query = "SELECT * FROM `d_milk` WHERE `enterdby` = {$_SESSION['users']['id']} AND `personId` = '$personName' ";
if(!empty($_POST['startDate']) & !empty($_POST['endDate'])){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $query .= "AND purchaseDate between '$startDate' AND '$endDate' order by purchaseDate";
}

$sql = mysqli_query($con, $query);
print_r($sql);
$row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>

    <form method="post" action=""> 
        <input class="box" type="date" name="startDate" placeholder="Start date"  ></br>
        <input class="box" type="date" name="endDate" placeholder="End date"  ></br>
        <input class="box" type="submit" value="Search" name="search" >
    </form>

        <div class="content">
            <!-- <h1>Milk Quantity</h1> -->
            <!-- <p>You can see your all milk data here</P> -->
            
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
            </tr>
            
            <?php                
        } ?>

        </table>
        <?php    } else{
echo "<h3>Sorry! Nothing found here</h3>";
        } ?>

        </div>
    </div>
