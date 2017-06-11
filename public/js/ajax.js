$(document).ready(function(){


    $(".show_select").click(function(){
        $(this).find('span').eq(0).toggleClass("glyphicon-plus").toggleClass("glyphicon-chevron-left");
        $(this).find('.select_box').toggle( "slide" );
    });

    $('.update_btn').click(function(){
        var a=$(this).parents('td').prev('input').attr("value");
        var b=$(this).parents('.item').attr('id');
        var url=$('#update_url').attr('value');
        $.ajax({
            type: "post",
            url: url,
            data:{id:a,b:b},
            dataType: "json",
            success: function (data) {
                var resalut={};
                $.each(data,function(key,value){
                    resalut[key]=value;
                });
                if(b=='item1') {
                    $('#update1').find("form input[name='id']").attr('value', resalut[0]['id']);
                    $('#update1').find("form input[name='danwei']").attr('value', resalut[0]['danwei']);
                    $('#update1').find("form input[name='devicetype']").attr('value', resalut[0]['devicetype']);
                    $('#update1').find("form input[name='device']").attr('value', resalut[0]['device']);
                    $('#update1').find("form input[name='number']").attr('value', resalut[0]['number']);
                    $('#update1').find("form input[name='begintime']").attr('value', resalut[0]['begintime']);
                    $('#update1').find("form input[name='workyear']").attr('value', resalut[0]['workyear']);
                    $('#update1').find("form input[name='changjia']").attr('value', resalut[0]['changjia']);
                    $('#update1').find("form input[name='devicenumber']").attr('value', resalut[0]['devicenumber']);
                    $('#update1').find("form input[name='install']").attr('value', resalut[0]['install']);
                    if (resalut[0]['fit'] == '符合') {
                        //$('#update1').find("form input[name='fit']").eq(1).removeAttr('checked');
                        //$('#update1').find("form input[name='fit']").eq(0).attr('checked','checked');
                        $('#update1').find("form input[name='fit']").eq(0).click();
                    } else {
                        //$('#update1').find("form input[name='fit']").eq(0).removeAttr('checked');
                        //$('#update1').find("form input[name='fit']").eq(1).attr('checked','checked');
                        $('#update1').find("form input[name='fit']").eq(1).click();
                    }
                    $('#update1').find("form input[name='add']").attr('value', resalut[0]['add']);
                    $('#update1').find("form input[name='workstatus']").attr('value', resalut[0]['workstatus']);
                    $('#update1').find("form input[name='check']").attr('value', resalut[0]['check']);
                    $('#update1').find("form textarea[name='others']").append(resalut[0]['others']);
                }if(b=='item2'){
                    $('#update2').find("form input[name='id']").attr('value', resalut[0]['id']);
                    $('#update2').find("form input[name='danwei']").attr('value', resalut[0]['danwei']);
                    $('#update2').find("form input[name='device']").attr('value', resalut[0]['devicename']);
                    $('#update2').find("form input[name='number']").attr('value', resalut[0]['number']);
                    $('#update2').find("form input[name='changjia']").attr('value', resalut[0]['changjia']);
                    $('#update2').find("form input[name='devicenumber']").attr('value', resalut[0]['devicenumber']);
                    $('#update2').find("form input[name='lxtime']").attr('value', resalut[0]['lxtime']);
                    $('#update2').find("form input[name='httime']").attr('value', resalut[0]['httime']);
                    $('#update2').find("form input[name='installtime']").attr('value', resalut[0]['installtime']);
                    $('#update2').find("form input[name='ystime']").attr('value', resalut[0]['ystime']);
                    $('#update2').find("form input[name='others']").attr('value', resalut[0]['others']);

                }if(b=='item3'){
                    $('#update3').find("form input[name='id']").attr('value', resalut[0]['id']);
                    $('#update3').find("form input[name='danwei']").attr('value', resalut[0]['danwei']);
                    $('#update3').find("form input[name='devicetype']").attr('value', resalut[0]['devicename']);
                    $('#update3').find("form input[name='number']").attr('value', resalut[0]['number']);
                    $('#update3').find("form input[name='buytime']").attr('value', resalut[0]['buytime']);
                    $('#update3').find("form input[name='changjia']").attr('value', resalut[0]['changjia']);
                    $('#update3').find("form input[name='devicenumber']").attr('value', resalut[0]['devicenumber']);
                    if(resalut[0]['status']=='在台'){
                        $('#update3').find("form input[name='status']").eq(0).click();
                    }else{
                        $('#update3').find("form input[name='status']").eq(1).click();
                    }

                    $('#update3').find("form input[name='money']").attr('value', resalut[0]['money']);
                    $('#update3').find("form input[name='others']").attr('value', resalut[0]['others']);








                }



            }
        });


    });




//展示人员详细信息
    $('.show_btn').click(function(){

        var a=$(this).parent('td').prevAll("input[name='id']").attr('value');
        var b=$("#ajaxurl").attr('value');
        $.ajax({
            type: "post",
            url: b,
            data: {id: a},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                $("#message_tr").find('td').eq(0).html(resalut[0]['danwei']);
                $("#message_tr").find('td').eq(1).html(resalut[0]['name']);
                $("#message_tr").find('td').eq(2).html(resalut[0]['sex']);
                $("#message_tr").find('td').eq(3).html(resalut[0]['birthday']);
                $("#message_tr").find('td').eq(4).html(resalut[0]['age']);
                $("#message_tr").find('td').eq(5).html(resalut[0]['nation']);
                $("#message_tr").find('td').eq(6).html(resalut[0]['status']);
                $("#message_tr").find('td').eq(7).html(resalut[0]['birthplace']);
                $("#message_tr").find('td').eq(8).html(resalut[0]['job']);
                $("#message_tr").find('td').eq(9).html(resalut[0]['position']);
                $("#message_tr").find('td').eq(10).html(resalut[0]['largedegree']);
                $("#message_tr").find('td').eq(11).html(resalut[0]['graduateschool']+"</br>"+resalut[0]['graduatetime']);
                $("#message_tr").find('td').eq(12).html(resalut[0]['licensetype']+" "+resalut[0]['licensetime']+"<br/> "+resalut[0]['licensenumber']);
                $("#message_tr").find('td').eq(13).html(resalut[0]['zhicheng']+"</br>"+resalut[0]['zhichengtime']);
                $("#message_tr").find('td').eq(14).html(resalut[0]['worktime']);
                $("#message_tr").find('td').eq(15).html(resalut[0]['major']);
                $("#message_tr").find('td').eq(16).html(resalut[0]['learnmethod']);
                $("#message_tr").find('td').eq(17).html(resalut[0]['largedegreetime']);
                $("#message_tr").find('td').eq(18).html(resalut[0]['licenseregistnumber']);
                $("#message_tr").find('td').eq(19).html(resalut[0]['workstate']);
                $("#message_tr").find('td').eq(20).html(resalut[0]['tongji']);
                $("#message_tr").find('td').eq(21).html(resalut[0]['others']);


            }
        })

    });




    //----------------报表ajax--------------------
    $('#reports_form a').click(function(){
        var id=$(this).attr('report');
        var url=$('#ajax-url').attr('value');
        $.ajax({
            type: "post",
            url: url,
            data: {id:id},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                $("#edit-form input[name='name']").attr('value',resalut['name']);
                $("#edit-form input[name='danwei']").attr('value',resalut['danwei']);
                $("#edit-form input[name='contacter']").attr('value',resalut['contacter']);
                $("#edit-form input[name='date']").attr('value',resalut['date']);
                $("#edit-form input[name='xunliantian']").attr('value',resalut['xunliantian']);
                $("#edit-form input[name='yingxiangtian']").attr('value',resalut['yingxiangtian']);
                $("#edit-form input[name='lixingci']").attr('value',resalut['lixingci']);
                $("#edit-form input[name='tesuci']").attr('value',resalut['tesuci']);
                $("#edit-form input[name='lixingfen']").attr('value',resalut['lixingfen']);
                $("#edit-form input[name='tesufen']").attr('value',resalut['tesufen']);
                $("#edit-form input[name='jichangfen']").attr('value',resalut['jichangfen']);
                $("#edit-form input[name='qushifen']").attr('value',resalut['qushifen']);
                $("#edit-form input[name='dikongfen']").attr('value',resalut['dikongfen']);
                $("#edit-form input[name='zidongci']").attr('value',resalut['zidongci']);
                $("#edit-form input[name='shujukuci']").attr('value',resalut['shujukuci']);
                $("#edit-form input[name='qixiangci']").attr('value',resalut['qixiangci']);
                $("#edit-form input[name='weixingci']").attr('value',resalut['weixingci']);
                $("#edit-form input[name='micapsci']").attr('value',resalut['micapsci']);
                $("#edit-form input[name='largezhun']").attr('value',resalut['largezhun']);
                $("#edit-form input[name='lowzhun']").attr('value',resalut['lowzhun']);
                $("#edit-form input[name='averagezhun']").attr('value',resalut['averagezhun']);
                $("#edit-form input[name='largecuo']").attr('value',resalut['largecuo']);
                $("#edit-form input[name='lowcuo']").attr('value',resalut['lowcuo']);
                $("#edit-form input[name='averagecuo']").attr('value',resalut['averagecuo']);
                $("#edit-form input[name='database']").attr('value',resalut['database']);

                $("#edit-form textarea[name='zidongguance']").val(resalut['zidongguance']);
                $("#edit-form textarea[name='zidongzhan']").val(resalut['zidongzhan']);
                $("#edit-form textarea[name='qiyayi']").val(resalut['qiyayi']);
                $("#edit-form textarea[name='qixiang']").val(resalut['qixiang']);
                $("#edit-form textarea[name='zuoce']").val(resalut['zuoce']);
                $("#edit-form textarea[name='devicename']").val(resalut['devicename']);
                $("#edit-form textarea[name='stoptime']").val(resalut['stoptime']);
                $("#edit-form textarea[name='starttime']").val(resalut['starttime']);
                $("#edit-form textarea[name='ways']").val(resalut['ways']);
                $("#edit-form textarea[name='specialtime']").val(resalut['specialtime']);
                $("#edit-form textarea[name='specialplace']").val(resalut['specialplace']);
                $("#edit-form textarea[name='specialweather']").val(resalut['specialweather']);
                $("#edit-form textarea[name='qixiangname']").val(resalut['qixiangname']);
                $("#edit-form textarea[name='qixiangtime']").val(resalut['qixiangtime']);
                $("#edit-form textarea[name='qixiangtype']").val(resalut['qixiangtype']);
                
                $("#edit-form input[name='tianqiyuanying']").attr('value',resalut['tianqiyuanying']);
                $("#edit-form input[name='weixing']").attr('value',resalut['weixing']);
                $("#edit-form input[name='fanglei']").attr('value',resalut['fanglei']);
                $("#edit-form input[name='qixianglearn']").attr('value',resalut['qixianglearn']);
                $("#edit-form input[name='dealway']").attr('value',resalut['dealway']);
                $("#edit-form input[name='peoplechange']").attr('value',resalut['peoplechange']);
                $("#edit-form textarea[name='others']").attr('value',resalut['others']);
                $("#edit-form textarea[name='others']").text(resalut['others']);
                $("#edit-form input[name='id']").attr('value',id);

            }
        })


    })


    //----------------用户管理jax--------------------
    $('.userchangebtn').click(function(){
        var id=$(this).attr('uid');
        //console.log(id);
        var url=$('#userchange-url').attr('value');
        $.ajax({
            type: "post",
            url: url,
            data: {id:id},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                $("#userchange-form input[name='id']").attr('value',id);
                $("#userchange-form input[name='name']").attr('value',resalut['name']);
                $("#userchange-form input[name='danwei']").attr('value',resalut['danwei']);
                $("#userchange-form input[name='username']").attr('value',resalut['username']);
            }
        })
    })







//个人信息修改
     $('.change_btn').click(function(){
        var id=$(this).parent('td').prevAll("input[name='id']").attr('value');
        console.log(id);
        var url=$('#ajax-url').attr('value');
        $.ajax({
            type: "post",
            url: url,
            data: {id:id},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                $("#user-change-form input[name='name']").attr('value',resalut['name']);
                $("#user-change-form input[name='danwei']").attr('value',resalut['danwei']);
                if(resalut['sex']=='男'){
                        $('#exampleModal').find("form input[name='sex']").eq(0).click();
                }else{
                        $('#exampleModal').find(" form input[name='sex']").eq(1).click();
                }
                // if(resalut['sex']=='男'){
                //      $("#euser-change-form input[id='optionsRadios3']").prop('checked',true);
                // }
                // if(resalut['sex']=='女')
                // {
                //     $("#user-change-form input[id='optionsRadios4']").prop('checked',true);
                // }
               
                $("#user-change-form input[name='birthday']").attr('value',resalut['birthday']);
                $("#user-change-form input[name='age']").attr('value',resalut['age']);
                $("#user-change-form input[name='nation']").attr('value',resalut['nation']);
                $("#user-change-form input[name='status']").attr('value',resalut['status']);
                $("#user-change-form input[name='birthplace']").attr('value',resalut['birthplace']);
                $("#user-change-form input[name='job']").attr('value',resalut['job']);
                $("#user-change-form input[name='position']").attr('value',resalut['position']);
                $("#user-change-form input[name='largedegree']").attr('value',resalut['largedegree']);
                $("#user-change-form input[name='graduateschool']").attr('value',resalut['graduateschool']);
                $("#user-change-form input[name='graduatetime']").attr('value',resalut['graduatetime']);
                $("#user-change-form input[name='licensetype']").attr('value',resalut['licensetype']);
                $("#user-change-form input[name='licenseregistnumber']").attr('value',resalut['licenseregistnumber']);
                $("#user-change-form input[name='licensenumber']").attr('value',resalut['licensenumber']);
                $("#user-change-form input[name='licensetime']").attr('value',resalut['licensetime']);
                $("#user-change-form input[name='starttime']").attr('value',resalut['starttime']);
                $("#user-change-form input[name='zhicheng']").attr('value',resalut['zhicheng']);
                $("#user-change-form input[name='zhichengtime']").attr('value',resalut['zhichengtime']);
                $("#user-change-form input[name='worktime']").attr('value',resalut['worktime']);
                $("#user-change-form input[name='major']").attr('value',resalut['major']);
                $("#user-change-form input[name='learnmethod']").attr('value',resalut['learnmethod']);
                $("#user-change-form input[name='largedegreetime']").attr('value',resalut['largedegreetime']);
                $("#user-change-form input[name='licenseregisttime']").attr('value',resalut['licenseregisttime']);
                $("#user-change-form input[name='workstate']").attr('value',resalut['workstate']);
                $("#user-change-form input[name='tongji']").attr('value',resalut['tongji']);
                $("#user-change-form textarea[name='others']").attr('value',resalut['others']);
                $("#user-change-form textarea[name='others']").text(resalut['others']);
                $("#user-change-form input[name='id']").attr('value',id);

            }
        })


    })


//点击正在培训显示培训内容
    $('.show-zhengpeixun').click(function(){
        var a=$(this).prevAll("input[name='zhengpeixunid']").attr('value');
        var b=$("#zhengpeixunurl").attr('value');
        $.ajax({
            type: "post",
            url: b,
            data: {id: a},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                
                $(".zhengpeixun-title").html(resalut[0]['peixunname']);
                $("#peixuntime").find('td').eq(1).html(resalut[0]['begintime']+" 至 "+resalut[0]['overtime']);
                $("#peixuntype").find('td').eq(1).html(resalut[0]['peixuntype']);
                $("#peixunren").find('td').eq(1).html(resalut[0]['users']);
                $("#peixundidian").find('td').eq(1).html(resalut[0]['peixundidian']);
                $("#peixundanwei").find('td').eq(1).html(resalut[0]['peixundanwei']);
                $("#peixunxueshi").find('td').eq(1).html(resalut[0]['xueshi']);
                $("#teacher").find('td').eq(1).html(resalut[0]['teacher']);
                $("#peixuntongzhi").find('td').eq(1).html(resalut[0]['peixuntongzhi']);
                $("#peixunjihua").find('td').eq(1).html(resalut[0]['peixunjihua']);
                $("#peixunneirong").find('td').eq(1).html(resalut[0]['peixunneirong']);
                $("#zhengpeixuncreatetime").find('td').eq(1).html(resalut[0]['createtime']);
                $(".zhengpeixuncontent input[name='id']").attr('value',resalut[0]['id']);
                $("input[name='deletezhengpeixun']").attr('value',resalut[0]['id']);
                $(".zhengpeixunreb").html("");
                $.each(data,function(key,value){
                    if(key>=1){
                        $(".zhengpeixunreb").append("<p><span style='display:inline-block;padding:0 10px 0 30px;'>"+resalut[key]['name']+"</span>：<input name='"+resalut[key]['id']+"' type='text' style='height:25px;width:250px;'></p>");
                    }
                });
                
            }
        })
    });


//点击培训记录显示已经培训完成内容
    $('.show-overpeixun').click(function(){
        var a=$(this).prevAll("input[name='overpeixunid']").attr('value');
        var b=$("#overpeixunurl").attr('value');
        $.ajax({
            type: "post",
            url: b,
            data: {id: a},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                
                $(".overpeixun-title").html(resalut[0]['peixunname']);
                $("#overpeixuntime").find('td').eq(1).html(resalut[0]['begintime']+" 至 "+resalut[0]['overtime']);
                $("#overpeixuntype").find('td').eq(1).html(resalut[0]['peixuntype']);
                $("#overpeixunren").find('td').eq(1).html(resalut[0]['users']);
                $("#overpeixundidian").find('td').eq(1).html(resalut[0]['peixundidian']);
                $("#overpeixunxueshi").find('td').eq(1).html(resalut[0]['xueshi']);
                $("#overpeixundanwei").find('td').eq(1).html(resalut[0]['peixundanwei']);
                $("#overteacher").find('td').eq(1).html(resalut[0]['teacher']);
                $("#overpeixuntongzhi").find('td').eq(1).html(resalut[0]['peixuntongzhi']);
                $("#overpeixunjihua").find('td').eq(1).html(resalut[0]['peixunjihua']);
                $("#overpeixunneirong").find('td').eq(1).html(resalut[0]['peixunneirong']);
                $("#overqiandao").find('td').eq(1).html(resalut[0]['qiandao']);
                $("#overkaohejilv").find('td').eq(1).html(resalut[0]['kaohejilv']);
                $("#overkaohezongjie").find('td').eq(1).html(resalut[0]['kaohezongjie']);
                $("#overpeixuncreatetime").find('td').eq(1).html(resalut[0]['createtime']);
                $("#overpeixunendtime").find('td').eq(1).html(resalut[0]['peixunendtime']);
                $("input[name='deletepeixun']").attr('value',resalut[0]['id']);
                $(".overpeixunren").html("");
                $.each(data,function(key,value){
                    if(key>=1){
                        $(".overpeixunren").append("<p><span style='width:100px;display:inline-block;'>"+resalut[key]['name']+"</span>"+resalut[key]['zhengshu']+"</p>");
                    }
                });
                
            }
        })
    });

//点击当前培训技术人员档案
$('.showzhengpeixunren').click(function(){
        var a=$(this).prevAll("input[name='zhengpeixunrenname']").attr('value');
        var b=$("#zhengpeixunrenurl").attr('value');
        $.ajax({
            type: "post",
            url: b,
            data: {name: a},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                    console.log("111");
                });
                $(".zhengpeixunren-title").html(resalut[0]['name']);
                $(".zhengpeixun-content").html("");
                $.each(data,function (key,value){
                        $(".zhengpeixun-content").append("<hr style='width: 100%; position: relative; top:5px;'><br>");
                        $(".zhengpeixun-content").append("培训名称："+resalut[key]['peixunname']+"<br>");
                        $(".zhengpeixun-content").append("培训时间："+resalut[key]['peixuntime']+"<br>");
                        $(".zhengpeixun-content").append("培训类型："+resalut[key]['learntype']+"<br>");
                        $(".zhengpeixun-content").append("培训单位："+resalut[key]['peixundanwei']+"<br>");
                        $(".zhengpeixun-content").append("培训学时："+resalut[key]['xueshi']+"<br>");
                        $(".zhengpeixun-content").append("培训地点："+resalut[key]['peixundidian']+"<br>");
                        $(".zhengpeixun-content").append("培训教员："+resalut[key]['teacher']+"<br>");
                        $(".zhengpeixun-content").append("培训内容："+resalut[key]['peixunneirong']+"<br>");
                });
                
            }
        })
    });


//点击所有培训技术人员档案
$('.showdangan').click(function(){
        var a=$(this).prevAll("input[name='overpeixunrenid']").attr('value');
        var b=$("#overpeixunrenurl").attr('value');
        $.ajax({
            type: "post",
            url: b,
            data: {name: a},
            dataType: "json",
            success: function (data) {
                var resalut = {};
                $.each(data, function (key, value) {
                    resalut[key] = value;
                });
                $(".dangan-title").html(resalut[0]['name']+"的培训档案");
                $("#fistinfo").find('td').eq(1).html(resalut[0]['name']);
                $("input[id='danganname']").attr('value',resalut[0]['name']);
                $("#fistinfo").find('td').eq(3).html(resalut[0]['sex']);
                $("#fistinfo").find('td').eq(5).html(resalut[0]['nation']);
                $("#fistinfo").find('td').eq(7).html(resalut[0]['birthplace']);
                $("#fistinfo").find('td').eq(9).html(resalut[0]['birthday']);
                $("#fistinfo").find('td').eq(11).html(resalut[0]['worktime']);
                $("#secondinfo").find('td').eq(1).html(resalut[0]['status']);
                $("#secondinfo").find('td').eq(3).html(resalut[0]['largedegree']);
                $("#secondinfo").find('td').eq(5).html(resalut[0]['job']);
                if(resalut[0]['zhicheng'].indexOf('-')!=-1){
                    var arr = resalut[0]['zhicheng'].split('-');
                    $("#secondinfo").find('td').eq(7).html(arr[(arr.length)-1]);
                }else{
                    $("#secondinfo").find('td').eq(7).html(resalut[0]['zhicheng']);
                }
                $("#secondinfo").find('td').eq(9).html(resalut[0]['licensenumber']);
                $("#jianli").find('td').eq(0).html(resalut[0]['worktime']+"至今");
                $("#jianli").find('td').eq(1).html(resalut[0]['danwei']);
                $("#jianli").find('td').eq(2).html(resalut[0]['position']);
                $.each(data,function (key,value){
                    if(key>0&&key<4){
                        if(resalut[key].length==0){
                            $("#gangqian"+[key]).find('td').eq(0).html("");
                            $("#gangqian"+[key]).find('td').eq(1).html("");
                            $("#gangqian"+[key]).find('td').eq(2).html("");
                            $("#gangqian"+[key]).find('td').eq(3).html("");
                            $("#gangqian"+[key]).find('td').eq(4).html("");
                            $("#gangqian"+[key]).find('td').eq(5).html("");
                            $("#gangqian"+[key]).find('td').eq(6).html("");
                            $("#gangqian"+[key]).find('td').eq(7).html("");
                        }
                        $("#gangqian"+[key]).find('td').eq(0).html(resalut[key]['peixuntime']);
                        $("#gangqian"+[key]).find('td').eq(1).html(resalut[key]["peixunneirong"]);
                        $("#gangqian"+[key]).find('td').eq(2).html(resalut[key]["xueshi"]);
                        $("#gangqian"+[key]).find('td').eq(3).html(resalut[key]["teacher"]);
                        $("#gangqian"+[key]).find('td').eq(4).html(resalut[key]["peixundidian"]);
                        $("#gangqian"+[key]).find('td').eq(5).html(resalut[key]["peixundanwei"]);
                        $("#gangqian"+[key]).find('td').eq(6).html(resalut[key]["zhengshu"]);
                        $("#gangqian"+[key]).find('td').eq(7).html(resalut[key]["huode"]);
                    }
                    if(key>3){
                        if(resalut[key].length==0){
                            $("#ganghou"+[key]).find('td').eq(0).html("");
                            $("#ganghou"+[key]).find('td').eq(1).html("");
                            $("#ganghou"+[key]).find('td').eq(2).html("");
                            $("#ganghou"+[key]).find('td').eq(3).html("");
                            $("#ganghou"+[key]).find('td').eq(4).html("");
                            $("#ganghou"+[key]).find('td').eq(5).html("");
                            $("#ganghou"+[key]).find('td').eq(6).html("");
                            $("#ganghou"+[key]).find('td').eq(7).html("");
                        }
                        $("#ganghou"+[key]).find('td').eq(0).html(resalut[key]["peixuntime"]);
                        $("#ganghou"+[key]).find('td').eq(1).html(resalut[key]["peixunneirong"]);
                        $("#ganghou"+[key]).find('td').eq(2).html(resalut[key]["xueshi"]);
                        $("#ganghou"+[key]).find('td').eq(3).html(resalut[key]["teacher"]);
                        $("#ganghou"+[key]).find('td').eq(4).html(resalut[key]["peixundidian"]);
                        $("#ganghou"+[key]).find('td').eq(5).html(resalut[key]["peixundanwei"]);
                        $("#ganghou"+[key]).find('td').eq(6).html(resalut[key]["zhengshu"]);
                        $("#ganghou"+[key]).find('td').eq(7).html(resalut[key]["huode"]);
                    }
                        
                });
                
            }
        })
    });


});
