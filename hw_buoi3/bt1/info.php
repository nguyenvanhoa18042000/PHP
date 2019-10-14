
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
	<?php session_start(); ?>
	<h2>THÔNG TIN SINH VIÊN</h2>
	<ul>
		<li>Mã sinh viên : <?php echo $_SESSION['info']['codeStudent'] ?></li>
		<li>Họ và tên : <?php echo $_SESSION['info']['name'] ?></li>
		<li>Số điện thoại : <?php echo $_SESSION['info']['phoneNumber'] ?></li>
		<li>Email : <?php echo $_SESSION['info']['email'] ?> </li>
		<li>Giới tính : <?php echo $_SESSION['info']['gioitinh'] ?> </li>
		<li>Địa chỉ : <?php echo $_SESSION['info']['address'] ?></li>
	</ul>
</body>
</html>
