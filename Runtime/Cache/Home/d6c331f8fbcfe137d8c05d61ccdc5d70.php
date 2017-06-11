<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Equipment</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		       $(document).ready(function () {
            $(window).scroll(function () {
                var items = $("#content_eq").find(".item");
                var menu = $("#menu");
                var top = $(document).scrollTop();
                var currentId = ""; 
                items.each(function () {
                    var m = $(this);
                    if (top >m.offset().top - 100) {
                        currentId = "#" + m.attr("id");
                    } else {
                        return false;
                    }
                });
				var currentLink = menu.find(".current");
                if (currentId && currentLink.attr("href") != currentId) {
                    currentLink.removeClass("current");
                    menu.find("[href=" +  "\"" +currentId+ "\"" + "]").addClass("current");
                }
            });
        });
	</script>


</head>
<body style="overflow-x:hidden;">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><span class="glyphicon glyphicon-home" aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left: 10px;">设备管理</p></span></span>
			<span class="glyphicon glyphicon-home" aria-hidden="true"><a href="index.html">返回主页</a></span>
			<span class="glyphicon glyphicon-export" aria-hidden="true"><a href="###">注销</a></span>
			<span class="glyphicon glyphicon-save" aria-hidden="true"><a href="<?php echo U('index/lannding');?>">切换用户</a></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"><a href="###">我爱吃西红柿</a></span>



		</div>
	</div>

<div id="menu">
    <ul>
        <li><a href="#item1" class="current">设备基本情况</a></li>
        <li><a href="#item2">在建设备情况</a></li>
        <li><a href="#item3">设备备件情况</a></li>
    </ul>
</div>
<div id="content_eq">
    <div id="item1" class="item">
        <h2>设备基本情况</h2>

        <table class="table table-hover table-bordered" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" width="40px;">序号</td>
		  	<td class="eq_tilte" width="30px;">单位</td>
		  	<td class="eq_tilte" width="50px">设备名称</td>
		  	<td class="eq_tilte" width="50px;">数量</td>
		  	<td class="eq_tilte" width="50px">启用时间</td>
		  	<td class="eq_tilte" width="50px">生产厂家</td>
		  	<td class="eq_tilte" width="50px">设备型号</td>
		  	<td class="eq_tilte" width="50px">安装位置</td>
		  	<td class="eq_tilte" >配备是否符合要求</td>
		  	<td class="eq_tilte" width="105px">不符合要求需增加的设备</td>
		  	<td class="eq_tilte" width="80px">运行情况</td>
		  	<td class="eq_tilte">定检及校准</td>
		  	<td class="eq_tilte" width="50px;">备注</td>
		  	<td class="eq_tilte"> 删除</td>
		  </tr>
		  <tr>
		 
		  	<td>1</td>
		  	<td>#####</td>
		  	<td>温压湿传感器</td>
		  	<td>1</td>
		  	<td>1995.2</td>
		  	<td>###</td>
		  	<td>12-312-321</td>
		  	<td>安装位置</td>
		  	<td>配备是否符合要求</td>
		  	<td>不符合要求需</td>
		  	<td>运行情况</td>
		  	<td>定检及校准</td>
		  	<td>备注</td>
		  	<td> <a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a></td>
		  </tr>
		  
		  <tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;">
			<button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal">
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
				      			单位：<input type="text"></input><br>
				      			设备名称：<input type="text"></input><br>
				      			数量：<input style="width:80px;" type="text"></input><br>
				      			启用时间：<input type="text" style="width:170px;"></input><br>
				      			生产厂家：<input type="text" style="width:220px;"></input><br>
				      			设备型号：<input type="text" style="width:170px;"></input><br>
				      			安装位置：<input type="text" style="width:220px;"></input><br>
				      			配备是否符合要求：<input type="text"></input><br>
				      			不符合要求需增加的设备：<input type="text"></input><br>
				      			运行情况：<input type="text"></input><br>
				      			定检及校准：<input type="text"></input><br>
				      			备注：<input type="text" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>
								

				       		 <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button type="submit" class="btn btn-primary">发送</button>
					      </div>
				       		</form>

				      </div>
				     
				    </div>
				  </div>



		  </tr>
		</table>
    </div>
    <div id="item2" class="item">
        <h2>在建设备情况</h2>
            <table class="table table-hover table-bordered" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" width="40px;">序号</td>
		  	<td class="eq_tilte" width="30px;">单位</td>
		  	<td class="eq_tilte" width="50px">设备名称</td>
		  	<td class="eq_tilte" width="50px;">数量</td>
		  	<td class="eq_tilte" width="50px">启用时间</td>
		  	<td class="eq_tilte" width="50px">生产厂家</td>
		  	<td class="eq_tilte" width="50px">设备型号</td>
		  	<td class="eq_tilte" width="50px">安装位置</td>
		  	<td class="eq_tilte" >配备是否符合要求</td>
		  	<td class="eq_tilte" width="105px">不符合要求需增加的设备</td>
		  	<td class="eq_tilte" width="80px">运行情况</td>
		  	<td class="eq_tilte">定检及校准</td>
		  	<td class="eq_tilte" width="50px;">备注</td>
		  	<td class="eq_tilte"> 删除</td>
		  </tr>
		  <tr>
		 
		  	<td>1</td>
		  	<td>#####</td>
		  	<td>温压湿传感器</td>
		  	<td>1</td>
		  	<td>1995.2</td>
		  	<td>###</td>
		  	<td>12-312-321</td>
		  	<td>安装位置</td>
		  	<td>配备是否符合要求</td>
		  	<td>不符合要求需</td>
		  	<td>运行情况</td>
		  	<td>定检及校准</td>
		  	<td>备注</td>
		  	<td> <a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a></td>
		  </tr>



		<tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;">
			<button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal">
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
				      			单位：<input type="text"></input><br>
				      			设备名称：<input type="text"></input><br>
				      			数量：<input style="width:80px;" type="text"></input><br>
				      			启用时间：<input type="text" style="width:170px;"></input><br>
				      			生产厂家：<input type="text" style="width:220px;"></input><br>
				      			设备型号：<input type="text" style="width:170px;"></input><br>
				      			安装位置：<input type="text" style="width:220px;"></input><br>
				      			配备是否符合要求：<input type="text"></input><br>
				      			不符合要求需增加的设备：<input type="text"></input><br>
				      			运行情况：<input type="text"></input><br>
				      			定检及校准：<input type="text"></input><br>
				      			备注：<input type="text" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>
								

				       		 <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button type="submit" class="btn btn-primary">发送</button>
					      </div>
				       		</form>

				      </div>
				     
				    </div>
				  </div>



		  </tr>
		</table>
    </div>
    <div id="item3" class="item">
        <h2>设备备件情况</h2>

            <table class="table table-hover table-bordered" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" width="40px;">序号</td>
		  	<td class="eq_tilte" width="30px;">单位</td>
		  	<td class="eq_tilte" width="50px">设备名称</td>
		  	<td class="eq_tilte" width="50px;">数量</td>
		  	<td class="eq_tilte" width="50px">启用时间</td>
		  	<td class="eq_tilte" width="50px">生产厂家</td>
		  	<td class="eq_tilte" width="50px">设备型号</td>
		  	<td class="eq_tilte" width="50px">安装位置</td>
		  	<td class="eq_tilte" >配备是否符合要求</td>
		  	<td class="eq_tilte" width="105px">不符合要求需增加的设备</td>
		  	<td class="eq_tilte" width="80px">运行情况</td>
		  	<td class="eq_tilte">定检及校准</td>
		  	<td class="eq_tilte" width="50px;">备注</td>
		  	<td class="eq_tilte"> 删除</td>
		  </tr>
		  <tr>
		 
		  	<td>1</td>
		  	<td>#####</td>
		  	<td>温压湿传感器</td>
		  	<td>1</td>
		  	<td>1995.2</td>
		  	<td>###</td>
		  	<td>12-312-321</td>
		  	<td>安装位置</td>
		  	<td>配备是否符合要求</td>
		  	<td>不符合要求需</td>
		  	<td>运行情况</td>
		  	<td>定检及校准</td>
		  	<td>备注</td>
		  	<td> <a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a></td>
		  </tr>
	
		<tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;">
			<button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal">
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
				      			单位：<input type="text"></input><br>
				      			设备名称：<input type="text"></input><br>
				      			数量：<input style="width:80px;" type="text"></input><br>
				      			启用时间：<input type="text" style="width:170px;"></input><br>
				      			生产厂家：<input type="text" style="width:220px;"></input><br>
				      			设备型号：<input type="text" style="width:170px;"></input><br>
				      			安装位置：<input type="text" style="width:220px;"></input><br>
				      			配备是否符合要求：<input type="text"></input><br>
				      			不符合要求需增加的设备：<input type="text"></input><br>
				      			运行情况：<input type="text"></input><br>
				      			定检及校准：<input type="text"></input><br>
				      			备注：<input type="text" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>
								

				       		 <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button type="submit" class="btn btn-primary">发送</button>
					      </div>
				       		</form>

				      </div>
				     
				    </div>
				  </div>



		  </tr>
		</table>
    </div>
  
</div>
</body>
</html>