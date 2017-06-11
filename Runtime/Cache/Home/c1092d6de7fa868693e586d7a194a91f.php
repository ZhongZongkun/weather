<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加用户</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<style type="text/css">
		* {margin: 0; padding: 0;}
		.su-bg {
			width: 100%;
			height: 500px;
			background: url(./su-bg.png) top center repeat-x ;
			position: absolute;
			left: 0;
			top:0;
			z-index: -1;
		}

		.su-content {
			color: white;
			width: 650px;
			/*background-color: #ddd;*/
			margin: 0 auto;
			padding-top:40px;
		}

		.su-header {
			text-align: center;
			padding-bottom: 7px;
			border-bottom: 2px solid #3695d2;
		}

		.su-header h1{
			color: #ddd;
		}

		.su-con  {
			margin-top: 20px;
			padding-left: 20px;/*
			border-bottom: 1px dashed #ddd;*/
		}
		.su-con .ids{
			height: 80px;
			padding-top: 10px;

		}
		.su-con div h2{
			height: 20px;
			line-height: 20px;
			padding-left: 10px;
			color: #867a7a;
			border-left: 5px solid #59AFE4;
		}
		.qwe {
			padding: 0 60px;
		}
		.form-control {
			border: 1px solid #726b6b;
		}
		.btd {
			width: 420px;
			position: relative;
			left: 50%;
			top: 20px;
			margin-left: -165px;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="information">
			<!-- <span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 20px;margin-left: 50px;"><span class="glyphicon glyphicon-home" aria-hidden="true"><a href="###">我的主页</a></span></span> -->
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/fanhui.png" alt=""><a href="<?php echo U('index/index');?>">返回首页</a></span>
			<span class="glyphicon glyphicon-export" aria-hidden="true"><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span class="glyphicon glyphicon-save" aria-hidden="true"><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>
			
		</div>
	</div>
	
	<div class="su-bg"></div>
	<div class="su-content">
		<div class="su-header">
			<h1><img src="<?php echo (SITE_URL); ?>public/images/su-title.png"></h1>
		</div>
		<div class="su-con">
			<div class="ids" >
				<h2><img src="<?php echo (SITE_URL); ?>public/images/jb.png"></h2>
			</div>
			<div class="qwe">
		<form class="form-horizontal" role="form" action="<?php echo U('index/adduser_check');?>" method="post">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">账户</label>
			    <div class="col-sm-10">
			      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
			    <div class="col-sm-10">
			      <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
			    <div class="col-sm-10">
			      <input type="password" name="pwd" class="form-control" id="inputPassword3" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
			    <div class="col-sm-10">
			      <input type="password" name="cpwd" class="form-control" id="inputPassword3" placeholder="Confirm Password">
			    </div>
			  </div>
			  
			  
			 <button type="submit" class="btn btn-info btd" style="width:150px;">确认</button>
			 <button type="button" class="btn btn-info btd" style="width:150px;margin-left:100px;" onclick="javascript:history.back(-1);">取消</button>
		</form>
			</div>
			
		</div>
	</div>
</body>
</html>