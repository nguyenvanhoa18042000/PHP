
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center; margin-bottom: 30px;">DANH SÁCH SINH VIÊN</h2>
	<?php
		if (isset($_COOKIE['msg'])) {
		?>
			<div class="alert alert-success" role="alert">
			  <strong>Thông báo : </strong>
			  <?php echo $_COOKIE['msg']; ?>
			</div>
			<?php
		}
	?>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">STT</th>
	      <th scope="col">Mã SV</th>
	      <th scope="col">Họ và tên</th>
	      <th scope="col">Khóa Học</th>
	      <th scope="col">Chức năng</th>
	    </tr>
	  </thead>
	  <tbody>
		<?php
			session_start();
			if (isset($_SESSION['info'])) {
				$data=$_SESSION['info'];
		?>
	  	<?php
	  		$i=0;
	  		foreach ($data as $value) {
	  			$i++;
	  	?>
	    <tr>
	      <td><?php echo $i; ?></td>
	      <td><?php echo $value['msv']; ?></td>
	      <td><?php echo $value['name']; ?></td>
	      <td><?php echo $value['course']; ?></td>
	      <td>
	      	<a class="btn" style="background: #337ab7; color: white;" href="detail.php?msv=<?php echo $value['msv']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
	      	<a class="btn" style="background: #ff7300; color: white;" href="edit.php?msv=<?php echo $value['msv']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
	      	<a class="btn" style="background: #ed6b75; color: white;" href="delete.php?msv=<?php echo $value['msv']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
	      </td>
	    </tr>
	    <?php
			}
		?>
		<?php
			}
		?>
	  </tbody>
	</table>
	<div style="text-align: center; margin-top: 
	3%;">
		<a class="btn btn-info" href="add.php"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
	</div>
</body>
</html>