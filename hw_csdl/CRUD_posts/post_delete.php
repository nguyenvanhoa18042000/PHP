<?php
	require_once('connection_mysql.php');
	if (isset($_GET['id'])) {
		$id=$_GET['id'];

		$query="DELETE FROM posts WHERE id=".$id;
		$result=$conn->query($query);

		if ($result==true) {
	    	header("Location: posts.php");
	    	setcookie('msg','Xóa thành công',time()+3);
	    }
	} 
?>