
<?php require_once('layouts/header.php'); ?>
<section style="padding: 2em 0;" class="site-section pt-5">
	<div class="container">
		<div class="row mb-4">
			<div class="col-md-6">
				<h2 class="mb-4">Danh mục: <?= $Category['name']; ?></h2>
			</div>
		</div>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row mb-5 mt-5">
					<div class="col-md-12">
					<?php foreach ($posts_for_pagination as $post) { ?>
						<div class="post-entry-horzontal">
							<a style="width: 100%;" href="?mod=home&act=show-post&slug=<?= $post['slug'] ?>">
								<div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(../../public/public_blog/images/<?= $post['thumbnail'] ?>);"></div>
								<span class="text">
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
									<h2><?= $post['title'] ?></h2>
								</span>
							</a>
						</div>
					<?php } ?>
					</div>
				</div>
				<div class="row mt-5">
				<?php if ($number_pages_of_show_category > 1){
				?>
					<div class="col-md-12 text-center">
						<nav aria-label="Page navigation" class="text-center">
							<ul class="pagination">
								<?php if ($page != 1) { ?>
									<li class="page-item "><a href="?mod=home&act=show-category&slug=<?= $Category['slug'] ?>&page=<?=$page-1 ?>" href="#">&lt;</a></li>
								<?php } ?>
								<?php for ($t=1; $t <= $number_pages_of_show_category ; $t++) { 
									if ($t == $page) {
								?>
								<li class="page-item"><a style="background-color: #6610f2; color: white;" class="page-link" href="?mod=home&act=show-category&slug=<?= $Category['slug'] ?>&page=<?= $t; ?>"><?= $t ?></a></li>
								<?php }else{ ?>
									<li class="page-item"><a class="page-link" href="?mod=home&act=show-category&slug=<?= $Category['slug'] ?>&page=<?= $t; ?>"><?= $t ?></a></li>
								<?php }} ?>
								<?php if ($page != $number_pages_of_show_category) { ?>
									<li class="page-item"><a class="page-link" href="?mod=home&act=show-category&slug=<?= $Category['slug'] ?>&page=<?= $page+1 ?>">&gt;</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				<?php } ?>
				</div>
			</div>

			<?php require_once('layouts/sidebar.php'); ?>

		</div>
	</div>
</section>

<?php require_once('layouts/footer.php'); ?>