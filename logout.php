<?php
ob_start();
session_start();
if(isset($_SESSION['id_khachhang'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}

if(isset($_SESSION['id_khachhang'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}


?>

