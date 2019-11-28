
<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<div class="content-wrapper">
	<section class="content">
		<h2 style="text-align: center; padding: 2% 0;">-- Danh sách tác giả --</h2>
		<?php
		if (isset($_COOKIE['msg_add'])) {
			?>
			<div class="alert alert-success" role="alert">
				<strong>Thông báo : </strong>
				<?php echo $_COOKIE['msg_add']; ?>
			</div>
			<?php
		}
		?>
		<table class="table table-hover table-sm">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Tên</th>
					<th style="width: 12%;" scope="col">Ảnh đại diện</th>
					<th scope="col">Email</th>
					<th scope="col">Hoạt động gần nhất</th>
					<th scope="col">Trạng thái / Chức vụ</th>
					<th scope="col">Hành động</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($users as $user) { if($user['user_name'] != $_SESSION['user']['user_name']){ ?>
					<tr>
						<td><?= $user['id']; ?></td>
						<td><?= $user['name']; ?></td>
						<td style="width: 12%;"><img style="width: 80px; height: 70px;" src="public/public_blog/images/<?php echo $user['avatar']; ?>"></td>
						<td><?= $user['email']; ?></td>
						<td>
							<?php 
								if ($user['time_login'] != NULL) {
									$timestamp = strtotime($user['time_login']);
									echo date("H:i:s - m/d/Y", $timestamp); 
								}else{
									echo "Chưa đăng nhập";
								}
							?>	
						</td>
						<td>
							<?php 
								if ($user['status'] != 'block') {
									$status = $user['status'] == 'active'?'Hoạt động':'Không hoạt động'; 
									$position='Tác giả';
									if ($user['position'] == 'admin') {
										$position = 'Quản trị viên';
									}
									echo $status.' / '.$position;
								}else{
									echo "Đã khóa";
								}
							?>	
						</td>
						<td>
							<?php if($user['status'] == 'block'){ ?>
								<a href="?mod=blogger&act=edit-status-user&id=$user['id'] ?>" class="btn btn-sm btn-detail mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Mở khóa tài khoản"><i class="fas fa-lock-open"></i></a>
							<?php }else{ ?>
								<a href="?mod=blogger&act=edit-status-user&id=$user['id'] ?>" class="btn btn-sm btn-detail mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Khóa tài khoản"><i class="fas fa-lock"></i></a>
							<?php if ($user['status'] == 'active') { ?>
								<a href="?mod=blogger&act=edit-status-user&id=$user['id'] ?>" class="btn btn-sm btn-detail mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Tắt hoạt động"><i class="fas fa-user-times"></i></a>
							<?php }else{ ?>
								<a href="?mod=blogger&act=edit-status-user&id=$user['id'] ?>" class="btn btn-sm btn-detail mr-1" style="background: #337ab7; color: white;" data-toggle="tooltip" title="Bật hoạt động"><i class="fas fa-user-check"></i></a>
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