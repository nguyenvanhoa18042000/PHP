
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="../../public/public_admin/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" href="../../../public/public_blog/images/favicon2.png"  type="image/x-icon" />
  <link rel="stylesheet" href="../../public/public_admin/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../public/public_admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <link rel="stylesheet" href="../../public/public_admin/assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../public/public_admin/assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../../public/public_blog/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/public_admin/css/my_css.css">
  

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="../../public/assets/index3.html" class="nav-link">Trang chủ</a>
      </li> -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->

      <div style="height: auto;" id="run-text">
         <marquee style="margin-top: 6px;color: #0866C6;" width="100%" behavior="scroll" onmouseover ="this.stop();" onmouseout="this.start();">  
           <i style="color: red;" class="fa fa-heart" aria-hidden="true"> </i>&nbsp;&nbsp; Xin chào <?= $_SESSION['user']['name'] ?>. Chúc bạn có một ngày làm việc vui vẻ nhé !
        </marquee>
      </div>
    <!-- Right navbar links -->
    <div class="ml-auto">
      <ul class="navbar-nav ">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../public/public_admin/assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../public/public_admin/assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../public/public_admin/assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
              <img src="public/public_blog/images/<?= $_SESSION['user']['avatar'] ?>" class="user-image" alt="User Image">
              <!-- <span class="hidden-xs" style="color: rgba(0,0,0,.7);"><?= $_SESSION['user']['name'] ?></span> -->
            </a>
            <ul class="dropdown-menu" id="dropdown-user">
             <div class="dropdown-divider" style="margin: 0"></div>
                <a href="?mod=blogger&act=info-user" class="dropdown-item" >
                <i class="fas fa-user mr-2"></i> Profile
               </a>
               <div class="dropdown-divider" ></div>
              <a href="?mod=auth&act=logout" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i> Log out
               </a>
              <div class="dropdown-divider" style="margin: 0"></div>
            </ul>
          </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  