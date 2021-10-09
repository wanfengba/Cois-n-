<?php 
/**
* 友链
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
                        <?php Links(); ?>

                    </div>
                     <?php include('comments.php'); ?>
                  <?php include('common/sidebar.php'); ?>
               </div>
                   
            </div>
         </div>
      </div>
      
      <?php include('common/footer.php'); ?>
      
      <style>
      .credit {
  position: fixed;
  bottom: 15px;
  right: 15px;
  text-align: center;
  padding: 0 15px;
  background-color: #fff;
  -webkit-box-shadow: 0 0 50px -10px rgba(0, 0, 0, 0.15);
          box-shadow: 0 0 50px -10px rgba(0, 0, 0, 0.15);
  z-index: 1000;
}

.credit a {
  display: inline-block;
  color: #000;
  -webkit-transition: color 300ms ease;
  -o-transition: color 300ms ease;
  transition: color 300ms ease;
  padding: 15px 10px;
}

.credit a:hover {
  color: blue;
}

.container {
  width: 100%;
  height: 100%;
}

#background {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
}

.card-list {
  width: 100%;
  margin: 2rem auto;
  display: -ms-grid;
  display: grid;
  -ms-grid-columns: (1fr)[2];
  grid-template-columns: repeat(2, 1fr);
}
@media only screen and (max-width: 35em) {
  .card-list {
    -ms-grid-columns: (1fr)[1];
  grid-template-columns: repeat(1, 1fr);
  }
}
.card {
  -webkit-box-flex: 1;
      -ms-flex: 1 1 300px;
          flex: 1 1 300px;
  margin: 70px 20px 20px 20px;
  background: var(--background);
  border-radius: 25px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  position: relative;
  padding: 100px 0 0 0;
  -webkit-box-shadow: 0 0 60px -15px rgba(0, 0, 0, 0.25);
          box-shadow: 0 0 60px -15px rgba(0, 0, 0, 0.25);
  -webkit-transition: -webkit-transform 300ms ease;
  transition: -webkit-transform 300ms ease;
  -o-transition: transform 300ms ease;
  transition: transform 300ms ease;
  transition: transform 300ms ease, -webkit-transform 300ms ease;
}

.colorband {
  height: 2px;
  background: #ccccff;
}

#card-1 .colorband {
  background-image: -o-linear-gradient(left, #43e97b 0%, #38f9d7 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(#43e97b), to(#38f9d7));
  background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
}

#card-2 .colorband {
  background-image: -o-linear-gradient(left, #4facfe 0%, #00f2fe 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(#4facfe), to(#00f2fe));
  background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
}

#card-3 .colorband {
  background-image: -o-linear-gradient(315deg, #667eea 0%, #764ba2 100%);
  background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card h2 {
  margin: 0;
  padding: 1rem;
  text-align: center;
  font-weight: bold;
  color: var(--color);
}
.card .title {
  padding: 0 1rem 1rem;
  font-size: 0.75em;
  text-align: center;
}
.card .desc {
  padding: 1rem 2rem;
  font-size: 0.9em;
}

.card .actions {
  -webkit-transition: -webkit-box-shadow 300ms ease;
  transition: -webkit-box-shadow 300ms ease;
  -o-transition: box-shadow 300ms ease;
  transition: box-shadow 300ms ease;
  transition: box-shadow 300ms ease, -webkit-box-shadow 300ms ease;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  background-color: var(--background);
  border-bottom-left-radius: 25px;
  border-bottom-right-radius: 25px;
}

.card:hover {
  -webkit-transform: scale(1.03);
      -ms-transform: scale(1.03);
          transform: scale(1.03);
}

.card:hover .actions {
/*   padding: 1rem 2rem; */
/*   box-shadow: 0 -10px 10px -5px rgba(0, 0, 0, 0.04); */
}

.actions button {
  width: 100%;
  background: transparent;
  border: none;
  padding: 1rem;
  font-size: 1em;
  -webkit-transition: background 300ms ease, -webkit-transform 300ms ease;
  transition: background 300ms ease, -webkit-transform 300ms ease;
  -o-transition: transform 300ms ease, background 300ms ease;
  transition: transform 300ms ease, background 300ms ease;
  transition: transform 300ms ease, background 300ms ease, -webkit-transform 300ms ease;
  outline: none;
  font-family: Lato, sans-serif;
  cursor: pointer;
}

.actions button:hover {
  -webkit-transform: scale(1.1);
      -ms-transform: scale(1.1);
          transform: scale(1.1);
  background: var(--index-post);
  color: #fff;
  border: none;
  z-index: 100;
  border-radius: 25px;
  -webkit-box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.1);
          box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.1)
}

.actions button:active {
  -webkit-transform: scale(0.9);
      -ms-transform: scale(0.9);
          transform: scale(0.9);
}

#card-1 .actions button:hover {
  background-image: -o-linear-gradient(left, #43e97b 0%, #38f9d7 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(#43e97b), to(#38f9d7));
  background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
}

#card-2 .actions button:hover {
  background-image: -o-linear-gradient(left, #4facfe 0%, #00f2fe 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(#4facfe), to(#00f2fe));
  background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
}

#card-3 .actions button:hover {
  background-image: -o-linear-gradient(315deg, #667eea 0%, #764ba2 100%);
  background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.actions button>span {
  display: block;
}
.card-img-top{
    border-radius: 100px;
}
.card .avatar {
  
  position: absolute;
  top: -60px;
  left: 50%;
  width: 150px;
  -webkit-transform: translateX(-50%);
      -ms-transform: translateX(-50%);
          transform: translateX(-50%);
  border-radius: 50%;
  background: #fff;
  -webkit-box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.1);
          box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.1);
  -webkit-transition: -webkit-transform 200ms ease;
  transition: -webkit-transform 200ms ease;
  -o-transition: transform 200ms ease;
  transition: transform 200ms ease;
  transition: transform 200ms ease, -webkit-transform 200ms ease;
}

.card .avatar:hover {
  -webkit-transform: translateX(-50%) scale(1.1);
      -ms-transform: translateX(-50%) scale(1.1);
          transform: translateX(-50%) scale(1.1);
}

.avatar svg {
  width: 100%;
}
      </style>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
