<?php
	require_once('models/Post.php');
	require_once('models/Category.php');
	class PostController{
		var $model_post_obj;
		var $model_category_obj;

		function __construct(){
			$this->model_post_obj = new Post();
			$this->model_category_obj = new Category();
		}

		function create(){
			$categories = $this->model_category_obj->getAllCategory();
			require_once('views/backend/posts/add_post.php');
		}

		//thêm mới bài viết (dữ liệu thêm mới lấy từ form add)
		function store(){
			$data_add = $_POST;
			$status = $this->model_post_obj->create($data_add);
			if ($status == TRUE) {
				setcookie('msg_go_list_post','Thêm mới bài viết thành công',time()+3);
			}else{
				setcookie('msg_go_list_post','Thêm mới bài viết không thành công',time()+3);
			}
			header('Location: ?mod=blogger&act=list-your-post');
			exit();
		}

		function list_your_post(){
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPostOfYourSelf();
			require_once('views/backend/posts/list_post.php');
		}

		function list_user_post(){
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPostOfUser();
			require_once('views/backend/posts/list_post.php');
		}

		function list_post_new(){
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPostNew();
			require_once('views/backend/posts/list_post.php');
		}

		function list_post_hidden(){
			$categories = $this->model_category_obj->getAllCategory();
			$posts = $this->model_post_obj->getAllPostHidden();
			require_once('views/backend/posts/list_post.php');
		}

		function post_by_display_mode(){
			if (isset($_POST['display_mode'])) {
				$display_mode = $_POST['display_mode'];
			}
			$categories = $this->model_category_obj->getAllCategory();
			if ($display_mode == 'all') {
				header("Location: ?mod=blogger&act=list-your-post");
			}else if($display_mode == 'trash'){
				$posts = $this->model_post_obj->getAllPostDeleteTemporarily($display_mode);
			}else{
				$posts = $this->model_post_obj->getPostByDisplayMode($display_mode);
			}
			require_once('views/backend/posts/list_post.php');
		}

		function edit(){
			$id = $_GET['id'];
			$categories = $this->model_category_obj->getAllCategory();
			$post = $this->model_post_obj->findPost($id);
			require('views/backend/posts/edit_post.php');
		}

		function update(){
			$data_edit = $_POST;
			$status = $this->model_post_obj->updatePost($data_edit);
			if ($status == TRUE) {
				setcookie('msg_go_list_post','Chỉnh sửa bài viết thành công',time()+3);
			}else{
				setcookie('msg_go_list_post','Chỉnh sửa bài viết không thành công',time()+3);
			}
			header('Location: ?mod=blogger&act=list-your-post');
			exit();
		}

		function move_to_trash(){
			$id = $_GET['id'];
			$status = $this->model_post_obj->deleteTemporarily($id);
			if ($status == TRUE) {
				setcookie('msg_go_list_post','Đưa bài viết vào thùng rác thành công',time()+3);
			}else{
				setcookie('msg_go_list_post','Đưa bài viết vào thùng rác không thành công',time()+3);
			}
			header("Location: ?mod=blogger&act=list-your-post");
			exit();
		}

		//xóa bài viết
		function destroy(){
			$id = $_GET['id'];
			$status = $this->model_post_obj->deletePost($id);
			if ($status == TRUE) {
				setcookie('msg_go_list_post','Xóa bài viết thành công',time()+3);
			}else{
				setcookie('msg_go_list_post','Xóa bài viết không thành công',time()+3);
			}
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
			exit();
		}

		function restore(){
			$id = $_GET['id'];
			$status = $this->model_post_obj->restorePost($id);
			if ($status == TRUE) {
				setcookie('msg_go_list_post','Khôi phục bài viết thành công',time()+3);
			}else{
				setcookie('msg_go_list_post','Khôi phục bài viết không thành công',time()+3);
			}
			header('Location: ?mod=blogger&act=list-your-post');
			exit();
		}

		function edit_status_post(){
			$id = $_GET['id'];
			$post = $this->model_post_obj->findPost($id);
			$status = $this->model_post_obj->editStatusPost($id);
			if ($status == TRUE && $post['status'] == 'hidden') {
				setcookie('msg_go_list_post','Đã bật trạng thái hiển thị bài viết',time()+3);
			}else if($status == TRUE && $post['status'] == 'show'){
				setcookie('msg_go_list_post','Đã bật trạng thái ẩn bài viết',time()+3);
			}else if($status == TRUE && $post['status'] == 'prohibit'){
				setcookie('msg_go_list_post','Đã bật trạng thái ẩn bài viết',time()+3);
			}
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
			exit();
		}

		function browse_post(){
			$id = $_GET['id'];
			$status = $this->model_post_obj->browsePost($id);
			if ($status == TRUE) {
				setcookie('msg_go_list_post','Duyệt thành công => bài viết đã được hiển thị',time()+3);
			}else{
				setcookie('msg_go_list_post','Duyệt bài viết không thành công',time()+3);	
			}
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
			exit();
		}

		//hiển thị chi tiết bài viết
		function show(){
			$id = $_GET['id'];
			$post = $this->model_post_obj->findPost($id);
			if ($post['status']!='show') {
				require_once('views/backend/posts/detail_post.php');
			}else{
				//gọi hàm +1 view trc kgi require hàm hthi nhé!
			}
		}
	}
?>