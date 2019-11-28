<?php
require_once('Connection.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
class Post{
	var $connection_obj;
	function __construct(){
		$this->connection_obj = new Connection();
	}

	function create($data){
		$view_count = mt_rand(100,1000);
		$user_id = $_SESSION['user']['id'];
		if ($_SESSION['user']['position'] == 'admin') {
			$status = 'show';
		}else{
			$status = 'pending';
		}
		if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'public/public_blog/images/'.$_FILES['thumbnail']['name'])) {
		$data['thumbnail']=basename($_FILES['thumbnail']['name']);
		}else{
			echo "Upload ảnh bị lỗi";
		}
		$query ="INSERT INTO posts (title,description,thumbnail,content,slug,view_count,user_id,category_id,status) VALUES ('".$data['title']."','".$data['description']."','".$data['thumbnail']."','".$data['content']."','".$data['slug']."','$view_count','$user_id','".$data['category_id']."','$status')";
		$status = $this->connection_obj->conn->query($query);
		//var_dump($status);die();
		return $status;
	}

	function getAllPost(){
		$query = "SELECT * FROM posts ";
		$result = $this->connection_obj->conn->query($query);
		$posts = array();
		while($row = $result->fetch_assoc()) { 
			$posts[] = $row;
		}
		return $posts;
	}

	function getAllPostOfUser(){
		$query = "SELECT * FROM posts WHERE status='show' AND user_id != ".$_SESSION["user"]["id"] . ' ORDER BY id DESC' ;
		$result = $this->connection_obj->conn->query($query);
		$posts = array();
		while($row = $result->fetch_assoc()) { 
			$posts[] = $row;
		}
		return $posts;
	}

	function getAllPostOfYourSelf(){
		$query = "SELECT * FROM posts WHERE user_id = ".$_SESSION["user"]["id"] . ' ORDER BY id DESC' ;
		$result = $this->connection_obj->conn->query($query);
		$posts = array();
		while($row = $result->fetch_assoc()) { 
			$posts[] = $row;
		}
		return $posts;
	}

	function getAllPostNew(){
		$query = "SELECT * FROM posts WHERE status = 'pending' AND user_id != '".$_SESSION['user']['id']."'  ORDER BY id DESC ";
		$result = $this->connection_obj->conn->query($query);
		$posts_new = array();
		while($row = $result->fetch_assoc()) { 
			$posts_new[] = $row;
		}
		return $posts_new;
	}

	function getAllPostHidden(){
		$query = "SELECT * FROM posts WHERE status = 'prohibit' AND user_id != '".$_SESSION['user']['id']."'  ORDER BY id DESC ";
		$result = $this->connection_obj->conn->query($query);
		$posts_hidden = array();
		while($row = $result->fetch_assoc()) { 
			$posts_hidden[] = $row;
		}
		return $posts_hidden;
	}

	function getPostByDisplayMode($display_mode){
		$query = "SELECT * FROM posts WHERE status = '$display_mode' AND user_id = '".$_SESSION['user']['id']."'  ORDER BY id DESC ";
		$result = $this->connection_obj->conn->query($query);
		$posts_by_display_mode = array();
		while($row = $result->fetch_assoc()) { 
			$posts_by_display_mode[] = $row;
		}
		return $posts_by_display_mode;
	}

	function getAllPostDeleteTemporarily(){
		$query = "SELECT * FROM posts WHERE user_id = ".$_SESSION["user"]["id"] . ' AND deleted_at IS NOT NULL' . ' ORDER BY id DESC' ;
		$result = $this->connection_obj->conn->query($query);
		$posts_of_blogger = array();
		while($row = $result->fetch_assoc()) { 
			$posts_of_blogger[] = $row;
		}
		return $posts_of_blogger;
	}

	function findPost($id){
		$query = "SELECT * FROM posts WHERE id = ".$id;
		$result = $this->connection_obj->conn->query($query);
		$post = $result->fetch_assoc();
		return $post;
	}

	function findPostBySlug($slug){
		$query = "SELECT * FROM posts WHERE slug = '$slug' ";
		$result = $this->connection_obj->conn->query($query);
		$post = $result->fetch_assoc();
		return $post;
	}

	function findPostByCategoryId($category_id){
		$query = "SELECT * FROM posts WHERE status = 'show' AND category_id = ".$category_id;
		$result = $this->connection_obj->conn->query($query);
		$posts = array();
		while ($row = $result->fetch_assoc()) {
			$posts[] = $row;
		}
		return $posts;
	}

	function findPostByCategoryIdLimit($category_id,$id_post_showing){
		$query = "SELECT * FROM posts WHERE status = 'show' AND category_id = '$category_id' AND id != $id_post_showing ORDER BY id DESC LIMIT 0,3";
		$result = $this->connection_obj->conn->query($query);
		$posts = array();
		while ($row = $result->fetch_assoc()) {
			$posts[] = $row;
		}
		return $posts;
	}

	function updatePost($data){
		$data['thumbnail']='';
		if($_SESSION['user']['position'] == 'admin'){
			if ($post['status'] = 'hidden') {
				$status = 'hidden';
			}else{
				$status = 'show';
			}
		}else{
			$status = 'pending';
		}

		if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'public/public_blog/images/'.$_FILES['thumbnail']['name'])) {
		$data['thumbnail']=basename($_FILES['thumbnail']['name']);
		}else{
			echo "Upload ảnh bị lỗi";
		}

		if ($data['thumbnail']!='') {
			$query ="UPDATE posts SET title='".$data['title']."', description='".$data['description']."', thumbnail='".$data['thumbnail']."', content='".$data['content']."', slug='".$data['slug']."',category_id = '".$data['category_id']."', status = '$status' WHERE id=".$data['id'];
		}else{
			$query ="UPDATE posts SET title='".$data['title']."', description='".$data['description']."', content='".$data['content']."', slug='".$data['slug']."',category_id = '".$data['category_id']."', status = '$status' WHERE id=".$data['id'];
		}
		$status = $this->connection_obj->conn->query($query);
		return $status;
	}

	function deleteTemporarily($id){
		$time_delete_at = date('Y-m-d H:i:s');
		$query = "UPDATE posts SET deleted_at='$time_delete_at' , status='trash' WHERE id=".$id;
		$status = $this->connection_obj->conn->query($query);

		return $status;
	}

	function deletePost($id){
		$query = "DELETE FROM posts WHERE id = ".$id;
		$status = $this->connection_obj->conn->query($query);
		return $status;
	}

	function deletePostByCategory($category_id){
		$query = "DELETE FROM posts WHERE category_id = ".$category_id;
		$status = $this->connection_obj->conn->query($query);
		return $status;
	}

	function restorePost($id){
		if ($_SESSION['user']['position'] == 'admin') {
			$query = "UPDATE posts SET status = 'show', deleted_at = NULL WHERE id = ".$id;
		}else{
		$query = "UPDATE posts SET status = 'pending', view_count = '0' , deleted_at = NULL WHERE id = ".$id;
		}
		$status = $this->connection_obj->conn->query($query);
		return $status;
	}

	function editStatusPost($id){
		$query = "SELECT * FROM posts WHERE id = ".$id;
		$result = $this->connection_obj->conn->query($query);
		$post = $result->fetch_assoc();

		if($post['status'] == 'show' && $post['user_id'] == $_SESSION['user']['id']){
			$query_update = "UPDATE posts SET status='hidden' WHERE id = ".$id;
		}else if($post['status'] == 'show' && $_SESSION['user']['position'] == 'admin' && $post['user_id'] != $_SESSION['user']['id']){
			$query_update = "UPDATE posts SET status='prohibit' WHERE id = ".$id;
		}else if($post['status'] == 'prohibit' && $_SESSION['user']['position'] == 'admin'){
			$query_update = "UPDATE posts SET status='show' WHERE id = ".$id;
		}else if($post['status'] == 'hidden' && $post['user_id'] == $_SESSION['user']['id']){
			$query_update = "UPDATE posts SET status='show' WHERE id = ".$id;
		}
		
		$status = $this->connection_obj->conn->query($query_update);
		return $status;
	}

	function browsePost($id){
		$query = "UPDATE posts SET status = 'show' WHERE id =".$id;
		$status = $this->connection_obj->conn->query($query);
		return $status;
	}

	function getPostForSlide(){
		$query = "SELECT * FROM posts WHERE status = 'show' ORDER BY view_count DESC LIMIT 0,3";
		$result = $this->connection_obj->conn->query($query);
		$posts_of_slide = array();
		while ($row = $result->fetch_assoc()) {
			$posts_of_slide[] = $row;
		}
		return $posts_of_slide;
	}

	function getPopularPosts(){
		$query = "SELECT * FROM posts WHERE DATEDIFF(NOW(),created_at) > 7 AND status = 'show' ORDER BY view_count DESC LIMIT 0,3";
		$result = $this->connection_obj->conn->query($query);
		$popular_posts = array();
		while ($row = $result->fetch_assoc()) {
			$popular_posts[] = $row;
		}
		return $popular_posts;
	}

	function getPostsPaginationForIndex($page,$sotin1trang){
		$from = ($page-1) * $sotin1trang;
		$query = "SELECT * FROM posts WhERE status = 'show' ORDER BY id DESC LIMIT $from,$sotin1trang";
		$result = $this->connection_obj->conn->query($query);
		$posts_pagination = array();
		while ($row = $result->fetch_assoc()) {
			$posts_pagination[] = $row;
		}
		return $posts_pagination;
	}

	function getPostsPaginationForShowCategory($category_id,$page,$sotin1trang){
		$from = ($page-1) * $sotin1trang;
		$query = "SELECT * FROM posts WhERE status = 'show' AND category_id = '$category_id' ORDER BY id DESC LIMIT $from,$sotin1trang";
		$result = $this->connection_obj->conn->query($query);
		$posts_pagination = array();
		while ($row = $result->fetch_assoc()) {
			$posts_pagination[] = $row;
		}
		return $posts_pagination;
	}

	function getPostsPaginationForAbout($idAdmin,$page,$sotin1trang){
		$from = ($page-1) * $sotin1trang;
		$query = "SELECT * FROM posts WhERE status = 'show' AND user_id = '$idAdmin' ORDER BY id DESC LIMIT $from,$sotin1trang";
		$result = $this->connection_obj->conn->query($query);
		$posts_pagination = array();
		while ($row = $result->fetch_assoc()) {
			$posts_pagination[] = $row;
		}
		return $posts_pagination;
	}

	// function getPostsForAbout($idAdmin){
	// 	$query = "SELECT * FROM posts WhERE status = 'show' AND user_id='$idAdmin' ORDER BY id DESC";
	// 	$result = $this->connection_obj->conn->query($query);
	// 	$posts = array();
	// 	while ($row = $result->fetch_assoc()) {
	// 		$posts[] = $row;
	// 	}
	// 	return $posts;
	// }

	function pageCount($sotin1trang){
		$query = "SELECT id FROM posts WHERE status = 'show' ";
		$number_posts = $this->connection_obj->conn->query($query)->num_rows;
		$number_pages = ceil($number_posts / $sotin1trang);
		return $number_pages;
	}

	function pageCountOfShowCategory($category_id,$sotin1trang){
		$query = "SELECT id FROM posts WHERE status = 'show' AND category_id = '$category_id' ";
		$number_posts = $this->connection_obj->conn->query($query)->num_rows;
		$number_pages = ceil($number_posts / $sotin1trang);
		return $number_pages;
	}

	function pageCountOfAbout($idAdmin,$sotin1trang){
		$query = "SELECT id FROM posts WHERE status = 'show' AND user_id = '$idAdmin' ";
		$number_posts = $this->connection_obj->conn->query($query)->num_rows;
		$number_pages = ceil($number_posts / $sotin1trang);
		return $number_pages;
	}

	function updateView($post){
		if ($post['status'] == 'show') {
			$view_count = $post['view_count'] +1;
			$query = "UPDATE posts SET view_count = '$view_count' WHERE id =".$post['id'];
			$result = $this->connection_obj->conn->query($query);
		}
	}
}
?>