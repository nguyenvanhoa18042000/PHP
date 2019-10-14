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
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 style="text-align: center;">THÔNG TIN GIỎ HÀNG</h2>
	<a style="text-align: right;  position: relative; float: right; right: 10%; margin-bottom: 2%;" class="btn btn-success" href="list.php">Tiếp tục mua hàng</a>
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Mã SP</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Thành tiền</th>
      <th scope="col">Thời gian cập nhật</th>
    </tr>
  </thead>
  <tbody>
  	<?php $sum=0; ?>
  	<?php foreach ($products as $product) {
  		$sum+= $product['soluongSP'] * $product['giaSP'];
  		date_default_timezone_set('Asia/Ho_Chi_Minh');
  		$time_buy= date ('H:i:s d-m-Y',$product['add_time']);

  	?>
	    <tr>
	      <td><?php echo $product['maSP']; ?></td>
	      <td><?php echo $product['tenSP']; ?></td>
	      <td><?php echo $product['soluongSP']; ?></td>
	      <td><?php echo number_format($product['giaSP']); ?>VNĐ</td>
	      <td><?php echo number_format($product['soluongSP'] * $product['giaSP']); ?>VNĐ</td>
	      <td><?php echo $time_buy; ?></td>
	      <td><a class="btn btn-primary" href="delete_product.php?maSP=<?php echo $product['maSP']; ?>">Xóa khỏi giỏ hàng</a></td>
	    </tr>
	<?php
	 }
	?>
	<tr>
		<td colspan="3" style="font-weight: bold; font-size: 20px; text-align: center;">Thành tiền </td>
		<td colspan="3" style="font-weight: bold; text-align: center;"> <?= number_format($sum); ?>VNĐ</td>
		<td colspan="1"></td>
	</tr>
  </tbody>
</table>
</body>
</html>