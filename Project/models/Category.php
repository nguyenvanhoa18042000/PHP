<?php
	require_once('Connection.php');
	class Category{
		var $connection_obj;
		function __construct(){
			$this->connection_obj = new Connection();
		}

		function getAllCategory(){
			$query = "SELECT * FROM categories";
			$result = $this->connection_obj->conn->query($query);
			$categories = array();
			while ($row = $result->fetch_assoc()) {
			 	$categories[] = $row;
			}
			return $categories; 
		}

		function getAllCategoryOfYourSelf(){
			$query = "SELECT * FROM categories WHERE user_id = ".$_SESSION['user']['id'];
			$result = $this->connection_obj->conn->query($query);
			$categories = array();
			while ($row = $result->fetch_assoc()) {
			 	$categories[] = $row;
			}
			return $categories; 
		}

		function getAllCategoryOfUser(){
			$query = "SELECT * FROM categories WHERE status = 'show' AND user_id != ".$_SESSION['user']['id'];
			$result = $this->connection_obj->conn->query($query);
			$categories = array();
			while ($row = $result->fetch_assoc()) {
			 	$categories[] = $row;
			}
			return $categories; 
		}

		function getAllCategoryNew(){
			$query = "SELECT * FROM categories WHERE status = 'pending' AND user_id != '".$_SESSION['user']['id']."'  ORDER BY id DESC ";
			$result = $this->connection_obj->conn->query($query);
			$categories_new = array();
			while($row = $result->fetch_assoc()) { 
				$categories_new[] = $row;
			}
			return $categories_new;
		}

		function getAllCategoryHidden(){
			$query = "SELECT * FROM categories WHERE status = 'hidden' AND user_id != '".$_SESSION['user']['id']."'  ORDER BY id DESC ";
			$result = $this->connection_obj->conn->query($query);
			$categories_hidden = array();
			while($row = $result->fetch_assoc()) { 
				$categories_hidden[] = $row;
			}
			return $categories_hidden;
		}

		function create($data){
			$user_id = $_SESSION['user']['id'];
			if ($data['parent_id'] == 0) {
				if ($_SESSION['user']['position'] == 'admin') {
					$query = "INSERT INTO categories (name,description,slug,status,user_id) VALUES ('".$data['name']."','".$data['description']."','".$data['slug']."','show','$user_id')";
				}else{
				$query = "INSERT INTO categories (name,description,slug,status,user_id) VALUES ('".$data['name']."','".$data['description']."','".$data['slug']."','pending','$user_id')";
				}
			}else{
				if ($_SESSION['user']['position'] == 'admin') {
					$query = "INSERT INTO categories (name,description,slug,status,parent_id,user_id) VALUES ('".$data['name']."','".$data['description']."','".$data['slug']."','show','".$data['parent_id']."','$user_id')";
				}else{
				$query = "INSERT INTO categories (name,description,slug,status,parent_id,user_id) VALUES ('".$data['name']."','".$data['description']."','".$data['slug']."','pending','".$data['parent_id']."','$user_id')";
				}
			}
			$status = $this->connection_obj->conn->query($query);
			return $status;
		}
		function update($data){
			if ($data['parent_id'] == 0) {
				$query = "UPDATE categories SET name = '".$data['name']."', slug = '".$data['slug']."' , description = '".$data['description']."' , name = '".$data['name']."' , status = 'show' WHERE id = ".$data['id'];
			}else{
				$query = "UPDATE categories SET name = '".$data['name']."', parent_id = '".$data['parent_id']."' , slug = '".$data['slug']."' , description = '".$data['description']."' , name = '".$data['name']."' , status = 'show' WHERE id = ".$data['id'];
			}

			$status = $this->connection_obj->conn->query($query);
			return $status;
		}
		function find($id){
			$query = "SELECT * FROM categories WHERE id = ".$id;
			$result = $this->connection_obj->conn->query($query);
			$category = $result->fetch_assoc();
			return $category;
		}

		function findCategoryBySlug($slug){
			$query = "SELECT * FROM categories WHERE slug = '$slug'";
			$result = $this->connection_obj->conn->query($query);
			$category = $result->fetch_assoc();
			return $category;
		}

		function editStatusCategory($id){
			$query = "SELECT * FROM categories WHERE id = ".$id;
			$result = $this->connection_obj->conn->query($query);
			$category = $result->fetch_assoc();
			if($category['status'] == 'show'){
				$query_update = "UPDATE categories SET status='hidden' WHERE id = ".$id;
			}else{
				$query_update = "UPDATE categories SET status='show' WHERE id = ".$id;
			}
			$status = $this->connection_obj->conn->query($query_update);
			return $status;
		}

		function deleteCategory($id){
			$query = "DELETE FROM categories WHERE id = ".$id;
			$status = $this->connection_obj->conn->query($query);
			return $status;
		}

		function browseCategory($id){
			$query = "UPDATE categories SET status = 'show' WHERE id =".$id;
			$status = $this->connection_obj->conn->query($query);
			return $status;
		}
	}
?>