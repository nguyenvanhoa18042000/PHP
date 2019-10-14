<?php
	require_once('products.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List products</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">DANH SÁCH SẢN PHẨM</h2>
	<a style=" position: relative; right:-80%; margin-bottom: 2%;" class="btn btn-success" href="cart.php">Vào xem giỏ hàng</a>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Mã SP</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($products as $product) { ?>
	    <tr>
	      <td><?php echo $product['maSP']; ?></td>
	      <td><?php echo $product['tenSP']; ?></td>
	      <td><?php echo number_format($product['giaSP']); ?>VNĐ</td>
	      <td><a class="btn btn-primary" href="add_process.php?maSP=<?php echo $product['maSP']; ?>">Thêm vào giỏ hàng</a></td>
	    </tr>
	<?php
	 }
	?>
</table>
</body>
</html>