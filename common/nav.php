<!--导航-->
 
      <header class="themelazer_main_header">
         
         <div class="themelazer_middle_header white_bg">
            <div class="container clearfix">
               <div class="row">
                  <div class="col-md-12">
                     <div class="themelazer_promomenu_wrapper">
                        <div class="themelazer_header_social_icons">
                           <ul class="themelazer_social_wrapper">
                             <div style="font-size: xx-large;"><?php $this->options->logo(); ?></div>
                           </ul>
                        </div>
                        <div class="themelazer_mobile_logo ">
                          <div style="font-size: xx-large;"><?php $this->options->logo(); ?></div> <!-- 手机端导航logo -->
                        </div>
                        <div class="themelazer-nav clearfix">
                           <!-- Main Menu -->
                           <div class="themelazer-navigation">
                              <ul class="menu black_color">
                                 <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                                <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                                <?php while($categorys->next()): ?> 
                                <?php if ($categorys->levels === 0): ?>
                                <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                                <?php if (empty($children)) { ?>
                                 <li > <a href="<?php $categorys->permalink(); ?>" ><?php $categorys->name(); ?></a></li>
                                <?php } else { ?>
                                <li class="menu-item-has-children"><a href="#"><?php $categorys->name(); ?></a>
                                <ul>
                                <li><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></li>
                                <?php foreach ($children as $mid) { ?>
                                <?php $child = $categorys->getCategory($mid); ?>
                                <li><a href="<?php echo $child['permalink'] ?>"><?php echo $child['name']; ?></a></li>
                                <?php } ?>
                                </ul></li>
                                <?php } ?>
                                <?php endif; ?>
                                <?php endwhile; ?>
                             
                               <?php if($this -> options -> pagenva == '1'): ?>
                               <li class="menu-item-has-children"><a href="#">更多</a>
                                <ul>
                                <?php endif; ?>       
                                      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                <?php while($pages->next()): ?>
                                <li><a<?php if($this->is('page', $pages->slug)): ?> <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                                <?php endwhile; ?>
                                    </ul>
                                <?php if($this -> options -> pagenva == '1'): ?>
                                 </li>
                               </ul>
                               <?php endif; ?>
                           </div>
                           <!-- Main Menu End-->
                        </div>
                        <ul class="header-s-m black_color">
                           <li class="nav-search">
                              <a href="#header-search" title="Search"><i class="ti-search"></i></a>
                           </li>
                           <li class="" id="clyc"><footer id="dark-mode-toggle"><i class="fas fa-adjust"></i></footer></li>
                           <li class="themelazer_mb_themelazern sidemenuoption-open is-active" id="clyc"><i class="ti-menu"></i></li>
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div id="header-search" class="header-search">
               <form class="header-search-form">
                  <input name="s" class="text"  type="search" value="" placeholder="What do you want to search for?">
                  <button type="submit" class="search-btn"value="Search" />
                  <i class="ti-search"></i>
                  </button>
               </form>
            </div>
         </div>
      </header>   
      
      