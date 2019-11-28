<?php
	require_once('models/Category.php');
	require_once('models/Post.php');
	require_once('models/User.php');

	class HomeController{
		var $model_category_obj;
		var $model_post_obj;
		var $model_user_obj;
		function __construct(){
			$this->model_category_obj  = new Category();
			$this->model_post_obj  = new Post();
			$this->model_user_obj  = new User();
		}

		function index(){
			$sotin1trang = 6;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				settype($page, "int");
			}else{
				$page = 1;
			}
			$number_pages = $this->model_post_obj->pageCount($sotin1trang);
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPost();
			$posts_of_slide = $this->model_post_obj->getPostForSlide();
			$posts_for_pagination = $this->model_post_obj->getPostsPaginationForIndex($page ,$sotin1trang);
			$popular_posts = $this->model_post_obj->getPopularPosts();
			$users = $this->model_user_obj->getAllUser();
			require_once('views/fontend/home.php');
		}

		function show_post(){
			if (isset($_GET['slug'])) {
				$slug = $_GET['slug'];
			}

			$post = $this->model_post_obj->findPostBySlug($slug);
			$related_posts = $this->model_post_obj->findPostByCategoryIdLimit($post['category_id'],$post['id']);
			$update_view = $this->model_post_obj->updateView($post);
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPost();
			$popular_posts = $this->model_post_obj->getPopularPosts();
			$users = $this->model_user_obj->getAllUser();
			require_once('views/fontend/detail_post.php');
		}

		function show_category(){
			$sotin1trang = 3;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				settype($page, "int");
			}else{
				$page = 1;
			}

			if (isset($_GET['slug'])) {
				$slug = $_GET['slug'];
			}

			$Category = $this->model_category_obj->findCategoryBySlug($slug);
			$posts = $this->model_post_obj->findPostByCategoryId($Category['id']);
			$number_pages_of_show_category = $this->model_post_obj->pageCountOfShowCategory($Category['id'],$sotin1trang);
			$users = $this->model_user_obj->getAllUser();
			$posts_for_pagination = $this->model_post_obj->getPostsPaginationForShowCategory($Category['id'],$page ,$sotin1trang);
			$popular_posts = $this->model_post_obj->getPopularPosts();
			$categories = $this->model_category_obj->getAllCategory();
			require_once('views/fontend/detail_category.php');
		}

		function about(){
			$sotin1trang = 3;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				settype($page, "int");
			}else{
				$page = 1;
			}
			$admin = $this->model_user_obj->findUserAdmin();
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPost();
			$number_pages_of_about = $this->model_post_obj->pageCountOfAbout($admin['id'],$sotin1trang);
			$posts_for_pagination = $this->model_post_obj->getPostsPaginationForAbout($admin['id'],$page ,$sotin1trang);
			$popular_posts = $this->model_post_obj->getPopularPosts();
			$users = $this->model_user_obj->getAllUser();
			require_once('views/fontend/about.php');
		}

		function contact(){
			$categories = $this->model_category_obj->getAllCategory();
			$popular_posts = $this->model_post_obj->getPopularPosts();
			require_once('views/fontend/contact.php');
		}

		function send_contact(){
			if (isset($_POST['btn-send'])) {
				$name = $_POST['name'];
				$subject = $_POST['subject'];
				$mailFrom = $_POST['email'];
				$message = $_POST['message'];
			}
			require_once('views/fontend/sendMail/sendMail.php');
		}

		function error(){
			require_once('views/backend/404.php');
		}
	}
?>