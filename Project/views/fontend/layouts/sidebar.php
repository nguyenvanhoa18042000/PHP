<!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar" style="z-index: 1000000">
              <div class="sidebar-box search-form-wrap">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->
              <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="../../public/public_blog/images/avatar_doraemon.jpg" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>Doraemon</h2>
                    <p>Yêu màu tím, thích màu hồng. Yêu màu xanh hoà bình và ghét màu đỏ chiến tranh. Sống nội tâm, hay khóc thầm, không đái dầm. Tôn thờ sự thuỷ chung và căm ghét sự giả dối</p>
                    <p><a href="?mod=home&act=about-me" class="btn btn-primary btn-sm rounded">Read more about me</a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div>
              <!-- END sidebar-box -->  
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
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
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box -->

              <!-- <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  <?php foreach ($categories as $category) {
                    if ($category['parent_id'] == NULL) {
                  ?>
                  <li>
                    <a href="#"><?= $category['name'] ?> 
                    </a>
                  </li>
                <?php }} ?>
                </ul>
              </div> -->
              <!-- END sidebar-box -->

              <!-- <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <ul class="tags">
                  <li><a href="#">Travel</a></li>
                  <li><a href="#">Adventure</a></li>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Freelancing</a></li>
                  <li><a href="#">Travel</a></li>
                  <li><a href="#">Adventure</a></li>
                  <li><a href="#">Food</a></li>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Freelancing</a></li>
                </ul>
              </div> -->
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>