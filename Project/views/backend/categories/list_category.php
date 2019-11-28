
<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<div class="content-wrapper">
	<section class="content">
		<h2 style="text-align: center; padding: 2% 0;">-- Danh sách danh mục --</h2>
		<?php
		if (isset($_COOKIE['msg_go_list_category'])) {
			?>
			<div class="alert alert-success" role="alert">
				<strong>Thông báo : </strong>
				<?php echo $_COOKIE['msg_go_list_category']; ?>
			</div>
			<?php
		}
		?>
		<table class="table table-hover table-sm">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Tên</th>
					<th scope="col">Danh mục chứa</th>
					<th scope="col">Trạng thái</th>
					<th style="width: 35%;" scope="col">Mô tả</th>
					<?php if ($_SESSION['user']['position'] == 'admin') { ?>
						<th scope="col">Hành động</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i=0;
				foreach ($categories as $category) { 
					$i++;
					if ($category['deleted_at']==NULL) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $category['name']; ?></td>
							<td>
								<?php
								if ($category['parent_id']==NULL) {
									echo "Danh mục cha";
								}else{
									for ($j=0; $j < count($cate) ; $j++) {
										if($category['parent_id'] != $cate[$j]['id']){
											continue;	
										}else{
											print_r($cate[$j]['name']) ;
										}
									}
								}
								?>	
							</td>
							<td><?php 
							if($category['status'] == 'pending'){
								echo "Chờ duyệt";
							}else if($category['status'] == 'show'){
								echo "Hiển thị";
							}else if ($category['status'] == 'hidden'){
								echo "Ẩn";
							}else{
								echo "Xóa tạm thời";
							}?>
						</td>
						<td style="width: 35%"><?= $category['description']; ?></td>
						<td>
							<?php
							if ($_SESSION['user']['position'] == 'admin' && $category['status']=='pending') { ?>
								<a href="?mod=blogger&act=browse-category&id=<?= $category['id'] ?>" class="btn btn-sm my-btn btn-primary btn-check mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Duyệt danh mục"><i class="far fa-check-circle"></i></a>
							<?php }
							if ($_SESSION['user']['position'] == 'admin') {
								if($_SESSION['user']['id'] == $category['user_id'] ){
								?>
									<a href="?mod=blogger&act=edit-category&id=<?= $category['id'] ?>" class="btn btn-sm my-btn btn-edit mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Chỉnh sửa danh mục"><i class="fa fa-pen"></i></a>
								<?php } ?>
									<a href="?mod=blogger&act=destroy-category&id=<?= $category['id'] ?>" class="btn btn-sm my-btn btn-delete mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Xóa danh mục"><i class="fa fa-times" aria-hidden="true"></i></a>

								<?php if($category['status'] == 'show'){ ?>
									<a href="?mod=blogger&act=edit-status-category&id=<?= $category['id'] ?>" class="btn btn-sm my-btn btn-mode mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Ẩn danh mục"><i class="fa fa-lock" aria-hidden="true"></i></a>
								<?php }else if($category['status'] == 'hidden'){ ?>
									<a href="?mod=blogger&act=edit-status-category&id=<?= $category['id'] ?>" class="btn btn-sm my-btn btn-mode mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Hiển thị danh mục"><i class="fas fa-globe-americas"></i></a>
								<?php }} ?>
							</td>
						</tr>
						<?php
					}}
					?>
				</table>
			</section>
		</div>
		<?php require_once('views/backend/layouts/footer.php'); ?>