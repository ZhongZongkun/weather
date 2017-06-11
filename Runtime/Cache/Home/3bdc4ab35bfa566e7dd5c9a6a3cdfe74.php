<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>密码修改</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<style type="text/css">
	html,body{
		100%;
	}
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
			<span  aria-hidden="true" <?php if(session('level')!=1){echo "style='display:none;'";} ?> ><img src="<?php echo (SITE_URL); ?>public/images/usermanager.png" alt=""><a href="<?php echo U('index/usermanager');?>">用户管理</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>
			
		</div>
	</div>
	
	<div class="su-bg"></div>
	<div class="su-content">
		<div class="su-header">
			<h1><img src="<?php echo (SITE_URL); ?>public/images/pwdchange.png"></h1>
		</div>
		<div class="su-con">
			<div class="qwe">
		<form class="form-horizontal" role="form" action="<?php echo U('index/infochange_check');?>" method="post">
			<input type="hidden" value="<?php echo ($id); ?>" name="id" />
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label" >账户</label>
			    <div class="col-sm-10">
			      <input type="text" name="username" class="form-control" disabled="true" id="inputEmail3" value="<?php echo ($username1); ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
			    <div class="col-sm-10">
			      <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="<?php echo ($name1); ?>" disabled="true">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">原密码</label>
			    <div class="col-sm-10">
			      <input type="text" name="oldpwd" class="form-control" id="inputPassword3" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
			    <div class="col-sm-10">
			      <input type="password" name="newpwd" class="form-control" id="inputPassword3" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
			    <div class="col-sm-10">
			      <input type="password" name="cnewpwd" class="form-control" id="inputPassword3" >
			    </div>
			  </div>
			  
			  
			 <button type="button" class="btn btn-info btd" style="width:150px;" onclick="javascript:history.back(-1);">取消</button>
			 <button type="submit" class="btn btn-info btd" style="width:150px;margin-left:100px;" >确认</button>
		</form>
			</div>
			
		</div>
	</div>
</body>
</html>