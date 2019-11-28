
<?php require_once('layouts/header.php'); ?>
<section style="padding: 2em 0;" class="site-section pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme home-slider">
				<?php foreach ($posts_of_slide as $post) { ?>
					<div>
						<a href="?mod=home&act=show-post&slug=<?= $post['slug'] ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('../../public/public_blog/images/<?= $post['thumbnail'] ?>'); ">
							<div class="text half-to-full">
								<span class="category mb-5">
									<?php foreach ($categories as $category) {
										if ($post['category_id'] == $category['id']) {
											echo $category['name'];
										}
									} ?>
								</span>
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
								<h3><?= $post['title']; ?></h3>
								<p><?= $post['description']; ?></p>
							</div>
						</a>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="site-section py-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="mb-4">Latest Posts</h2>
			</div>
		</div>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row">
				<?php foreach ($posts_for_pagination as $post) { 
				?>
					<div class="col-md-6">
						<a href="?mod=home&act=show-post&slug=<?= $post['slug'] ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
							<img style="width: 350px; height: 234px;" src="../../public/public_blog/images/<?= $post['thumbnail'] ?>" alt="Image placeholder">
							<div class="blog-content-body">
								<div class="post-meta">
									<span class="author mr-2">
									<?php foreach ($users as $user) {
										if ($post['user_id'] == $user['id']) {
									?>
										<img src="../../public/public_blog/images/<?= $user['avatar'] ?>" alt="Colorlib"> <?php $user['name'] ?></span>&bullet;
									<?php }} ?>
									<span class="mr-2"> 
										<?php $timestamp = strtotime($post['created_at']);
										echo date("d/m/Y", $timestamp);  ?> 
									</span> &bullet;
									<span class="ml-2"><span style="margin-right: 2%" class="fa fa-eye"></span><?= $post['view_count'] ?></span>
								</div>
								<h2><?= $post['title'] ?></h2>
							</div>
						</a>
					</div>
				<?php } ?>
				</div>
				<div class="row mt-5">
				<?php if ($number_pages > 1){
				?>
					<div class="col-md-12 text-center">
						<nav aria-label="Page navigation" class="text-center">
							<ul class="pagination">
								<?php if ($page != 1) { ?>
									<li class="page-item "><a href="?mod=home&act=index&page=<?=$page-1 ?>" href="#">&lt;</a></li>
								<?php } ?>
								<?php for ($t=1; $t <= $number_pages ; $t++) { 
									if ($t == $page) {
								?>
								<li class="page-item"><a style="background-color: #6610f2; color: white;" class="page-link" href="?mod=home&act=index&page=<?= $t; ?>"><?= $t ?></a></li>
								<?php }else{ ?>
									<li class="page-item"><a class="page-link" href="?mod=home&act=index&page=<?= $t; ?>"><?= $t ?></a></li>
								<?php }} ?>
								<?php if ($page != $number_pages) { ?>
									<li class="page-item"><a class="page-link" href="?mod=home&act=index&page=<?= $page+1 ?>">&gt;</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				<?php } ?>
				</div>
			</div>
			<?php require_once('layouts/sidebar.php'); ?>

			<?php require_once('layouts/footer.php'); ?>