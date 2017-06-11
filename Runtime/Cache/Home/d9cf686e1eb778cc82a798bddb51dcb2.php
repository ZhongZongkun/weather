<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
</head>
<body >
	<div class="header">
		<div class="information">
			<!-- <span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 20px;margin-left: 50px;"><span class="glyphicon glyphicon-home" aria-hidden="true"><a href="###">我的主页</a></span></span> -->
			<span class="glyphicon glyphicon-home" aria-hidden="true"><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span class="glyphicon glyphicon-export" aria-hidden="true"><a href="###">注销</a></span>
			<span class="glyphicon glyphicon-save" aria-hidden="true"><a href="landing.html">切换用户</a></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"><a href="###">我爱吃西红柿</a></span>
			
		</div>
	</div>
	<div id="content">
		<div id="content-box">
			<div id="content_left">
				<div id="content_left_top">
					<a class="button" href="<?php echo U('user/message');?>" data-title="My mission is clear">
					<span class="line line-top"></span>
					<span class="line line-right"></span>
					<span class="line line-bottom"></span>
					<span class="line line-left"></span>
					<div id="content_left_top_left"><span class="btn-1"></span></div>
					</a>		
					<a class="button" href="<?php echo U('training/index');?>" data-title="My mission is clear" style="margin-left:10px;">
					<span class="line line-top"></span>
					<span class="line line-right"></span>
					<span class="line line-bottom"></span>
					<span class="line line-left"></span>
					<div id="content_left_top_right" alt="人员信息管理"><span class="btn-2"></span></div>
					</a>			
				</div>
				<a class="button" href="<?php echo U('baobiao/index');?>" style="width:310px; margin-top:10px;" data-title="My mission is clear" style="margin-left:10px;">
					<span class="line line-top"></span>
					<span class="line line-right"></span>
					<span class="line line-bottom"></span>
					<span class="line line-left"></span>
					<div id="content_left_bottom"><span class="btn-3"></span></div>
					</a>
				
			</div>
			<div id="content_right">
				<div id="content_right_top">
					<a class="button" href="<?php echo U('xinxi/index');?>" style="width:269px;" data-title="My mission is clear" style="margin-left:10px;">
					<span class="line line-top"></span>
					<span class="line line-right"></span>
					<span class="line line-bottom"></span>
					<span class="line line-left"></span>
					<div id="content_right_top_left"><span class="btn-4"></span></div>
					</a>
					<a class="button" href="<?php echo U('equip/index');?>" style="width:167px; margin-left:10px;" data-title="My mission is clear" style="margin-left:10px;">
					<span class="line line-top"></span>
					<span class="line line-right"></span>
					<span class="line line-bottom"></span>
					<span class="line line-left"></span>
					<div id="content_right_top_right"><span class="btn-5" ></span></div>
					</a>		
					
				</div>
				<div id="content_right_bottom">
					<a class="button" href="<?php echo U('file/index');?>" data-title="My mission is clear">
					<span class="line line-top"></span>
					<span class="line line-right"></span>
					<span class="line line-bottom"></span>
					<span class="line line-left"></span>
					<div id="content_right_bottom_left"><span class="btn-6"></span></div>
					</a>
					<div id="content_right_bottom_right">
						<span style="color:#3A7DC4;">气象综合管理平台</span>
						<p >气象综合管理系统是一个集成管理系统，主要用于气象业务工作，提供一个更便捷的管理平台。</p>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>
</html>