<?php
	require_once('connection_mysql.php');
    $data = $_POST;
    $id = $_POST['id']; 
    $query = "UPDATE categories SET name='".$data['name']."' , description='".$data['description']."' WHERE  id =".$id;

    $result = $conn->query($query);

    if ($result==true) {
    	header("Location: categories.php");
        setcookie('msg','Chỉnh sửa thành công',time()+3);

    }else{
    	header("Location: category_add.php");
    }
?>