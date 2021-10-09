<!--sidebar-->
               </div>
               <div class="col-md-4 themelazer_sidebar">
                  <div class="sidebar">
                     <div class="themelazer-widget-author">
                        <div class="author-container">
                            <div class="user-box-header" style="--image: url(<?php $this->options->backulr(); ?>)"></div>
                           <div class="themelazer-author-avatar">
                              <a href="#" rel="author"><img alt="" src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php $this->options->author(); ?>&spec=100" class="avatar avatar-80 photo"> </a>
                           </div>
                           <div class="themelazer-author-data">
                              <div class="author-description">
                                  <h5 class="themelazer-author-title"><a href="<?php $this->options->siteUrl(); ?>" rel="author"><?php $this->options->title() ?></a></h5>
                              </div>
                              <div class="themelazer-autograph-about">
                                <?php $this->options->description() ?>
                              </div>
                              <div class="themelazer-author-social-links">
                                 <div class="themelazer-social-links-items">
                                    <div class="themelazer-social-links-item">
                                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php $this->options->author(); ?>&amp;site=qq&amp;menu=yes"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-QQ"></use></svg></a>
                                      <a href="<?php $this->options->github(); ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-GitHub"></use></svg></a>
                                    </div>
                                    <div class="themelazer-social-links-item">
                                       <a href="<?php $this->options->wangyiyun(); ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-wangyiyun"></use></svg></a>
                                    </div>
                                    <div class="themelazer-social-links-item">
                                      <a href="<?php $this->options->bilibili(); ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-bilibili"></use></svg></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="single-sidebar recent-post-widget">
                        <div class="title">
                           <h3><svg class="icon" aria-hidden="true"><use xlink:href="#icon-suiji"></use></svg> 随机推荐</h3>
                        </div>
                        <div class="recent-post-wrapper">
                            <?php $this->widget('Widget_Post_rand@rand', 'pageSize=6')->to($rand); ?>
                            <?php while($rand->next()): ?>
                           <div class="themelazer_article_list">
                              <div class="post-outer">
                                 <div class="post-inner">
                                    <div class="entry-header">
                                       <div class="themelazer_post_categories">
                                         <?php $this->category(','); ?>
                                       </div>
                                       <h2 class="entry-title"> <a href="<?php $rand->permalink() ?>"><?php $rand->title(); ?></a></h2>
                                       <div class="meta-info">
                                          <ul>
                                             <li class="post-date"><?php $this->date('Y j m'); ?></li>
                                             <li class="post-view"> 阅读 <?php get_post_view($this) ?></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php endwhile; ?>
                        </div>
                        <div class="title">
                           <h3><svg class="icon" aria-hidden="true"><use xlink:href="#icon-icon-tongji"></use></svg> 全部统计</h3>
                        </div>
                        <div class="themelazer_widget_categories">
                           <ul>
                               <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                              <li>文章总数：<span><?php $stat->publishedPostsNum() ?></span></li>
                              <li>分类总数：<span><?php $stat->categoriesNum() ?></span></li>
                              <li>评论总数：<span><?php $stat->publishedCommentsNum() ?></span></li>
                              <li>页面总数：<span><?php $stat->publishedPagesNum() ?></span></li>
                              <li>今日更新总数：<span><?php get_recent_posts_number(12); ?></span></li>
                           </ul>
                        </div>
                        <div class="title">
                           <h3><svg class="icon" aria-hidden="true"><use xlink:href="#icon-A"></use></svg> 人生倒计时</h3>
                        </div>
                        <div class="themelazer_banner_spot">
                           <div class="themelazer_content_banner">
                              <div class="themelazer_bg_image_banner">
                                   <div class="aside aside-count">
        <div class="content">
            <div class="item" id="dayProgress">
                <div class="title">今日已经过去<span></span>小时</div>
                <div class="progress">
                    <div class="progress-bar">
                        <div class="progress-inner progress-inner-1"></div>
                    </div>
                    <div class="progress-percentage"></div>
                </div>
            </div>
            <div class="item" id="weekProgress">
                <div class="title">这周已经过去<span></span>天</div>
                <div class="progress">
                    <div class="progress-bar">
                        <div class="progress-inner progress-inner-2"></div>
                    </div>
                    <div class="progress-percentage"></div>
                </div>
            </div>
            <div class="item" id="monthProgress">
                <div class="title">本月已经过去<span></span>天</div>
                <div class="progress">
                    <div class="progress-bar">
                        <div class="progress-inner progress-inner-3"></div>
                    </div>
                    <div class="progress-percentage"></div>
                </div>
            </div>
            <div class="item" id="yearProgress">
                <div class="title">今年已经过去<span></span>个月</div>
                <div class="progress">
                    <div class="progress-bar">
                        <div class="progress-inner progress-inner-4"></div>
                    </div>
                    <div class="progress-percentage"></div>
                </div>
            </div>
        </div>
    </div>
                              </div>
                           </div>
                        </div>
                        <div class="title">
                           <h3><svg class="icon" aria-hidden="true"><use xlink:href="#icon-seotag"></use></svg> Tages</h3>
                        </div>
                        <div class="themelazer_widget_content">
                           <div class="themelazer_tagcloud">
                               <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 20))->to($tags); ?>  
                                <?php while($tags->next()): ?>  
                                <a class="tag-cloud-link" rel="tag" href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
                                <?php endwhile; ?>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>