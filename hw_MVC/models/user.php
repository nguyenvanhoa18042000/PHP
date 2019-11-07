<?php
	require_once('models/connection_mysql.php');
	class user{
		var $conn_obj;
		function __construct(){
			$this->conn_obj = new connection_mysql();
		}
		function getListUser(){
			$query = "SELECT * FROM users";
			$result  = $this->conn_obj->conn->query($query);
			$users = array();
			while ($row = $result->fetch_assoc()) {
				$users[] = $row;
			}
			return $users;
		}
		function detailUser($id){
			$query = "SELECT * FROM users WHERE id =".$id;
			$result = $this->conn_obj->conn->query($query);
			$data_user = $result->fetch_assoc();
			return $data_user;
		}
	}
?>