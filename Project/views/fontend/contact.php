<?php require_once('layouts/header.php'); ?>
<section class="site-section">
	<div class="container">
		<div class="row mb-4">
			<div class="col-md-6">
				<h1>Contact Me</h1>
			</div>
		</div>
		<?php if (isset($_COOKIE['msg_go_contact'])) {
		?>
			<div class="alert alert-success" role="alert">
				<strong>Thông báo : </strong>
				<?php echo $_COOKIE['msg_go_contact']; ?>
			</div>
		<?php
		}
		?>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<form action="?mod=home&act=send-contact" method="post">
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="name">Name</label>
							<input type="text" id="name" name="name" class="form-control ">
						</div>
						<div class="col-md-12 form-group">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-control ">
						</div>
						<div class="col-md-12 form-group">
							<label for="email">Subject</label>
							<input type="text" id="subject" name="subject" class="form-control ">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 form-group">
							<label for="message">Write Message</label>
							<textarea name="message" id="message" name="message" class="form-control " cols="30" rows="8"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<input type="submit" name="btn-send" value="Send Message" class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>

			<?php require_once('layouts/sidebar.php'); ?>

		</div>
	</div>
</section>
<?php require_once('layouts/footer.php'); ?>