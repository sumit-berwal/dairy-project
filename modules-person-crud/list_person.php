<?php
include_once '../authentication/user_authentication.php';
include_once '../connection.php';
include_once '../common_files/header.php';
// include_once '../common_files/functions.php'; ?>

<div class="main">
<?php

    $data= [];
	if(!empty($_POST['search'])){
        $data = $_POST;
		$keyword = $data['keyword'];
    }
    $query = "SELECT * FROM `d_person` WHERE `enterdby` = {$_SESSION['users']['id']}";
    $new = '';
    if(!empty($keyword)){ 
      $new .=  " AND (`firstname` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%')";
     }
    $query .= $new ;
    $sql = mysqli_query($con, $query);
    $row = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    // print_r($row);

?>

    <form method="post" action="">
        <input class="box" type="text" name="keyword" placeholder="Enter your correct keyword"  ></br>
        <input class="box" type="submit" value="Search" name="search" >
    </form>

        <div class="content">
            <h1>All Customers</h1>
            <p>You find your all customers list here</P>
    <?php
            if(!empty($row)){ ?>
     <table id="customers">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email ID</th>
            <th>Mobile</th>
            <th>Enterd By</th>
            <th>Reg. Date</th>
            <th colspan = "2">Action</th>
        </tr>
            <?php   foreach($row as $key=>$value){ ?>
            <tr> 
                <td> <?php echo $value["id"]; ?></td>
                <td> <?php echo $value["firstname"]; ?> </td>
                <td> <?php echo $value["lastname"]; ?> </td>
                <td> <?php echo $value["email"]; ?> </td>
                <td> <?php echo $value["mobile"]; ?> </td>
                <td> <?php echo $value["enterdby"]; ?> </td>
                <td> <?php echo $value["reg_date"]; ?> </td> 
                <td> <a href="./edit_person.php?Id=<?php echo $value['id']; ?>">Edit</a> </td> 
                <td> <a href="./delete_person.php?Id=<?php echo $value['id']; ?>">Delete</a> </td> 
            </tr>
            
            <?php  } ?>

        </table>
        <?php    } else{
echo "<h3>Sorry! Nothing found here</h3>";
        } ?>

        </div>
    </div>
<?php
    include_once '../common_files/footer.php';
?>

