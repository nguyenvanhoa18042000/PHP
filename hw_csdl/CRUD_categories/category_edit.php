<?php
    require_once('connection_mysql.php');
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $query = "SELECT * FROM categories WHERE id=".$id;

    $result = $conn->query($query);

    $row = $result->fetch_assoc(); 
//ssdasdas
    $query1 = "SELECT * FROM categories";
    
    $result1 = $conn->query($query1);

    $categories = array();

    while($row2 = $result1->fetch_assoc()) { 
    $categories[] = $row2;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Category</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
    <h3 align="center">Edit Category</h3>
    <hr>
        <form action="category_edit_process.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="<?= $row['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?= $row['description'] ?>">
            </div>
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select name="parent_id" class="form-group form-control">
                    <option value="0">Mời bạn chọn</option>
                <?php foreach ($categories as $row_category) { ?>
                    <option <?php if ($row['parent_id']==$row_category['id']) {
                        echo "selected";
                    }?> value="<?= $row_category['id'] ?>"><?= $row_category['name'] ?></option>
                <?php
                } 
                ?>
                  
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Update</button>
        </form>
    </div>
</body>
</html>