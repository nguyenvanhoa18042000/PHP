<?php
    require_once('connection_mysql.php'); 
    $query="SELECT * FROM categories";
    $result=$conn->query($query);
    $categories=array();
    while ($row=$result->fetch_assoc()) {
        $categories[]=$row;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DevMind - Education And Technology Group</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    
</head>
<body>
    <div class="container">
    <h3 align="center">Add New Post</h3>
    <hr>
        <form action="post_add_process.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input required type="text" class="form-control" id="title" placeholder="" name="title" onkeyup="ChangeToSlug();">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input required type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" class="form-control" id="slug" placeholder="" name="slug" readonly>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input required type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="comment">Content</label>
                <textarea required class="form-control" rows="6" id="" name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="categories">Choose category</label>
                <select id="categories" name="category_id" class="form-group form-control" required>
                    <option hidden value="0">--Choose a category--</option>
                <?php foreach ($categories as $row_category) { ?>
                    <option value="<?= $row_category['id'] ?>"><?= $row_category['name'] ?></option>
                <?php
                } 
                ?> 
                </select>
            </div>
            <button type="submit"  class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
<?php
    require_once('create_slug.php');
?>