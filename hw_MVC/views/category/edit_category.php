
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
        <form action="?func=category&act=update" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" onkeyup="ChangeToSlug();" class="form-control" id="string" placeholder="" name="name" value="<?= $category['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input readonly  type="text" class="form-control" id="slug" placeholder="" name="slug" value="<?= $category['slug'] ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?= $category['description'] ?>">
            </div>
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select name="parent_id" class="form-group form-control">
                    <option value="0">Mời bạn chọn</option>
                <?php foreach ($categories as $row_category) {
                    if ($row_category['parent_id'] == NULL) { 
                ?>
                    <option <?php if ($category['parent_id']==$row_category['id']) {
                        echo "selected";
                    }?> value="<?= $row_category['id'] ?>"><?= $row_category['name'] ?></option>
                <?php
                } }
                ?>
                  
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Update</button>
        </form>
    </div>
</body>
</html>
<?php require_once('public/library/create_slug.php'); ?>