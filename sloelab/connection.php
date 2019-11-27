<?php
session_start();

$db = mysqli_connect("localhost", "root", "");
mysqli_select_db($db, "sloelab");
?>