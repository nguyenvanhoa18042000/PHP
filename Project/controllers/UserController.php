<?php
require_once('models/User.php');
class UserController{
	var $model_obj;
	function __construct(){
		$this->model_obj = new User();
	}

	function list_user(){
		$users = $this->model_obj->getAllUser();
		require_once('views/backend/users/list_user.php');
	}

	function show_home_blogger(){
		require_once('views/backend/home.php');
	}

	function info_user(){
		require_once('views/backend/users/detail_user.php');
	}

	function edit_avatar(){
		$data = $_POST;
		$status = $this->model_obj->editAvatar($data);
		if ($status == true) {
			setcookie('msg_go_detail_user','Cập nhật ảnh đại diện thành công. Đăng nhập lại để xem',time()+3);
		}else{
			die('không thành công');
			setcookie('msg_go_detail_user','Cập nhật ảnh đại diện không thành công. Đăng nhập lại để xem',time()+3);
		}
		header("Location: ?mod=blogger&act=info-user");
	}
}
?>