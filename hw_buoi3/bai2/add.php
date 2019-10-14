<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
        <form action="add_process.php" method="POST" role="form">
            <legend>Zent-PHP21-Thực hành gửi dữ liệu dùng POST</legend>
            
            <div class="form-group">
                <label for="">Mã sinh viên</label>
                <input required="required" type="text" class="form-control" id="" placeholder="Nhập mã sinh viên" name="msv">
            </div>

            <div class="form-group">
                <label for="">Họ và tên</label>
                <input required="required" type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="name">
            </div>

            <div class="form-group">
                <label for="">Khóa học</label>
                <input required="required" type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="course">
            </div>
            
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input required="required" type="text" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="phoneNumber">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input required="required" type="email" class="form-control" id="" placeholder="Nhập vào email" name="email" >
            </div>  

            <div class="form-group">
                <label for="">Giới tính</label><br>
                <input required=”required”  type="radio"  name="gender" value="Nam"> Male 
                <input required=”required”  type="radio"  name="gender" value="Nữ"> Female 
                <input required=”required”  type="radio"  name="gender" value="Khác"> Other 
            </div>
            
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input required="required" type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</body>
</html>