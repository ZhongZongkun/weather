<?php
namespace Home\Controller;
use Think\Controller;
class baobiaoController extends CommonController {
    public function index(){
        $username=session('username');
       
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);
    	$reports=D('reports');
        $info1=$reports->order('name desc')->select();
        $this->assign('info1',$info1);
        $this->display();
    }

    public function addcheck(){
    	if(!IS_POST) $this->error('页面不存在');
        //var_dump($_POST);
    	$reports=D('reports');
    	$data['name']=trim(I('param.name'));
        if($data['name']==null||$data['name']==''){
            $this->error("报表名不能为空");
        }
    	$data['contacter']=I('param.contacter');
        $data['danwei']=I('param.danwei');
    	$data['date']=I('param.date');
    	$data['xunliantian']=I('param.xunliantian');
        $data['yingxiangtian']=I('param.yingxiangtian');
        $data['lixingci']=I('param.lixingci');
        $data['tesuci']=I('param.tesuci');
        $data['lixingfen']=I('param.lixingfen');
        $data['tesufen']=I('param.tesufen');
        $data['jichangfen']=I('param.jichangfen');
        $data['qushifen']=I('param.qushifen');
        $data['dikongfen']=I('param.dikongfen');
        $data['zidongci']=I('param.zidongci');
        $data['shujukuci']=I('param.shujukuci');
        $data['qixiangci']=I('param.qixiangci');
        $data['weixingci']=I('param.weixingci');
        $data['micapsci']=I('param.micapsci');
    	$data['largezhun']=I('param.largezhun');
    	$data['lowzhun']=I('param.lowzhun');
    	$data['averagezhun']=I('param.averagezhun');
    	$data['largecuo']=I('param.largecuo');
    	$data['lowcuo']=I('param.lowcuo');
    	$data['averagecuo']=I('param.averagecuo');
        $data['database']=I('param.database');
        $data['zidongguance']=I('param.zidongguance');
        $data['zidongzhan']=I('param.zidongzhan');
        $data['qiyayi']=I('param.qiyayi');
        $data['qixiang']=I('param.qixiang');
        $data['zuoce']=I('param.zuoce');
        $data['weixing']=I('param.weixing');
        $data['tianqiyuanying']=I('param.tianqiyuanying');
        $data['devicename']=I('param.devicename');
        $data['stoptime']=I('param.stoptime');
        $data['starttime']=I('param.starttime');
        $data['ways']=I('param.ways');
        $data['specialtime']=I('param.specialtime');
        $data['specialplace']=I('param.specialplace');
        $data['specialweather']=I('param.specialweather');
        $data['qixiangname']=I('param.qixiangname');
        $data['qixiangtime']=I('param.qixiangtime');
        $data['qixiangtype']=I('param.qixiangtype');
        $data['fanglei']=I('param.fanglei');
        $data['qixianglearn']=I('param.qixianglearn');
        $data['dealway']=I('param.dealway');
        $data['peoplechange']=I('param.peoplechange');
        $data['others']=I('param.others');
        $data['time']=time();

        $re=$reports->add($data);
        if($re){
            $this->success("记录添加成功");
        }else{
            $this->error("记录添加失败");
        }

    }

//用ajax显示报表
    public function ajax(){
       $a=D('reports')->where(array('id'=>I('id')))->select();
      echo json_encode($a[0]);
    }
//用ajax修改数据
    public function edit(){
        D('reports')->where(array('id'=>I('id')))->save(I('post.'))?$this->success("修改成功"):$this->error("修改失败");
    }

//月报表删除
    public function debaobiao(){
        $id=I('id');
        $re=D('reports')->delete($id);
        if($re){
            $this->success('删除报表成功');
        }else{
            $this->error('删除报表失败');
        }
    }
//导出数据到word
    public function word(){
        $id=I('id');
        $re=D('reports')->find($id);
        $header = '<html xmlns:o="urn:schemas-microsoft-com:office:office"
        xmlns:x="urn:schemas-microsoft-com:office:word"
        xmlns="http://www.w3.org/TR/REC-html40">
         
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
        <head>
            <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
            <style type="text/css">   
                .border-table {   
                    border-collapse: collapse;   
                    border: none;   
                }   
                .border-table td {   
                    border: solid #000 1px;
                    text-align:center;   
                }   
            </style> 
        </head>
        <body>';
         
        $footer = '</body></html>';
         
        //这个就是 WORD文档里面显示的内容了， 样式就按你喜欢的自己编写 TABLE就可以了。
        $content = '
        <div style="text-align:center;"> 
            <h1 style="text-align:center;">'.$re["name"].'</h1>

            <table class="border-table" style="margin:0px auto;width:700px;"> 
                <tr>
                    <td style="font-weight:bolder;">报告单位</td>
                    <td width="20%" colspan="2">'.$re["danwei"].'</td>
                    <td style="font-weight:bolder;" width="14%">联系人</td>
                    <td width="19%" colspan="2">'.$re["contacter"].'</td>
                    <td style="font-weight:bolder;" width="14%">日期</td>
                    <td colspan="2">'.$re["date"].'</td>
                </tr>
                <tr>
                    <td style="font-weight:bolder;" rowspan="4" width="4%">本月主要工作</td>
                    <td style="font-weight:bolder;" width="12%">训练飞行天数</td>
                    <td width="12%">'.$re["xunliantian"].'</td>
                    <td width="12%" style="font-weight:bolder;">影响飞行的重要气象因素及天数</td>
                    <td colspan="5" width="60%">'.$re["yingxiangtian"].'</td>
                </tr>
                <tr>
                    <td width="12%" style="font-weight:bolder;">例行观测次数</td>
                    <td width="12%">'.$re["lixingci"].'</td>
                    <td width="12%" style="font-weight:bolder;">特殊观测次数</td>
                    <td width="12%">'.$re["tesuci"].'</td>
                    <td width="12%" style="font-weight:bolder;">例行天气报告份数</td>
                    <td width="12%">'.$re["lixingfen"].'</td>
                    <td width="12%" style="font-weight:bolder;">特殊天气报告份数</td>
                    <td width="12%">'.$re["tesufen"].'</td>
                </tr>
                <tr>
                    <td width="12%" style="font-weight:bolder;">机场预报份数</td>
                    <td width="12%">'.$re["jichangfen"].'</td>
                    <td width="12%" style="font-weight:bolder;">趋势着陆预报份数</td>
                    <td width="12%">'.$re["qushifen"].'</td>
                    <td width="12%" style="font-weight:bolder;">低空重要天气预告图份数或航路预报份数</td>
                    <td width="12%">'.$re["dikongfen"].'</td>
                    <td width="12%" style="font-weight:bolder;">自观或自动站维护次数</td>
                    <td width="12%">'.$re["zidongci"].'</td>
                </tr>
                <tr>
                    <td width="12%" style="font-weight:bolder;">数据库维护次数</td>
                    <td width="12%">'.$re["shujukuci"].'</td>
                    <td width="12%" style="font-weight:bolder;">气象雷达维护次数</td>
                    <td width="12%">'.$re["qixiangci"].'</td>
                    <td width="12%" style="font-weight:bolder;">卫星云图维护次数</td>
                    <td width="12%">'.$re["weixingci"].'</td>
                    <td width="12%" style="font-weight:bolder;">Micaps维护次数</td>
                    <td width="12%">'.$re["micapsci"].'</td>
                </tr>
                <tr>
                    <td rowspan="16" style="font-weight:bolder;" width="4%">安全运行</td>
                    <td colspan="2" style="font-weight:bolder;">预报准确率</td>
                    <td style="font-weight:bolder;">最高</td>
                    <td>'.$re["largezhun"].'</td>
                    <td style="font-weight:bolder;">最低</td>
                    <td>'.$re["lowzhun"].'</td>
                    <td style="font-weight:bolder;">平均</td>
                    <td>'.$re["averagezhun"].'</td>
                </tr>
                <tr>
                    <td style="font-weight:bolder;" colspan="2">观测错情率</td>
                    <td style="font-weight:bolder;">最高</td>
                    <td>'.$re["largecuo"].'</td>
                    <td style="font-weight:bolder;">最低</td>
                    <td>'.$re["lowcuo"].'</td>
                    <td style="font-weight:bolder;">平均</td>
                    <td>'.$re["averagecuo"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">数据库系统运行正常率</td>
                    <td colspan="6">'.$re["database"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">自动观测系统运行正常率</td>
                    <td colspan="2">'.$re["zidongguance"].'</td>
                    <td colspan="2"  style="font-weight:bolder;" rowspan="4">左侧四项重要气象设备平均正常率</td>
                    <td colspan="2" rowspan="4">'.$re["zuoce"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">自动站运行正常率</td>
                    <td colspan="2">'.$re["zidongzhan"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">气压仪正常率</td>
                    <td colspan="2">'.$re["qiyayi"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">气象雷达运行正常率</td>
                    <td colspan="2">'.$re["qixiang"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">卫星云图接收正常率</td>
                    <td colspan="6">'.$re["weixing"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">因天气原因造成飞机延误、返航、备降、取消架次</td>
                    <td colspan="6">'.$re["tianqiyuanying"].'</td>
                </tr>
                <tr>
                    <td rowspan="4" style="font-weight:bolder;" colspan="2">气象设备因故障或升级改造等原因停止运行和恢复运行情况</td>
                    <td colspan="2" style="font-weight:bolder;">设备名称</td>
                    <td colspan="4">'.$re["devicename"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">停机时间</td>
                    <td colspan="4">'.$re["stoptime"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">恢复时间</td>
                    <td colspan="4">'.$re["starttime"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">停机期间解决办法</td>
                    <td colspan="4">'.$re["ways"].'</td>
                </tr>
                <tr>
                    <td rowspan="3" colspan="2"  style="font-weight:bolder;">航空器特殊空中报告情况</td>
                    <td colspan="2" style="font-weight:bolder;">时间</td>
                    <td colspan="4">'.$re["specialtime"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">地点</td>
                    <td colspan="4">'.$re["specialplace"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">天气现象</td>
                    <td colspan="4">'.$re["specialweather"].'</td>
                </tr>
                <tr>
                    <td rowspan="7" style="font-weight:bolder;">业务管理</td>
                    <td rowspan="3" colspan="2"  style="font-weight:bolder;">航空器特殊空中报告情况</td>
                    <td colspan="2" style="font-weight:bolder;">名称</td>
                    <td colspan="4">'.$re["qixiangname"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">时间</td>
                    <td colspan="4">'.$re["qixiangtime"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">类型（新建、升级、报废、开放和计量）</td>
                    <td colspan="4">'.$re["qixiangtype"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">对气象设备防雷接地进行检查和整改情况</td>
                    <td colspan="6">'.$re["fanglei"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">气象培训情况</td>
                    <td colspan="6">'.$re["qixianglearn"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">出现气象差错和严重差错的情况及处理意见</td>
                    <td colspan="6">'.$re["dealway"].'</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-weight:bolder;">人员变动的情况</td>
                    <td colspan="6">'.$re["peoplechange"].'</td>
                </tr>
                <tr>
                    <td style="font-weight:bolder;">其它</td>
                    <td colspan="8">'.$re["others"].'</td>
                </tr>
            </table> 
        </div>
        ';
         
        //文件下载
        $this->download($re["name"].".doc", $header.$content.$footer);
         
        //如果想直接保存到服务器的话 
        // file_put_contents('test.doc',$header.$content.$footer); 
    }
    //文件下载函数
    public function download($showname, $content) {
     
       if(strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
            $showname = rawurlencode($showname);
            $showname = preg_replace('/\./', '%2e', $showname, substr_count($showname, '.') - 1);
        }
     
        header("Cache-Control: "); 
        header("Pragma: "); 
        header("Content-Type: application/octet-stream"); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
     
        header("Content-Length: " .(string)(strlen($content))); 
        header('Content-Disposition: attachment; filename="'.$showname.'"'); 
        header("Content-Transfer-Encoding: binary\n"); 
     
        echo $content;
     
        exit();
    }



}