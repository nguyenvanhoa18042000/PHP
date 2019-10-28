<?php
	require_once('connection_mysql.php');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	//date('d/m/Y - H:i:s');
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$query_posts="SELECT * FROM posts WHERE id=".$id;
		$result_posts= $conn->query($query_posts);
		$row_post=$result_posts->fetch_assoc();	

		$row_post['view_count']=$row_post['view_count']+1;
		$time_int=strtotime(date($row_post['created_at']));
		
		$created_at=date('H:i:s - d/m/Y',$time_int);

		$update_view="UPDATE posts SET view_count='".$row_post['view_count']."' WHERE id=".$id;
		$conn->query($update_view);
	}
	$query_categories="SELECT name FROM categories WHERE id=".$row_post['category_id'];
	$result_categories=$conn->query($query_categories);
	$row_category=	$result_categories->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail post</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.info-post{
    		width: 80%;
    		margin: 8% auto 0 auto;
    	}
    	.info-post>div{
    		overflow:hidden;
    	}
    	.content{
    		width: 70%;
    		float: left;
			margin-top: 1%;
    	}
    	.content>p{
    		text-align: right;
    		margin-top: 3%;
    	}
    	.category{
    		font-size: 20px;
    		text-align: center;
    	}
    	h3{
    		text-align: center;
    		margin-bottom: 0;
    	}
    	img{
    		width: 30%;
    		height:300px;
    		float: left;
    	}
    </style>
</head>
<body>
	<h2 style="text-align: center;">POST</h2>
	<a style="text-align: right;  position: relative; float: right; right: 10%; margin-bottom: 2%;" class="btn btn-success" href="posts.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back posts</a>
	<div class="info-post">
		<p class="category">
			Danh mục: <?= $row_category['name'] ?> & 
			<span><i class="fa fa-eye" aria-hidden="true"></i> <?= $row_post['view_count'] ?> lượt xem</span>
		</p>
		<h3><?= $row_post['title'] ?></h3>
		<div >
			<img src="images/<?= $row_post['thumbnail'] ?>" >
			<div class="content">
				<h4><?= $row_post['description'] ?></h4>
				<span><?= $row_post['content'] ?></span>
				<p><i class="fa fa-calendar" aria-hidden="true"></i> Ngày đăng: <?= $created_at ?></p>
			</div>
		</div>	
	</div>
</body>
</html>