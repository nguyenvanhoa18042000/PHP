
<?php require_once('layouts/header.php'); ?>
<section style="padding: 2em 0;" class="site-section py-lg">
	<div class="container">
		<div class="row blog-entries element-animate">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="post-meta">
				<?php foreach ($users as $user) { 
					if ($post['user_id'] == $user['id']) {
				?>
					<span class="author mr-2"><img src="../public/public_blog/images/<?= $user['avatar'] ?>" alt="Colorlib" class="mr-2"> <?= $user['name'] ?></span>&bullet;
					<span class="mr-2"> 
						<?php $timestamp = strtotime($post['created_at']);
						echo date("H:i:s - d/m/Y", $timestamp);  ?> 
					</span> &bullet;
					<span class="ml-2"><span style="margin-right: 2%" class="fa fa-eye"></span><?= $post['view_count'] ?></span>
				<?php }} ?>
				</div>
				<div><?= $post['content'] ?></div>
			</div>
			<?php require_once('layouts/sidebar.php'); ?>

		</div>
	</div>
</section>
<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="mb-3 ">Related Post</h2>
			</div>
		</div>
		<div class="row">
			<?php foreach ($related_posts as $post) { ?>
			<div class="col-md-6 col-lg-4">
				<a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('../../public/public_blog/images/<?= $post['thumbnail'] ?>'); ">
					<div class="text">
						<div class="post-meta">
							<span class="author mr-2">
								<?php foreach ($users as $user) { 
									if ($post['user_id'] == $user['id']) {
								?>
								<img style="margin-right: 2%" src="../../public/public_blog/images/<?= $user['avatar'] ?>" alt="Colorlib"><?= $user['name'] ?></span>&bullet;
								<?php }} ?>
							<span class="mr-2"> 
								<?php $timestamp = strtotime($post['created_at']);
								echo date("H:i:s - d/m/Y", $timestamp);  ?> 
							</span> &bullet;
							<span class="ml-2"><span style="margin-right: 2%" class="fa fa-eye"></span><?= $post['view_count'] ?></span>
						</div>
						<h3><?= $post['title'] ?></h3>
					</div>
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php require_once('layouts/footer.php'); ?>