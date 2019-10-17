<?php
	session_start();
	if (isset($_GET['file'])&&isset($_GET['ordinal'])) {
		$file=$_GET['file'];
		$ordinal=$_GET['ordinal'];
		$link='uploads/'.$file;
		unlink($link);
		unset($_SESSION['document'][$ordinal]);
	}
	header('Location: list_uploaded.php');
?>