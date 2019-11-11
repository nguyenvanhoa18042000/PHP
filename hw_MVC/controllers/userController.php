<?php
	require_once('models/user.php');
	class userController{
		var $model_obj;
		function __construct(){
			$this->model_obj = new user();
		}
		function index(){
			$users = $this->model_obj->getAll();
			require_once('views/user/list_user.php');
		}
		function create(){
			require_once('views/user/add_user.php');
		}
		function store(){
			$data_add = $_POST;
			$status = $this->model_obj->create($data_add);
			if ($status == TRUE) {
				setcookie('msg','Thêm mới thành công',time()+3);
			}else{
				setcookie('msg','Thêm mới không thành công',time()+3);
			}
			header('Location: ?func=user&act=index');
		}
		function show(){
			$id = isset($_GET['id'])?$_GET['id']:'';
			$user = $this->model_obj->find($id);
			require_once('views/user/detail_user.php');
		}
		function edit(){
			$id = $_GET['id'];
			$user = $this->model_obj->find($id);
			require_once('views/user/edit_user.php');
		}
		function update(){
			$data_edit = $_POST;
			$user = $this->model_obj->update($data_edit);
			if ($user == TRUE) {
				setcookie('msg','Chỉnh sửa thành công',time()+3);
			}else{
				setcookie('msg','Chỉnh sửa không thành công',time()+3);
			}
			header('Location: ?func=user&act=index');
		}
		function delete(){
			$id=$_GET['id'];
			$status = $this->model_obj->delete($id);
			if ($status == TRUE) {
				setcookie('msg','Xóa thành công',time()+3);
			}else{
				setcookie('msg','Xóa không thành công',time()+3);
			}
			header('Location: ?func=user&act=index');
		}
		function error(){
			echo "ACT 404";
		}
	}
?>