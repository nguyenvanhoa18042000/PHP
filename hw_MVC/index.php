<?php
	$func = isset($_GET['func'])?$_GET['func']:'';
	$act = isset($_GET['act'])?$_GET['act']:'';

	switch ($func) {
		case 'category':
			require_once('controllers/categoryController.php');
			$category_controller_obj = new categoryController();
			switch ($act) {
				case 'list':
					$category_controller_obj->list();
					break;
				default:
					$category_controller_obj->error();
					break;
			}
		break;

		case 'post':
			require_once('controllers/postController.php');
			$post_controller_obj = new postController();
			switch ($act) {
				case 'list':
					$post_controller_obj->list();
					break;
				default:
					$post_controller_obj->error();
					break;
			}
		break;

		case 'user':
			require_once('controllers/userController.php');
			$user_controller_obj = new userController();
			switch ($act) {
				case 'list':
					$user_controller_obj->list();
					break;
				case 'detail':
					$user_controller_obj->detail();
					break;
				default:
					$user_controller_obj->error();
					break;
			}
		break;

		default:
			echo "ACT 404";
			break;
	}
?>