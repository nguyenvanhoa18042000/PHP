<?php
	session_start();
	if (isset($_GET['msv'])) {
		$msv = $_GET['msv'];
	}
	if (isset($_SESSION['info'])) {
		$student=$_SESSION['info'][$msv];
	}
	if (isset($_GET['msv'])) {
		$msv = $_GET['msv'];
		unset($_SESSION['info'][$msv]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
        <form action="edit_process.php" method="POST" role="form">
            <legend>CHỈNH SỬA THÔNG TIN SINH VIÊN</legend>
            
            <div class="form-group">
                <label for="">Mã sinh viên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập mã sinh viên" name="msv" value="<?php echo $student['msv']; ?>">
            </div>

            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="name" value="<?php echo $student['name']; ?>">
            </div>

            <div class="form-group">
                <label for="">Khóa học</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="course" value="<?php echo $student['course']; ?>">
            </div>
            
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="phoneNumber" value="<?php echo $student['phoneNumber']; ?>">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="Nhập vào email" name="email" value="<?php echo $student['email']; ?>">
            </div>  

            <div class="form-group">
                <label for="">Giới tính</label><br>
                <input required=”required”  type="radio" value="Nam"  name="gender" <?php echo ($student['gender']=="Nam")?"checked":""; ?>> Male 
                <input required=”required”  type="radio" value="Nữ"  name="gender" <?php echo ($student['gender']=="Nữ")?"checked":""; ?>> Female 
                <input required=”required”  type="radio" value="Khác"  name="gender" <?php echo ($student['gender']=="Khác")?"checked":""; ?>> Other 
            </div>
            
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address" value="<?php echo $student['address']; ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>