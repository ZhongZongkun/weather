<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>landing</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
</head>
<body class="body1">
 <img src="<?php echo (SITE_URL); ?>public/images/bg.jpg" style="position: absolute;top: -80px; min-width:1250px; min-height:500px ;  " class="img-responsive">
<div id="content2">
	<div class="landing-box">
		<div class="landing-content">
			<div class="landing-content-top">
				<img src="<?php echo (SITE_URL); ?>public/images/button8.png" style="float: left; margin-left: 120px; margin-top: 9px;">
				
			</div>
			<div class="landing-content-bottom">
				<form method="post" action="<?php echo U('login/login_handle');?>">
				<div class="form-group1">
				    <input name="email" type="email" class="form-control" style="background:  url('<?php echo (SITE_URL); ?>public/images/int.png') 3px 3px  no-repeat; color: #FFF; height: 40px; padding-left: 30px; border-radius: 10px; ">
				  </div>
				  <div class="form-group" style="margin-top: 20px;">
				    <input name="password" type="password" class="form-control"style="background: url('<?php echo (SITE_URL); ?>public/images/dl.png') 6px 3px  no-repeat;  height: 40px; border-radius: 10px;padding-left: 30px; color: #FFF;" >
				  </div>
				  <span class="yz" style="margin-left: 48px;" ><input type="text" name="verify"></span>
				   <span class="yz" style="margin-left: 25px;"><img id="verify" onClick="this.src=this.src+'?'+Math.random()" src="<?php echo U('login/verify',array());?>"></span>
				  <button type="submit"  id="submit" class="btn btn-success">登陆</button>
				</form>
			</div>
		 </div>
	</div>
	</div>
 <script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
<script src="<?php echo (SITE_URL); ?>public/js/ajax.js"></script>
</body>
</html>