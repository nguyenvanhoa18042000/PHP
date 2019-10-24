
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
	<div style="margin-top: 5%;" class="container">
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>Upload document</legend>
            
            <div class="form-group">
                <label for="">Name file</label>
                <input required="required" type="text" class="form-control" name="titleFile">
            </div>

            <div class="form-group">
                <label for="">Choose file</label>
                <input type="file" class="form-control" name="fileUpload">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
            <a style="color:white" class="btn btn-success" href="list_uploaded.php">View list loaded</a>
        </form>
    </div>
</body>
</html>
<?php
    session_start();
    if (isset($_POST['titleFile'])) {
        $titleFile=$_POST['titleFile'];
    }
    if (isset($_POST['submit'])&&isset($_FILES['fileUpload'])) {
        if ($_FILES['fileUpload']['error']>0) {
            echo "Upload file bị lỗi";
        }else{
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/'.$_FILES['fileUpload']['name']);
            $nameFile=$_FILES['fileUpload']['name'];
            $_SESSION['document'][]=array(
                'name'=>$titleFile,
                'file_name'=>$nameFile
            );
            echo "------------------------ UPLOADED SUCCESSFUL -------------------------";
        }
    }
    
?>









