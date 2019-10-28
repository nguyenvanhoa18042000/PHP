<?php
	require_once('connection_mysql.php');
    $data = $_POST;
    if ($data['parent_id']==0) {
        $query = "INSERT INTO categories (name, description) VALUES ('".$data['name']."','".$data['description']."')";
    }else{
    $query = "INSERT INTO categories (name, description,parent_id) VALUES ('".$data['name']."','".$data['description']."','".$data['parent_id']."')";
    }

    $result = $conn->query($query);
    if ($result==true) {
    	header("Location: categories.php");
    	setcookie('msg','Thêm mới thành công',time()+3);

    }else{
    	// header("Location: category_add.php");
    }
?>