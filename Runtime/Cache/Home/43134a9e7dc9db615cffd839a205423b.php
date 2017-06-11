<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
</head>
<body >
	<div class="header">
		<div class="information">

			<span  aria-hidden="true" <?php if(session('level')!=1){echo "style='display:none;'";} ?> ><img src="<?php echo (SITE_URL); ?>public/images/usermanager.png" alt=""><a href="<?php echo U('index/usermanager');?>">用户管理</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>
			
			
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