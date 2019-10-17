<?php
	session_start();
	if (isset($_GET['maSP'])) {
		$maSP=$_GET['maSP'];
	}
	if (isset($_SESSION['cart'][$maSP])) {
		if($_SESSION['cart'][$maSP]['soluongSP']>1){
			$_SESSION['cart'][$maSP]['soluongSP']-=1;
		}else{
			unset($_SESSION['cart'][$maSP]);
		}
	}
	header('Location: cart.php');
?>