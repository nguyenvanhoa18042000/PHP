<?php
	require_once('data.php');
	session_start();
	if (isset($_GET['maSP'])) {
		$maSP=$_GET['maSP'];
	}
	if (isset($_SESSION['cart'][$maSP])) {
		$_SESSION['cart'][$maSP]['soluongSP']+=1;
	}else{
		$product=$products[$maSP];

		$product['soluongSP']=1;

		$_SESSION['cart'][$maSP]=$product;
	}
	setcookie('msg','Đã thêm vào giỏ hàng',time()+2);
	header('Location: cart.php')
?>