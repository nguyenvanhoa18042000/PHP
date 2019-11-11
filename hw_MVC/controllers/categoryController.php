<?php
	require_once('models/category.php');
	class categoryController{
		var $model_obj;
		function __construct(){
			$this->model_obj = new category();
		}
		function index(){
			$categories = $this->model_obj->getAll();
			require_once('views/category/list_category.php');
		}
		function create(){
			$categories = $this->model_obj->getAll();
			require_once('views/category/add_category.php');
		}
		function store(){
			$data = $_POST;
			$status = $this->model_obj->create($data);
			if ($status == TRUE) {
				setcookie('msg','Thêm mới thành công',time()+3);
			}else{
				setcookie('msg','Thêm mới không thành công',time()+3);
			}
			header('Location: ?func=category&act=index');
		}
		function show(){
			$id = $_GET['id'];
			$category = $this->model_obj->find($id);
			require_once('views/category/detail_category.php');
		}
		function edit(){
			$id = $_GET['id'];
			$categories = $this->model_obj->getAll();
			$category = $this->model_obj->find($id);
			require_once('views/category/edit_category.php');
		}
		function update(){
			$data_edit = $_POST;
			$status = $this->model_obj->update($data_edit);
			if ($status == TRUE) {
				setcookie('msg','Chỉnh sửa thành công',time()+3);
			}else{
				setcookie('msg','Chỉnh sửa không thành công',time()+3);
			}
			header('Location: ?func=category&act=index');
		}
		function destroy(){
			$id = $_GET['id'];
			$status = $this->model_obj->delete($id);
			if ($status == TRUE) {
				setcookie('msg','Xóa thành công',time()+3);
			}else{
				setcookie('msg','Xóa không thành công',time()+3);
			}
			header('Location: ?func=category&act=index');
		}
		function error(){
			echo "ACT 404";
		}
	}
?>