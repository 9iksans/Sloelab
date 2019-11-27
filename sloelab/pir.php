
<?php

	
include('connection.php');
$pir = $_GET['getpir'];
		mysqli_query($db,"UPDATE kelas SET pir='$pir' where id='1'");


?>