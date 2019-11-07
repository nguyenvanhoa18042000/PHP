<?php
	require_once('models/category.php');
	class categoryController{
		var $model_obj;
		function __construct(){
			$this->model_obj = new category();
		}
		function list(){
			$categories = $this->model_obj->getListCategory();
			require_once('views/category/list_category.php');
		}
		function error(){
			echo "ACT 404";
		}
	}
?>