<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<div class="content-wrapper" style="padding-left: 3%">
	<section class="content">
		<h2 style="text-align: center; padding: 2% 0;">-- Thông tin cá nhân --</h2>
		<?php
		if (isset($_COOKIE['msg_go_detail_user'])) {
			?>
			<div class="alert alert-success" role="alert">
				<strong>Thông báo : </strong>
				<?php echo $_COOKIE['msg_go_detail_user']; ?>
			</div>
		<?php
		}
		?>
		<h4>Ảnh đại diện : <img style="width: 100px; height: 100px; border-radius: 50%;" src="public/public_blog/images/<?= $_SESSION['user']['avatar'] ?>"></h4>
		
		<form method="POST" action="?mod=blogger&act=edit-avatar" enctype="multipart/form-data" style="margin: 3% 0;">
			<label>Thay đổi ảnh đại diện : </label>
			<input type="file" name="avatar">
			<button type="submit" class="btn btn-sm btn-primary" name="submit">Cập nhật</button>
		</form>

		<h4>Họ tên : <?= $_SESSION['user']['name'] ?></h4>
		<h4>Tên tài khoản : <?= $_SESSION['user']['user_name'] ?></h4>
		<h4>Email: <?= $_SESSION['user']['email'] ?></h4>
		<h4>Trạng thái: <?= $_SESSION['user']['status'] ?></h4>
		<h4>Chức vụ: <?= $_SESSION['user']['position'] ?></h4>
	</section>
</div>
<?php require_once('views/backend/layouts/footer.php'); ?>