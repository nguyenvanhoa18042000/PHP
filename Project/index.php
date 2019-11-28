<?php 
session_start();
	$mod = isset($_GET['mod'])?$_GET['mod']:'home';
	$act = isset($_GET['act'])?$_GET['act']:'index';

	$_SESSION['flag'] = isset($_SESSION['flag'])?$_SESSION['flag']:false;

	switch ($mod) {
		case 'home':
		require_once('controllers/HomeController.php');
		$home_controller_obj = new HomeController();
		switch ($act) {
			case 'index':
				$home_controller_obj->index();
				break;
			case 'show-post':
			$home_controller_obj->show_post();
				break;
			case 'show-category':
				$home_controller_obj->show_category();
				break;
			case 'about-me':
				$home_controller_obj->about();
				break;
			case 'contact':
				$home_controller_obj->contact();
				break;
			case 'send-contact':
				$home_controller_obj->send_contact();
				break;
			case '404':
				$home_controller_obj->error();
				break;
			default:
				header("Location: ?mod=home&act=404");

		}
		break;

		case 'auth':
		require_once('controllers/AuthController.php');
		$auth_controller_obj = new AuthController();
		switch ($act) {
			case 'login':
				if (!$_SESSION['flag']) {
					$auth_controller_obj->login();
				}else{
					header("Location: ?mod=blogger&act=home-blogger");
				}
				break;
			case 'logout':
				$auth_controller_obj->logout();
				break;
			case 'registration':
				$auth_controller_obj->create();
				break;
			case 'store':
				$auth_controller_obj->store();
				break;
			case 'login_process':
				$auth_controller_obj->login_process();
				break;	
			default:
				header("Location: ?mod=home&act=404");
		}
		break;

		default:
			if (!$_SESSION['flag']) {
				header("Location: ?mod=home&act=404");
			}
		}

	if ($_SESSION['flag']) {
		if(isset($_SESSION['user'])){
			switch ($mod) {
				case 'blogger' :
				require_once('controllers/UserController.php');
				require_once('controllers/CategoryController.php');
				require_once('controllers/PostController.php');
				$user_controller_obj = new UserController();
				$post_controller_obj = new PostController();
				$category_controller_obj = new CategoryController();
				switch ($act) {
					case 'home-blogger':
					$user_controller_obj->show_home_blogger();
					break;

					case 'create-category':
					$category_controller_obj->create();
					break;

					case 'store-category':
					$category_controller_obj->store();
					break;

					case 'list-your-category':
					$category_controller_obj->list_your_category();
					break;

					case 'list-user-category':
					$category_controller_obj->list_user_category();
					break;

					case 'edit-category':
					$category_controller_obj->edit();
					break;

					case 'update-category':
					$category_controller_obj->update();
					break;

					case 'list-category-new':
					$category_controller_obj->list_category_new();
					break;

					case 'list-category-hidden':
					$category_controller_obj->list_category_hidden();
					break;

					case 'edit-status-category':
					$category_controller_obj->edit_status_category();
					break;

					case 'destroy-category':
					$category_controller_obj->destroy_category();
					break;

					case 'browse-category':
					$category_controller_obj->browse_category();
					break;				

					case 'create-post':
					$post_controller_obj->create();
					break;

					case 'store-post':
					$post_controller_obj->store();
					break;	

					case 'list-your-post':
					$post_controller_obj->list_your_post();
					break;

					case 'list-user-post':
					$post_controller_obj->list_user_post();
					break;

					case 'list-post-new':
					$post_controller_obj->list_post_new();
					break;

					case 'list-post-hidden':
					$post_controller_obj->list_post_hidden();
					break;

					case 'edit-post':
					$post_controller_obj->edit();
					break;

					case 'update-post':
					$post_controller_obj->update();
					break;

					case 'post-by-display-mode':
					$post_controller_obj->post_by_display_mode();
					break;

					case 'move-to-trash':
					$post_controller_obj->move_to_trash();
					break;

					case 'destroy-post':
					$post_controller_obj->destroy();
					break;

					case 'restore-post':
					$post_controller_obj->restore();
					break;

					case 'edit-status-post':
					$post_controller_obj->edit_status_post();
					break;

					case 'browse-post':
					$post_controller_obj->browse_post();
					break;

					case 'show-post':
					$post_controller_obj->show();
					break;

					case 'info-user':
						$user_controller_obj->info_user();
						break;
					case 'edit-avatar':
						$user_controller_obj->edit_avatar();
						break;

					default:
					header("Location: ?mod=home&act=404");

				}
				break;

				case 'admin':
				require_once('controllers/UserController.php');
				$user_controller_obj = new UserController();
				switch ($act) {
					case 'list-user':
					$user_controller_obj->list_user();
					break;
					default:
				}
				break;
			}
		}else{
			die('404-not session');
		}
	}

?>
