<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo ($seoinfo["seotitle"]); ?></title>
<meta name="description" content="<?php echo ($seoinfo["seodescription"]); ?>"/> 
<meta name="keywords" content="<?php echo ($seoinfo["seokeywords"]); ?>" />
<link href="__PUBLIC__/Front/style/default.css" rel="stylesheet" type="text/css" />
<link type="image/x-icon" href="__PUBLIC__/Images/company.ico" rel="shortcut icon">
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Jquery/jquery.js"></script>
</head>

<body>
<div id="frame">
<!-- topstart -->
<div class="page_top_title"><img src="__PUBLIC__/Front/images/logo.jpg" title="上海藤陟网络软件有限公司"/></div>
<!--nav start -->
<div class="nav_bg">
<ul>
<?php if(MODULE_NAME != 'Index'): ?><li class="center font14px fontbold"><a href="<?php echo U('Index/index');?>"><span>网站首页</span></a></li><?php endif; ?>

<?php if(MODULE_NAME == 'News'): ?><div class="center font14px fontbold en1">新闻资讯</div>
<?php else: ?>
<li class="center font14px fontbold"><a href="<?php echo U('News/index');?>"><span>新闻资讯</span></a></li><?php endif; ?>

<?php if(MODULE_NAME == 'Product'): ?><div class="center font14px fontbold en1">产品中心</div>
<?php else: ?>
<li class="center font14px fontbold"><a href="<?php echo U('Product/index');?>"><span>产品中心</span></a></li><?php endif; ?>

<?php if(MODULE_NAME == 'Company'): ?><div class="center font14px fontbold en1">企业介绍</div>
<?php else: ?>
<li class="center font14px fontbold"><a href="<?php echo U('Company/index');?>"><span>企业介绍</span></a></li><?php endif; ?>

<?php if(MODULE_NAME == 'Job'): ?><div class="center font14px fontbold en1">招贤纳士</div>
<?php else: ?>
<li class="center font14px fontbold"><a href="<?php echo U('Job/index');?>"><span>招贤纳士</span></a></li><?php endif; ?>

<?php if(MODULE_NAME == 'Feedback'): ?><div class="center font14px fontbold en1">意见反馈</div>
<?php else: ?>
<li class="center font14px fontbold"><a href="<?php echo U('Feedback/index');?>"><span>意见反馈</span></a></li><?php endif; ?>

</ul>
</div>
<!--nav end -->
<!-- topend -->
<!-- contenstart -->
<div id="layout_content">


  <!-- leftstat -->
  <div class="dt_page_left">
    <ul class="dt_page_left_bt font14px fontbold">栏目</ul>
    <ul>
    <?php if(is_array($newsCategory)): $i = 0; $__LIST__ = $newsCategory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li class="<?php echo (selected($_GET['category'],$row['id'], 'current','')); ?>"><?php echo ($row["str_repeat"]); ?><img src="__ROOT__/Public/Front/icon_arrow04.gif" /> <a href="<?php echo U('News/index', array('category' => $row['id']));?>"><?php echo ($row["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- leftend -->
  <!-- prostart -->
  <div class="dt_page_right">
    <form action="<?php echo U('News/index');?>" method="get">
    <ul class="dt_page_right_bt">
      <li class="font14px fontbold dt_page_right_zt"><a href="<?php echo U('News/index');?>" title="资讯">资讯列表</a></li>
      <li class="dt_page_right_search">关键字：
        <label>
        <input type="text" name="keyword" id="keyword" size="16" maxlength="20" value="<?php echo ($_GET['keyword']); ?>"/>
        </label>
        <label>
        <input type="submit" name="button" id="button" value="搜索" />
        </label>
      </li>
    </ul>
    </form>
    <ul class="dt_page_right_con">
      <?php if(is_array($dataContentList)): $i = 0; $__LIST__ = $dataContentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li class="dt_page_right_list">
       <?php if($row['link_url'] != ''): ?><a href="<?php echo ($row["link_url"]); ?>" target="_blank" style="<?php echo ($row["title_style"]); ?>" title="<?php echo ($row["title"]); ?>"><?php echo ($row["title"]); ?></a><?php else: ?><a href="<?php echo U('News/detail',array('id'=>$row['id']));?>" target="_blank" style="<?php echo ($row["title_style"]); ?>" title="<?php echo ($row["title"]); ?>"><?php echo ($row["title"]); ?></a><?php endif; ?>
       <span class="font12px font999">(<?php echo (date("Y-m-d",$row["create_time"])); ?>)</span>
       </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <ul class="fenye">
    <?php echo ($pageContentBar); ?>
    </ul>
  </div>
  <!-- proend -->
    <!-- footstart -->
  <div id="layout_bottom"><a href="#">某某某公司</a>版权所有 <a href="#">XXX</a>技术支持</div>
  <!-- footend -->
</div>
<!-- contentend -->
</div>
</body>
</html>