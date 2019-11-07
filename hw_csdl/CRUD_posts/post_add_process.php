
<?php
	require_once('connection_mysql.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$time_created = date('Y-m-d H:i:s');
	$data= $_POST;

	$data['thumbnail']='';
	$data['view_count']=0;
	$data['created_at']=$time_created;
	if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'images/'.$_FILES['thumbnail']['name'])) {
		$data['thumbnail']=basename($_FILES['thumbnail']['name']);
	}else{
		echo "Upload ảnh bị lỗi";
	}
	if ($data['category_id']==0) {
		if ($data['thumbnail']!='') {
			$query ="INSERT INTO posts (title,description,thumbnail,content,slug,view_count,created_at) VALUES ('".$data['title']."','".$data['description']."','".$data['thumbnail']."','".$data['content']."','".$data['slug']."','".$data['slug']."','".$data['view_count']."','".$data['created_at']."'); ";
		}else{
			$query ="INSERT INTO posts (title,description,content,slug,view_count,created_at) VALUES ('".$data['title']."','".$data['description']."','".$data['content']."','".$data['slug']."','".$data['view_count']."','".$data['created_at']."'); ";
		}
	}else{
		if ($data['thumbnail']!='') {
			$query ="INSERT INTO posts (title,description,thumbnail,content,slug,view_count,category_id,created_at) VALUES ('".$data['title']."','".$data['description']."','".$data['thumbnail']."','".$data['content']."','".$data['slug']."','".$data['view_count']."','".$data['category_id']."','".$data['created_at']."'); ";

		}else{
			$query ="INSERT INTO posts (title,description,content,slug,view_count,category_id,created_at) VALUES ('".$data['title']."','".$data['description']."','".$data['content']."','".$data['slug']."','".$data['view_count']."','".$data['category_id']."','".$data['created_at']."'); ";
		}
	}
	$result=$conn->query($query);
	if($result == true){
		header("Location: posts.php");
	}else{
		header("Location: post_add_process.php");
	}

?>
		