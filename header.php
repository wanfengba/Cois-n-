<!--
 * @package Coisíní
 * @author 枯木逢春
 * @version 1.0.0
 * @link https://wfvp.cc
 * 
 *大佬说我的代码很乱，不要抄代码，自己写

-->
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <?php $this->header('commentReply='); ?>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <!-- Title-->
      <title><?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
      <!-- Favicon-->
      <link rel="icon" href="<?php $this->options->icon(); ?>" type="image/x-icon">
      <!-- Stylesheets-->
      <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
      <link rel="stylesheet" href="<?php $this->options->themeUrl('css/all.min.css'); ?>">
      <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
      <link rel="stylesheet" href="<?php $this->options->themeUrl('OwO/OwO.min.css'); ?>">
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<?php include('common/nav.php'); ?>