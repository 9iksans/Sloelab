
<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
//if(isset($_POST['simpan']) && isset($_SESSION['admin'])){

	
include('../connection.php');


if(!isset($_SESSION['admin'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="../../login.php";</script>';
}else {

	$id = $_GET['id'];
	$cek = mysqli_query($koneksi, "SELECT id, status FROM kelas WHERE id='$id'") or die(mysqli_error($koneksi));

	$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='$id'") or die(mysql_error());
	$data = mysqli_fetch_assoc($query);

	if(mysqli_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	}else{
		
		if ($data['status'] == '1'){
			$update = mysqli_query($koneksi,"UPDATE kelas SET status='0' WHERE id='$id'") or die(mysqli_error($koneksi));	
		}else {
			$update = mysqli_query($koneksi,"UPDATE kelas SET status='1' WHERE id='$id'") or die(mysqli_error($koneksi));	
		}




header("location:../index.php");

}
}
?>