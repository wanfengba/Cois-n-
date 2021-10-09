<?php
/**
 * 爱尔兰语的"怦然心动"
 * 是因为他的出现
 * 
 * @package Coisíní
 * @author 枯木逢春
 * 
 * @link https://wfvp.cc
 */
$this->need('header.php');?>

<!--post-->

<div class="themelazer_full_post">
    <div class="themelazer_item_img" style="background-image: url(<?php echo img_postthumb($this); ?>)"></div>                    
 <div class="single_header_wrapper">
                     <div class="themelazer_post_categories">
                        <?php $this->category(','); ?>
                     </div>
                     <h1>
                      <?php $this->title() ?>
                     </h1>
                     <div class="meta-info">
                        <ul>
                           <li class="post-author"> <a tabindex="0">
                              <img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100" alt="<?php $this->author(); ?>"><?php $this->author(); ?></a>
                           </li>
                           <li class="post-date"><?php $this->date('Y j m'); ?></li>
                           <li class="post-view">阅读 <?php get_post_view($this) ?></li>
                           <li class="post-comment">评论 <?php $this->commentsNum('%d'); ?></li>
                        </ul>
                     </div>
                  </div>
                    
            </div>
                <div class="themelazer-blog-body themelazer-content-area">
                <div class="container">
                    <div class="row">                
                    <div class="col-md-8">                           
            <div class="themelazer_single_content">
            <?php $this->content(); ?>
                                 
                  </div>
                  <div class="themelazer_tag_share">
                     <div class="blog-tags">
                        <?php $this->tags(',', true, 'none'); ?>
                     </div>
                     <div class="blog-social-list  padding-sm-tb-20">
                        <a href="https://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>" class="facebook-bg">
                        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-QQ"></use></svg>
                        </a>
                        
                        <a href="https://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>&type=button&language=zh_cn&title=<?php $this->title() ?>" class="pinterest-bg">
                        <svg class="icon" aria-hidden="true"><use xlink:href="#icon-weibo"></use></svg>
                        </a>
                     </div>
                  </div>
                  <div class="author_info">
                     <div class="author_avatar"> <img alt="image" src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100"></div>
                     <div class="author_description">
                        <h5 class="author_title"><?php $this->author(); ?> 
                        </h5>
                        <div class="author_bio">
                           <p>说点什么</p>
                        </div>
                        <div class="themelazer-author-social-links">
                           <div class="themelazer-social-links-items">
                              <div class="themelazer-social-links-item">
                           
                                 
                 <a href="#modal-opened" class="link-1" id="modal-closed">赞助</a>
                
                <div class="modal-container" id="modal-opened">
                  <div class="modal">
                
                    <div class="modal__details">
                      <h1 class="modal__title">赞助</h1>
                      <p class="modal__description">你的支持就是我的动力</p>
                    </div>
                    <center><img style="margin-bottom: 1pc;
                                        width: 250px;
                                        "src="<?php $this->options->zanzhu(); ?>"></center>
                    <a href="" class="link-2"></a>
                  </div>
                </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                     <?php include('comments.php'); ?>
               </div>
              <?php include('post/sidebar.php'); ?>
            </div>
           
         </div>
      </div>



<?php include('common/footer.php'); ?>