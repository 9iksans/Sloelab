<?php
include('connection.php');

$id=$_GET['id'];
$query = mysqli_query($db, "SELECT * FROM kelas where id=$id" );
				
				while($data = mysqli_fetch_assoc($query)){
							      
							  echo $data['status'];
							  }
							


?>
