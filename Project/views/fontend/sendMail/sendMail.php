<?php
	require_once('handlesendmaill.php');
	ob_start();
	require_once('templateMail.php');
	$message=ob_get_clean();
	send_email('nguyenvanzed18042000@gmail.com','Hòa',$message,$subject);
?>