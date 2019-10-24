<?php
	$servername = "localhost";
	$username = "root";  
	$password = "";
	$dbname = "blog";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8");
?>