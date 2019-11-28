<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;" id="sideBar">
  <!-- Brand Logo -->
  <a href="../../public/public_admin/assets/index3.html" class="brand-link">
    <img src="../../public/public_admin/assets/dist/img/AdminLTELogo.png"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="overflow: visible;">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img style="width: 40px;height: 40px;border-radius: 50%;" src="public/public_blog/images/<?= $_SESSION['user']['avatar'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['user']['name'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview " style="margin-bottom: 5%;">
          <a href="?mod=blogger&act=home-blogger" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p style="font-weight: bold;">
              Trang chủ  
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview " style="margin-bottom: 5%;">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-pen"></i>
            <p>
              Bài viết của tôi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?mod=blogger&act=list-your-post" class="nav-link  add_margin" style="margin-left: 25px;">
                <i class="fas fa-list nav-icon"></i>
                <p>Danh sách bài viết</p>
              </a>
            </li>
            <?php
            if ($_SESSION['user']['status'] == 'active') { ?>
             <li class="nav-item">
              <a href="?mod=blogger&act=create-post" class="nav-link" style="margin-left: 25px;">
                <i class="fas fa-plus nav-icon"></i>
                <p>Thêm mới bài viết</p>
              </a>
            </li>
          <?php } ?>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>
            Danh mục của tôi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?mod=blogger&act=list-your-category" class="nav-link" style="margin-left: 25px;">
              <i class="fas fa-list nav-icon"></i>
              <p>Danh sách danh mục</p>
            </a>
          </li>

          <?php
          if ($_SESSION['user']['status'] == 'active'){ ?>
           <li class="nav-item">
            <a href="?mod=blogger&act=create-category" class="nav-link" style="margin-left: 25px;">
              <i class="fas fa-plus nav-icon"></i>
              <p>Thêm mới danh mục</p>
            </a>
          </li>
        <?php } ?>
      </ul>
    </li>
    <?php
    if ($_SESSION['user']['position'] == 'admin') { ?>
      <li class="nav-item has-treeview " style="margin-bottom: 5%;">
        <a href="#" class="nav-link" style="margin-top: 5%; padding-left: 9%;">
          <i class="fa fa-tree" aria-hidden="true"></i>
          <p style="margin-left: 5%;">
            Quản trị bài viết
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?mod=blogger&act=list-user-post" class="nav-link" style="margin-left: 25px;">
              <p>Danh sách bài viết</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mod=blogger&act=list-post-new" class="nav-link" style="margin-left: 25px;">
              <p>Duyệt bài viết mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mod=blogger&act=list-post-hidden" class="nav-link" style="margin-left: 25px;">
              <p>Bài viết đã bị ẩn</p>
            </a>
          </li>
      </ul>
      </li>

      <li class="nav-item has-treeview " style="margin-bottom: 5%;">
        <a href="?mod=admin&act=list-user" class="nav-link" style="margin-top: 2%; padding-left: 7%;">
          <i class="fa fa-anchor" aria-hidden="true"></i>
          <p style="margin-left: 5%;">
            Quản trị danh mục
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?mod=blogger&act=list-user-category" class="nav-link" style="margin-left: 25px;">
              <p>Danh sách danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mod=blogger&act=list-category-new" class="nav-link" style="margin-left: 25px;">
              <p>Duyệt danh mục mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mod=blogger&act=list-category-hidden" class="nav-link" style="margin-left: 25px;">
              <p>Danh mục đã bị ẩn</p>
            </a>
          </li>
      </ul>
      </li>


      <li class="nav-item has-treeview " style="margin-bottom: 5%;">
        <a href="?mod=admin&act=list-user" class="nav-link" style="padding: 3% 8%;">
          <i class="fas fa-user"></i>
          <p style="margin-left: 5%;">
            Quản trị tài khoản
          </p>
        </a>
      </li>
    <?php } ?>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
