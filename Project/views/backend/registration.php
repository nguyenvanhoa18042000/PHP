<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../../public/public_blog/css/css_registration.css">
</head>
<body>
	<div id="snow">
	<div class="box">
		<img src="public/public_blog/images/avatar_doraemon.jpg" class="avatar">
		<h1>Registration here</h1>
		<form method="POST" action="?mod=auth&act=store">
			<input required type="text" name="name" placeholder="Name">
			<input required type="email" name="email" placeholder="Email">
			<input required type="text" name="user_name" placeholder="Username">
			<input required type="password" name="password" placeholder="Password">
			<p style="color: red;">
				<?php if (isset($_COOKIE['msg'])) {
					echo $_COOKIE['msg'];
				} ?>
			</p>
			<input type="submit" name="submit" value="Registration">
			<a href="#">Forgot password</a>
		</form>
	</div>
	</div>
</body>
</html>
<script type="text/javascript" src="public/public_blog/js/particles.js"></script>
<script type="text/javascript" src="public/public_blog/js/app.js"></script>