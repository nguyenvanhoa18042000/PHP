<?php
	session_start();
	$products=$_SESSION['cart'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">THÔNG TIN GIỎ HÀNG</h2>
	<a style="text-align: right;  position: relative; float: right; right: 10%; margin-bottom: 2%;" class="btn btn-success" href="index.php">Tiếp tục mua hàng <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Mã SP</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Thành tiền</th>
      <th style="width: 20%;" scope="col">Hình ảnh</th>
    </tr>
  </thead>
  <tbody>
  	<?php $sum=0; ?>
  	<?php foreach ($products as $product) {
  		$sum+= $product['soluongSP'] * $product['giaSP'];
  	?>
	    <tr>
	      <td><?php echo $product['maSP']; ?></td>
	      <td><?php echo $product['tenSP']; ?></td>
	      <td><?php echo number_format($product['giaSP']); ?> VNĐ</td>
	      <td>
	      	<a class="btn btn-primary" href="add2cart.php?maSP=<?php echo $product['maSP']; ?>">+</a>
	      	<?php echo $product['soluongSP']; ?>
	      	<a class="btn btn-warning" href="remove.php?maSP=<?php echo $product['maSP']; ?>">-</a>
	      </td>
	      <td><?php echo number_format($product['soluongSP'] * $product['giaSP']); ?> VNĐ</td>
	      <td style="width: 20%;"><img style="width: 47%; height: 18%;" src="<?php echo $product['hinhAnh']; ?>"></td>
	    </tr>
	<?php
	 }
	?>
	<tr>
		<td colspan="4" style="font-weight: bold; font-size: 20px; text-align: center;">Thành tiền </td>
		<td style="text-align: left;" colspan="2" style="font-weight: bold; text-align: right;"> <?= number_format($sum); ?> VNĐ</td>
		<td colspan="1"></td>
	</tr>
  </tbody>
</table>
</body>
</html>