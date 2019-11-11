<?php
	require_once('connection_mysql.php');
	class post{
		var $conn_obj;
		function __construct(){
			$this->conn_obj = new connection_mysql();
		}
		function getListPost(){
			$query = "SELECT * FROM posts";
			$result = $this->conn_obj->conn->query($query);
			$posts = array();
			while($row = $result->fetch_assoc()) { 
				$posts[] = $row;
			}
			return $posts;
		}


		function getNameCategory(){
			$query_join= 
			"SELECT p.category_id,c.name
			FROM posts p
			
			JOIN categories c ON p.category_id=c.id
			";

			$result_join= $this->conn_obj->conn->query($query_join);
			$name_categories= array();
			while($row = $result_join->fetch_assoc()) { 
				$name_categories[] = $row;
			}
			return $name_categories;
		}
	}
?>