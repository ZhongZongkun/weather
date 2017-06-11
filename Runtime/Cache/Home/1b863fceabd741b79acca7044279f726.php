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
	
	
</head>
<body style="overflow-x:hidden;">
<input id="ajax-url" type="hidden" value="<?php echo U('User/ajax');?>">
<input id="ajaxurl" type="hidden" value="<?php echo U('user/moremessage');?>" name="url">
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
<div class="px_content2">
	 <h3>人员信息登记情况</h3>
	 <div id="item1" class="item">

        <table class="table table-hover table-bordered" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" >序号</td>
		  	<td class="eq_tilte">单位</td>
		  	<td class="eq_tilte" >姓名</td>
		  	<!--<td class="eq_tilte" >性别</td>-->
		  	<!--<td class="eq_tilte" >出生年月</td>-->
		  	<!--<td class="eq_tilte" >年龄</td>-->
		  	<!--<td class="eq_tilte" >民族</td>-->
		  	<!--<td class="eq_tilte" >政治面貌</td>-->
		  	<!--<td class="eq_tilte" >籍贯</td>-->
		  	<td class="eq_tilte">岗位</td>
		  	<td class="eq_tilte" >职务</td>
		  	<!--<td class="eq_tilte">最高学位</td>-->
		  	<!--<td class="eq_tilte" >毕业学校及毕业时间</td>-->
		  	<!--<td class="eq_tilte"> 执照种类及取得时间（民航局文件号）</td>-->
		  	<!--<td class="eq_tilte" >职称及取得时间</td>-->
		  	<!--<td class="eq_tilte">专业岗位工作起始时间</td>-->
		  	<td class="eq_tilte" >专业</td>
		  	<!--<td class="eq_tilte"> 学习方式</td>-->
		  	<!--<td class="eq_tilte" >最高学位取得时间</td>-->
		  	<!--<td class="eq_tilte">执照注册时间（民航局文件号）</td>-->
		  	<td class="eq_tilte">岗位状态</td>
		  	<!--<td class="eq_tilte"> 培训时间</td>-->
		  	<!--<td class="eq_tilte" >培训教员</td>-->
		  	<!--<td class="eq_tilte"> 培训单位</td>-->
		  	<!--<td class="eq_tilte" >证书获得日期</td>-->
		  	<!--<td class="eq_tilte"> 备注</td>-->
			  <td class="eq_tilte">操作</td>
		  </tr>
		  <?php $i=0; ?>
		  <?php if(is_array($people)): foreach($people as $key=>$v): ?><tr>
		  	<td class="eq_tilte" ><?php echo ++$i; ?></td>
		  	<td class="eq_tilte"><?php echo ($v["danwei"]); ?></td>
		  	<td class="eq_tilte" ><?php echo ($v["name"]); ?></td>
			  <input type="hidden" value="<?php echo ($v["id"]); ?>" name="id">
		  	<!--<td class="eq_tilte" ><?php echo ($v["sex"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["birthday"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["age"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["nation"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["status"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["birthplace"]); ?></td>-->
		  	<td class="eq_tilte"><?php echo ($v["job"]); ?></td>
		  	<td class="eq_tilte" ><?php echo ($v["position"]); ?></td>
		  	<!--<td class="eq_tilte"><?php echo ($v["largedegree"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["graduateschool"]); ?><br><?php echo ($v["graduatetime"]); ?></td>-->
		  	<!--<td class="eq_tilte"> <?php echo ($v["licensetype"]); ?><br><?php echo ($v["licensetime"]); ?><br><?php echo ($v["licensenumber"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["zhicheng"]); ?><br><?php echo ($v["zhichengtime"]); ?></td>-->
		  	<!--<td class="eq_tilte"><?php echo ($v["worktime"]); ?></td>-->
		  	<td class="eq_tilte" ><?php echo ($v["major"]); ?></td>
		  	<!--<td class="eq_tilte"> <?php echo ($v["learnmethod"]); ?></td>-->
		  	<!--<td class="eq_tilte" ><?php echo ($v["largedegreetime"]); ?></td>-->
		  	<!--<td class="eq_tilte"><?php echo ($v["licenseregistnumber"]); ?></td>-->
		  	<td class="eq_tilte"><?php echo ($v["workstate"]); ?></td>
		  	<!--<td class="eq_tilte"> </td>-->
		  	<!--<td class="eq_tilte" ></td>-->
		  	<!--<td class="eq_tilte"> </td>-->
		  	<!--<td class="eq_tilte" ></td>-->
		  	<!--<td class="eq_tilte"> <?php echo ($v["others"]); ?></td>-->
		  	<input type="hidden" name="id" id="userid" value="<?php echo ($v["id"]); ?>">
			  <td class="eq_tilte" width="20%"><button data-toggle="modal" data-target="#allmessage" class="btn btn-info show_btn">详细信息</button> <button class="btn btn-primary change_btn" style="margin-right:5px;" id="user-change" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">修改</button><a href="<?php echo U('delete',array('id'=>$v['id']));?>"><button onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" class="btn btn-danger" >删除</button></a></td>
		  </tr><?php endforeach; endif; ?>
		 
		  <tr style="background: #EDEFE0">
		  	<td colspan="27" style="height: 100px;">
			<button type="button" style="margin-left: 480px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal">
				 添加记录
				</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">添加记录</h4>
				      </div>
				      <div class="modal-body">
				      		<form action="<?php echo U('handle');?>" name='wish' style="padding-left: 17px;" method="post">
				      			单位：<input style="width:180px;" name="danwei" type="text"></input><br>
				      			姓名：<input style="width:80px;" name="name" type="text"></input><br>
				      			性别： <label class="checkbox-inline">
									      <input type="radio" name="sex" id="optionsRadios3" value="男" checked>男
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="sex" id="optionsRadios4" 
									         value="女">女
									   </label><br>
				      			出生年月：<input type="text" name="birthday" style="width:220px;"></input><br>
				      			年龄：<input type="number" name="age" style="width:170px;"></input><br>
				      			民族：<input type="text" name="nation" style="width:220px;"></input><br>
				      			政治面貌：<input type="text" name="status"></input><br>
				      			籍贯：<input type="text" name="birthplace"></input><br>
				      			
				      			岗位：<input type="text" name="job"></input><br>
				      			职务：<input type="text" name="position"></input><br>
				      			最高学位：<input type="text" name="largedegree"></input><br>
				      			毕业学校：<input style="width:180px;" name="graduateschool" type="text"></input><br>
				      			毕业时间：<input style="width:180px;" name="graduatetime" type="text"></input><br>
				      			执照种类：<input type="text" name="licensetype" style="width:170px;"></input><br>
				      			执照民航局文件号：<input type="text" name="licensenumber" style="width:170px;"></input><br>
				      			执照取得时间：<input type="text" name="licensetime" style="width:170px;"></input><br>
				      			职称：<input type="text" name="zhicheng" style="width:220px;"></input><br>
				      			职称取得时间：<input type="text" name="zhichengtime" style="width:220px;"></input><br>
				      			专业岗位工作起始时间：<input type="text" name="worktime" style="width:220px;"></input><br>
				      			专业：<input type="text" name="major"></input><br>
				      			学习方式：<input type="text"  name="learnmethod" style="width:170px;"></input><br>
				      			最高学位取得时间：<input type="text" name="largedegreetime" style="width:220px;"></input><br>
				      			执照注册时间：<input type="text" name="licenseregisttime"></input><br>
				      			执照民航局文件号：<input type="text" name="licenseregistnumber"></input><br>
				      			岗位状态：<input type="text" name="workstate"></input><br>
				      			岗前培训教员：<input type="text"></input><br>
				      			岗前培训单位：<input type="text"></input><br>
				      			岗前证书编号：<input type="text"></input><br>
				      			证书获得日期：<input type="text"></input><br>
				      			岗前培训时间：<input type="text"></input><br>
								统计日期：<input type="text"></input><br><br>
				      			<span>备注：</span><br>
				      			<textarea name="others"  style="width: 400px; margin-left: 50px; margin-top: -30px; margin-bottom: 20px; height: 100px;"></textarea><br>


				       		 <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button type="submit" class="btn btn-primary">确定</button>
					      </div>
				       		</form>

				      </div>
				     
				    </div>
				  </div>



		  </tr>
		</table>
    </div>
</div>
<div class="modal fade" id="allmessage">
	<div class="modal-dialog modal-lg" style="width:1400px">
		<div class="modal-content">
			<div class="modal-head">
				<h4 style="text-align: center">详细信息</h4>
			</div>
			<div class="modal-body">
				<table class="table" style="background: #ffffff;" >
					<tr >
						<td class="eq_tilte">单位</td>
						<td class="eq_tilte" >姓名</td>
						<td class="eq_tilte" >性别</td>
						<td class="eq_tilte" >出生年月</td>
						<td class="eq_tilte" >年龄</td>
						<td class="eq_tilte" >民族</td>
						<td class="eq_tilte" >政治面貌</td>
						<td class="eq_tilte" >籍贯</td>
						<td class="eq_tilte">岗位</td>
						<td class="eq_tilte" >职务</td>
						<td class="eq_tilte">最高学位</td>
						<td class="eq_tilte" >毕业学校及毕业时间</td>
						<td class="eq_tilte"> 执照种类及取得时间（民航局文件号）</td>
						<td class="eq_tilte" >职称及取得时间</td>
						<td class="eq_tilte">专业岗位工作起始时间</td>
						<td class="eq_tilte" >专业</td>
						<td class="eq_tilte"> 学习方式</td>
						<td class="eq_tilte" >最高学位取得时间</td>
						<td class="eq_tilte">执照注册时间（民航局文件号）</td>
						<td class="eq_tilte">岗位状态</td>
						<td class="eq_tilte">统计日期</td>
						<td class="eq_tilte"> 备注</td>
					</tr>
					<tr id="message_tr">
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
						<td>等待加载</td>
					</tr>
					</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">月报表</h4>
	      </div>
		<form action="<?php echo U('edit');?>" method="post" name="form" id="user-change-form">
	      <div class="modal-body">
			  <input type="hidden" name="id" value="">
				  单位：<input style="width:180px;" name="danwei" type="text"></input><br>
				      			姓名：<input style="width:80px;" name="name" type="text"></input><br>
				      			性别： <label class="checkbox-inline">
									      <input type="radio" name="sex" id="optionsRadios3" value="男">男
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="sex" id="optionsRadios4" 
									         value="女" >女
									   </label><br>
				      			出生年月：<input type="text" name="birthday" style="width:220px;"></input><br>
				      			年龄：<input type="number" name="age" style="width:170px;"></input><br>
				      			民族：<input type="text" name="nation" style="width:220px;"></input><br>
				      			政治面貌：<input type="text" name="status"></input><br>
				      			籍贯：<input type="text" name="birthplace"></input><br>
				      			
				      			岗位：<input type="text" name="job"></input><br>
				      			职务：<input type="text" name="position"></input><br>
				      			最高学位：<input type="text" name="largedegree"></input><br>
				      			毕业学校：<input style="width:180px;" name="graduateschool" type="text"></input><br>
				      			毕业时间：<input style="width:180px;" name="graduatetime" type="text"></input><br>
				      			执照种类：<input type="text" name="licensetype" style="width:170px;"></input><br>
				      			执照民航局文件号：<input type="text" name="licensenumber" style="width:170px;"></input><br>
				      			执照取得时间：<input type="text" name="licensetime" style="width:170px;"></input><br>
				      			职称：<input type="text" name="zhicheng" style="width:220px;"></input><br>
				      			职称取得时间：<input type="text" name="zhichengtime" style="width:220px;"></input><br>
				      			专业岗位工作起始时间：<input type="text" name="worktime" style="width:220px;"></input><br>
				      			专业：<input type="text" name="major"></input><br>
				      			学习方式：<input type="text"  name="learnmethod" style="width:170px;"></input><br>
				      			最高学位取得时间：<input type="text" name="largedegreetime" style="width:220px;"></input><br>
				      			执照注册时间：<input type="text" name="licenseregisttime"></input><br>
				      			执照民航局文件号：<input type="text" name="licenseregistnumber"></input><br>
				      			岗位状态：<input type="text" name="workstate"></input><br>
				      			岗前培训教员：<input type="text"></input><br>
				      			岗前培训单位：<input type="text"></input><br>
				      			岗前证书编号：<input type="text"></input><br>
				      			证书获得日期：<input type="text"></input><br>
				      			岗前培训时间：<input type="text"></input><br>
				      			统计日期：<input type="text" name="tongji"></input><br><br>
				      			<span>备注：</span><br>
				      			<textarea name="others"  style="width: 400px; margin-left: 50px; margin-top: -30px; margin-bottom: 20px; height: 100px;"></textarea>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	       <button type="submit" class="btn btn-info">修改</button>
	      </div>
	</form>
	    </div>
	  </div>
	</div>

				     
			</div>
		</div>
	<script language="javascript" type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/ajax.js"></script>
</body>
</html>