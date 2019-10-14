<?php
$error = array();
$data = array();
session_start();
if (isset($_POST['submit']))
{
    $data['codeStudent'] = isset($_POST['codeStudent']) ? $_POST['codeStudent'] : '';
    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['phoneNumber'] = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['gioitinh'] = isset($_POST['gender']) ? $_POST['gender'] : '';
    $data['address'] = isset($_POST['address']) ? $_POST['address'] : '';

    $_SESSION['info'] = $data;

    if (empty($data['codeStudent'])){
        $error['codeStudent'] = 'Bạn chưa nhập mã sinh viên';
    }

    if (empty($data['name'])){
        $error['name'] = 'Bạn chưa Họ và tên';
    }
    if (empty($data['email'])){
        $error['email'] = 'Bạn chưa nhập email';
    }

    if (empty($data['phoneNumber'])){
        $error['phoneNumber'] = 'Bạn chưa nhập số điện thoại';
    }

    if (empty($data['address'])){
        $error['address'] = 'Bạn chưa nhập nội dung';
    }


    if (count($error)==0) {
        header('Location: info.php');
    }
}

?>
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
        <form action="" method="POST" role="form">
            <legend>Zent-PHP21-Thực hành gửi dữ liệu dùng POST</legend>
            
            <div class="form-group">
                <label for="">Mã sinh viên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập mã sinh viên" name="codeStudent" value="<?php echo isset($data['codeStudent']) ? $data['codeStudent'] : ''; ?>">
                <span style="color: red;"><?php echo isset($error['codeStudent']) ? $error['codeStudent'] : '';?></span>
            </div>

            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                <span style="color: red;"><?php echo isset($error['name']) ? $error['name'] : ''; ?></span>
            </div>
            
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào số điện thoại" name="phoneNumber" value="<?php echo isset($data['phoneNumber']) ? $data['phoneNumber'] : ''; ?>">
                <span style="color: red;"><?php echo isset($error['phoneNumber']) ? $error['phoneNumber'] : ''; ?></span>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="Nhập vào email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                <span style="color: red;"><?php echo isset($error['email']) ? $error['email'] : ''; ?></span>
            </div>  

            <div class="form-group">
                <label for="">Giới tính</label><br>
                <input required=”required”  type="radio"  name="gender" value="Nam"> Male 
                <input required=”required”  type="radio"  name="gender" value="Nữ"> Female 
                <input required=”required”  type="radio"  name="gender" value="Khác"> Other 
            </div>
            
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="" placeholder="Nhập vào địa chỉ" name="address" value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
                <span style="color: red;"><?php echo isset($error['address']) ? $error['address'] : ''; ?></span>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
</body>
</html>

