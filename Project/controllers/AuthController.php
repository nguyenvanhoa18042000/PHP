<?php
require_once('models/User.php');
	class AuthController{
		var $model_obj;
		function __construct(){
			$this->model_obj = new User();
		}

		function login(){
			require_once('views/backend/login.php');
		}

		function login_process(){
			$data_login = isset($_POST)?$_POST:'';
			$user_name = $data_login['user_name'];
			$password = md5($data_login['password']);
			$user = $this->model_obj->checkLogin($user_name,$password);
			if ($user != false) {
				if ($user['status'] != 'block') {
					$_SESSION['user'] = $user;
					unset($_SESSION['user']['password']);
					$_SESSION['flag'] = true;
					header("Location: ?mod=blogger&act=home-blogger");
				}else{
					unset($_SESSION['user']['password']);
					setcookie('msg-go-login','Tài khoản của bạn đã bị khóa',time()+3);
					header('Location: ?mod=auth&act=login');
					exit();
				}
			}else if($user == false){
				setcookie('msg-go-login','Sai tài khoản hoặc mật khẩu',time()+3);
				header('Location: ?mod=auth&act=login');
				exit();
			}
		}
		function logout(){
			$this->model_obj->checkLogout();
		}
		function create(){
		require_once('views/backend/registration.php');
		}

		function store(){
			$data_add = isset($_POST)?$_POST:'';
			$status = $this->model_obj->create($data_add);
			if ($status == 0) {
				setcookie('msg','Tên tài khoản đã tồn tại',time()+3);
				header('Location: ?mod=auth&act=registration');
				exit();
			}else if($status == 1){
				setcookie('msg','Email đã được sử dụng để đăng kí',time()+3);
				header('Location: ?mod=auth&act=registration');
				exit();
			}else if($status == 2){
			 	setcookie('msg-go-login','Đăng kí thành công',time()+3);
			 	header('Location: ?mod=auth&act=login');
			 	exit();
			}
		}
		function error(){
			require_once('views/backend/404.php');
		}
	}

?>