<?php
require_once 'libs/admin.php';
require_once 'libs/core.php';
require_once 'libs/feature.php';
Typecho_Plugin::factory('Widget_Feedback')->comment_1000 = array('feature', 'insertSecret');//隐私评论


//随机文章
        class Widget_Post_rand extends Widget_Abstract_Contents
        {
        public function __construct($request, $response, $params = NULL)
        {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
        }
        public function execute()
        {
        $select  = $this->select()->from('table.contents')
            ->where("table.contents.password IS NULL OR table.contents.password = ''")
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created <= ?', time())
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->pageSize)
            ->order('RAND()');
        $this->db->fetchAll($select, array($this, 'push'));
        }
        }
      
//24小时内发表文章统计
        function get_recent_posts_number($days = 1,$display = true)
        {
        $db = Typecho_Db::get();
        $today = time() + 3600 * 8;
        $daysago = $today - ($days * 24 * 60 * 60);
        $total_posts = $db->fetchObject($db->select(array('COUNT(cid)' => 'num'))
        ->from('table.contents')
        ->orWhere('created < ? AND created > ?', $today,$daysago)
        ->where('type = ? AND status = ? AND password IS NULL', 'post', 'publish'))->num;
        if($display) {
        echo $total_posts;
        } else {
        return $total_posts;
        }
        }
//阅读统计
        function get_post_view($archive)
        {
            $cid    = $archive->cid;
            $db     = Typecho_Db::get();
            $prefix = $db->getPrefix();
            if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
                $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
                echo 0;
                return;
            }
            $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
            if ($archive->is('single')) {
         $views = Typecho_Cookie::get('extend_contents_views');
                if(empty($views)){
                    $views = array();
                }else{
                    $views = explode(',', $views);
                }
        if(!in_array($cid,$views)){
               $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
        array_push($views, $cid);
                    $views = implode(',', $views);
                    Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
                }
            }
            echo $row['views'];
        }
        
//站点最后活动
        function geLastUpdate(){
            $num   = '1';
            $now = time();
            $db     = Typecho_Db::get();
            $prefix = $db->getPrefix();
            $create = $db->fetchRow($db->select('created')->from('table.contents')->limit($num)->order('created',Typecho_Db::SORT_DESC));
            $update = $db->fetchRow($db->select('modified')->from('table.contents')->limit($num)->order('modified',Typecho_Db::SORT_DESC));
            if($create>=$update){  //发表时间和更新时间取最近的
              echo Typecho_I18n::dateWord($create['created'], $now); //转换为更通俗易懂的格式
            }else{
              echo Typecho_I18n::dateWord($update['modified'], $now);
            }
            }
            
//获取文章目录
            function createCatalog($obj) {    //为文章标题添加锚点
                global $catalog;
                global $catalog_count;
                $catalog = array();
                $catalog_count = 0;
                $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
                    global $catalog;
                    global $catalog_count;
                    $catalog_count ++;
                    $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
                    return '<h'.$obj[1].$obj[2].'><a name="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
                }, $obj);
                return $obj;
            }
            
            function getCatalog() {    //输出文章目录容器
                global $catalog;
                $index = '';
                if ($catalog) {
                    $index = '<ul>'."\n";
                    $prev_depth = '';
                    $to_depth = 0;
                    foreach($catalog as $catalog_item) {
                        $catalog_depth = $catalog_item['depth'];
                        if ($prev_depth) {
                            if ($catalog_depth == $prev_depth) {
                                $index .= '</li>'."\n";
                            } elseif ($catalog_depth > $prev_depth) {
                                $to_depth++;
                                $index .= '<ul>'."\n";
                            } else {
                                $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                                if ($to_depth2) {
                                    for ($i=0; $i<$to_depth2; $i++) {
                                        $index .= '</li>'."\n".'</ul>'."\n";
                                        $to_depth--;
                                    }
                                }
                                $index .= '</li>';
                            }
                        }
                        $index .= '<li><a href="#cl-'.$catalog_item['count'].'">'.$catalog_item['text'].'</a>';
                        $prev_depth = $catalog_item['depth'];
                    }
                    for ($i=0; $i<=$to_depth; $i++) {
                        $index .= '</li>'."\n".'</ul>'."\n";
                    }
                $index = '<div id="toc-container">'."\n".'<div id="toc">'."\n".''."\n".$index.'</div>'."\n".'</div>'."\n";
                }
                echo $index;
            }
            
            function themeInit($archive) {
                if ($archive->is('single')) {
                    $archive->content = createCatalog($archive->content);
                }
            }
            
//友链
function Links($sorts = NULL) {
    $options = Helper::options();
    $link = NULL;
    if ($options->Links) {
        $list = explode("\r\n", $options->Links);
        foreach ($list as $val) {
            list($name, $url, $description,$logo, $sort) = explode(",", $val);
            if ($sorts) {
                $arr = explode(",", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $link .= $url ? '
              <div class="card">
                <div class="avatar">
                 <img class="card-img-top" src="'.$logo.'" alt="'.$name.'">
                </div>
                <div class="header">
                  <h2>'.$name.'</h2>
                </div>
                <div class="colorband"></div>
                <div class="desc">'.$description.'</div>
                <div class="actions">
                <a href="'.$url.'"><button><svg class="icon" aria-hidden="true"><use xlink:href="#icon-fenxiangqianwanglianjie"></use></svg> 前往</span></span></button></a>
                
                </div>
              </div>' : '<li><a title="'.$description.'"><del>'.$name.'</del></a></li>';
                }
            } else {
                $link .= $url ? '
              <div class="card">
                <div class="avatar">
                 <img class="card-img-top" src="'.$logo.'" alt="'.$name.'">
                </div>
                <div class="header">
                  <h2>'.$name.'</h2>
                </div>
                <div class="colorband"></div>
                <div class="desc">'.$description.'</div>
                <div class="actions">
                <a href="'.$url.'"><button><svg class="icon" aria-hidden="true"><use xlink:href="#icon-fenxiangqianwanglianjie"></use></svg> 前往</span></span></button></a>
                
                </div>
              </div>' : '<li><a title="'.$description.'"><del>'.$name.'</del></a></li>';
            }
        }
    }
    echo $link ? $link : '<li>暂无链接</li>';
}

//缩略图
        function img_postthumb($thumbThis) {
            $db = Typecho_Db::get();
            $rs = $db->fetchRow($db->select('table.contents.text')
                ->from('table.contents')
                ->where('table.contents.cid=?', $thumbThis->cid)
                ->order('table.contents.cid', Typecho_Db::SORT_ASC)
                ->limit(1));
            preg_match_all('/\<img.*?src\=\"(.*?)\"[^>]*>/i', $rs['text'], $thumbUrl);  //通过正则式获取图片地址
            preg_match_all('/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i', $rs['text'], $patternMD);  //通过正则式获取图片地址
            preg_match_all('/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i', $rs['text'], $patternMDfoot);  //通过正则式获取图片地址
            if(count($thumbUrl[0])>0){
                return $thumbUrl[1][0];  //当找到一个src地址的时候，输出缩略图
            }else if(count($patternMD[0])>0){
                return $patternMD[1][0];
            }else if(count($patternMDfoot[0])>0){
                return $patternMDfoot[1][0];
            }else{
                //在主题根目录下的 /img 目录下放随机图片 thumb_开头
                //如：thumb_1.jpg
                return $thumbThis->widget('Widget_Options')->themeUrl."/image/slt/".rand(1,6).".jpg";
            }
        }