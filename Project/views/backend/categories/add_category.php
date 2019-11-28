
<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm mới danh mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
            <li class="breadcrumb-item active">Thêm mới danh mục</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <form method="POST" action="?mod=blogger&act=store-category">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Nội dung</h3>
        </div>
        <div class="card-body">
          <!-- Color Picker -->
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="string" onkeyup="ChangeToSlug();" name="name">
          </div>
          <div class="form-group">
                <label for="">Parent</label>
                <select name="parent_id" class="form-group form-control">
                    <option value="0">Danh mục cha</option>
                <?php foreach ($categories as $category) { 
                    if ($category['parent_id'] == NULL && $category['status'] =='show') {
                ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php
                } }
                ?> 
                </select>
            </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" readonly>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control textarea" rows="3" name="description"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Thêm mới danh mục
        </div>
        <!-- /.card-footer-->
      </div>
    </form>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once('views/backend/layouts/footer.php'); ?>
<?php require_once('public/library/create_slug.php'); ?>
