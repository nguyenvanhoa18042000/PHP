<?php
	require_once('products.php');
	session_start();
	if (isset($_GET['maSP'])) {
		$maSP=$_GET['maSP'];
	}
	if (isset($_SESSION['cart'][$maSP])) {
		$_SESSION['cart'][$maSP]['soluongSP']+=1;
		$_SESSION['cart'][$maSP]['add_time']=time();
	}else{
		$product=$products[$maSP];

		$product['soluongSP']=1;

		$_SESSION['cart'][$maSP]=$product;
		$_SESSION['cart'][$maSP]['add_time']=time();
	}
	setcookie('msg','Đã thêm vào giỏ hàng',time()+2);
	header('Location: list.php');
?>