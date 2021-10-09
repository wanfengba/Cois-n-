<!-- footer area start -->    
      <footer class="footer-area">
         <div class="themelazer_footer_widget_area">
            <div class="container">
               <div class="row-centered">
                  <div class="col-md-4 col-sm-12">
                     <div class="themelazer_footer_menu" >
                        <ul>
                           <li><?php $this->options->banq(); ?></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <div class="themelazer_logo_footer2">
                         <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-zhongguo"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <div class="themelazer_footer_social_media">
                        <ul class="themelazer_social_wrapper">
                           <li><a href="<?php $this->options->github(); ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-GitHub"></use></svg></a></li>
                           <li><a href="<?php $this->options->wangyiyun(); ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-wangyiyun"></use></svg></a></li>
                           <li><a href="<?php $this->options->bilibili(); ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-bilibili"></use></svg></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>   
         </div>
         <div class="copyright-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="copyright-area-inner">
                       <?php $this->options->mzsm(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer area end -->
      <aside class="sidemenuoption">
           <div class="user-box-nav" style="--image: url(<?php $this->options->backulr(); ?>)"></div>
         <div class="sidemenuoption-inner">
            <span class="menuoption-close"><i class="ti-close"></i></span>
            <div class="site-name-logo">
               <div class="site-name">
                  <a href="index.html"><img src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100" alt="" title=""></a><!--侧栏logo-->
               </div>
            </div>
            <div class="themelazer_mobile_menu"></div>
         </div>
      </aside>
      <div class="body-overlay"></div>
      <div class="scroll-totop-wrapper" ><button class="scroll-totop "><i class="ti-angle-up"></i></button></div>
      <script src="https://static.q6q.cc/qiangzai/javascript/jquery-1.9.1.min.js"></script>
      <script src="<?php $this->options->themeUrl('OwO/OwO.min.js'); ?>"></script>
      <script>
      var OwO_demo = new OwO({
        logo: 'OωO',
        container: document.getElementsByClassName('OwO')[0],
        target: document.getElementsByClassName('OwO-textarea')[0],
        api: '<?php $this->options->themeUrl('OwO/OwO.json'); ?>',
        position: 'down',
        
        maxHeight: '250px'
    });

    
</script>
<style type="text/css">
    .icon {
       width: 1em; height: 1em;
       vertical-align: -0.15em;
       fill: currentColor;
       overflow: hidden;
    }
</style>
      <script src="<?php $this->options->themeUrl('js/jquery.js'); ?>"></script>
      <script src="//at.alicdn.com/t/font_2850192_j8yi0af9fc9.js"></script>
      <script src="<?php $this->options->themeUrl('js/jquery.sticky.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('js/theia-sticky-sidebar.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('js/fluidvids.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('js/justified.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('js/slick.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('js/masonry.pkgd.min.js'); ?>"></script>
      <script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
<?php $this->footer(); ?>








