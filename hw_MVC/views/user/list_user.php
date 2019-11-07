
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">USERS</h2>
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
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Function</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($users as $row) { ?>
	    <tr>
	      <td><?php echo $row['id']; ?></td>
	      <td><?php echo $row['name']; ?></td>
	      <td><?php echo $row['email']; ?></td>
	      <td>
	      	<a href="?func=user&act=detail&id=<?= $row['id'] ?>" class="btn" style="background: #337ab7; color: white;" ><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
	      </td>
	    </tr>
	<?php
	 }
	?>
</table>
</body>
</html>