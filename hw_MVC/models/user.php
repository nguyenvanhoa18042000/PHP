<?php
	require_once('models/connection_mysql.php');
	class user{
		var $conn_obj;
		function __construct(){
			$this->conn_obj = new connection_mysql();
		}
		function getAll(){
			$query = "SELECT * FROM users";
			$result  = $this->conn_obj->conn->query($query);
			$users = array();
			while ($row = $result->fetch_assoc()) {
				$users[] = $row;
			}
			return $users;
		}
		function create($data){
			$query = "INSERT INTO users (name, email) VALUES ('".$data['name']."','".$data['email']."')";
			$status = $this->conn_obj->conn->query($query);
			return $status;
		}
		function find($id){
			$query = "SELECT * FROM users WHERE id =".$id;
			$result = $this->conn_obj->conn->query($query);
			$data_user = $result->fetch_assoc();
			return $data_user;
		}

		function update($data){
			$query = "UPDATE users SET name='".$data['name']."' , email='".$data['email']."' WHERE id =".$data['id'];
			$status = $this->conn_obj->conn->query($query);
			return $status;
		}

		function delete($id){
			$query = "DELETE FROM users WHERE id=".$id;
			$status = $this->conn_obj->conn->query($query);
			return $status;
		}
	}
?>