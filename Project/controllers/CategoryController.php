<?php
	require_once('models/Category.php');
	require_once('models/Post.php');
	class CategoryController{
		var $model_obj;
		var $model_post_obj;
		function __construct(){
			$this->model_obj = new Category();
			$this->model_post_obj = new Post();
		}

		function list_your_category(){
			$cate = $this->model_obj->getAllCategory();
			$categories = $this->model_obj->getAllCategoryOfYourSelf();
			require_once('views/backend/categories/list_category.php');
		}

		function list_user_category(){
			$cate = $this->model_obj->getAllCategory();
			$categories = $this->model_obj->getAllCategoryOfUser();
			require_once('views/backend/categories/list_category.php');
		}

		function create(){
			$categories = $this->model_obj->getAllCategory();
			require_once('views/backend/categories/add_category.php');
		}
		function store(){
			$data_add = $_POST;
			$status = $this->model_obj->create($data_add);
			if ($status == TRUE) {
				setcookie('msg_go_list_category','Thêm mới thành công -> chờ xét duyệt của admin',time()+3);
			}else{
				setcookie('msg_go_list_category','Thêm mới không thành công',time()+3);
			}
			header("Location: ?mod=blogger&act=list-your-category");
		}
		function edit(){
			$id = $_GET['id'];
			$category = $this->model_obj->find($id);
			$categories = $this->model_obj->getAllCategory();
			require_once('views/backend/categories/edit_category.php');
		}
		function update(){
			$data_edit = $_POST;
			$status = $this->model_obj->update($data_edit);
			if ($status == TRUE) {
				setcookie('msg_go_list_category','Chỉnh sửa danh mục thành công',time()+3);
			}else{
				setcookie('msg_go_list_category','Chỉnh sửa danh mục không thành công',time()+3);
			}
			header('Location: ?mod=blogger&act=list-your-category');
		}

		function edit_status_category(){
			$id = $_GET['id'];
			$category = $this->model_obj->find($id);
			$status = $this->model_obj->editStatusCategory($id);
			if ($status == TRUE && $category['status'] == 'hidden') {
				setcookie('msg_go_list_category','Đã bật trạng thái hiển thị danh mục',time()+3);
			}else if($status == TRUE && $category['status'] == 'show'){
				setcookie('msg_go_list_category','Đã bật trạng thái ẩn danh mục',time()+3);
			}
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
			exit();
		}

		function list_category_new(){
			$cate = $this->model_obj->getAllCategory();
			$categories = $this->model_obj->getAllCategoryNew();
			require_once('views/backend/categories/list_category.php');
		}
		function list_category_hidden(){
			$cate = $this->model_obj->getAllCategory();
			$categories = $this->model_obj->getAllCategoryHidden();
			require_once('views/backend/categories/list_category.php');
		}
		function browse_category(){
			$id = $_GET['id'];
			$status = $this->model_obj->browseCategory($id);
			if ($status == TRUE) {
				setcookie('msg_go_list_category','Duyệt thành công => danh mục đã được hiển thị',time()+3);
			}else{
				setcookie('msg_go_list_category','Duyệt danh mục không thành công',time()+3);	
			}
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
			exit();
		}

		function destroy_category(){
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			}
			$status_delete_post = $this->model_post_obj->deletePostByCategory($id);
			$status_delete_category = $this->model_obj->deleteCategory($id); 
			if ($status_delete_category == TRUE & $status_delete_post == TRUE) {
				setcookie('msg_go_list_category','Xóa danh mục thành công',time()+3);
			}else{
				setcookie('msg_go_list_category','Xóa danh mục không thành công',time()+3);
			}
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
			exit();
		}
	}
?>