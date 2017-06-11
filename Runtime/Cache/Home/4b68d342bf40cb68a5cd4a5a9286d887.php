<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件管理</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<style type="text/css">
		a {
			color: #2d3238;
		}
		html,body{
    	height:100%;

   		}
   		
	</style>
	
</head>
<body style="overflow-x:hidden;">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><img src="<?php echo (SITE_URL); ?>public/images/zhuye.png" style="margin-top:-6px;" alt=""><span  aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left:0px;">设备管理</p></span></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/fanhui.png" alt=""><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>

		</div>
</div>
<div class="yb_content1">
	<div class="wj_l">
		<!-- 选项卡组件（菜单项nav-tabs）-->
		<ul id="myTab" class="nav nav-tabs" role="tablist">
		    <li class="active"><a href="#bulletin" onfocus="this.blur();" role="tab" data-toggle="tab">搜索</a></li>
		    <li><a href="#rule" role="tab" onfocus="this.blur();" data-toggle="tab">规章标准管理</a></li>
			<li><a href="#security" role="tab" onfocus="this.blur();" data-toggle="tab">执照文件管理</a></li>
			<li><a href="#welfare" role="tab" onfocus="this.blur();" data-toggle="tab">网站相关</a></li>
			<li><a href="#forum" role="tab" onfocus="this.blur();" data-toggle="tab">其他业务文件</a></li>
			<li><a href="#up" role="tab" onfocus="this.blur();" data-toggle="tab">文件上传</a></li>
		</ul>
		<!-- 选项卡面板 -->
		<div id="myTabContent" class="tab-content where">
			<div class="tab-pane fade in active" id="bulletin" >
				<p <?php if($re!=true){echo "style='display:none;';";} ?> style="text-align:center; font-size:20px;" >搜索结果</p>

				<?php if(($search == null) AND ($re != null)): ?><span style="color:red;font-size:18px;">无</span>
				<?php else: ?>
					
					<table class="table table-hover" <?php if($re!=true){echo "style='display:none;';";} ?> >
					<tr class="info">
						<th>文件名</th>
						<th>文件简介</th>
						<th>上传时间</th>
					</tr>
					<?php if(is_array($search)): foreach($search as $key=>$v): ?><tr>
						<td><a style="line-height:20px;" href="<?php echo U('download',array('id'=>$v['id']));?>"><?php echo ($v["filename"]); ?></a></td>
						<td><?php if($v['des'] == null): ?>无<?php else: echo ($v['des']); endif; ?></td>
						<td width="20%"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>

					</tr><?php endforeach; endif; ?>
					</table><?php endif; ?>

				

				<img <?php if($re==true){echo "style='display:none;';";} ?> src="<?php echo (SITE_URL); ?>public/images/button321.png" style="position: absolute; top: 90px;left:500px;">
				<span <?php if($re==true){echo "style='display:none;';";} ?> style="display: inline-block;"><form action="<?php echo U('File/search');?>" method="post"><input type="text" name="content" class="sosuo" ></input><input  onfocus="this.blur();" type="submit" value="" style="display:block;width: 44px;height: 44px; display: inline-block; position: relative;top: 15px; background:url('<?php echo (SITE_URL); ?>public/images/Search-Fields.jpg') no-repeat scroll -290px 2px;border:none; left: -44px;"></form></span>
			</div>

			<div class="tab-pane fade " id="rule">
				<h3>规章标准管理</h3><hr style="border-top: 1px solid #cfc1c1;">
				<table class="table table-hover">
					<tr class="info">
						<th>文件名</th>
						<th>文件简介</th>
						<th>上传时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($data1)): foreach($data1 as $key=>$v): ?><tr>
						<td ><a style="line-height:20px;font-size:14px;" href="<?php echo U('download',array('id'=>$v['id']));?>"><?php echo ($v["filename"]); ?></a></td>
						<td><?php if($v['des'] == null): ?>无<?php else: echo ($v['des']); endif; ?></td>
						<td style="width:20%;"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
						<td ><a href="<?php echo U('upfiledelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要删除该文件吗？')) return true;else return false;" style="line-height:20px;"><button  class="btn btn-danger btn-sm">删除</button></a></td>
					</tr><?php endforeach; endif; ?>
				</table>
			</div>


			<div class="tab-pane fade" id="forum">
				<h3>其他业务文件</h3><hr style="border-top: 1px solid #cfc1c1;">
				<table class="table table-hover">
					<tr class="info">
						<th>文件名</th>
						<th>文件简介</th>
						<th>上传时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($data4)): foreach($data4 as $key=>$v): ?><tr>
						<td ><a style="line-height:20px;font-size:14px;" href="<?php echo U('download',array('id'=>$v['id']));?>"><?php echo ($v["filename"]); ?></a></td>
						<td><?php if($v['des'] == null): ?>无<?php else: echo ($v['des']); endif; ?></td>
						<td style="width:20%;"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
						<td ><a href="<?php echo U('upfiledelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要删除该文件吗？')) return true;else return false;" style="line-height:20px;"><button  class="btn btn-danger btn-sm">删除</button></a></td>
					</tr><?php endforeach; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade" id="security">
				<h3>执照文件管理</h3><hr style="border-top: 1px solid #cfc1c1;">
				<table class="table table-hover">
					<tr class="info">
						<th>文件名</th>
						<th>文件简介</th>
						<th>上传时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($data2)): foreach($data2 as $key=>$v): ?><tr>
						<td ><a style="line-height:20px;font-size:14px;" href="<?php echo U('download',array('id'=>$v['id']));?>"><?php echo ($v["filename"]); ?></a></td>
						<td><?php if($v['des'] == null): ?>无<?php else: echo ($v['des']); endif; ?></td>
						<td style="width:20%;"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
						<td ><a href="<?php echo U('upfiledelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要删除该文件吗？')) return true;else return false;" style="line-height:20px;"><button  class="btn btn-danger btn-sm">删除</button></a></td>
					</tr><?php endforeach; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade" id="welfare">
				<h3>网站相关</h3><hr style="border-top: 1px solid #cfc1c1;">
				<table class="table table-hover">
					<tr class="info">
						<th>文件名</th>
						<th>文件简介</th>
						<th>上传时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($data3)): foreach($data3 as $key=>$v): ?><tr>
						<td ><a style="line-height:20px;font-size:14px;" href="<?php echo U('download',array('id'=>$v['id']));?>"><?php echo ($v["filename"]); ?></a></td>
						<td><?php if($v['des'] == null): ?>无<?php else: echo ($v['des']); endif; ?></td>
						<td style="width:20%;"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
						<td ><a href="<?php echo U('upfiledelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要删除该文件吗？')) return true;else return false;" style="line-height:20px;"><button  class="btn btn-danger btn-sm">删除</button></a></td>
					</tr><?php endforeach; endif; ?>
				</table>
			</div>
			<div class="tab-pane fade" id="up">
				<h3>文件上传</h3><hr style="border-top: 1px solid #cfc1c1;">
				<form method="post" action="<?php echo U('uploadfile');?>" enctype="multipart/form-data">
				  <div class="form-group">
				    <label >文件简介</label>
				    <input type="text" name="des" style="width:600px;" >
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">文件类型</label><br>
				        <input type="radio" name="type" checked="checked"  value="g">规章标准文件<br/>
				        <input type="radio" name="type" value="z" >执照文件<br/>
				        <input type="radio" name="type" value="w" >网站相关文件<br/>
				        <input type="radio" name="type"  value="q">其他业务文件<br/>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputFile">文件</label>
				    <input type="file" name="file" id="exampleInputFile">
				  </div>
				  <button type="submit" class="btn btn-default">上传</button>
				</form>
			</div>
		</div>
			
	</div>
</div>
</body>
</html>