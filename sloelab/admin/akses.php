<?php

if(!isset($_SESSION['admin'])){
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="../login.php";</script>';
}

$timeout = 10; // Set timeout menit
$logout_redirect_url = "index.php"; // Set logout URL
 
$timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
    }
}
$_SESSION['start_time'] = time();
?>