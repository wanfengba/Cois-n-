<!--首页文章列表-->
 <div class="themelazer-blog-body">
    <div class="container">
        <div class="row">
            <div class="col-md-8 themelazer_content">
                <div class="row">
                    <div class="col-md-12">
               <div class="author_info author_info_page"><div class="author_avatar"> <img alt="image" src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100"></div>
               <div class="author_description">
                   <h5 class="author_title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h5>
                   <div class="author_bio">
                       <p><?php $this->options->description() ?></p>
                    </div></div></div>
                    </div>
                    </div>
                     <div class="row">   
                     <?php while($this->next()): ?>
              <div class="col-md-6">      
                 <div class=" blog-style-one blog-small-grid">
                <div class="single-blog-style-one">
                    <div class="img-box">
                        <img src="<?php echo img_postthumb($this); ?>" alt="Awesome Image">
                     </div>   
                        <div class="themelazer_post_categories">
                                <?php $this->category(','); ?>
                        </div>                  
                    <div class="text-box">                        
                        <h3>
                            <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                        </h3>
                        <div class="meta-info">
                                 <ul>
                                    <li class="post-author"> <a href="#" tabindex="0">
                                       <img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100" alt="<?php $this->author(); ?>"><?php $this->author(); ?></a>
                                    </li>
                                    <li class="post-date"><?php $this->date('Y j m'); ?></li>
                                    <li class="post-view"> 阅读 <?php get_post_view($this) ?></li>
                                 </ul>
                        </div>                       
                        <p><?php $this->summary(); ?></p> 
                        <div class="footer-meta-info">                            
                            <a class="themelazer_more_themelazern" href="<?php $this->permalink() ?>">Read More</a>                            
                        </div>
                        
                    </div>
                </div>
               </div> 
            </div>
            <?php endwhile; ?>
            <div style="display: flex;justify-content: space-between;width: 100%;">
            <?php $this->pageLink('上一页'); ?>
            <?php $this->pageLink('下一页','next'); ?>
            </div>
          </div>  
            <?php include('sidebar.php'); ?>
            </div>
         </div>
      </div>

