
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Categories</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">CATEGORIES</h2>
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
      <th scope="col">Description</th>
      <th scope="col">Function</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($categories as $row) { 
  		if ($row['deleted_at']==NULL) {
  	?>
	    <tr>
	      <td><?php echo $row['id']; ?></td>
	      <td><?php echo $row['name']; ?></td>
	      <td><?php echo $row['description']; ?></td>
	      <td>
	      	<a href="category_detail.php?id=<?= $row['id'] ?>" class="btn" style="background: #337ab7; color: white;" ><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
	      	<a href="category_edit.php?id=<?= $row['id'] ?>" class="btn" style="background: #ff7300; color: white;"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
	      	<a href="category_delete.php?id=<?= $row['id'] ?>" class="btn" style="background: #ed6b75; color: white;"><i class="fa fa-trash" aria-hidden="true" ></i> Delete</a>
	      </td>
	    </tr>
	<?php
	}
	}
	?>
</table>
</body>
</html>