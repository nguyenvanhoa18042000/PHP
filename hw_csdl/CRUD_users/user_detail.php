<?php
	require_once('connection_mysql.php');
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$query = "SELECT * FROM users WHERE id=".$id;

		$result = $conn->query($query);
		$row = $result->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail User</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">USER</h2>
	<a style="text-align: right;  position: relative; float: right; right: 10%; margin-bottom: 2%;" class="btn btn-success" href="users.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back users</a>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="2">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
	    <tr>
	      <td colspan="2"><?php echo $row['id']; ?></td>
	      <td><?php echo $row['name']; ?></td>
	      <td><?php echo $row['email']; ?></td>
	    </tr>
	</table>
</body>
</html>