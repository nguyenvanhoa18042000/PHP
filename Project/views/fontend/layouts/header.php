
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog-PHP21</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

  <link rel="icon" href="../../../public/public_blog/images/favicon2.png"  type="image/x-icon" />

  <link rel="stylesheet" href="../../public/public_blog/css/bootstrap.css">
  <link rel="stylesheet" href="../../public/public_blog/css/animate.css">
  <link rel="stylesheet" href="../../public/public_blog/css/owl.carousel.min.css">

  <link rel="stylesheet" href="../../public/public_blog/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../public/public_blog/fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../public/public_blog/fonts/flaticon/font/flaticon.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="../../public/public_blog/css/style.css">
      <link rel="stylesheet" type="text/css" href="../../public/public_admin/css/my_css.css">
</head>
<body>


  <div class="wrap">

    <header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-3 search-top">
              <!-- <a href="#"><span class="fa fa-search"></span></a> -->
              <form action="#" class="search-top-form">
                <span class="icon fa fa-search"></span>
                <input type="text" id="s" placeholder="Type keyword to search...">
              </form>
            </div>
             <div class="col-9 " style="text-align: right;">
              <?php if (!isset($_SESSION['user'])) { ?>
              <a href="?mod=auth&act=login" style="color: white; margin-right: 3px;"><i class="fa fa-sign-in" aria-hidden="true"></i>  Đăng nhập</a>
              <a href="?mod=auth&act=registration" style="color: white"><i class="fa fa-plus" aria-hidden="true"></i>  Đăng ký</a>
              <?php }else{ ?>
                <a  href="?mod=blogger&act=home-blogger"  class="nav-link">
                  <img style="border-radius: 50%; width: 35px;" src="public/public_blog/images/<?= $_SESSION['user']['avatar'] ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs" style="color: rgb(255, 255, 255);"><?= $_SESSION['user']['name'] ?></span>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 id="my-logo" class="type"  style="height: 108px;"></h1>
          </div>
        </div>
      </div>

      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">


          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="http://projectblog.zent/">Trang chủ</a>
              </li>
              <?php foreach ($categories as $category) { 
                if ($category['parent_id'] == NULL){ 
              ?>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $category['name'] ?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
              <?php } ?>
              <?php foreach ($categories as $cate) {
                if ($category['id'] == $cate['parent_id'] && $cate['status'] == 'show'){ 
              ?>
                  <a class="dropdown-item" href="?mod=home&act=show-category&slug=<?= $cate['slug'] ?>"><?= $cate['name'] ?></a>  
              <?php }} ?> </li> <?php } ?>
                <li class="nav-item">
                  <a class="nav-link" href="?mod=home&act=about-me">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?mod=home&act=contact">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->