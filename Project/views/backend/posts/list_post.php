
<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<div class="content-wrapper">
	<section class="content">
		<?php if ($_GET['act'] == 'list-post-hidden') { ?>
			<h2 style="text-align: center; padding: 2% 0;">-- Danh sách bài viết đã ẩn 
		<?php }else if($_GET['act'] == 'list-post-new'){ ?>
			<h2 style="text-align: center; padding: 2% 0;">-- Danh sách bài viết chưa duyệt 
		<?php }else{ ?>
			<h2 style="text-align: center; padding: 2% 0;">-- Danh sách bài viết
		<?php } ?>
		
			<?php 
				if (isset($_POST['display_mode'])) {
					if ($display_mode == 'show') {
						echo " đang hiển thị";
					}else if ($display_mode == 'pending') {
						echo " đang chờ duyệt";
					}else if ($display_mode == 'prohibit') {
						echo " bị admin ẩn";
					}else if ($display_mode == 'trash') {
						echo " đã xóa mềm";
					}else if ($display_mode == 'hidden') {
						echo " đã ẩn";
					}
				}
			?> --
		</h2>
		<?php
		if (isset($_COOKIE['msg_go_list_post'])) {
			?>
			<div class="alert alert-success" role="alert">
				<strong>Thông báo : </strong>
				<?php echo $_COOKIE['msg_go_list_post']; ?>
			</div>
			<?php
		}
		?>
		<div class="text-right mb-3 mr-3" style="" class="col-md-2">
			<?php if ($_SESSION['user']['position'] !='admin') { ?>
			<form method="POST" action="?mod=blogger&act=post-by-display-mode">
				<select name="display_mode" id="display_mode" onchange="this.form.submit();">
					<?php 
						$display_mode='all'; 
						
							//$array = array('all','show','hidden','trash');
						//}else{
						$array = array('all','show','hidden','pending','trash','prohibit');
						//}
						foreach($array as $display_mode): 
					?>
						<option <?php if( isset($_POST["display_mode"]) && $_POST["display_mode"] == $display_mode) echo "selected" ?> value="<?= $display_mode; ?>">
						<?php 
							if ($display_mode == 'all') {
								echo "Tất cả bài viết";
							} else if ($display_mode == 'show') {
								echo "Bài viết đang hiển thị";
							}else if ($display_mode == 'hidden') {
								echo "Bài viết đã bị ẩn";
							}else if ($display_mode == 'pending') {
								echo "Bài viết đang chờ duyệt";
							}else if ($display_mode == 'trash') {
								echo "Bài viết đã xóa mềm";
							}else if ($display_mode == 'prohibit') {
								echo "Bài viết bị admin ẩn";
							} ?>
						</option>
					<?php endforeach; ?>
				</select>
			</form>
			<?php } ?>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th  scope="col">STT</th>
					<th style="width: 27%;" scope="col">Tiêu đề</th>
					<th style="width: 15%;" scope="col">Danh mục</th>
					<th scope="col">Ảnh</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Lượt xem</th>
					<th scope="col">Hành động</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(isset($posts)){
					$i=0; 
					foreach ($posts as $post) { 
					$i++;
				?>
				<tr>
					<td ><?php echo $i; ?></td>
					<td style="width: 27%;"><?php echo $post['title']; ?></td>
					<?php foreach ($categories as $category) {
						if ($post['category_id'] == $category['id']) {
						?>
								<td style="width: 15%;"><?php echo $category['name']; ?></td>
						<?php
							break;
							}
						}
					?>
					<td style="width: 15%;"><img style="width: 80px; height: 70px;" src="public/public_blog/images/<?php echo $post['thumbnail']; ?>"></td>
					<td>
						<?php 
							if($post['status'] == 'trash'){
								echo "Xóa tạm thời";
							}else if($post['status'] == 'pending'){
								echo "Chờ duyệt";
							}else if($post['status'] == 'show'){
								echo "Hiển thị";
							}else if($post['status'] == 'prohibit' && $_SESSION['user']['position'] != 'admin'){
								echo "Bị admin ẩn";
							}else if($post['status'] == 'prohibit' && $_SESSION['user']['position'] == 'admin'){
								echo "Ẩn";
							}else if($post['status'] == 'hidden'){
								echo "Ẩn";
							}
						?>
					</td>
					<td><?php echo $post['view_count']; ?></td>
					<td>
						<a href="?mod=home&act=show-post&slug=<?= $post['slug'] ?>" target="_blank" class="btn btn-sm my-btn btn-detail mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Xem chi tiết"><i class="fa fa-eye"></i></a>
						<?php
							if ($post['status'] == 'prohibit' && $_SESSION['user']['position'] == 'admin') {
						?>
							<a href="?mod=blogger&act=destroy-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-delete mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Xóa bài viết"><i class="fa fa-times" aria-hidden="true"></i></a>
							<a href="?mod=blogger&act=edit-status-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-mode mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Hiển thị bài viết"><i class="fas fa-globe-americas"></i></a>
						<?php } ?>
						<?php
							if ($post['status'] == 'pending' && $post['user_id'] != $_SESSION['user']['id']) {
						?>
							<a href="?mod=blogger&act=browse-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-primary btn-check mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Duyệt bài viết"><i class="far fa-check-circle"></i></a>
							<a href="?mod=blogger&act=destroy-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-delete mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Xóa bài viết"><i class="fa fa-times" aria-hidden="true"></i></a>
						<?php } ?>

						<?php
							if (($post['status'] == 'show' || $post['status'] == 'hidden') && $post['user_id'] != $_SESSION['user']['id']) {
						?>
							<a href="?mod=blogger&act=destroy-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-delete mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Xóa bài viết"><i class="fa fa-times" aria-hidden="true"></i></a>
						<?php } ?>


						<?php if($post['status'] != 'trash' && $_SESSION['user']['status'] == 'active' && $post['user_id'] == $_SESSION['user']['id']){ ?>
							<a href="?mod=blogger&act=edit-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-edit mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Chỉnh sửa bài biết"><i class="fa fa-pen"></i></a>
							<a href="?mod=blogger&act=move-to-trash&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-delete mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Đưa vào thùng rác"><i class="fa fa-trash"></i></a>
						<?php }else if($post['status'] == 'trash' && $_SESSION['user']['status'] == 'active'){ ?>
							<a href="?mod=blogger&act=restore-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-restore mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Khôi phục bài viết"><i class="fa fa-undo" aria-hidden="true"></i></a>
							<a href="?mod=blogger&act=destroy-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-delete mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Xóa bài viết"><i class="fa fa-times" aria-hidden="true"></i></a>
						<?php } ?>
						<?php if ($post['status'] == 'show' && $_SESSION['user']['status'] == 'active') { ?>
							
							<a href="?mod=blogger&act=edit-status-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-mode mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Ẩn bài viết"><i class="fa fa-lock" aria-hidden="true"></i></a>
						<?php }else if($post['status'] == 'hidden' && $_SESSION['user']['status'] == 'active'){ ?>
							<a href="?mod=blogger&act=edit-status-post&id=<?= $post['id'] ?>" class="btn btn-sm my-btn btn-mode mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Hiển thị bài viết"><i class="fas fa-globe-americas"></i></a>
						<?php } ?>
					</td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>
	</section>
</div>
<?php require_once('views/backend/layouts/footer.php'); ?>