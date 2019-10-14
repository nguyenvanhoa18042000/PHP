<?php
	session_start();
	if(isset($_POST['submit'])){
		if (isset($_POST['msv'])) {
			$msv=$_POST['msv'];
		}
		if (isset($_POST['name'])) {
			$name=$_POST['name'];
		}
		if (isset($_POST['course'])) {
			$course=$_POST['course'];
		}
		if (isset($_POST['phoneNumber'])) {
			$phoneNumber=$_POST['phoneNumber'];
		}
		if (isset($_POST['email'])) {
			$email=$_POST['email'];
		}
		if (isset($_POST['gender'])) {
			$gender=$_POST['gender'];
		}
		if (isset($_POST['address'])) {
			$address=$_POST['address'];
		}
	}	
	$_SESSION['info'][$msv]=[
		'msv'=>$msv,
		'name'=>$name,
		'course'=>$course,
		'phoneNumber'=>$phoneNumber,
		'email'=>$email,
		'gender'=>$gender,
		'address'=>$address,
	];
	setcookie('msg','Thêm mới thành công',time()+3);
	header('Location: list.php')
?>