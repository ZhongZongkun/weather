<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Equipment</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script type="text/javascript">
		       $(document).ready(function () {
            $(window).scroll(function () {
                var items = $("#content_eq").find(".item");
                var menu = $("#menu");
                var top = $(document).scrollTop();
                var currentId = ""; //滚动条现在所在位置的item id
                items.each(function () {
                    var m = $(this);
                    //注意：m.offset().top代表每一个item的顶部位置
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
<body >
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
		  	<td class="eq_tilte" width="30px;">设备类型</td>
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
		  <?php $x=0;$y=0;$z=0; ?>
			<?php if(is_array($info1)): foreach($info1 as $k=>$v): ?><tr>
		 
		  	<td><?php echo ++$x; ?></td>
		  	<td><?php echo ($v["danwei"]); ?></td>
		  	<td><?php echo ($v["devicetype"]); ?></td>
		  	<td><?php echo ($v["device"]); ?></td>
		  	<td><?php echo ($v["number"]); ?></td>
		  	<td><?php echo ($v["begintime"]); ?></td>
		  	<td><?php echo ($v["changjia"]); ?></td>
		  	<td><?php echo ($v["devicenumber"]); ?></td>
		  	<td><?php echo ($v["install"]); ?></td>
		  	<td><?php echo ($v["fit"]); ?></td>
		  	<td><?php echo ($v["add"]); ?></td>
		  	<td><?php echo ($v["workstatus"]); ?></td>
		  	<td><?php echo ($v["check"]); ?></td>
		  	<td><?php echo ($v["others"]); ?></td>
		  	<td> <a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a></td>
		  </tr><?php endforeach; endif; ?>
		  <tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;"> <button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success">添加一条记录</button></td>
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
				<?php if(is_array($info2)): foreach($info2 as $k=>$v): ?><tr>
		 
		  	<td><?php echo ($k+1); ?></td>
		  	<td><?php echo ($v["danwei"]); ?></td>
		  	<td><?php echo ($v["devicename"]); ?></td>
		  	<td><?php echo ($v["number"]); ?></td>
		  	<td><?php echo ($v["buytime"]); ?></td>
		  	<td><?php echo ($v["changjia"]); ?></td>
		  	<td><?php echo ($v["devicenumber"]); ?></td>
		  	<td><?php echo ($v["status"]); ?></td>
		  	<td>配备是否符合要求</td>
		  	<td>不符合要求需</td>
		  	<td>运行情况</td>
		  	<td>定检及校准</td>
		  	<td><?php echo ($v["others"]); ?></td>
		  	<td> <a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a></td>
		  </tr><?php endforeach; endif; ?>
		    <tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;"> <button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success">添加一条记录</button></td>
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
				<?php if(is_array($info3)): foreach($info3 as $k=>$v): ?><tr>
		  	<td><?php echo ($k+1); ?></td>
		  	<td><?php echo ($v["danwei"]); ?></td>
		  	<td><?php echo ($v["devicename"]); ?></td>
		  	<td><?php echo ($v["number"]); ?></td>
		  	<td><?php echo ($v["buytime"]); ?></td>
		  	<td><?php echo ($v["changjia"]); ?></td>
		  	<td><?php echo ($v["devicenumber"]); ?></td>
		  	<td><?php echo ($v["status"]); ?></td>
		  	<td>配备是否符合要求</td>
		  	<td>不符合要求需</td>
		  	<td>运行情况</td>
		  	<td>定检及校准</td>
		  	<td><?php echo ($v["others"]); ?></td>
		  	<td> <a href="##" style="text-align: center; margin-top: 50%;"><div style="width: 25px; height: 25px; background: #CB3D39; border-radius: 50%; text-align: center;line-height: 25px;"><span class="glyphicon glyphicon-minus" aria-hidden="true" style="color: #FFF;"></span></div></a></td>
		  </tr><?php endforeach; endif; ?>
		    <tr style="background: #EDEFE0">
		  	<td colspan="14" style="height: 100px;"> <button type="button" style="margin-left: 370px; margin-top: 30px;" class="btn btn-success">添加一条记录</button></td>
		  </tr>
		</table>
    </div>
  
</div>
</body>
</html>