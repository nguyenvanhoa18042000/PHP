<?php
	require_once('models/user.php');
	class userController{
		var $model_obj;
		function __construct(){
			$this->model_obj = new user();
		}
		function list(){
			$users = $this->model_obj->getListUser();
			require_once('views/user/list_user.php');
		}
		function detail(){
			$id = isset($_GET['id'])?$_GET['id']:'';
			$user = $this->model_obj->detailUser($id);
			require_once('views/user/detail_user.php');
		}
		function error(){
			echo "ACT 404";
		}
	}
?>