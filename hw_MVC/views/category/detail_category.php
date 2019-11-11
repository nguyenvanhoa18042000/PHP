
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail category</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">CATEGORY</h2>
	<a style="text-align: right;  position: relative; float: right; right: 10%; margin-bottom: 2%;" class="btn btn-success" href="?func=category&act=index"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back categories</a>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" colspan="2">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Created_at</th>
    </tr>
  </thead>
  <tbody>
	    <tr>
	      <td colspan="2"><?php echo $category['id']; ?></td>
	      <td><?php echo $category['name']; ?></td>
	      <td><?php echo $category['description']; ?></td>
	      <td><?php echo $category['created_at']; ?></td>
	    </tr>
	</table>
</body>
</html>