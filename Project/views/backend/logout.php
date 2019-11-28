<?php
	$_SESSION['user'] = null;
	unset($_SESSION['user']);
	header('Location: ?mod=blogger&act=login');
	exit();
?>