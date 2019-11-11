<?php
	require_once('models/connection_mysql.php');
	class category{
		var $conn_obj;

		function __construct(){
			$this->conn_obj = new connection_mysql();
		}
		function getAll(){
			$query = "SELECT * FROM categories";
			$result = $this->conn_obj->conn->query($query);
			$categories = array();
			while ($row = $result->fetch_assoc()) {
			 	$categories[] = $row;
			}
			return $categories; 
		}
		function create($data){
			$query = "INSERT INTO categories (name, slug,description,parent_id) VALUES ('".$data['name']."','".$data['slug']."','".$data['description']."','".$data['parent_id']."')";
			$status = $this->conn_obj->conn->query($query);
			return $status;
		}
		function find($id){
			$query = "SELECT * FROM categories WHERE id = ".$id;
			$category = $this->conn_obj->conn->query($query)->fetch_assoc();
			return $category;
		}
		function update($data){
			$query = "UPDATE categories SET name='".$data['name']."', slug='".$data['slug']."' , description='".$data['description']."',parent_id='".$data['parent_id']."' WHERE  id =".$data['id'];
			$status = $this->conn_obj->conn->query($query);
			return $status;
		}
		function delete($id){
			$query = "DELETE FROM categories WHERE id =".$id;
			$status = $this->conn_obj->conn->query($query);
			return $status;
		}
	}

?>