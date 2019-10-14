<?php 
	session_start();
	if (isset($_SESSION['info_student'])) {
		$data=$_SESSION['info_student'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Info-Student</title>
</head>
<style type="text/css">
	h2{
		width: 80%;
		margin: auto;
	}
</style>
<body>
	<h2>THÔNG TIN SINH VIÊN</h2>
	<ul>
		<li>Mã sinh viên : <?php echo $data['codeStudent'] ?></li>
		<li>Họ và tên : <?php echo $data['name'] ?></li>
		<li>Số điện thoại : <?php echo $data['phoneNumber'] ?></li>
		<li>Email : <?php echo $data['email'] ?> </li>
		<li>Giới tính : <?php echo $data['gioitinh'] ?> </li>
		<li>Địa chỉ : <?php echo $data['address'] ?></li>
	</ul>
</body>
</html>
