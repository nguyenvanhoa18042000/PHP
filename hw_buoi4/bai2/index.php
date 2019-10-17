<?php
	require_once('data.php');
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">DANH SÁCH SẢN PHẨM</h2>
	<a style="text-align: right;  position: relative; float: right; right: 10%; margin-bottom: 2%;" class="btn btn-success" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Vào xem giỏ hàng</a>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Mã SP</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th style="width: 20%;" scope="col">Hình ảnh</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($products as $product) { ?>
	    <tr>
	      <td><?php echo $product['maSP']; ?></td>
	      <td><?php echo $product['tenSP']; ?></td>
	      <td><?php echo number_format($product['giaSP']); ?> VNĐ</td>
	      <td><?php echo $product['soluongSP']; ?></td>
	      <td style="width: 20%;"><img style="width: 47%; height: 18%;" src="<?php echo $product['hinhAnh']; ?>"></td>
	      <td><a class="btn btn-primary" href="add2cart.php?maSP=<?php echo $product['maSP']; ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Thêm vào giỏ hàng</a></td>
	    </tr>
	<?php
	 }
	?>
</table>
</body>
</html>