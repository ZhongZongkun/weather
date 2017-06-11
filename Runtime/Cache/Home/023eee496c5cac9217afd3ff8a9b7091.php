<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>人员管理</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/ajax.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/My97DatePicker/WdatePicker.js"></script>
	
	<style type="text/css">
		html,body{
			height: 100%;
		}
	 	
		td {
			text-align: center;
			border: 1px solid #316e95!important;

		}
		.um {
			background-color: #46a3cf;
		}
		.um td {
			color: #fff;
		}
		.usem a {
			height: 20px;
			padding: 0 10px;
		}
		.item {
		    margin-top: 20px;
		}
		.mu {
			float: left;
		}
	</style>
</head>
<body style="overflow-x:hidden;">
<input id="userchange-url" type="hidden" value="<?php echo U('index/change');?>">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><img src="<?php echo (SITE_URL); ?>public/images/zhuye.png" style="margin-top:-6px;" alt=""><span  aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left:0px;">人员信息管理</p></span></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/fanhui.png" alt=""><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>
	</div>
</div>
<div class="px_content2 " style="width:960px;">
	 <h3 style="width:100px;">账号管理</h3>
	 <div id="item1" class="item" style="padding:10px 10px;">
        <table class="table  table-bordered" style="background:rgb(237, 239, 224);position:relative">
		  	<tr class="eq_tr um">
		  	<td class="eq_tilte" >序号</td>
		  	<td class="eq_tilte">用户名</td>
		  	<td class="eq_tilte" >账号</td>
		  	<td class="eq_tilte">密码</td>
		  	<td class="eq_tilte" >所在单位</td>
		  	<td class="eq_tilte" >操作</td>
		  </tr>
		  <?php if(is_array($users)): foreach($users as $key=>$v): ?><tr class="eq_tr">
		  	<td class="eq_tilte" ><?php echo ++$key;?></td>
		  	<td class="eq_tilte"><?php echo ($v["name"]); ?></td>
		  	<td class="eq_tilte" ><?php echo ($v["username"]); ?></td>
		  	<td class="eq_tilte">***</td>
		  	<td class="eq_tilte" ><?php echo ($v["danwei"]); ?></td>
		  	<td class="eq_tilte usem" style="width:150px;" >
				<a href="###"  uid='<?php echo ($v["id"]); ?>' class="btn btn-info userchangebtn" data-toggle="modal" data-target=".change">修改</a>&nbsp;&nbsp;&nbsp;
				<a onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" href="<?php echo U('userdelete',array('id'=>$v['id']));?>" class="btn btn-danger">删除</a>
		  	</td>
		  </tr><?php endforeach; endif; ?>
		</table>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="position:relative;margin-left:-40px;;left:50%;">添加用户</button>

			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content" style="width:600px; margin:0 auto; padding:40px;overflow:hidden;">
			    	<h4>用户信息</h4><hr>
					<form role="form" action="<?php echo U('adduser_check');?>" method="post">
					<span class="mu">用户名:</span><input type="text" name="name" class="form-control"  placeholder="name" style="margin-left:130px;"><hr>
					<span class="mu" >帐号:</span><input type="text" name="username" class="form-control"  placeholder="username" style="margin-left: 130px;"><hr>
					<span class="mu">密码:</span><input type="password" name="password" class="form-control"  placeholder="password" style="margin-left:130px;"><hr>
					<span class="mu">所在单位:</span><input type="text" name="danwei" class="form-control"  placeholder="danwei" style="margin-left:130px;">
					
					 <button type="submit" class="btn btn-primary" style="position:relative;float:right;margin-top:30px;">确认</button>
					 <button type="reset" class="btn btn-default" style="position:relative;float:left;margin-top:30px;">重置</button>
					</form>
			    </div>
			  </div>
			</div>

			<div class="modal fade change" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content" style="width:600px; margin:0 auto; padding:40px;overflow:hidden;">
			    	<h4>密码修改</h4><hr>
					<form role="form" action="<?php echo U('edit');?>" method="post" id="userchange-form">
					<input type="hidden" name="id" value="">
					<span class="mu">用户名:</span><input type="text" name="name" class="form-control"  placeholder="name" style="margin-left:130px;" disabled="disable"><hr>
					<span class="mu" >帐号:</span><input type="text" name="username" class="form-control"  placeholder="username" style="margin-left: 130px;" disabled="disable"><hr>
					<span class="mu">新密码:</span><input type="password" name="password" class="form-control"  placeholder="password" style="width:360px!important;margin-left:130px;"><hr>
					<span class="mu">所在单位:</span><input type="text" name="danwei" class="form-control"  placeholder="danwei" style="margin-left:130px;" disabled="disable">
					<button type="button" class="btn btn-default" data-dismiss="modal" style="position:relative;float:left;margin-top:30px;">取消修改</button>
					<button type="submit" class="btn btn-primary" style="position:relative;float:right;margin-top:30px;">确认修改</button>
					</form>
			    </div>
			  </div>
			</div>

	 </div>
</div>
	
</body>
</html>