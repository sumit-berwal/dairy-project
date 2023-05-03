<?php
include_once '../authentication/user_authentication.php';
include_once '../connection.php';
include_once '../common_files/header.php'; ?>

<div class="main">
<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
?>
<div>
	<h2>Result</h2>
	<hr style="border-top:2px dotted #ccc;"/>
	<?php
		// require 'conn.php';
		$query = mysqli_query($con, "SELECT * FROM `d_person` WHERE `firstname` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `mobile` LIKE '%$keyword%' ORDER BY `firstname`, `email`,`mobile`") or die(mysqli_error());
        // print_r($query);
        // $var = mysqli_fetch_array($query);
        // echo"<pre>";
        // print_r($var); exit;
		while($fetch = mysqli_fetch_assoc($query)){
	?>
	<div style="word-wrap:break-word;">
		<a href="list_person.php?id=<?php echo $fetch['id']?>"><h4><?php echo $fetch['firstname']?></h4></a>
		<p><?php echo substr($fetch['email'], 0, 100)?>...</p>
        <p><?php echo substr($fetch['mobile'], 0, 100)?>...</p>
	</div>
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>
<form method="post" action="">
<input class="box" type="text" name="keyword" placeholder="Enter your correct keyword" required ></br>
                <input class="box" type="submit" value="Search" name="search" >
</form>

        <div class="content">
            <h1>All Customers</h1>
            <p>You find your all customers list here</P>
            <?php
            $sql = "SELECT id, firstname, lastname, email, mobile, enterdby, reg_date FROM d_person ";

            $result = Mysqli_query($con, $sql);
            // echo"<pre>";
            // print_r($result);
            // echo "<br>";
            // $final = mysqli_fetch_all($result);
            echo "<pre>";
            // print_r($final);
            // echo count($final);
            // foreach($final as $row => $value){
            //     echo $value['id']."<br>";
            // }
            // print_r($final);  ?>
     <table id="customers">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email ID</th>
            <th>Mobile</th>
            <th>Enterd By</th>
            <th>Reg. Date</th>
            <th>Action</th>
        </tr>
            <?php   while($row = mysqli_fetch_assoc($result)){ ?>
            <tr> <td> <?php echo $row["id"]; ?></td>
                <td> <?php echo $row["firstname"]; ?> </td>
                <td> <?php echo $row["lastname"]; ?> </td>
                <td> <?php echo $row["email"]; ?> </td>
                <td> <?php echo $row["mobile"]; ?> </td>
                <td> <?php echo $row["enterdby"]; ?> </td>
                <td> <?php echo $row["reg_date"]; ?> </td> </tr>
                
            <?php   } ?>

        </table>
        </div>
    </div>
<?php
include_once '../common_files/footer.php';
?>

