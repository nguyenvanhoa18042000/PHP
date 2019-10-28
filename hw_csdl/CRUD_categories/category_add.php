<?php
    require_once('connection_mysql.php');
    $query = "SELECT * FROM categories WHERE parent_id is NULL";

    $result = $conn->query($query);

    $categories = array();

    while($row = $result->fetch_assoc()) { 
    $categories[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DevMind - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Add New Category</h3>
    <hr>
        <form action="Category_add_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select name="parent_id" class="form-group form-control">
                    <option value="0">Mời bạn chọn</option>
                <?php foreach ($categories as $row_category) { ?>
                    <option value="<?= $row_category['id'] ?>"><?= $row_category['name'] ?></option>
                <?php
                } 
                ?>
                  
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>