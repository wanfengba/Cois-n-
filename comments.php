<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php
 $GLOBALS['isLogin'] = $this->user->hasLogin();
 $GLOBALS['rememberEmail'] = $this->remember('mail',true);
function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '"' . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment comment-body<?php
                                                                if ($comments->levels > 0) {
                                                                    echo ' comment-child';
                                                                    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
                                                                } else {
                                                                    echo ' comment-parent';
                                                                }
                                                                $comments->alt(' comment-odd', ' comment-even');
                                                                echo $commentClass;
                                                                ?>">
        <div id="<?php $comments->theId(); ?>">
            <?php $number=$comments->mail;
                                    if(preg_match('|^[1-9]\d{4,11}@qq\.com$|i',$number)){
                                    echo '<img src="https://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" alt="评论者头像" height="50" width="50" class="avatar avatar-50 photo"/>'; 
                                    }
                                    elseif (preg_match('|^[a-z]{4,11}@ityinhu\.com$|i',$number)) {
                                      echo '<img src="https://www.ityinhu.com/api/tx/mr.jpg" height="50" width="50" class="avatar avatar-50 photo" alt="评论者头像"/>';
                                    } 
                                    else{
                                    echo '<img src="https://www.ityinhu.com/api/tx/api.php" height="50" width="50" class="avatar avatar-50 photo" alt="评论者头像"/>';
                                    }
                                    ?>
            <div class="comment_main">
            <div class="comment_author"><?php $comments->author(); ?>    <?php
					if ($comments->authorId) {
						if ($comments->authorId == $comments->ownerId) {
							_e(' <span class="comment_admin"><i class="iconfont iconsafetycertificate-f"></i><span class="comment_admin_tip">博主大人</span></span> ');
						}
					}
					?>
                    <?php if ($comments->status != 'approved'): ?>
                        <span class="comment_ds"><i original-title="待审评论" class="iconfont iconyellow"></i></span>
                    <?php endif; ?></div>
            <div class="comment_excerpt match_color">
                <?php echo feature::reply($comments->parent); ?>
                <?php $parentMail = feature::get_comment_at($comments->coid)?>
                <?php echo core::postCommentContent($comments->content,$GLOBALS['isLogin'],$GLOBALS['rememberEmail'],$comments->mail,$parentMail);?>

            </div>
                <div class="comment_meta">
                    <span class="comment_time"><?php $comments->dateWord(); ?></span><span class="comment-reply cp-<?php $comments->theId(); ?> text-muted comment-reply-link"><?php $comments->reply('<i class="iconfont iconretweet"></i> 回复'); ?></span><span id="cancel-comment-reply" class="cancel-comment-reply cl-<?php $comments->theId(); ?> text-muted comment-reply-link" style="display:none" ><?php $comments->cancelReply('<i class="iconfont iconguanbi2"></i> 取消'); ?></span>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?><div class="comment-children"><?php $comments->threadedComments($options); ?></div><?php } ?>
    </li>
<?php } ?>

<div id="comments" class="gen">
    <?php $this->comments()->to($comments); ?>

    <?php if ($this->allow('comment')) : ?>
        <div id="<?php $this->respondId(); ?>" class="respond">

            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="new_comment_form" >
                <div class="comment-inputs">
                    <?php if ($this->user->hasLogin()) : ?>
                        <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                    <?php else : ?>
                        <div class="commt-name"><input type="text" name="author" id="comment-name" class="text" placeholder="<?php _e('名称'); ?>" value="<?php $this->remember('author'); ?>" required /></div>
                        <div class="commt-email"><input type="email" name="mail" id="comment-mail" class="text" placeholder="<?php _e('邮箱'); ?>" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> /></div>
                        <div class="commt-web"><input type="url" name="url" id="comment-url" class="text" placeholder="<?php _e('网址'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> /></div>
                    <?php endif; ?>
                </div>
                <div class="comment-editor">
                    <textarea name="text" id="textarea" placeholder="说点什么？" class="textarea textarea_box OwO-textarea" required onkeydown="if((event.ctrlKey||event.metaKey)&&event.keyCode==13){document.getElementById('submitComment').click();return false};"><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="comment-buttons">
                <div class="rko"><div class="OwO"></div></div>
                    <div class="right">
                        <button id="submitComment" type="submit" class="submit match_color_b"><?php _e('发表评论'); ?></button>
                    </div>

             <div class="model-6" original-title="隐私评论">
			  <div class="checkbox">
			   <input type="checkbox" id="secret-button" name="secret" />
			    <label for="secret-button"></label>
                <div class="checkbox_tip">隐私评论</div>
			  </div>
            </div>
                </div>
            </form>
        </div>
    <?php else : ?>
        <div class="sortbar_box"><span class="sortbar"><span>评论已关闭</span></span></div>
    <?php endif; ?>
    <div class="comments_lie">
    <?php if ($comments->have()) : ?>
        <?php $comments->listComments(); ?>
        <div class="nav-page">
        <?php $comments->pageNav('<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>', 3, '...', array('wrapTag' => 'div', 'wrapClass' => 'comments-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next')); ?>
        </div>
    <?php endif; ?>
</div>
</div>

<script type="text/javascript">
function showhidediv(id){var sbtitle=document.getElementById(id);if(sbtitle){if(sbtitle.style.display=='flex'){sbtitle.style.display='none';}else{sbtitle.style.display='flex';}}}
(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},pom:function(id){return document.getElementsByClassName(id)[0]},iom:function(id,dis){var alist=document.getElementsByClassName(id);if(alist){for(var idx=0;idx<alist.length;idx++){var mya=alist[idx];mya.style.display=dis}}},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom("<?php echo $this->respondId(); ?>"),input=this.dom("comment-parent"),form="form"==response.tagName?response:response.getElementsByTagName("form")[0],textarea=response.getElementsByTagName("textarea")[0];if(null==input){input=this.create("input",{"type":"hidden","name":"parent","id":"comment-parent"});form.appendChild(input)}input.setAttribute("value",coid);if(null==this.dom("comment-form-place-holder")){var holder=this.create("div",{"id":"comment-form-place-holder"});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.iom("comment-reply","");this.pom("cp-"+cid).style.display="none";this.iom("cancel-comment-reply","none");this.pom("cl-"+cid).style.display="";if(null!=textarea&&"text"==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom("<?php echo $this->respondId(); ?>"),holder=this.dom("comment-form-place-holder"),input=this.dom("comment-parent");if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.iom("comment-reply","");this.iom("cancel-comment-reply","none");holder.parentNode.insertBefore(response,holder);return false}}})();
//评论@标签
function mraite(){
    if ($('#comments .parent').length > 0) {
        for (var i = 0; i < $('#comments .parent').length; i ++) {
            var parentLink = '<a class="mr-1" href="' + $('#comments .parent').eq(i).attr('href') + '">' + $('#comments .parent').eq(i).html() + '</a>';
            $('#comments .parent').eq(i).next().prepend(parentLink);
        }
        $('#comments .parent').remove();
    };
}

//私密评论
function private_comment(){
    var holder = $('.comment-editor textarea').attr('placeholder');
    $('#secret-button').click(function () {
        var textareaDom = $('.comment-editor textarea');
        if($(this).is(':checked')) {
            textareaDom.attr('placeholder', '正在私密评论中...')
        }else {
            textareaDom.attr('placeholder', holder)
        }
    });
}
</script>
<?php if ($this->allow('comment')) : ?>

<?php endif; ?>

<style>
#cancel-comment-reply-link {
    display: inline !important;
}
</style>