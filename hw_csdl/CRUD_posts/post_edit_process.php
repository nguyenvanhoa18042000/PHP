
<?php
	require_once('connection_mysql.php');
	$data= $_POST;
    $id = $_POST['id']; 
	$data['thumbnail']='';

	if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'images/'.$_FILES['thumbnail']['name'])) {
		$data['thumbnail']=basename($_FILES['thumbnail']['name']);
	}else{
		echo "Upload ảnh bị lỗi";
	}
	if ($data['category_id']==0) {
		if ($data['thumbnail']!='') {
			$query ="UPDATE posts SET title='".$data['title']."', description='".$data['description']."', thumbnail='".$data['thumbnail']."', content='".$data['content']."', slug='".$data['slug']."' WHERE id=".$id;
		}else{
			$query ="UPDATE posts SET title='".$data['title']."', description='".$data['description']."', content='".$data['content']."', slug='".$data['slug']."' WHERE id=".$id;
		}
	}else{
		if ($data['thumbnail']!='') {
			$query ="UPDATE posts SET title='".$data['title']."', description='".$data['description']."', thumbnail='".$data['thumbnail']."', content='".$data['content']."', slug='".$data['slug']."', category_id='".$data['category_id']."' WHERE id=".$id;

		}else{
			$query ="UPDATE posts  SET title='".$data['title']."', description='".$data['description']."', content='".$data['content']."', slug='".$data['slug']."', category_id='".$data['category_id']."' WHERE id=".$id;
		}
	}
	$result=$conn->query($query);
	if($result == true){
		header("Location: posts.php");
	}else{
		header("Location: post_add_process.php");
	}

?>
		