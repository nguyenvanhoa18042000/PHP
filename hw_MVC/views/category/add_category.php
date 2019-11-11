
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
</head>
<body>
    <div class="container">
    <h3 align="center">Add New Category</h3>
    <hr>
        <form action="?func=category&act=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="string" placeholder="" name="name" onkeyup="ChangeToSlug();">
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input  type="text" class="form-control" id="slug" placeholder="" name="slug"  readonly>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Chọn danh mục cha</label>
                <select name="parent_id" class="form-group form-control">
                    <option value="0">Mời bạn chọn</option>
                <?php foreach ($categories as $category) { 
                    if ($category['parent_id'] == NULL) {

                ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php
                } }
                ?>
                  
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
<?php require_once('public/library/create_slug.php'); ?>