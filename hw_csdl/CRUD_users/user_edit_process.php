<?php
	require_once('connection_mysql.php');
    $data = $_POST;
    $id = $_POST['id'];
    $query = "UPDATE users SET name='".$data['name']."' , email='".$data['email']."' WHERE id =".$id;

    $result = $conn->query($query);

    if ($result==true) {
    	header("Location: users.php");
        setcookie('msg','Chỉnh sửa thành công',time()+3);

    }else{
    	header("Location: user_add.php");
    }
?>