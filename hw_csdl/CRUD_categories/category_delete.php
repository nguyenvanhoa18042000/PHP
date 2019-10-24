<?php
    require_once('connection_mysql.php');
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $query = "UPDATE categories SET deleted_at='2019-10-24 22:40:50' WHERE id=".$id;

	    $result = $conn->query($query);
	    if ($result==true) {
	    	header("Location: categories.php");
	    	setcookie('msg','Xóa thành công',time()+3);
	    }
    }
?>