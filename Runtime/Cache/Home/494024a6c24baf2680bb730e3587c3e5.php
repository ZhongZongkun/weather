<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>信息共享</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<style type="text/css">
		html,body{
    	height:100%;

   		}
		a {
			color: #2d3238;
		}
		a:hover{
			text-decoration: none;
		}
	</style>
</head>
<body style="overflow-x:hidden;">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><img src="<?php echo (SITE_URL); ?>public/images/zhuye.png" style="margin-top:-6px;" alt=""><span  aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left:0px;">信息共享</p></span></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/fanhui.png" alt=""><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>
		</div>
</div>
<div class="yb_content">
	<h1>信息共享</h1>
	
	<table class="table table-hover" style="background:rgb(242, 242, 242); width: 98%; margin: 0px auto;">
		<tr>
		  	<td class="eq_tilte" style="width:78%;font-size:18px;"><span data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">文件名</span></td>
		  	<td class="eq_tilte" style="text-align:left;font-size:14px;" width="15%">上传时间</td>
		  	<td class="eq_tilte" style="text-align:center;font-size:14px;" width="7%">操作</td>
		 </tr>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
		  	<td style="height:30px;line-height:30px;"><a href="<?php echo U('Xinxi/download',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></td>
		  	<td style="text-align:left;height:30px;line-height:30px;"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
		  	<td style="text-align:left;height:30px;line-height:30px;"><a onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" href="<?php echo U('defile',array('id'=>$v['id']));?>" type="button" class="btn btn-danger">删除</a></td>
		</tr><?php endforeach; endif; ?>
	</table>
	<button type="button" class="btn btn-info"  data-toggle="modal" data-target="#exampleModal1" style="position: absolute;margin-top:8px;left: 440px;" >上传文件</button>
	<div class="modal fade"  id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" style="width: 700px;" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">共享文件上传</h4>
	      </div>
	      <div class="modal-body">
	        <form action="<?php echo U('Xinxi/addcheck');?>" method="post" name="form" enctype="multipart/form-data">
	             文件:&nbsp;<input type="file" name="file">
	             <br/>
	             <hr>
	           	<button type="button" class="btn btn-default" data-dismiss="modal">取消上传</button>
	           	<input type="submit" style="float:right;" value="确定上传" class="btn btn-primary">
	        </form>
	      </div>
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">取消</button> -->
	        <!--<button type="button" class="btn btn-primary" onClick="javascript:submit(document.form);">确定</button>-->
	      </div>
	    </div>
	  </div>
	</div>
</div>
</body>
</html>