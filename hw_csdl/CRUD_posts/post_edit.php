<?php
	require_once('connection_mysql.php');
	if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $query_posts="SELECT * FROM posts WHERE id=".$id;
		$result_post= $conn->query($query_posts);
		$post=$result_post->fetch_assoc();
    }
	
	$query_categories="SELECT * FROM categories";

	$categories=array();

	$result_category=$conn->query($query_categories);
	while ($row=$result_category->fetch_assoc()) {
		$categories[]=$row;
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit post</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container">
    <h3 align="center">Edit post</h3>
    <hr>
        <form action="post_edit_process.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label for="" >Title</label>
                <input required type="text" class="form-control" id="title" placeholder="" name="title" value="<?= $post['title'] ?>" onkeyup="ChangeToSlug();">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input required type="text" class="form-control" id="" placeholder="" name="description" value="<?= $post['description'] ?>">
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input readonly type="text" class="form-control" id="slug" placeholder="" name="slug" value="<?= $post['slug'] ?>">
            </div>
            <div class="form-group">
                <label for="" style="margin-right: 2%">Thumbnail : </label>
                <img src="images/<?= $post['thumbnail'] ?>" width="200px" height="200px">
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea required rows="6" class="form-control" id="" placeholder="" name="content"><?= $post['content'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Choose category</label>
                <select id="categories" required name="category_id" class="form-group form-control">
                    <option hidden value="0">--Choose a category--</option>
                <?php foreach ($categories as $row_category) { ?>
                    <option  
                        <?php 
                        	if($post['category_id']==$row_category['id']){
                         		echo "selected";
                     		}
                     	?> 
                        value="<?= $row_category['id']?>"><?= $row_category['name']?>
                    </option>
                <?php
                }
                ?>
                  
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Update</button>
        </form>
    </div>
</body>
<?php
	require_once('create_slug.php'); 
?>
</html>
