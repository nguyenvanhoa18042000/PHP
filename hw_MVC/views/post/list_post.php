

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Posts</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">POSTS</h2>
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
			<th scope="col">Title</th>
			<th scope="col" style="width: 30%">Description</th>
			<th scope="col">Thumbnail</th>
			<th scope="col">Category</th>
			<th scope="col">View count</th>
			<th scope="col">Function</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $row_post) { 
				?>
			<tr>
				<td><?= $row_post['title']; ?></td>
				<td style="width: 30%"><?= $row_post['description']; ?></td>
				<td style="width: 15%;"><img style="width: 135px; height: 120px;" src="public/images/<?php echo $row_post['thumbnail']; ?>"></td>
				<?php foreach ($name_categories as $name_category) {
					if ($name_category['category_id']==$row_post['category_id']) {
				?>
						<td><?php echo $name_category['name']; ?></td>
				<?php
					break;
					}
				}
				?>
					<td><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row_post['view_count']; ?></td>
					<td>
						<a href="post_detail.php?id=<?= $row_post['id'] ?>" class="btn" style="background: #337ab7; color: white; display: block; width:85%; margin-bottom: 3%" ><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
						<a href="post_edit.php?id=<?= $row_post['id'] ?>" class="btn" style="background: #ff7300; color: white; display: block; width:85%; margin-bottom: 3%"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
						<a href="post_delete.php?id=<?= $row_post['id'] ?>" class="btn" style="background: #ed6b75; color: white; display: block; width:85%; margin-bottom: 3%"><i class="fa fa-trash" aria-hidden="true" ></i> Delete</a>
					</td>
				</tr>
				<?php
				}
				?>
		</table>
	</body>
</html>