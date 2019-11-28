
 <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3>About Us</h3>
              <p class="mb-4">
                <img src="../../public/public_blog/images/myself.jpg" alt="Image placeholder" class="img-fluid">
              </p>

              <p>Yêu màu tím, thích thủy chung, ghét sự dối trá, sống mộng mơ và đặc biệt là rất hay cười chúm chím... <a href="?mod=home&act=about-me">Read More</a></p>
            </div>
            <div class="col-md-6 ml-auto">
              <div class="row">
                <div class="col-md-7">
                  <h3>Popular Posts</h3>
                  <div class="post-entry-sidebar">
                    <ul>
                       <?php foreach ($popular_posts as $post) {
                  ?>
                    <li>
                      <a href="?mod=home&act=show-post&slug=<?= $post['slug'] ?>">
                        <img src="../../public/public_blog/images/<?= $post['thumbnail'] ?>" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4><?= $post['title'] ?></h4>
                          <div class="post-meta">
                            <span class="mr-2"> 
                              <?php $timestamp = strtotime($post['created_at']);
                              echo date("d/m/Y", $timestamp);  ?> 
                            </span>
                            <span class="ml-2"><span style="margin-right: 2%" class="fa fa-eye"></span><?= $post['view_count'] ?></span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-1"></div>
                
                <div class="col-md-4">

                  <div class="mb-5">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Travel</a></li>
                      <li><a href="#">Adventure</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="#">Categories</a></li>
                    </ul>
                  </div>
                  
                  <div class="mb-5">
                    <h3>Social</h3>
                    <ul class="list-unstyled footer-social">
                      <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                      <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                      <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                      <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                      <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                      <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <!-- <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div> -->
  
    <script src="../../public/public_blog/js/jquery-3.2.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <script type="text/javascript">
      $(function(){
        var typed = new Typed('.type', {
          strings: ['Hi everyone',"I'm Doraemon",'Welcome to my blog'],
          smartBackspace:true,
          typeSpeed: 80,
          backSpeed: 20,
          loop:true
        })
      });
    </script>
    <script src="../../public/public_blog/js/jquery-migrate-3.0.0.js"></script>
    <script src="../../public/public_blog/js/popper.min.js"></script>
    <script src="../../public/public_blog/js/bootstrap.min.js"></script>
    <script src="../../public/public_blog/js/owl.carousel.min.js"></script>
    <script src="../../public/public_blog/js/jquery.waypoints.min.js"></script>
    <script src="../../public/public_blog/js/jquery.stellar.min.js"></script>
    <script src="../../public/public_blog/js/main.js"></script>
  </body>
</html>