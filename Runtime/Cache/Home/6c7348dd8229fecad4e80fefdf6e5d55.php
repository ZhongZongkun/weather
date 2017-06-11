<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>yuebaobiao</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<style type="text/css">
		a {
			color: #2d3238;
		}
	</style>
</head>
<body style="overflow-x:hidden;">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><span class="glyphicon glyphicon-home" aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left: 10px;">月报表</p></span></span>
			<span class="glyphicon glyphicon-home" aria-hidden="true"><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span class="glyphicon glyphicon-export" aria-hidden="true"><a href="###">注销</a></span>
			<span class="glyphicon glyphicon-save" aria-hidden="true"><a href="<?php echo U('index/landing');?>">切换用户</a></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"><a href="###">我爱吃西红柿</a></span>
		</div>
</div>
<div class="yb_content">
	<h1>月报表查询</h1>
	 <table class="table" style="background:rgb(173, 211, 224); width: 90%; margin: 20px auto;">
		  <tr>
		  	<td class="eq_tilte"> 月报表记录</td>
		  	<td class="eq_tilte" style="float:right;">上传时间</td>
		  </tr>
	</table>
	<table class="table table-hover" style="background:rgb(242, 242, 242); width: 90%; margin: 20px auto;">
			<?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><tr>
		  	<td class="eq_tilte" style="width: 85%;"><a href="###"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <?php echo ($v["name"]); ?></a></td>
		  	<td class="eq_tilte" style="float:right;"><?php echo (date('Y-m-d',$v["time"])); ?></td>
		  	</tr><?php endforeach; endif; ?>

		  
	</table>
	<button type="button" class="btn btn-info" style="position: absolute;left: 440px;" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">月报表录入</button>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">月报表</h4>
	      </div>
	      <div class="modal-body">
	        <form>
	          报告单位: xxxxxxxxxxxxxxxxxxxxxxx
	          联系人: xxxxxxxxxxxxxxxxxxxxxxx
	          日期: xxxxxxxxxxxxxxxxxxxxx<br />
	          本月主要工作: xxxxxxxxxxxxxxxxxxxxxxxxxx<br style="margin-bottom: 30px;" />
	          (安全运行):<hr style="margin-top: 0;">
	          预报准确率: 最高xxxxxxxxxx&nbsp;最低&nbsp;xxxxxxxxxxxxxx&nbsp;平均&nbsp;xxxxxxxxxxxxxxxxxxxxxx<br>
	           观测错情率: 最高&nbsp;xxxxxxxxxxx=xxxx&nbsp;最低&nbsp;xxxxxxxxxxxxxxxxxx&nbsp;平均&nbsp;xxxxxxxxxxxxxxxxxxxxxxx<br>
	           数据库系统运行正常率: &nbsp;xxxxxxxxxxxxxxxxxxxxxxx&nbsp;
	           卫星云图接收正常率: &nbsp;xxxxxxxxxxxxxx&nbsp;<br>
	           因天气原因造成飞机延误、返航、备降、取消架次:&nbsp;xxxxxxxxxxxxxx&nbsp;<br>
	           <--气象设备因故障或升级改造等原因停止运行和恢复运行情况: 设备名称&nbsp;xxxxxxxxxxxxxx&nbsp;停机时间&nbsp;xxxxxxxxxxxxxx&nbsp;恢复时间&nbsp;xxxxxxxxxxxxxxxxxxxxxxx&nbsp;停机期间解决办法&nbsp;xxxxxxxxxxxxxxxxxxxxxxx--><br>
	            <--航空器特殊空中报告情况: 时间&nbsp;xxxxxxxxxxxxxx&nbsp;地点&nbsp;xxxxxxxxxxxxxx&nbsp;天气现象&nbsp;xxxxxxxxxxxxxx--><br>
	            <--自动观测系统运行正常率:&nbsp;xxxxxxxxxxxxxx&nbsp;自动站运行正常率&nbsp;xxxxxxxxxxxxxx&nbsp;气压仪正常率&nbsp;xxxxxxxxxxxxxx&nbsp;气象雷达运行正常率&nbsp;xxxxxxxxxxxxxx&nbsp;左侧四项重要气象设备平均正常率&nbsp;xxxxxxxxxxxxxx--><br><br>
	            (业务管理):<hr style="margin-top: 0;">
	             <--气象设备新建、升级、报废、开放和计量情况: 名称:&nbsp;xxxxxxxxxxxxxx&nbsp;时间:&nbsp;xxxxxxxxxxxxxx&nbsp;类型（新建、升级、报废、开放和计量）:&nbsp;xxxxxxxxxxxxxx&nbsp;--><br>
	             对气象设备防雷接地进行检查和整改情况: &nbsp;xxxxxxxxxxxxxx&nbsp;<br>
	             气象培训情况: &nbsp;xxxxxxxxxxxxxx&nbsp;<br>
	             出现气象差错和严重差错的情况及处理意见: &nbsp;xxxxxxxxxxxxxx&nbsp;<br>
	             人员变动的情况: &nbsp;xxxxxxxxxxxxxx&nbsp;<br>
	             <br><br>
	            (其它):<hr style="margin-top: 0;">
	           		xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	        </form>
	      </div>
	      <div class="modal-footer">

	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	       <button type="button" class="btn btn-info">修改</button>
	       <button type="button" class="btn btn-info">下载</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade"  id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" style="width: 700px;" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">学院气象台综合月报表</h4>
	      </div>
	      <div class="modal-body">
	        <form action="<?php echo U('addcheck');?>" method="post" name="form">
	          报告名称: &nbsp;<input type="text" style="width:400px;" name="name"><br>
	          报告单位: &nbsp;<input type="text" name="danwei"></input>&nbsp;
	          联系人: &nbsp;<input type="text" name="contacter"></input>&nbsp;&nbsp;&nbsp;
	          日期: &nbsp;<input type="date" name="date"></input><br />
	          本月主要工作: &nbsp;<input type="text" style="width: 543px;" name="mainwork"></input><br style="margin-bottom: 30px;" />
	          (安全运行):<hr style="margin-top: 0;">
	          预报准确率: 最高&nbsp;<input type="text" name="largezhun"></input>&nbsp;最低&nbsp;<input type="text" name="lowzhun"></input>&nbsp;平均&nbsp;<input type="text" name="averagezhun"></input><br>
	           观测错情率: 最高&nbsp;<input type="text" name="largecuo"></input>&nbsp;最低&nbsp;<input type="text" name="lowcuo"></input>&nbsp;平均&nbsp;<input type="text" name="averagecuo"></input><br>
	           数据库系统运行正常率: &nbsp;<input type="text" name="database"></input>&nbsp;
	           卫星云图接收正常率: &nbsp;<input type="text" name="weixing"></input>&nbsp;<br>
	           因天气原因造成飞机延误、返航、备降、取消架次:&nbsp;<input type="text" style="width: 300px;" name="tianqiyuanying"></input>&nbsp;<br>
	           气象设备因故障或升级改造等原因停止运行和恢复运行情况: 设备名称&nbsp;<input type="text" name="devicename"></input>&nbsp;停机时间&nbsp;<input type="date" name="stoptime"></input>&nbsp;恢复时间&nbsp;<input type="date" name="starttime"></input>&nbsp;停机期间解决办法&nbsp;<input type="text" name="ways"></input><br>
	            航空器特殊空中报告情况: 时间&nbsp;<input type="date" name="specialtime"></input>&nbsp;地点&nbsp;<input type="text" name="specialplace"></input>&nbsp;天气现象&nbsp;<input type="text" name="specialweather"></input><br>
	            自动观测系统运行正常率:&nbsp;<input type="text" name="zidongguance"></input>&nbsp;自动站运行正常率&nbsp;<input type="text" name="zidongzhan"></input>&nbsp;气压仪正常率&nbsp;<input type="text" name="qiyayi"></input>&nbsp;气象雷达运行正常率&nbsp;<input type="text" name="qixiang"></input>&nbsp;左侧四项重要气象设备平均正常率&nbsp;<input type="text" name="zuoce"></input><br><br>
	            (业务管理):<hr style="margin-top: 0;">
	             气象设备新建、升级、报废、开放和计量情况: 名称:&nbsp;<input type="text" name="qixiangname"></input>&nbsp;时间:&nbsp;<input type="date"></input>&nbsp;类型（新建、升级、报废、开放和计量）:&nbsp;<input type="text" name="qixiangtype"></input>&nbsp;<br>
	             对气象设备防雷接地进行检查和整改情况: &nbsp;<input type="text" name="fanglei"></input>&nbsp;<br>
	             气象培训情况: &nbsp;<input type="text" name="qixianglearn"></input>&nbsp;<br>
	             出现气象差错和严重差错的情况及处理意见: &nbsp;<input type="text" name="dealway"></input>&nbsp;<br>
	             人员变动的情况: &nbsp;<input type="text" name="peoplechange"></input>&nbsp;<br>
	             <br><br>
	            (其它):<hr style="margin-top: 0;">
	           		<textarea style="width:95%; height: 100px;" name="others"></textarea>
	           		<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	           	<input type="submit" style="float:right;" value="确定" class="btn btn-primary">
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