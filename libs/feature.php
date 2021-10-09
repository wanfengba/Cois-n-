<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 功能
 */
class feature {
 

	//评论加@
    public static function reply($parent) {
        if ($parent == 0) {
            return '';
        }
        $db = Typecho_Db::get();
        $commentInfo = $db->fetchRow($db->select('author,status,mail')->from('table.comments')->where('coid = ?', $parent));
        $link = '<a class="parent" href="#comment-' . $parent . '">@' . $commentInfo['author'] .  '</a>';
        return $link;
    }

	 //隐私评论
    public static function get_comment_at($_var_108)
    {
        $_var_109 = Typecho_Db::get();
        $_var_110 = $_var_109->fetchRow($_var_109->select('parent,status')->from('table.comments')->where('coid = ?', $_var_108));
        $_var_111 = '';
        $_var_112 = @$_var_110['parent'];
        if ($_var_112 != '0') {
            $_var_113 = $_var_109->fetchRow($_var_109->select('author,status,mail')->from('table.comments')->where('coid = ?', $_var_112));
            @($_var_114 = @$_var_113['author']);
            $_var_111 = @$_var_113['mail'];
            if (@$_var_114 && $_var_113['status'] == 'approved') {
                if (@$_var_110['status'] == 'waiting') {}
            } else {
                if (@$_var_110['status'] == 'waiting') {
                } else {
                    echo '';
                }
            }
        } else {
            if (@$_var_110['status'] == 'waiting') {
            } else {
                echo '';
            }
        }
        return $_var_111;
    }

    //隐私评论
    public static function insertSecret($comment)
    {
        if ($_POST['secret']) {
            $comment['text'] = '[secret] &nbsp;' . $comment['text'] . '[/secret]';
        }
        return $comment;
    }

}