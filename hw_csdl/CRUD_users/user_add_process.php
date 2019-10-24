<?php
	require_once('connection_mysql.php');
    $data = $_POST;

    $query = "INSERT INTO users (name, email) VALUES ('".$data['name']."','".$data['email']."')";

    $result = $conn->query($query);
    if ($result==true) {
    	header("Location: users.php");
    	setcookie('msg','Thêm mới thành công',time()+3);

    }else{
    	header("Location: user_add.php");
    }
?>