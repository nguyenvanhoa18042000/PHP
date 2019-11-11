<?php
	$func = isset($_GET['func'])?$_GET['func']:'';
	$act = isset($_GET['act'])?$_GET['act']:'';

	switch ($func) {
		case 'category':
			require_once('controllers/categoryController.php');
			$category_controller_obj = new categoryController();
			switch ($act) {
				case 'index':
					$category_controller_obj->index();
					break;
				case 'create':
					$category_controller_obj->create();
					break;
				case 'store':
					$category_controller_obj->store();
					break;
				case 'show':
					$category_controller_obj->show();
					break;
				case 'edit':
					$category_controller_obj->edit();
					break;
				case 'update':
					$category_controller_obj->update();
					break;
				case 'destroy':
					$category_controller_obj->destroy();
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
				case 'index':
					$user_controller_obj->index();
					break;
				case 'create':
					$user_controller_obj->create();
					break;
				case 'store':
					$user_controller_obj->store();
					break;
				case 'show':
					$user_controller_obj->show();
					break;
				case 'edit':
					$user_controller_obj->edit();
					break;
				case 'update':
					$user_controller_obj->update();
					break;
				case 'destroy':
					$user_controller_obj->delete();
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