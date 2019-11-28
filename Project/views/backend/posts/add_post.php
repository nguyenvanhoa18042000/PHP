<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm mới bài viết</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Bài viết</li>
            <li class="breadcrumb-item active">Thêm mới bài viết</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nội dung</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="?mod=blogger&act=store-post" role="form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input required type="text" class="form-control" id="string" name="title" onkeyup="ChangeToSlug();">
          </div>
          <div class="form-group">
            <label for="categories">Category</label>
            <select required id="categories" class="form-group form-control" name="category_id">
              <option hidden>--Choose a category--</option>
              <?php 
                foreach ($categories as $category) {
                  if ($category['status'] == 'show') {
              ?>
                  <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php
              }} 
              ?> 
            </select>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" required  rows="3" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Thumbnail</label>
            <input  type="file" required class="form-control" id="thumbnail" name="thumbnail">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" readonly>
          </div>
          <div class="form-group">
            <label for="comment">Content</label>
            <textarea class="textarea" name="content"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="card-footer">
        Thêm mới bài viết
      </div>
    </div>
  </section>
</div>
<?php require_once('public/library/create_slug.php'); ?>
<?php require_once('views/backend/layouts/footer.php'); ?>
