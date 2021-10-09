<?php 
/**
* 其他
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="themelazer-blog-body themelazer-content-area">
    <div class="container">
        <div class="row">                
        <div class="col-md-8">
                    <div class="themelazer_single_feature">
                        <div class="themelazer_full_post">
     <?php if (isset($this->fields->slt)): ?>
    <?php $this->fields->slt(); ?>
    <?php else: ?>
    <div class="themelazer_item_img" style="background-image: url(<?php echo img_postthumb($this); ?>)"></div>    
    <?php endif; ?>   
   <div class="single_header_wrapper">
                        <blockquote><p><?php $this->title() ?><cite>
                        
                        <div class="meta-info">
                        <ul>
                           <li class="post-author"> <a tabindex="0">
                              <img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100" alt="<?php $this->author(); ?>"><?php $this->author(); ?></a>
                           </li>
                           <li class="post-view">阅读 <?php get_post_view($this) ?></li>
                           <li class="post-comment">评论 <?php $this->commentsNum('%d'); ?></li>
                        </ul>
                     </div>
                     </cite></p></blockquote>                      
                    </div>   
                    
</div>
                    </div>
                    <div class="card-list">
                      <?php $this->content(); ?>
                    </div>
                     <?php include('comments.php'); ?>
                  <?php include('common/sidebar.php'); ?>
               </div>
                   
            </div>
         </div>
      </div>
      
      <?php include('common/footer.php'); ?>
