	
<?php
include('connection.php');
if(isset($_POST['login'])){
	$user = ($_POST['username']);
	$pass = md5($_POST['password']);

	$sql = mysqli_query($db, "SELECT * FROM admin WHERE username='$user' AND password='$pass'") or die(mysqli_error($db));
	if(mysqli_num_rows($sql) == 0){
		echo '<script language="javascript">alert("id atau password anda salah"); document.location="login.php";</script>';
	}else{
		$row = mysqli_fetch_assoc($sql);
		if($row['level'] == 1){
			$_SESSION['admin']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="admin/index.php";</script>';
		}
	}
}

?>
