<?php
	require_once('models/post.php');
	class postController{
		var $model_obj;
		function __construct(){
			$this->model_obj = new post();
		}
		function list(){
			$posts = $this->model_obj->getListPost();
			$name_categories = $this->model_obj->getNameCategory();
			// $this->model_obj->custom_echo($x, $length);
			require_once('views/post/list_post.php');
		}
		function error(){
			echo "ACT 404";
		}
	}
?>