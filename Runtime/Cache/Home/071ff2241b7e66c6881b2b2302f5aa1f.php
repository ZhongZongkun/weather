<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>peixun</title>
	<script type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/jquery-2.2.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (SITE_URL); ?>public/css/bootstrap.min.css">
	<script src="<?php echo (SITE_URL); ?>public/js/bootstrap.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo (SITE_URL); ?>public/js/My97DatePicker/WdatePicker.js"></script>

    <script language="javascript" type="text/javascript">
    function moveselect(obj,target,all){
    if (!all) all=0
    if (obj!="[object]") obj=eval("document.all."+obj)
    target=eval("document.all."+target)
    if (all==0)
    {
    while (obj.selectedIndex>-1){
    //alert(obj.selectedIndex)
    mot=obj.options[obj.selectedIndex].text
    mov=obj.options[obj.selectedIndex].value
    obj.remove(obj.selectedIndex)
    var newoption=document.createElement("OPTION");
    newoption.text=mot
    newoption.value=mov
    target.add(newoption)
    }
    }
    else
    {
    //alert(obj.options.length)
    for (i=0;i<obj.length;i++)
    {
    mot=obj.options[i].text
    mov=obj.options[i].value
    var newoption=document.createElement("OPTION");
    newoption.text=mot
    newoption.value=mov
    target.add(newoption)
    }
    obj.options.length=0
    }
    }
    function dakai(){
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
    }
    function guanbi(){
    //把右边select的值传到文本框内
    var yuanGong=document.getElementById("yuanGong")
    var show1=document.getElementById("show1")
    var huoQu=document.getElementById("D2")
		show1.value='';
    for(var k=0;k<huoQu.length;k++)
    show1.value=show1.value + huoQu.options[k].value + " "//" "中间为空格，字符分隔符，可以改成别的
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none'
    }
    //单位二级联动da'ka
     var city=[
[["1_1","xxxxx气象台1"],["1_2","xxxxx气象台1"],["1_3","xxxxx气象台1"],["1_4","xxxxx气象台1"],["1_5","xxxxx气象台1"],["1_6","xxxxx气象台1"]],
[["2_1","xxxxx气象台2"],["2_2","xxxxx气象台2"],["2_3","xxxxx气象台2"],["2_4","xxxxx气象台2"],["2_5","xxxxx气象台2"],["2_6","xxxxx气象台2"],["2_7","xxxxx气象台2"],["2_8","xxxxx气象台2"],["2_9","xxxxx气象台2"],["2_10","xxxxx气象台2"],["2_11","xxxxx气象台2"]],
[["3_1","xxxxx气象台3"],["3_2","xxxxx气象台3"],["3_3","xxxxx气象台3"],["3_4","xxxxx气象台3"],["3_5","xxxxx气象台3"],["3_6","xxxxx气象台3"],["3_7","xxxxx气象台3"],["3_8","xxxxx气象台3"],["3_9","xxxxx气象台3"],["3_10","xxxxx气象台3"],["3_11","xxxxx气象台3"]]
     ];

     function getCity(){
var url=$("#getjob_url").attr('value');
		var danwei=$('#danwei option:selected').text();//选中的文本
		 $.ajax({
			 type: "post",
			 url: url,
			 data:{danwei:danwei},
			 dataType: "json",
			 success: function (data) {
				 $("#job option").remove();
				 var bb="<option value='null' selected='selected'>请先选择所在单位</option>";
				 $("#job").append(bb);
				 var resalut={};
				 $.each(data,function(key,value){
					 var one="<option value="+value+">"+value+"</option>";
					 $("#job").append(one);
				 });
			 }});

//         var sltProvince=document.formtis[0].province;
//         var sltCity=document.forms[0].city;
//         var provinceCity=city[sltProvince.selectedIndex - 1];
//         sltCity.length=1;
//         for(var i=0;i<provinceCity.length;i++){
//             sltCity[i+1]=new Option(provinceCity[i][1],provinceCity[i][0]);
//             sltCity[i+1].onclick = function dakai() {
//                 document.getElementById('light').style.display='block';
//                 document.getElementById('fade').style.display='block'
//             };
//         }
     }


	function getPeople(){
var danwei=$("#danwei option:selected").text();
var job=$("#job option:selected").text();
var getpeopleurl=$('#getpeopele_url').attr('value');
		$.ajax({
			type: "post",
			url: getpeopleurl,
			data:{danwei:danwei,job:job},
			dataType: "json",
			success: function (data) {
				$("#people option").remove();
				var resalut={};
				$.each(data,function(key,value){
					var one="<option value="+value['name']+">"+value['name']+"</option>";
					$("#people").append(one);
				});
				dakai();
				document.getElementById("show1").value='';

			}});




	}
    </script>
	
</head>
<div><?php echo ($c["danwei"]); ?></div>


<body style="overflow-x:hidden;">
<input id="getjob_url" type="hidden" value="<?php echo U('training/get_job');?>">
<input id="getpeopele_url" type="hidden" value="<?php echo U('training/get_people');?>">
<div id="content1">
	<div class="header">
		<div class="information">
		<span style="float: left;font-family: '微软雅黑';font-weight: 500; text-align: center; margin-top: -3px; font-size: 18px;margin-left: 50px;"><img src="<?php echo (SITE_URL); ?>public/images/zhuye.png" style="margin-top:-6px;" alt=""><span  aria-hidden="true"><p style="display: inline-block; height: 40px; margin-left:0px;">培训管理</p></span></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/fanhui.png" alt=""><a href="<?php echo U('index/index');?>">返回主页</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/zhuxiao.png" alt=""><a href="<?php echo U('login/logout');?>">注销</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/xiazai.png" alt=""><a href="<?php echo U('login/login');?>">切换用户</a></span>
			<span  aria-hidden="true"><img src="<?php echo (SITE_URL); ?>public/images/user.png" alt=""><a href="###"><?php echo ($username); ?></a></span>
	</div>
</div>
<div class="px_content">
	<div class="px-top">
		<div id="px_out1">
			<div class="px-out1" >
				<a href="###" id="px_out11" style="  width: 100px; height: 100px; left: 280px; top: 145px;  position: absolute;  width: 100px;" onfocus="this.blur();"><img src="<?php echo (SITE_URL); ?>public/images/button9.png"></a>
			</div>
			<div class="meeting1" style="width: 800px; position: absolute; height:380px;left: 20px; top: 5px;  ">	  
			      <!-- <span></span><input type="email" class="form-control" id="inputEmail3" placeholder="Email" style="width: 200px!important;"> -->
			      <form>
			      <span class="spc">培训创建:</span><hr/>
			      <form name="f1"   action="" method="post">

				<table>
				   <tr><td>培训所在单位:&nbsp</td>
				    <td><select id="danwei" name="province" onChange="getCity()" style="width: 114px;height: 22px;">
				       <option value="null" selected="selected">请选择所在单位</option>
				       <!--如果都选值   <option value="直辖市">直辖市</option>-->
						<?php if(is_array($info)): foreach($info as $k=>$v): ?><option value="<?php echo ($k); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
				         </select>
				     	 <span>培训人员选择:</span>
					 <select id="job" name="city" onChange="getPeople()" style="width: 180px; height: 22px;" >
					 	<option value="null" selected="selected">请先选择所在单位</option>
					 </select>
				      <span>培训类型:</span>
					<select style="width: 203px;height: 22px;">
					  <option value="volvo">岗前</option>
					  <option value="saab" >岗后</option>
					</select>
				          </td></tr>
				         </form>
				     </table>
				     <div style="width: 100%; height: 10px;"></div>
				  <span>培训人员:</span><input type="text" id="show1" style="width: 693px;"><br>
			      <span>培训时间:</span><input class="Wdate form-control" style="width: 150px!important; height: 23px;padding: 0 10px!important; display: inline-block;" type="text" onClick="WdatePicker()">至 <input class="Wdate form-control" style="width: 150px!important; height: 23px; padding: 0 10px!important; display: inline-block;"  type="text" onClick="WdatePicker()"> &nbsp
			       
			       <span>培训地点:</span><input type="text" class="form-control" id="inputEmail3"style="width:303px!important; height: 23px; display: inline-block;"><br>
					<span>培训单位:</span><input type="text" class="form-control" id="inputEmail3"style="width: 210px!important; height: 23px; display: inline-block;">&nbsp&nbsp
					<span>证书编号:</span><input type="text" class="form-control" id="inputEmail3"style="width: 170px!important; height: 23px; display: inline-block;">&nbsp&nbsp
					<span>获取时间:</span><input type="text" class="form-control" id="inputEmail3"style="width: 170px!important; height: 23px; display: inline-block;"><div style="width: 100%; height: 28px;"></div>
					<span style="display: inline-block; top: -15px; position: relative; line-height: 50px; height: 50px;">培训通知:</span><textarea style=" width: 260px!important;display: inline-block; height: 50px; margin-top: -15px;" class="form-control" rows="3"></textarea>
					<span style="display: inline-block; top: -15px; position: relative; line-height: 50px; height: 50px;">培训内容:</span><textarea style=" width: 370px!important;display: inline-block;  height: 50px; margin-top: -15px;" class="form-control" rows="3"></textarea><div style="width: 100%; height: 13px;"></div>
					<span>培训计划:</span><textarea style=" width: 695px!important; margin-left: 60px; height: 80px; margin-top: -35px;" class="form-control" rows="3"></textarea>	
					<div id="light" class="white_content">
						<span style="font-size: 30px; font-weight: 500;margin-left: 120px;position: relative;top: -30px;">人员名单</span>
					    <table width="350" id="table4"  cellpadding="3" cellspacing="0">
					    <tr>
					    <td width="150" height="200" align="center" valign="middle">
					    全部员工
					    <select id="people" size="12" name="D1" ondblclick="moveselect(this,'D2')" multiple="multiple" style="width:140px ;height: 200px; padding-left: 8px; padding-top: 8px;">
					    <option value="张三">张三</option>
					    <option value="李四">李四</option>
					    <option value="小王">小王</option>
					     <option value="张12三">张12三</option>
					    <option value="李四12">李四12</option>
					    <option value="小12王">小12王</option>
					     <option value="张三12">张三12</option>
					    <option value="李四12">李四12</option>
					    <option value="小21王">小21王</option>
					    </select>
					    </td>
					    <td width="50" height="200" align="center" valign="middle">
					    <input type="button" value="<<" name="B3" onclick="moveselect('D2','D1',1)"><br>
					    <input type="button" value="<" name="B5" onclick="moveselect('D2','D1')"><br>
					    <input type="button" value=">" name="B6" onclick="moveselect('D1','D2')"><br>
					    <input type="button" value=">>" name="B4" onclick="moveselect('D1','D2',1)"><br>
					    </td>
					    <td width="150" height="200" align="center" valign="middle">
					    已分配员工
					    <select size="12" name="D2" id="D2" ondblclick="moveselect(this,'D1')" multiple="multiple" style="width:140px ;height: 200px; padding-left: 8px; padding-top: 8px;">
					    </select>
					    </td>
					    </tr>
					    </table>
					    <input type="button" name="button" style=" width: 100px; margin-left: 245px; margin-top: 20px;" onclick="guanbi()" value="确定">
					    </div>
					    <div id="fade" class="black_overlay"></div>
					<button type="button" class="btn btn-success" style="margin-left: 300px; margin-top: 10px;">提交表单</button>
					</form>
			</div>
		</div>
		<div class="px-top-text">
			<h3>正在培训:</h3><hr>
			<a class="btn  btn-lg" data-toggle="modal" data-target="#myModal" style="color: #FFF;">
			  xxxxxxxxx 培训
			</a>
			<a class="btn  btn-lg" data-toggle="modal" data-target="#myModal" style="color: #FFF;">
			  xxxxxxxxx 培训
			</a>
			<a class="btn  btn-lg" data-toggle="modal" data-target="#myModal" style="color: #FFF;">
			  xxxxxxxxx 培训
			</a>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">xxxxxx培训</h4>
			      </div>
			      <div class="modal-body">
			       

						<form action="<?php echo U('handle');?>" name='wish' style="padding-left: 17px;" method="post">
				      			培训时间：xxxxx-xxxxxx<br>
				      			培训学时：xxx<br>
				      			培训地点：xxxxxxxxxx<br>
				      			培训教员：xxxxx,xxxxx,xxxxx<br>
				      			培训单位：xxxxxxxxxx<br>
				      			证书编号：xxxxx-xxxxx-xxxxx<br>
				      			获取时间：xxxxx<br>
				      			培训通知：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			培训通知：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			培训计划：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br><hr style="width: 90%; position: relative; top: 20px;"><br><br>
				      			签到记录：暂无<br>
				      			考核记录：<input type="text" style="width: 400px; margin-bottom: 20px; height: 100px;"></input><br>
				      			考核总结：<input type="text" style="width: 400px; margin-bottom: 20px; height: 100px;"></input><br>
							 <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Submit</button>
			      </div>
				       		</form>


			      </div>
			     
			    </div>
			  </div>
			</div>
			<h3 style="margin-left: 50px;">培训记录:<span style="float: right; margin-right: 30px; color: #ddd; font-size: 16px; margin-top: 10px;"><a style="color: #ddd;" href="">更多...</a></span></h3><hr style="width: 700px; margin-left: 50px; ">
			<div style="margin-left: 50px;">
				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
			  xxxxxxxxx 培训
			</a>

				<div class="modal fade" id="qqq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">xxxxxx培训</h4>
			      </div>
			      <div class="modal-body">
			       

						<form action="<?php echo U('handle');?>" name='wish' style="padding-left: 17px;" method="post">
				      			培训时间：xxxxx-xxxxxx<br>
				      			培训学时：xxx<br>
				      			培训地点：xxxxxxxxxx<br>
				      			培训教员：xxxxx,xxxxx,xxxxx<br>
				      			培训单位：xxxxxxxxxx<br>
				      			证书编号：xxxxx-xxxxx-xxxxx<br>
				      			获取时间：xxxxx<br>
				      			培训通知：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			培训通知：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			培训计划：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br><hr style="width: 90%; position: relative; top: 20px;"><br><br>
				      			签到记录：暂无<br>
				      			考核记录：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			考核总结：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br><br>
							 <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Submit</button>
			      </div>
				       		</form>


			      </div>
			     
			    </div>
			  </div>
			</div>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
			  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>

				<a class="btn  btn-lg" data-toggle="modal" data-target="#qqq" style="color: #FFF;">
							  xxxxxxxxx 培训
							</a>


			</div>
			
		</div>
	</div>
	<div class="px-bottom">
		<div id="px_out2">
			<div class="px-out2">
				<a href="###" id="px_out12" style="width: 100px; height: 100px;  position: absolute; left: 12px; top: 145px;" onfocus="this.blur();"><img src="<?php echo (SITE_URL); ?>public/images/button10.png"></a>
			</div>
			<div class="px-top-text1">
				<h3 style="margin-left: -80px; color: #000!important;">专业技术人员培训档案:</h3><hr style="width: 700px; margin-left: -100px; border-top: 1px solid #4b7583;">
				<div class="messages" style="margin-left: -80px; margin-top: -20px; ">
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					  <a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>
					<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
					  xxx</a>

				</div>
				
			</div>
		</div>
		<div class="px-top-text1">
			<h3>当前培训技术人员信息:</h3><hr>
			<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a>

			<div class="modal fade"  id="dddd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">xxxxxx培训</h4>
			      </div>
			      <div class="modal-body">
						<form action="<?php echo U('handle');?>" name='wish' style="padding-left: 17px;" method="post">
								<h4>人员基本信息</h4>
				      			姓名：xxx<br>
				      			性别：xxx<br>
				      			籍贯：xxxxxxxxxx<br>
				      			名族：xxxxxxxxxx<br>
				      			出生年月：xxxxx,xxxxx,xxxxx<br>
				      			参加工作时间：xxxxxxxxxx<br>
				      			政治面貌：xxxxx-xxxxx-xxxxx<br>
				      			学历：xxxxx<br>
				      			岗位：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			执照/上岗证：xxxxx-xxxxx-xxxxx<br>
				      			学历：xxxxx<br>
				      			职称：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			工作经历：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br><hr style="width: 90%; position: relative; top: 20px;"><br><br>
				      			<h4>岗前培训记录</h4>
				      			培训时间：xxx<br>
				      			培训学时：xxx<br>
				      			培训地点：xxxxxxxxxx<br>
				      			培训教员：xxxxx,xxxxx,xxxxx<br>
				      			培训单位：xxxxxxxxxx<br>
				      			证书编号：xxxxx-xxxxx-xxxxx<br>
				      			获取时间：xxxxx<br>
				      			培训内容：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			<hr style="width: 90%; position: relative; top: 20px;"><br><br>
				      			<h4>岗位培训记录</h4>
				      			培训时间：xxx<br>
				      			培训学时：xxx<br>
				      			培训地点：xxxxxxxxxx<br>
				      			培训教员：xxxxx,xxxxx,xxxxx<br>
				      			培训单位：xxxxxxxxxx<br>
				      			证书编号：xxxxx-xxxxx-xxxxx<br>
				      			获取时间：xxxxx<br>
				      			培训内容	：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>
				      			<hr style="width: 90%; position: relative; top: 20px;"><br><br>
							 <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Type</button>
			      </div>
				       		</form>


			      </div>
			     
			    </div>
			  </div>
			</div>
			<a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a><a class="btn  btn-lg" data-toggle="modal" data-target="#dddd" style="color: #FFF;">
			  xxx
			</a>
		</div>
	</div>
</div>



	<script src="<?php echo (SITE_URL); ?>public/js/myjs.js"></script>
</body>
</html>