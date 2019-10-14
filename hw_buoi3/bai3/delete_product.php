<?php
	session_start();
	if (isset($_GET['maSP'])) {
		$maSP=$_GET['maSP'];
	}
	if (isset($_SESSION['cart'][$maSP])) {
		unset($_SESSION['cart'][$maSP]);
	}
	header('Location: cart.php');
?>