<!-- <div>
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
?> -->