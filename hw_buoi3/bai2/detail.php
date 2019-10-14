<?php
session_start();
if (isset($_GET['msv'])) {
	$msv=$_GET['msv'];
}
if (isset($_SESSION['info'])) {
	$student=$_SESSION['info'][$msv];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detail</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="content">
		<h2 style="text-align: center; margin-bottom: 30px;">THÔNG TIN SINH VIÊN</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Mã SV</th>
					<th scope="col">Họ và tên</th>
					<th scope="col">Giới tính</th>
					<th scope="col">Khóa học</th>
					<th scope="col">Email</th>
					<th scope="col">Số điện thoại</th>
					<th scope="col">Địa chỉ</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $student['msv']; ?></td>
					<td><?php echo $student['name']; ?></td>
					<td><?php echo $student['gender']; ?></td>
					<td><?php echo $student['course']; ?></td>
					<td><?php echo $student['email']; ?></td>
					<td><?php echo $student['phoneNumber']; ?></td>
					<td><?php echo $student['address']; ?></td>
				</tr>
			</tbody>
		</table>
		<div style="text-align: center; margin-top: 5%;">
			<a class="btn btn-info" href="list.php">Quay lại</a>
		</div>
	</div>
</body>
</html>