<?php
	require_once('models/connection_mysql.php');
	class category{
		var $conn_obj;

		function __construct(){
			$this->conn_obj = new connection_mysql();
		}
		function getListCategory(){
			$query = "SELECT * FROM categories";
			$result = $this->conn_obj->conn->query($query);
			$categories = array();
			while ($row = $result->fetch_assoc()) {
			 	$categories[] = $row;
			}
			return $categories; 
		}
	}
?>