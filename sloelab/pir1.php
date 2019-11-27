
<?php

	
include('connection.php');


	$query = mysqli_query($db, "SELECT * FROM kelas WHERE id='1'") or die(mysql_error());
	$data = mysqli_fetch_assoc($query);

	if(mysqli_num_rows($query) == 0){
		echo '<script>window.history.back()</script>';
	}else{
		
			$update = mysqli_query($db,"UPDATE kelas SET pir='1' WHERE id='1'") or die(mysqli_error($db));	
		}

	






?>