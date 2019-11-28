<?php require_once('layouts/header.php'); ?>

<section style="padding: 2em 0;" class="site-section pt-5">
	<div class="container">
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row">
					<div class="col-md-12">
						<h2 class="mb-4">Xin chào cả nhà ! Mình tên là Doraemon</h2>
						<p class="mb-5"><img src="../../public/public_blog/images/myself.jpg" alt="Image placeholder" class="img-fluid"></p>
						<p>Yêu màu tím, thích màu hồng. Yêu màu xanh hoà bình và ghét màu đỏ chiến tranh. Sống nội tâm, hay khóc thầm, không đái dầm. Tôn thờ sự thuỷ chung và căm ghét sự giả dốii.</p>
						<p> Bề ngoài trông mình vậy thôi nhưng thật ra bên trong con người mình là 1 tâm hồn nhạy cảm yếu đuối mong manh long lanh như giọt sương mai buổi sớm.</p>
					</div>
				</div>
				<div class="row mb-5 mt-5">
					<div class="col-md-12 mb-5">
						<h2>My Latest Posts</h2>
					</div>
					<div class="col-md-12">
					<?php foreach ($posts_for_pagination as $post) { ?>
						<div class="post-entry-horzontal">
							<a href="blog-single.html">
								<div class="image" style="background-image: url(../public/public_blog/images/<?= $post['thumbnail'] ?>);"></div>
								<span class="text">
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
								</span>
							</a>
						</div>
					<?php } ?>
					</div>
				</div>
				<div class="row mt-5">
				<?php if ($number_pages_of_about > 1){
				?>
					<div class="col-md-12 text-center">
						<nav aria-label="Page navigation" class="text-center">
							<ul class="pagination">
								<?php if ($page != 1) { ?>
									<li class="page-item "><a href="?mod=home&act=about-me&page=<?=$page-1 ?>" href="#">&lt;</a></li>
								<?php } ?>
								<?php for ($t=1; $t <= $number_pages_of_about ; $t++) { 
									if ($t == $page) {
								?>
								<li class="page-item"><a style="background-color: #6610f2; color: white;" class="page-link" href="?mod=home&act=about-me&page=<?= $t; ?>"><?= $t ?></a></li>
								<?php }else{ ?>
									<li class="page-item"><a class="page-link" href="?mod=home&act=about-me&page=<?= $t; ?>"><?= $t ?></a></li>
								<?php }} ?>
								<?php if ($page != $number_pages_of_about) { ?>
									<li class="page-item"><a class="page-link" href="?mod=home&act=about-me&page=<?= $page+1 ?>">&gt;</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				<?php } ?>
				</div>
			</div>

			<?php require_once('views/fontend/layouts/sidebar.php'); ?>

		</div>
	</div>
</section>

<?php require_once('views/fontend/layouts/footer.php'); ?>