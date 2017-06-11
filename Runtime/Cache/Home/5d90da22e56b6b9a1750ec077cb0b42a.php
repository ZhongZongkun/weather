<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>月报表</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/ajax.js"></script>
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/My97DatePicker/WdatePicker.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<style type="text/css">
	html,body{
		height: 100%;
	}
		a {
			color: #2d3238;
		}
	</style>

	<script type="text/javascript">
//预报准确率自动计算
function calculate1(){
    var left = document.getElementById("left1").value;
    var right = document.getElementById("right1").value;
    left=left.substr(0,left.length-1);
    right=right.substr(0,right.length-1);

    var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber = p.test(left);
    var isrightnumber = p.test(right);
   
    if(isleftnumber&&isrightnumber){
        document.getElementById("result1").value=(parseFloat(left)+parseFloat(right))/2+"%";
    }   
}
//观测错情率自动计算
function calculate2(){
    var left = document.getElementById("left2").value;
    var right = document.getElementById("right2").value;
    left=left.substr(0,left.length-1);
    right=right.substr(0,right.length-1);
    //alert(str.substr(0,str.length-1));

    var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber = p.test(left);
    var isrightnumber = p.test(right);
   
    if(isleftnumber&&isrightnumber){
        document.getElementById("result2").value=(parseFloat(left)+parseFloat(right))/2+"‰";
    }   
}
//左侧四项自动计算
function calculate3(){
    var left3 = document.getElementById("left3").value;
    var left4 = document.getElementById("left4").value;
    var left5 = document.getElementById("left5").value;
    var left6 = document.getElementById("left6").value;

    left3=left3.substr(0,left3.length-1);
    left4=left4.substr(0,left4.length-1);
    left5=left5.substr(0,left5.length-1);
    left6=left6.substr(0,left6.length-1);
    //alert(str.substr(0,str.length-1));

    var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber3 = p.test(left3);
    var isleftnumber4 = p.test(left4);
    var isleftnumber5 = p.test(left5);
    var isleftnumber6 = p.test(left6);
   
    if(isleftnumber3&&isleftnumber4&&isleftnumber5&&isleftnumber6){
        document.getElementById("right3").value=(parseFloat(left3)+parseFloat(left4)+parseFloat(left5)+parseFloat(left6))/4+"%";
    }   
}

	//预报准确率自动计算
function calculate11(){
    var left = document.getElementById("left11").value;
    var right = document.getElementById("right11").value;
    left=left.substr(0,left.length-1);
    right=right.substr(0,right.length-1);

    var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber = p.test(left);
    var isrightnumber = p.test(right);
   
    if(isleftnumber&&isrightnumber){
        document.getElementById("result11").value=(parseFloat(left)+parseFloat(right))/2+"%";
    }   
}
//观测错情率自动计算
function calculate22(){
    var left = document.getElementById("left22").value;
    var right = document.getElementById("right22").value;
    left=left.substr(0,left.length-1);
    right=right.substr(0,right.length-1);
    //alert(str.substr(0,str.length-1));

    var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber = p.test(left);
    var isrightnumber = p.test(right);
   
    if(isleftnumber&&isrightnumber){
        document.getElementById("result22").value=(parseFloat(left)+parseFloat(right))/2+"‰";
    }   
}
//左侧四项自动计算
function calculate33(){
    var left3 = document.getElementById("left33").value;
    var left4 = document.getElementById("left44").value;
    var left5 = document.getElementById("left55").value;
    var left6 = document.getElementById("left66").value;

    left3=left3.substr(0,left3.length-1);
    left4=left4.substr(0,left4.length-1);
    left5=left5.substr(0,left5.length-1);
    left6=left6.substr(0,left6.length-1);
    //alert(str.substr(0,str.length-1));

    var p = new RegExp("^(-?\\d+)(\\.\\d+)?$");
    var isleftnumber3 = p.test(left3);
    var isleftnumber4 = p.test(left4);
    var isleftnumber5 = p.test(left5);
    var isleftnumber6 = p.test(left6);
   
    if(isleftnumber3&&isleftnumber4&&isleftnumber5&&isleftnumber6){
        document.getElementById("right33").value=(parseFloat(left3)+parseFloat(left4)+parseFloat(left5)+parseFloat(left6))/4+"%";
    }   
}
     
</script>

</head>
<body style="overflow-x:hidden;">
<input id="ajax-url" type="hidden" value="<?php echo U('Baobiao/ajax');?>">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><img src="<?php echo (SITE_URL); ?>public/images/zhuye.png" style="margin-top:-6px;" alt=""><span  aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left:0px;">月报表</p></span></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/fanhui.png" alt=""><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="<?php echo U('index/infochange');?>"><?php echo ($name); ?></a></span>
		</div>
</div>
<div class="yb_content">
	<h1>月报表查询</h1>
	 <table class="table" style="background:rgb(173, 211, 224); width: 90%; margin: 20px auto;">
		  <tr>
		  	<td class="eq_tilte"> 月报表记录</td>
		  	<td class="eq_tilte" style="float:right;margin-right:40px;">操作</td>
		  	<td class="eq_tilte" style="float:right;margin-right:45px;">上传时间</td>

		  </tr>
	</table>
	<table class="table table-hover" id="reports_form" style="background:rgb(242, 242, 242); width: 90%; margin: 20px auto;">
			<?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><tr>
		  	<td class="eq_tilte" style="width:76%;line-height:30px;"><a href="###" report='<?php echo ($v["id"]); ?>' data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <?php echo ($v["name"]); ?></a></td>
		  	<td class="eq_tilte" style="float:right;line-height:30px;"><?php echo (date('Ymd',$v["time"])); ?></td>
		  	<td>
		  	<a onclick="if (confirm('确定要导出到本地吗？')) return true;else return false;" href="<?php echo U('word',array('id'=>$v['id']));?>" type="button" class="btn btn-info">导出</a>
		  	<a onclick="if (confirm('确定要进行删除吗？')) return true;else return false;" href="<?php echo U('debaobiao',array('id'=>$v['id']));?>" type="button" class="btn btn-danger">删除</a>
		  	</td>
		  	</tr><?php endforeach; endif; ?>
	</table>
	<button type="button" class="btn btn-info" style="position: absolute;left: 440px;" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">月报表录入</button>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog"  style="width: 700px;" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">月报表</h4>
	      </div>

	<form action="<?php echo U('edit');?>" method="post" name="form" id="edit-form">
	      <div class="modal-body">
			  <input type="hidden" name="id" value="">
				  
	        	<div>
	        		<label for="bb-t" style="font-size:20px;">报表名称:</label><input type="text" name="name" id="bb-t" style="width:400px; height:28px;border:1px solid #999;"><br /><br />
	        	</div>
	         	<div class="bb-table" style="position:relative;">
					<span style="font-weight:600;position:absolute;left:10px;top:120px;width:14px;">本月主要工作</span>
						<span style="font-weight:600;position:absolute;left:10px;top:600px;width:14px;">安全运行</span>
						<span style="font-weight:600;position:absolute;left:10px;top:900px;width:14px;">业务管理</span>
	         		<div style="height:24px">
	         			<h3 style="border-left:none">报告单位</h3>
	         			<input type="text" name="danwei" style="height:22px; width:138px;">
	         			<h3>联系人</h3>
	         			<input type="text" name="contacter" style="height:22px; width:136px;">
	         			<h3>日期</h3>
	         			<input type="text" name="date" onClick="WdatePicker()" style="height:22px; width:138px;">
	         		</div>
	         		<div style="height:395px;">
	         			<div style="width:33px;height:100%;border-right:1px solid #b9b7b7; border-bottom:none;float:left;margin-top:-9px;"></div>
	         			<div style="width: 635px;height:100%; float:left;margin-top:-10px; border:none;">
	         				<div style="height:130px">
	         					<h3 style="border-left:none;width:75px; height:100%;padding-top:40px">训练飞行天数</h3>
	         					<input type="text" name="xunliantian" style="height:126px; width:75px;position:releative;top:-7px;">
	         					<h3 style="border-left:none;width:75px; height:100%;border-left:1px solid #b9b7b7;padding-top:30px">影响飞行的重要气象因素及天数</h3>
	         					<input type="text" name="yingxiangtian" style="height:126px; width:410px;position:releative;top:-7px; ">
	         				</div>
	         				<div style="height:70px">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:10px">例行观测次数</h3>
	         					<input type="text" name="lixingci" style="height:68px; width:75px;position:releative;top:-16px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:20px;padding-top:10px">特殊观测次数</h3>
	         					<input type="text" name="tesuci" style="height:68px; width:75px;position:releative;top:-16px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:20px;padding-top:10px">例行天气报告份数</h3>
	         					<input type="text" name="lixingfen" style="height:68px; width:75px;position:releative;top:-16px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:20px;padding-top:10px">特殊天气报告份数</h3>
	         					<input type="text" name="tesufen" style="height:68px; width:75px;position:releative;top:-16px;">
	         				</div>
	         				<div style="height:130px;">
	         					<h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:30px">机场预报份数</h3>
	         					<input type="text" name="jichangfen" style="height:100%; width:75px;position:releative;top:-24px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:30px">趋势着陆预报份数</h3>
	         					<input type="text" name="qushifen" style="height:100%; width:75px;position:releative;top:-24px;border-right:1px solid #b9b7b7;"><h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:10px">低空重要天气预告图份数或航路预报份数</h3>
	         					<input type="text" name="dikongfen" style="height:100%; width:75px;position:releative;top:-24px;border-right:1px solid #b9b7b7;"><h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:30px">自观或自动站维护次数</h3>
	         					<input type="text" name="zidongci" style="height:100%; width:75px;position:releative;top:-24px;">
	         				</div>
	         				<div style="height:72px;border:none;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:10px">数据库维护次数</h3>
	         					<input type="text" name="shujukuci" style="height:66px; width:75px;position:releative;top:-33px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:20px;padding-top:10px">气象雷达维护次数</h3>
	         					<input type="text" name="qixiangci" style="height:66px; width:75px;position:releative;top:-33px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:20px;padding-top:10px">卫星云图维护次数</h3>
	         					<input type="text" name="weixingci" style="height:66px; width:75px;position:releative;top:-33px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:20px;padding-top:10px">Micaps维护次数</h3>
	         					<input type="text" name="micapsci" style="height:66px; width:77px;position:releative;top:-33px;">
	         				</div>
	         			</div>
	         		</div>
	         		<div style="height:445px" class="dd-11">
	         			<div style="width:33px;height:100%;border-right:1px solid #b9b7b7; border-bottom:none;float:left;"></div>
	         			<div style="width: 635px;height:100%; float:left; border:none;">
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">预报准确率</h3>
	         					<h3 style="width:50px;border-left:none;height:30px;line-height:30px;">最高</h3>
	         					<input type="text" id="left11" onkeyup="calculate11();" name="largezhun" style=" width:80px;height:28px;float:none;left:-118px;text-align:center;" value="%">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:80px;">最低</h3>
	         					<input type="text" id="right11" onkeyup="calculate11();" name="lowzhun" style="width:80px;height:28px;float:none;left:-72px;text-align:center;" value="%">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:160px;">平均</h3>
	         					<input type="text" id="result11" name="averagezhun" style="background:white;width:80px;height:28px;float:none;text-align:center;" value="%">

	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">观测错情率</h3>
	         					<h3 style="width:50px;border-left:none;height:30px;line-height:30px;">最高</h3>
	         					<input type="text" id="left22" name="largecuo" onkeyup="calculate22();" style="width:80px;height:28px;float:none;left:-118px;text-align:center;" value="‰">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:80px;">最低</h3>
	         					<input type="text" id="right22" name="lowcuo" onkeyup="calculate22();" style="width:80px;height:28px;float:none;left:-72px;text-align:center;" value="‰">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:160px;">平均</h3>
	         					<input type="text" id="result22" name="averagecuo" style="width:80px;height:28px;float:none;text-align:center;" value="‰">
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">数据库系统运行正常率</h3>
	         					<input type="text" name="database" style="width:435px;height:28px;float:none;position:relative;text-align:center;"  value="%">
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">自动观测系统运行正常率</h3>
	         					<textarea name="zidongguance" id="left33" onkeyup="calculate33();" style="width:173px;height:29px;position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">自动站运行正常率</h3>
	         					<textarea name="zidongzhan" id="left44" onkeyup="calculate33();"  style="width:173px;height:29px; position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">气压仪正常率</h3>
	         					<textarea name="qiyayi" id="left55" onkeyup="calculate33();"  style="width:173px;height:29px;position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         				</div>
	         				<div style="position:relative;">
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">气象雷达运行正常率</h3>
	         					<textarea name="qixiang" id="left66" onkeyup="calculate33();"  style="width:173px;height:29px; position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         					<div style="position:absolute;width:260px;height:120px;background:#fff;right:0;top:-90px; border-left: 1px solid #b9b7b7;">
	         						<h3 style="width:90px;border-left:none;height:120px;line-height:30px;padding-top:10px">左侧四项重要气象设备平均正常率</h3>
	         						<textarea name="zuoce" id="right33" style="width:167px;height:118px; position:relative;top:-10px;right:0;border:none;resize:none;text-align:center;line-height:118px;" >%</textarea> 
	         					</div>
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">卫星云图接收正常率</h3>
	         					<input type="text" name="weixing" style=" width:435px;height:28px;float:none;position:relative;text-align:center;" value="%">
	         				</div>
	         				<div>
	         					<h3 style="width:350px;border-left:none;height:30px;line-height:30px;">因天气原因造成飞机延误、返航、备降、取消架次</h3>
	         					<input type="text" name="tianqiyuanying" style=" width:285px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div style="height:100px;">
	         					<h3 style="width:200px;border-left:none;height:100px;">气象设备因故障或升级改造等原因停止运行和恢复运行情况</h3>
	         					<div class="bb-4" style="border:none;">
	         						<div><h3 style="width:160px">设备名称</h3><textarea name="devicename" style="width:250px;"></textarea> </div>
	         						<div><h3 style="width:160px">停机时间</h3><textarea name="stoptime" style="width:250px;" onClick="WdatePicker()"></textarea></div>
	         						<div><h3 style="width:160px">恢复时间</h3><textarea name="starttime" style="width:250px;" onClick="WdatePicker()"></textarea> </div>
	         						<div><h3 style="width:160px">停机期间解决办法</h3><textarea name="ways" style="width:250px;"></textarea> </div>
	         					</div>
	         				</div>
	         				<div style="height:75px;">
	         					<h3 style="width:200px;border-left:none;height:75px;">航空器特殊空中报告情况</h3>
	         					<div class="bb-4" style="border:none;">
	         						<div><h3 style="width:160px">时间</h3><textarea onclick="WdatePicker()" name="specialtime"></textarea> </div>
	         						<div><h3 style="width:160px">地点</h3><textarea name="specialplace"></textarea> </div>
	         						<div><h3 style="width:160px">天气现象</h3><textarea name="specialweather"></textarea> </div>
	         					</div>
	         				</div>
	         				
	         			</div>
	         		</div>
	         		<div style="height:195px">
	         		<div style="width:33px;height:100%;border-right:1px solid #b9b7b7; border-bottom:none;float:left;"></div>
	         				<div style="height:75px;border:none;">
	         					<h3 style="width:200px;border-left:none;height:75px;border-bottom:1px solid #b9b7b7;">气象设备新建、升级、报废、开放和计量情况</h3>
	         					<div class="bb-4" style="border:none;">
	         						<div><h3 style="width:160px">名称</h3><textarea name="qixiangname"></textarea> </div>
	         						<div><h3 style="width:160px">时间</h3><textarea onclick="WdatePicker()" name="qixiangtime"></textarea> </div>
	         						<div><h3 style="width:260px">类型（新建、升级、报废、开放和计量）</h3><textarea name="qixiangtype"></textarea> </div>
	         					</div>
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:300px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">对气象设备防雷接地进行检查和整改情况</h3>
	         					<input type="text" name="fanglei" style=" width:335px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:200px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">气象培训情况</h3>
	         					<input type="text" name="qixianglearn" style=" width:435px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:300px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">出现气象差错和严重差错的情况及处理意见</h3>
	         					<input type="text" name="dealway" style=" width:335px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:200px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">人员变动的情况</h3>
	         					<input type="text" name="peoplechange" style=" width:435px;height:28px;float:none;position:relative;">
	         				</div>
	         		</div>
	         		<div style="height:70px">
	         			<h3 style="width:100px;border:none;height:70px;line-height:70px;border-right:1px solid #b9b7b7;">其他</h3>
	         		</div>
	         	</div>
	           <br>
	           	<!-- <input type="submit" style="float:right;" value="确定" class="btn btn-primary">
	           	<input type="reset" style="float:left;" value="重置" class="btn btn-primary"> -->
	           	<textarea name="others" style="width:566px;height:68px; position:relative;left:102px;top:-100px;border:none;resize:none;"></textarea> 
	      </div>
	      <div class="modal-footer">

	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	       <button type="submit" class="btn btn-info" onclick="if (confirm('确定要修改此报表吗？')) return true;else return false;" style="float:left;">修改</button>
	      </div>
	</form>

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
	        <form action="<?php echo U('addcheck');?>" method="post" name="form" >
	        	<div>
	        		<label for="bb-t" style="font-size:20px;">报表名称:</label><input type="text" name="name" id="bb-t" style="width:400px; height:28px;border:1px solid #999;"><br /><br />
	        	</div>
	         	<div class="bb-table" style="position:relative;">
					<span style="font-weight:600;position:absolute;left:10px;top:120px;width:14px;">本月主要工作</span>
						<span style="font-weight:600;position:absolute;left:10px;top:600px;width:14px;">安全运行</span>
						<span style="font-weight:600;position:absolute;left:10px;top:900px;width:14px;">业务管理</span>
	         		<div style="height:24px">
	         			<h3 style="border-left:none">报告单位</h3>
	         			<input type="text" name="danwei" style="height:22px; width:138px;">
	         			<h3>联系人</h3>
	         			<input type="text" name="contacter" style="height:22px; width:136px;">
	         			<h3>日期</h3>
	         			<input type="text" name="date" onClick="WdatePicker()" style="height:22px; width:138px;">
	         		</div>
	         		<div style="height:395px;">
	         			<div style="width:33px;height:100%;border-right:1px solid #b9b7b7; border-bottom:none;float:left;margin-top:-9px;"></div>
	         			<div style="width: 635px;height:100%; float:left;margin-top:-10px; border:none;">
	         				<div style="height:130px">
	         					<h3 style="border-left:none;width:75px; height:100%;padding-top:40px">训练飞行天数</h3>
	         					<input type="text" name="xunliantian" style="height:126px; width:75px;position:releative;top:-7px;">
	         					<h3 style="border-left:none;width:75px; height:100%;border-left:1px solid #b9b7b7;padding-top:30px">影响飞行的重要气象因素及天数</h3>
	         					<input type="text" name="yingxiangtian" style="height:126px; width:410px;position:releative;top:-7px; ">
	         				</div>
	         				<div style="height:70px">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:10px">例行观测次数</h3>
	         					<input type="text" name="lixingci" style="height:68px; width:75px;position:releative;top:-16px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:20px;padding-top:10px">特殊观测次数</h3>
	         					<input type="text" name="tesuci" style="height:68px; width:75px;position:releative;top:-16px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:20px;padding-top:10px">例行天气报告份数</h3>
	         					<input type="text" name="lixingfen" style="height:68px; width:75px;position:releative;top:-16px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-5px;padding-top:20px;padding-top:10px">特殊天气报告份数</h3>
	         					<input type="text" name="tesufen" style="height:68px; width:75px;position:releative;top:-16px;">
	         				</div>
	         				<div style="height:130px;">
	         					<h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:30px">机场预报份数</h3>
	         					<input type="text" name="jichangfen" style="height:100%; width:75px;position:releative;top:-24px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:30px">趋势着陆预报份数</h3>
	         					<input type="text" name="qushifen" style="height:100%; width:75px;position:releative;top:-24px;border-right:1px solid #b9b7b7;"><h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:10px">低空重要天气预告图份数或航路预报份数</h3>
	         					<input type="text" name="dikongfen" style="height:100%; width:75px;position:releative;top:-24px;border-right:1px solid #b9b7b7;"><h3 style="width:83px; height:100%;border-left:none;margin-top:-15px;padding-top:30px">自观或自动站维护次数</h3>
	         					<input type="text" name="zidongci" style="height:100%; width:75px;position:releative;top:-24px;">
	         				</div>
	         				<div style="height:72px;border:none;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:10px">数据库维护次数</h3>
	         					<input type="text" name="shujukuci" style="height:66px; width:75px;position:releative;top:-33px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:20px;padding-top:10px">气象雷达维护次数</h3>
	         					<input type="text" name="qixiangci" style="height:66px; width:75px;position:releative;top:-33px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:20px;padding-top:10px">卫星云图维护次数</h3>
	         					<input type="text" name="weixingci" style="height:66px; width:75px;position:releative;top:-33px;border-right:1px solid #b9b7b7;">
	         					<h3 style="width:83px; height:68px;border-left:none;margin-top:-25px;padding-top:20px;padding-top:10px">Micaps维护次数</h3>
	         					<input type="text" name="micapsci" style="height:66px; width:77px;position:releative;top:-33px;">
	         				</div>
	         			</div>
	         		</div>
	         		<div style="height:445px" class="dd-11">
	         			<div style="width:33px;height:100%;border-right:1px solid #b9b7b7; border-bottom:none;float:left;"></div>
	         			<div style="width: 635px;height:100%; float:left; border:none;">
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">预报准确率</h3>
	         					<h3 style="width:50px;border-left:none;height:30px;line-height:30px;">最高</h3>
	         					<input type="text" id="left1" onkeyup="calculate1();" name="largezhun" style=" width:80px;height:28px;float:none;left:-118px;text-align:center;" value="%">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:80px;">最低</h3>
	         					<input type="text" id="right1" onkeyup="calculate1();" name="lowzhun" style="width:80px;height:28px;float:none;left:-72px;text-align:center;" value="%">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:160px;">平均</h3>
	         					<input type="text" id="result1" name="averagezhun" style="width:80px;height:28px;float:none;text-align:center;" value="%">

	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">观测错情率</h3>
	         					<h3 style="width:50px;border-left:none;height:30px;line-height:30px;">最高</h3>
	         					<input type="text" id="left2" name="largecuo" onkeyup="calculate2();" style="width:80px;height:28px;float:none;left:-118px;text-align:center;" value="‰">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:80px;">最低</h3>
	         					<input type="text" id="right2" name="lowcuo" onkeyup="calculate2();" style="width:80px;height:28px;float:none;left:-72px;text-align:center;" value="‰">
	         					<h3 style="width:50px;height:30px;line-height:30px;position: relative;left:160px;">平均</h3>
	         					<input type="text" id="result2" name="averagecuo" style="width:80px;height:28px;float:none;text-align:center;" value="‰">
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">数据库系统运行正常率</h3>
	         					<input type="text" name="database" style="width:435px;height:28px;float:none;position:relative;text-align:center;"  value="%">
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">自动观测系统运行正常率</h3>
	         					<textarea name="zidongguance" id="left3" onkeyup="calculate3();" style="width:173px;height:29px;position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">自动站运行正常率</h3>
	         					<textarea name="zidongzhan" id="left4" onkeyup="calculate3();"  style="width:173px;height:29px; position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">气压仪正常率</h3>
	         					<textarea name="qiyayi" id="left5" onkeyup="calculate3();"  style="width:173px;height:29px;position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         				</div>
	         				<div style="position:relative;">
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">气象雷达运行正常率</h3>
	         					<textarea name="qixiang" id="left6" onkeyup="calculate3();"  style="width:173px;height:29px; position:relative;left:-130px;top:-10px;border:none;resize:none;text-align:center;">%</textarea> 
	         					<div style="position:absolute;width:260px;height:120px;background:#fff;right:0;top:-90px; border-left: 1px solid #b9b7b7;">
	         						<h3 style="width:90px;border-left:none;height:120px;line-height:30px;padding-top:10px">左侧四项重要气象设备平均正常率</h3>
	         						<textarea name="zuoce" id="right3" style="width:167px;height:118px; position:relative;top:-10px;right:0;border:none;resize:none;text-align:center;line-height:118px;" >%</textarea> 
	         					</div>
	         				</div>
	         				<div>
	         					<h3 style="width:200px;border-left:none;height:30px;line-height:30px;">卫星云图接收正常率</h3>
	         					<input type="text" name="weixing" style=" width:435px;height:28px;float:none;position:relative;text-align:center;" value="%">
	         				</div>
	         				<div>
	         					<h3 style="width:350px;border-left:none;height:30px;line-height:30px;">因天气原因造成飞机延误、返航、备降、取消架次</h3>
	         					<input type="text" name="tianqiyuanying" style=" width:285px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div style="height:100px;">
	         					<h3 style="width:200px;border-left:none;height:100px;">气象设备因故障或升级改造等原因停止运行和恢复运行情况</h3>
	         					<div class="bb-4" style="border:none;">
	         						<div><h3 style="width:160px">设备名称</h3><textarea name="devicename" style="width:250px;"></textarea> </div>
	         						<div><h3 style="width:160px">停机时间</h3><textarea name="stoptime" style="width:250px;" onClick="WdatePicker()"></textarea></div>
	         						<div><h3 style="width:160px">恢复时间</h3><textarea name="starttime" style="width:250px;" onClick="WdatePicker()"></textarea> </div>
	         						<div><h3 style="width:160px">停机期间解决办法</h3><textarea name="ways" style="width:250px;"></textarea> </div>
	         					</div>
	         				</div>
	         				<div style="height:75px;">
	         					<h3 style="width:200px;border-left:none;height:75px;">航空器特殊空中报告情况</h3>
	         					<div class="bb-4" style="border:none;">
	         						<div><h3 style="width:160px">时间</h3><textarea onclick="WdatePicker()" name="specialtime"></textarea> </div>
	         						<div><h3 style="width:160px">地点</h3><textarea name="specialplace"></textarea> </div>
	         						<div><h3 style="width:160px">天气现象</h3><textarea name="specialweather"></textarea> </div>
	         					</div>
	         				</div>
	         				
	         			</div>
	         		</div>
	         		<div style="height:195px">
	         		<div style="width:33px;height:100%;border-right:1px solid #b9b7b7; border-bottom:none;float:left;"></div>
	         				<div style="height:75px;border:none;">
	         					<h3 style="width:200px;border-left:none;height:75px;border-bottom:1px solid #b9b7b7;">气象设备新建、升级、报废、开放和计量情况</h3>
	         					<div class="bb-4" style="border:none;">
	         						<div><h3 style="width:160px">名称</h3><textarea name="qixiangname"></textarea> </div>
	         						<div><h3 style="width:160px">时间</h3><textarea onclick="WdatePicker()" name="qixiangtime"></textarea></div>
	         						<div><h3 style="width:260px">类型（新建、升级、报废、开放和计量）</h3><textarea name="qixiangtype"></textarea> </div>
	         					</div>
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:300px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">对气象设备防雷接地进行检查和整改情况</h3>
	         					<input type="text" name="fanglei" style=" width:335px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:200px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">气象培训情况</h3>
	         					<input type="text" name="qixianglearn" style=" width:435px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:300px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">出现气象差错和严重差错的情况及处理意见</h3>
	         					<input type="text" name="dealway" style=" width:335px;height:28px;float:none;position:relative;">
	         				</div>
	         				<div class="bb-b">
	         					<h3 style="width:200px;border:none;height:28px;line-height:28px;border-right:1px solid #b9b7b7;">人员变动的情况</h3>
	         					<input type="text" name="peoplechange" style=" width:435px;height:28px;float:none;position:relative;">
	         				</div>
	         		</div>
	         		<div style="height:70px">
	         			<h3 style="width:100px;border:none;height:70px;line-height:70px;border-right:1px solid #b9b7b7;">其他</h3>
	         		</div>
	         	</div>
	           <br>
	           	<input type="submit" style="float:right;width: 40px;" value="确定" class="btn btn-primary">
	           	<input type="reset" style="float:left;width: 40px;" value="重置" class="btn btn-primary">
	           	<textarea name="others" style="width:566px;height:68px; position:relative;left:62px;top:-100px;border:none;resize:none;"></textarea> 
	        </form>
	      </div>


	    </div>
	  </div>
	</div>
</div>
</body>
</html>