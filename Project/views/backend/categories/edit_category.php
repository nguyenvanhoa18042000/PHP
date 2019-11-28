
<?php require_once('views/backend/layouts/header.php'); ?>
<?php require_once('views/backend/layouts/sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chỉnh sửa danh mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
            <li class="breadcrumb-item active">Chỉnh sửa danh mục</li>
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
        <form method="POST" name="my-form" id="my-form
        " action="?mod=blogger&act=update-category" role="form" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $category['id'] ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên danh mục</label>
            <input required type="text" class="form-control" id="string" name="name" value="<?= $category['name'] ?>" onkeyup="ChangeToSlug();">
          </div>
          <div class="form-group">
            <label for="categories">Danh mục chứa</label>
            <select required id="parent_id" class="form-group form-control" name="parent_id">
              <option hidden>--Choose a category--</option>
                <option 
                  <?php 
                    if($category['parent_id'] == NULL){
                      echo "selected";
                    }
                  ?> value="NULL" >Danh mục cha
                </option>
              <?php foreach ($categories as $cate) { ?>
                <option  
                  <?php 
                    if($category['parent_id']==$cate['id']){
                      echo "selected";
                    }
                  ?> 
                  value="<?= $cate['id']?>"><?= $cate['name']?>
                </option>
              <?php } ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="<?=$category['slug']?>" readonly>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="description" required  rows="3" name="description"><?= $category['description']?></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="card-footer">
        Chỉnh sửa danh mục
      </div>
    </div>
  </section>
</div>
<?php require_once('public/library/create_slug.php'); ?>
<?php require_once('views/backend/layouts/footer.php'); ?>
<!-- <script type="text/javascript">
	$(document).ready(function(){

            $("#my-form").validate(
            {
                ignore: [],
              	debug: false,
                rules: { 
                    content:{
                         required: function() 
                        {
                         CKEDITOR.instances.content.updateElement();
                        }
                    },
                    string: "required",
           			category_id: "required",
           			thumbnail: "required",
           			description: "required",

                },
                messages:
                {
                    content:{
                        required:"Please enter Text",
                    },
                   	string: "string is required",
                    category_id: "Category is required",
                    thumbnail: "Thumbnail is required",
                    description: "Description is required",
                },
                submitHandler: function(form) {
		            form.submit();
		        }
            });
        });
</script> -->