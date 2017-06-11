<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设备管理</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	
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
<input id="update_url" type="hidden" value="<?php echo U('Equip/update');?>" name="url">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><span class="glyphicon glyphicon-home" aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left: 10px;">设备管理</p></span></span>
			<span class="glyphicon glyphicon-home" aria-hidden="true"><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span class="glyphicon glyphicon-export" aria-hidden="true"><a href="###">注销</a></span>
			<span class="glyphicon glyphicon-save" aria-hidden="true"><a href="<?php echo U('index/landing');?>">切换用户</a></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"><a href="###">我爱吃西红柿</a></span>
		</div>
	</div>


<div id="content_eq">
<div id="menu">
    <ul>
        <li><a href="#item1" class="current">设备基本情况</a></li>
        <li><a href="#item2">在建设备情况</a></li>
        <li><a href="#item3">设备备件情况</a></li>
    </ul>
</div>
    <div id="item1" class="item">
        <h2>设备基本情况</h2>

        <table class="table table-hover table-bordered table-striped" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" width="40px;">序号</td>
		  	<td class="eq_tilte" width="30px;">单位</td>
		  	<td class="eq_tilte" width="50px">设备类型</td>
		  	<td class="eq_tilte" width="50px">设备名称</td>
		  	<td class="eq_tilte" width="50px;">数量</td>
		  	<td class="eq_tilte" width="50px">启用时间</td>
		  	<td class="eq_tilte" width="50px">使用年限</td>
		  	<td class="eq_tilte" width="50px">生产厂家</td>
		  	<td class="eq_tilte" width="50px">设备型号</td>
		  	<td class="eq_tilte" width="50px">安装位置</td>
		  	<td class="eq_tilte" >配备是否符合要求</td>
		  	<td class="eq_tilte" width="105px">不符合要求需增加的设备</td>
		  	<td class="eq_tilte" width="80px">运行情况</td>
		  	<td class="eq_tilte">定检及校准</td>
		  	<td class="eq_tilte" width="50px;">备注</td>
		  	<td class="eq_tilte"> 操作</td>
		  </tr>
		  <?php $x=0;$y=0;$z=0; ?>
		  <?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><tr>
		 	<td><?php echo ++$x; ?></td>
		  	<td><?php echo ($v["danwei"]); ?></td>
		  	<td><?php echo ($v["devicetype"]); ?></td>
		  	<td><?php echo ($v["device"]); ?></td>
		  	<td><?php echo ($v["number"]); ?></td>
		  	<td><?php echo ($v["begintime"]); ?></td>
		  	<td><?php echo ($v["workyear"]); ?></td>
		  	<td><?php echo ($v["changjia"]); ?></td>
		  	<td><?php echo ($v["devicenumber"]); ?></td>
		  	<td><?php echo ($v["install"]); ?></td>
		  	<td><?php echo ($v["fit"]); ?></td>
		  	<td><?php echo ($v["add"]); ?></td>
		  	<td><?php echo ($v["workstatus"]); ?></td>
		  	<td><?php echo ($v["check"]); ?></td>
		  	<td><?php echo ($v["others"]); ?></td>
			  <input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			  <td>
				  <div class="show_select"
					   style="width:25px;height: 25px;margin: 80% 0 0 0;border-radius: 50%;background-color: #CB3D39;color: #ffffff;text-align: center;font-size: 20px;cursor: pointer">
					  <span id="select_sign" class="glyphicon glyphicon-plus" style="z-index:10"></span>

					  <div style="display: none;width: 100px;margin: -79px 0px 0px 14px;" class="select_box">
						  <a href="<?php echo U('jibendelete',array('id'=>$v['id']));?>"
							 onclick="if (confirm('确定要进行删除吗？')) return true;else return false;"
							 style="text-align: center; margin-top: 50%;display: inline-block">
							  <div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;">
								  <span class="glyphicon glyphicon-minus" aria-hidden="true"
										style="color: #FFF;"></span></div>
						  </a>
						  <a data-toggle="modal" href="#update1" style="text-align: center; margin-top: 50%;display: inline-block">
							  <div class="update_btn" style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;">
								  <span class="glyphicon glyphicon-pencil" aria-hidden="true"
										style="color: #FFF;"></span></div>
						  </a>
					  </div>
				  </div>
			  </td>
		  	<!--<td> <a href="<?php echo U('jibendelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a>-->
		  	 <!--<a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color: #FFF;"></span></div></a></td>-->
		  </tr><?php endforeach; endif; ?>
	
		  <tr style="background: #EDEFE0">
		  	<td colspan="17" style="height: 100px;">
			<button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal1">
				 添加记录

				</button>
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">添加记录</h4>
				      </div>
				      <div class="modal-body">
				      		<form action="<?php echo U('jibenhandle');?>" name='wish' style="padding-left: 17px;" method="post">
				      			单位：<input type="text" name="danwei"></input><br>
				      			设备类型：<input type="text" name="devicetype"></input><br>
				      			设备名称：<input type="text" name="device"></input><br>
				      			数量：<input style="width:80px;" name="number" type="number"></input><br>
				      			启用时间：<input type="date" name="begintime" style="width:170px;"></input><br>
				      			使用年限<input type="number" name="workyear" style="width:100px;"></input><br>
				      			生产厂家：<input type="text" name="changjia" style="width:220px;"></input><br>
				      			设备型号：<input type="text" name="devicenumber" style="width:170px;"></input><br>
				      			安装位置：<input type="text" name="install" style="width:220px;"></input><br>
				      			配备是否符合要求：<label class="checkbox-inline">
									      <input type="radio" name="fit" id="optionsRadios3" value="符合" checked>符合
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="fit" id="optionsRadios4" 
									         value="不符合">不符合
									   </label><br>
				      			不符合要求需增加的设备：<input name="add" type="text"></input><br>
				      			运行情况：<input name="workstatus" type="text"></input><br>
				      			定检及校准：<input name="check" type="text"></input><br><br>
				      			<span>备注：</span><br>
				      			<textarea  name="others" style="width: 400px; margin-left: 50px; margin-top: -30px; margin-bottom: 20px; height: 100px;"></textarea>
								

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
            <table class="table table-hover table-bordered table-striped" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" width="40px;">序号</td>
		  	<td class="eq_tilte" width="30px;">单位</td>
		  	<td class="eq_tilte" width="50px">设备名称</td>
		  	<td class="eq_tilte" width="50px;">数量</td>
		  	<td class="eq_tilte" width="50px">生产厂家</td>
		  	<td class="eq_tilte" width="50px">设备型号</td>
		  	<td class="eq_tilte" width="50px">立项时间</td>
		  	<td class="eq_tilte" >立项文件</td>
		  	<td class="eq_tilte" width="105px">合同签订时间</td>
		  	<td class="eq_tilte" width="80px">合同附件</td>
		  	<td class="eq_tilte">安装时间</td>
		  	<td class="eq_tilte" width="50px;">验收时间</td>
		  	<td class="eq_tilte">验收附件</td>
		  	<td class="eq_tilte">备注</td>
		  	<td class="eq_tilte"> 操作</td>
		  </tr>
		  <?php if(is_array($info2)): foreach($info2 as $key=>$v): ?><tr>
		 
		  	<td><?php echo ++$y; ?></td>
		  	<td><?php echo ($v["danwei"]); ?></td>
		  	<td><?php echo ($v["devicename"]); ?></td>
		  	<td><?php echo ($v["number"]); ?></td>
		  	<td><?php echo ($v["changjia"]); ?></td>
		  	<td><?php echo ($v["devicenumber"]); ?></td>
		  	<td><?php echo ($v["lxtime"]); ?></td>
		  	<td><a style="width:50px;margin-left:0px;" <?php if($v['lxname']==null){echo "disabled='disabled'";} ?> class="btn btn-success btn-sm" href="<?php echo U('lxdownload',array('id'=>$v['id']));?>" role="button">附件</a></td>
		  	<td><?php echo ($v["httime"]); ?></td>
		  	<td><a style="width:50px;margin-left:0px;" <?php if($v['htname']==null){echo "disabled='disabled'";} ?> class="btn btn-success btn-sm" href="<?php echo U('htdownload',array('id'=>$v['id']));?>" role="button">附件</a></td>
		  	<td><?php echo ($v["ystime"]); ?></td>
		  	<td><a style="width:50px;margin-left:0px;" <?php if($v['ysname']==null){echo "disabled='disabled'";} ?> class="btn btn-success btn-sm" href="<?php echo U('ysdownload',array('id'=>$v['id']));?>" role="button">附件</a></td>
		  	<td><?php echo ($v["ystime"]); ?></td>
		  	<td><?php echo ($v["others"]); ?></td>
			  <input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			  <td>
				  <div class="show_select"
					   style="width:25px;height: 25px;margin: 80% 0 0 0;border-radius: 50%;background-color: #CB3D39;color: #ffffff;text-align: center;font-size: 20px;cursor: pointer">
					  <span id="select_sign" class="glyphicon glyphicon-plus" style="z-index:10"></span>

					  <div style="display: none;width: 100px;margin: -79px 0px 0px 14px;" class="select_box">
						  <a href="<?php echo U('ondevicedelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" style="display:inline-block;text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a>
						  <a data-toggle="modal" href="#update2" style="display:inline-block;text-align: center; margin-top: 50%;"><div class="update_btn" style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="display:inline-block;color: #FFF;"></span></div></a>
					  </div>
				  </div>
			  </td>

		  </tr><?php endforeach; endif; ?>
		  
		<tr style="background: #EDEFE0">
		  	<td colspan="16" style="height: 100px;">
			<button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal2">
				 添加记录
				</button>
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">添加记录</h4>
				      </div>
				      <div class="modal-body">
				      		<form action="<?php echo U('onhandle');?>" name='wish' style="padding-left: 17px;" enctype="multipart/form-data" method="post">
				      			单位：<input type="text" name="danwei"></input><br>
				      			设备名称：<input type="text" name="device"></input><br>
				      			数量：<input style="width:80px;" name="number" type="number"></input><br>
				      			生产厂家：<input type="text" name="changjia" style="width:220px;"></input><br>
				      			设备型号：<input type="text" name="devicenumber" style="width:170px;"></input><br>
				      			立项时间：<input type="date" name="lxtime" style="width:220px;"></input><br>
				      			立项文件：<input name='lxfile' type="file" id="exampleInputFile"><br>
				      			合同签订时间<input name="httime" type="date"></input><br>
				      			合同附件<input name="htfile" type="file"></input><br>
				      			安装时间<input type="date" name="installtime"></input><br>
				      			验收时间<input type="date" name="ystime"></input><br>
				      			验收附件<input name="ysfile" type="file"></input><br>
				      			备注：<input type="text" name="others" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>
								

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

            <table class="table table-hover table-bordered table-striped" style="background:rgb(237, 239, 224) ">
		  <tr class="eq_tr">
		  	<td class="eq_tilte" width="40px;">序号</td>
		  	<td class="eq_tilte" width="30px;">单位</td>
		  	<td class="eq_tilte" width="150px">设备名称</td>
		  	<td class="eq_tilte" width="50px;">数量</td>
		  	<td class="eq_tilte" width="94px">购买时间</td>
		  	<td class="eq_tilte" width="130px">生产厂家</td>
		  	<td class="eq_tilte" width="150px">设备型号</td>
		  	<td class="eq_tilte" width="70px">现状</td>
		  	<td class="eq_tilte" >金额</td>

		  	<td class="eq_tilte" width="50px;">备注</td>
		  	<td class="eq_tilte" width="40px;"> 操作</td>
		  </tr>
		  <?php if(is_array($info3)): foreach($info3 as $key=>$v): ?><tr>
		 
		  	<td><?php echo ++$z; ?></td>
		  	<td><?php echo ($v["danwei"]); ?></td>
		  	<td><?php echo ($v["devicename"]); ?></td>
		  	<td><?php echo ($v["number"]); ?></td>
		  	<td><?php echo ($v["buytime"]); ?></td>
		  	<td><?php echo ($v["changjia"]); ?></td>
		  	<td><?php echo ($v["devicenumber"]); ?></td>
		  	<td><?php echo ($v["status"]); ?></td>
		  	<td><?php echo ($v["money"]); ?></td>
		  	<td><?php echo ($v["others"]); ?></td>
			  <input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			  <td>
				  <div class="show_select"
					   style="width:25px;height: 25px;margin: 80% 0 0 0;border-radius: 50%;background-color: #CB3D39;color: #ffffff;text-align: center;font-size: 20px;cursor: pointer">
					  <span id="select_sign" class="glyphicon glyphicon-plus" style="z-index:10"></span>

					  <div style="display: none;width: 100px;margin: -79px 0px 0px 14px;" class="select_box">
						  <a href="<?php echo U('beijiandelete',array('id'=>$v['id']));?>" onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" style="display:inline-block;text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a>
						  <a data-toggle="modal" href="#update3" style="display:inline-block;text-align: center; margin-top: 50%;"><div class="update_btn" style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color: #FFF;"></span></div></a>
					  </div>
				  </div>
			  </td>
		  </tr><?php endforeach; endif; ?>
		<tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;">
			<button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success" data-toggle="modal" data-target="#myModal3">
				 添加记录
				</button>
				<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">添加记录</h4>
				      </div>
				      <div class="modal-body">
				      		<form action="<?php echo U('beijianhandle');?>" name='wish' style="padding-left: 17px;" method="post">
				      			单位：<input type="text" name="danwei"></input><br>
				      			设备名称：<input type="text" name="devicetype"></input><br>
				      			数量：<input style="width:80px;" name="number" type="number"></input><br>
				      			购买时间：<input type="date" name="buytime" style="width:170px;"></input><br>
				      			生产厂家：<input type="text" name="changjia" style="width:220px;"></input><br>
				      			设备型号：<input type="text" name="devicenumber" style="width:170px;"></input><br>
				      			现状：<label class="checkbox-inline">
									      <input type="radio" name="status" id="optionsRadios3" value="在台" checked>在台
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="status" id="optionsRadios4" 
									         value="借出">借出
									   </label><br>
				      			金额：<input type="text" name="money"></input><br>
				      			备注：<input type="text" name="others" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>
								

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
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update1">切换</button>
<div id="update1" class="modal fade" tabindex="-1" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">修改基本设备记录</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo U('equip/updatehandle');?>" name='wish' style="padding-left: 17px;" method="post">
					<input type="hidden" name="form" value="devicemanager">
					<input type="hidden" name="id" value="">
					单位：<input type="text" name="danwei"></input><br>
					设备类型：<input type="text" name="devicetype"></input><br>
					设备名称：<input type="text" name="device"></input><br>
					数量：<input style="width:80px;" name="number" type="number"></input><br>
					启用时间：<input type="date" name="begintime" style="width:170px;"></input><br>
					使用年限<input type="number" name="workyear" style="width:100px;"></input><br>
					生产厂家：<input type="text" name="changjia" style="width:220px;"></input><br>
					设备型号：<input type="text" name="devicenumber" style="width:170px;"></input><br>
					安装位置：<input type="text" name="install" style="width:220px;"></input><br>
					配备是否符合要求：<label class="checkbox-inline">
					<input type="radio" name="fit" id="optionsRadios3" value="符合" checked>符合
				</label>
					<label class="checkbox-inline">
						<input type="radio" name="fit" id="optionsRadios4"
							   value="不符合">不符合
					</label><br>
					不符合要求需增加的设备：<input name="add" type="text"></input><br>
					运行情况：<input name="workstatus" type="text"></input><br>
					定检及校准：<input name="check" type="text"></input><br><br>
					<span>备注：</span><br>
					<textarea  name="others" style="width: 400px; margin-left: 50px; margin-top: -30px; margin-bottom: 20px; height: 100px;"></textarea>


					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
						<button type="submit" class="btn btn-primary">发送</button>
					</div>
				</form>
		</div>
	</div>


</div>


</div>

	<div id="update2" class="modal fade" tabindex="-1" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">修改在建设备记录</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo U('updatehandle');?>" name='wish' style="padding-left: 17px;" enctype="multipart/form-data" method="post">
						<input type="hidden" name="form" value="ondevice">
						<input type="hidden" name="id" value="">
						单位：<input type="text" name="danwei"></input><br>
						设备名称：<input type="text" name="device"></input><br>
						数量：<input style="width:80px;" name="number" type="number"></input><br>
						生产厂家：<input type="text" name="changjia" style="width:220px;"></input><br>
						设备型号：<input type="text" name="devicenumber" style="width:170px;"></input><br>
						立项时间：<input type="date" name="lxtime" style="width:220px;"></input><br>
						立项文件：<input name='lxfile' value="111" type="file" id="exampleInputFile"><br>
						合同签订时间<input name="httime" type="date"></input><br>
						合同附件<input name="htfile" type="file"></input><br>
						安装时间<input type="date" name="installtime"></input><br>
						验收时间<input type="date" name="ystime"></input><br>
						验收附件<input name="ysfile" type="file"></input><br>
						备注：<input type="text" name="others" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>


						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							<button type="submit" class="btn btn-primary">发送</button>
						</div>
					</form>
				</div>
			</div>


		</div>


	</div>

	<div id="update3" class="modal fade" tabindex="-1" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">修改记录</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo U('equip/updatehandle');?>" name='wish' style="padding-left: 17px;" method="post">
						<input type="hidden" name="form" value="sparedevice">
						<input type="hidden" name="id" value="">
						单位：<input type="text" name="danwei"></input><br>
						设备名称：<input type="text" name="devicetype"></input><br>
						数量：<input style="width:80px;" name="number" type="number"></input><br>
						购买时间：<input type="date" name="buytime" style="width:170px;"></input><br>
						生产厂家：<input type="text" name="changjia" style="width:220px;"></input><br>
						设备型号：<input type="text" name="devicenumber" style="width:170px;"></input><br>
						现状：<label class="checkbox-inline">
						<input type="radio" name="status" id="optionsRadios3" value="在台" checked>在台
					</label>
						<label class="checkbox-inline">
							<input type="radio" name="status" id="optionsRadios4"
								   value="借出">借出
						</label><br>
						金额：<input type="text" name="money"></input><br>
						备注：<input type="text" name="others" style="width: 400px; margin-bottom: 20px; height: 100px;"></input>


						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							<button type="submit" class="btn btn-primary">发送</button>
						</div>
					</form>
				</div>
			</div>


		</div>


	</div>
<script src="<?php echo (SITE_URL); ?>public/js/myjs.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/ajax.js"></script>
</body>
</html>