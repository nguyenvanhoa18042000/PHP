<?php
	require_once('connection_mysql.php');
    $data = $_POST;

    $query = "INSERT INTO categories (name, description) VALUES ('".$data['name']."','".$data['description']."')";

    $result = $conn->query($query);

    if ($result==true) {
    	header("Location: categories.php");
    	setcookie('msg','Thêm mới thành công',time()+3);

    }else{
    	header("Location: category_add.php");
    }
?>