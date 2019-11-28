<?php
	require_once('Connection.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	class User{
		var $connection_obj;
		function __construct(){
			$this->connection_obj = new Connection();
		}
		function checkLogin($user_name,$password){
			$query = "SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password' ";
			$status = $this->connection_obj->conn->query($query);

			$time_login = date('Y-m-d H:i:s');
			
			$user = $status->fetch_assoc();
			if ($user['status'] != 'block') {
				$query_update = "UPDATE users SET time_login ='$time_login' WHERE user_name ='$user_name' ";
			}
			if (isset($user['id'])) {
				$this->connection_obj->conn->query($query_update);
				return $user;
			}else{
				return false;
			}
		}

		function checkLogout(){
			$time_logout = date('Y-m-d H:i:s');
			$user_currently_logged = $_SESSION['user']['user_name'];

			$query_update_time_logout = "UPDATE users SET time_logout ='$time_logout' WHERE user_name = '$user_currently_logged' ";
			$this->connection_obj->conn->query($query_update_time_logout);
			
			$_SESSION['user'] = null;
			unset($_SESSION['user']);
			$_SESSION['flag'] = false;
			header('Location: ?mod=home&act=index');
			exit();
		}

		function getAllUser(){
			$query = "SELECT * FROM users";
			$result = $this->connection_obj->conn->query($query);
			$users = array();
			while ($row = $result->fetch_assoc()) {
				$users[] = $row;
			}
			return $users;
		}

		function create($data_add){
			$time_created = date('Y-m-d H:i:s');
			$user_name = $data_add['user_name'];
			$email = $data_add['email'];
			$data_add['created_at']=$time_created;
			$data_add['password']=md5($data_add['password']);

			$query_check_exists_username = "SELECT user_name FROM users WHERE user_name='$user_name'";
			$query_check_exists_email = "SELECT email FROM users WHERE email='$email'";

			$check_exists_username = $this->connection_obj->conn->query($query_check_exists_username)->num_rows;
			$check_exists_email = $this->connection_obj->conn->query($query_check_exists_email)->num_rows;

			if ($check_exists_username > 0) {
				return 0;
			}else if ($check_exists_email > 0) {
				return 1;
			}else{
				$query = "INSERT INTO users (name, email,user_name,password,avatar,position,status,created_at) VALUES ('".$data_add['name']."','".$data_add['email']."','".$data_add['user_name']."','".$data_add['password']."','avatar_default.png','blogger','active', '".$data_add['created_at']."')";
				$status = $this->connection_obj->conn->query($query);
				return 2;
			}
		}

		function findUserAdmin(){
			$query = "SELECT * FROM users WHERE position = 'admin'";
			$result = $this->connection_obj->conn->query($query);
			$admin = $result->fetch_assoc();
			return $admin;
		}

		function editAvatar($data){
			$data['avatar']='';

			if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'public/public_blog/images/'.$_FILES['avatar']['name'])) {
			$data['avatar']=basename($_FILES['avatar']['name']);
			}else{
				echo "Upload ảnh bị lỗi";
			}

			$query ="UPDATE users SET avatar='".$data['avatar']."' WHERE id=".$_SESSION['user']['id'];
			$status = $this->connection_obj->conn->query($query);
			return $status;
		}
		
	}
?>