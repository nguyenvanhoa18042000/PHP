<?php 
class connection_mysql{
	var $conn;
	
	function __construct(){
		$servername = "localhost";
		$username = "root";  
		$password = ""; 
		$dbname = "blog";

		$this->conn = new mysqli($servername, $username, $password, $dbname);
		    $this->conn->set_charset("utf8");
		    if ($this->conn->connect_error) {
		    	die("Connection failed: " . $this->conn->connect_error);
		    }
		}
	}
?>