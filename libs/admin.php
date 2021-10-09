<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
// 主题设置
function themeConfig($form) {
    
    $icon = new Typecho_Widget_Helper_Form_Element_Text('icon', NULL, NULL, _t('网站icon小标'), _t('标题前面的小图标链接'));
    $form->addInput($icon);
    
    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('网站网址'), _t('如WFVP.CC'));
    $form->addInput($logo);
    
    $backulr = new Typecho_Widget_Helper_Form_Element_Text('backulr', NULL, NULL, _t('作者背景图'), _t('你喜欢的某一张图片链接就可'));
    $form->addInput($backulr);
    
    $author = new Typecho_Widget_Helper_Form_Element_Text('author', NULL, NULL, _t('作者头像'), _t('输入QQ账号即可'));
    $form->addInput($author);
    
    $banq = new Typecho_Widget_Helper_Form_Element_Text('banq', NULL, NULL, _t('版权'), _t('靠左'));
    $form->addInput($banq);
    
    $mzsm = new Typecho_Widget_Helper_Form_Element_Text('mzsm', NULL, NULL, _t('免责声明'), _t('最底部'));
    $form->addInput($mzsm);
    
    
    
//其他设置


    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('github'), _t('你的github链接'));
    $form->addInput($github);
    
    $wangyiyun = new Typecho_Widget_Helper_Form_Element_Text('wangyiyun', NULL, NULL, _t('网易云'), _t('你的网易云链接'));
    $form->addInput($wangyiyun);
    
    $bilibili = new Typecho_Widget_Helper_Form_Element_Text('bilibili', NULL, NULL, _t('bilibili'), _t('你的bilibili链接'));
    $form->addInput($bilibili);
    
    $pagenva = new Typecho_Widget_Helper_Form_Element_Select('pagenva',array(0=>'不开启',1=>'开启'),0,'显示更多','是否把页面归类到更多里');   
    $form->addInput($pagenva);
    
    $zanzhu = new Typecho_Widget_Helper_Form_Element_Text('zanzhu', NULL, NULL, _t('赞助'), _t('赞助二维码链接'));
    $form->addInput($zanzhu);
    
    $Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('链接列表（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<br><strong>链接名称（必须）,链接地址（必须）,链接描述,链接分类</strong><br>不同信息之间用英文逗号“,”分隔，例如：<br><strong>听书人,https://wfvp.cc/,我们都是书外人，却唯爱书中人,http://q2.qlogo.cn/headimg_dl?dst_uin=171394827&spec=100</strong><br>若中间有暂时不想填的信息，请留空，例如暂时不想填写链接描述：<br><strong>听书人,https://wfvp.cc/,,logo链接</strong><br>多个链接换行即可，一行一个'));
    $form->addInput($Links);
}


function themeFields($layout) {
    $slt = new Typecho_Widget_Helper_Form_Element_Text('slt', NULL, NULL, _t('页面缩略图'), _t('自定义页面缩略图链接，没有则输出自带缩略图'));
    $layout->addItem($slt);
}