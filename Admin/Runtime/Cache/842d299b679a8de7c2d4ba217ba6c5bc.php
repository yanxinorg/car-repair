<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>companyCMS 企业网站管理中心</title>
<link id="mastercss" rel="stylesheet" href="__PUBLIC__/Admin/style/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/Admin/js/colorpicker/colorpicker.css" type="text/css">
<link type="image/x-icon" href="__PUBLIC__/Images/company.ico" rel="shortcut icon">
<script type="text/javascript">
<!--
//指定当前组模块URL地址
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
var ROOT = '__ROOT__';
//-->
</script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Jquery/jquery.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Js/Jquery/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Admin/js/script_common.js"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/Admin/js/colorpicker/colorpicker.js"/></script>

</head>
<body>
<div id='loader' style='color:#ffffff;font-size:12px;background-color: #0099CC; width:140px; padding:2px 4px; height:20px; position: fixed;right:0px;top:2px; display:none'>提交中，请稍后...</div>
	<div id="wrap">
		<div id="header">
			<h2><a href="__APP__" title="companyCMS"><img src="__PUBLIC__/Admin/images/logo.gif" alt="companyCMS" /></a></h2>
			
			<div id="topmenu" class="gray">
			<span style="font-weight:bold">当前用户：<img src="__PUBLIC__/Admin/images/user.gif" alt="companyCMS" align="absmiddle"/><?php echo ($username); ?></span> 　 
				<a href="<?php echo U('Admin/modify',array('id'=>$adminId, 'jumpUri'=>'run' ));?>"><img src="__PUBLIC__/Admin/images/user_modify.gif" alt="companyCMS" align="absmiddle"/>我的帐户</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Public/logout');?>"><img src="__PUBLIC__/Admin/images/logout.gif" alt="companyCMS" align="absmiddle"/>退出系统</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo ($frontUrl); ?>" target="_blank"><img src="__PUBLIC__/Admin/images/home_25.gif" alt="companyCMS" align="absmiddle"/>前台首页</a>
			</div>
			<ul id="menu" style="display:none" >
				<li><a href="Admin.php">管理平台</a></li>
				<li><a href="Admin.php?ac=$value"><?php echo ($_TPL[menunames][$value]); ?></a></li>
			</ul><div id="later" style="position:fixed"></div>
		</div>
		<div id="content">
<div class="mainarea">
<div class="maininner">
	<form method="get" action="__URL__">
	<div class="block style4">
		
		<table cellspacing="3" cellpadding="3">
		<tr>
		  <th>名　　称</th><td><input type="text" name="title" id="title"></td>
		  </tr>
		<tr><th>结果排序</th>
		<td><select name="orderBy" id="orderBy">
		  <option value="id" selected="selected">默认排序</option>
		  <option value="viewCount">点击数排序</option>
		  </select>
		  <select name="orderType" id="orderType">
		<option value="DESC">递减</option>
		<option value="ASC">递增</option>
		</select>
		<select name="pageSize" id="pageSize">
        <option value="15">默认15个</option>
		<option value="20">每页显示20个</option>
		<option value="50">每页显示50个</option>
		<option value="100">每页显示100个</option>
		</select>
		<input type="submit" name="submit" value="搜索" class="submit" id="submit">
		<a href="__URL__" >默认</a>

<script type="text/javascript">
/*
	设定选择值
*/
	$("#title").val('<?php echo (formatquery($_GET['title'])); ?>');
	$("#orderType").val('<?php echo ($_GET['orderType']); ?>');
	$("#orderBy").val('<?php echo ($_GET['orderBy']); ?>');
	$("#pageSize").val('<?php echo ($_GET['pageSize']); ?>');
</script>

		</td>
		</tr>
		</table>
	</div>
	</form>

	<form method="post" action="<?php echo u("Ad/doCommand");?>">
	<div class="body_content">
    <div class="top_action"><a href="<?php echo U("Ad/insert");?>">录入广告</a></div>
	<table cellspacing="0" cellpadding="0" class="formtable" id="maintable">
		<tr>
        <th class="th-id">&nbsp;</th>
		 <th>名称</th>
              <th width="250">链接地址</th>
              <th width="100">录入时间</th>
		<th width="50">操作</th>
		</tr>
        <?php if(isset($dataList)): if(is_array($dataList)): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["id"]); ?></td>
        <td><input name="title[]" type="text" value="<?php echo ($vo["title"]); ?>" class="input-style" style="<?php echo ($vo["title_style"]); ?>"/>
         <?php echo (statusicon($vo["status"],1,$frontUrl,'hidden.gif','隐藏')); echo (attachstatus($vo["attach_image"],1,$frontUrl,'image.gif','图片')); ?></td>
        <td><input name="link_url[]" type="text" id="link_url[]" value="<?php echo ($vo["link_url"]); ?>" class="input-style"/></td>
        <td><?php echo (date("Y-m-d",$vo["create_time"])); ?></td>
      
        
		<td> <a href="<?php echo U('Ad/modify',array('id'=>$vo['id']));?>"><img src="__PUBLIC__/Admin/images/modify22px.gif" alt="编辑" align="absmiddle" /></a>　</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
        <tr>
		  <td colspan="5" style="color:#F00; font-weight:bold">暂无数据</td>
		  </tr><?php endif; ?>
		</table>
	</div>
    <?php if(isset($dataList)): ?><div class="foot_action">
    <div class="bat">
	 <input type="checkbox" id="chkall" name="chkall" onclick="checkAll(this.form, 'id')">全选
		<select name="operate" id="operate">
        <option value="update" selected="selected">更新</option>
         <option value="setStatus">显示</option>
        <option value="unSetStatus">隐藏</option>
         <option value="delete">删除</option>
      </select>
		<input type="submit" name="submit" value="提交操作" class="confirmSubmit submit"></div>
	  <div class="pages"><?php echo ($pageBar); ?></div>
	</div><?php endif; ?>
	</form>

</div>
</div>

<div class="side">
	<div class="block style1">
		<h2>常规设置</h2>
		<ul class="folder">
        <li class="Index"><a href="<?php echo U("Index/index");?>">后台首页</a></li>
		<li class="Config"><a href="<?php echo U("Config/index");?>">系统配置</a></li>
        <li class="Module"><a href="<?php echo U("Module/index");?>">系统模块</a></li>
        <li class="Theme"><a href="<?php echo U("Theme/index");?>">风格模板</a></li>
        <li class="Admin"><a href="<?php echo U("Admin/index");?>">管理员管理</a></li>
        <li class="AdminRole"><a href="<?php echo U("AdminRole/index");?>">角色管理</a></li>
		</ul>
	</div>

	<div class="block style1">
		<h2>模块管理</h2>
		<ul class="folder" style="overflow-y:auto;height:280px;">
            <?php if(is_array($modualSider)): $i = 0; $__LIST__ = $modualSider;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lb): $mod = ($i % 2 );++$i;?><li class="<?php echo ($lb['module_name']); ?>"><a href='<?php echo U($lb['module_name']."/index");?>'><?php echo ($lb["module_title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	

	<div class="block style1">
		<h2>高级应用</h2>
		<ul class="folder">
        <li class="Tools"><a href="<?php echo U("Tools/index");?>">工具箱</a></li>
        <li class="AdminLog"><a href="<?php echo U("AdminLog/index");?>">操作日志</a></li>
        <!--  <li class="Label"><a href="<?php echo U("Label/index");?>">数据调用</a></li>
		<li class="Database"><a href="<?php echo U("Database/index");?>">数据库管理</a></li>
        <li><a href="http://www.tengzhiinfo.com" target="_blank">帮助中心</a></li>-->
		</ul>
	</div>

</div>
</div>
<div id="footer">
	<p>Powered by 藤陟网络软件有限公司  Copyright 2011-2013 藤陟网络软件有限公司
</p>
</div>
</div>
<script type="text/javascript">
$(function(){ 
    var moduleName = "<?php echo (MODULE_NAME); ?>";
    $("." + moduleName).addClass("active");
    $(".confirmSubmit").click(function() {
        return confirm('本操作不可恢复，确定继续？');
    });
}); 
</script>
</body>
</html>