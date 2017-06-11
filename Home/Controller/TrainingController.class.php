<?php
namespace Home\Controller;
use Think\Controller;
class TrainingController extends CommonController {
    public function index(){
        $username=session('username');
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);
        $a=D('peoplemanager')->field('danwei')->select();
        //$b=[];
        foreach($a as $k => $v){
            $b[]=$v['danwei'];
        }
        //显示正在培训记录
        $zhengpeixun=M('learn')->where(array('over'=>0))->order('createtime')->select();
        $this->assign('zhengpeixun',$zhengpeixun);
        //现在培训完成记录
        $overpeixun=M('learn')->where(array('over'=>1))->order('createtime')->select();
        $this->assign('overpeixun',$overpeixun);
        //查询正在培训人员的记录
        $zhengpeixunren=M('peixun')->distinct(true)->field('name')->where(array('over'=>0))->select();
        $this->assign("zhengpeixunren",$zhengpeixunren);
        //查询所有人员的培训记录
        $overpeixunren=M('peixun')->distinct(true)->field('name')->where(array('over'=>1))->select();
        $this->assign("overpeixunren",$overpeixunren);

        //查询所有单位
        $c=array_unique($b);
        $this->assign('info',$c);
        //显示模版
		$this->display();
    }
//显示正在培训的信息
    public function morezhengpeixun(){
        $peoples=D('learn');
        $people=$peoples->where(array('id'=>I('id')))->select();
        $user=M('peixun')->where(array('peixunid'=>I('id')))->select();
        $people=array_merge($people,$user);
        $this->ajaxreturn($people);
    }
//显示正在培训的信息
    public function moreoverpeixun(){
        $peoples=D('learn');
        $people=$peoples->where(array('id'=>I('id')))->select();
        $user=M('peixun')->where(array('peixunid'=>I('id')))->select();
        $people=array_merge($people,$user);
        $this->ajaxreturn($people);
    }
//显示正在培训人的信息
    public function morezhengpeixunren(){
        $peoples=D('peixun');
        $people=$peoples->where(array('name'=>I('name'),'over'=>0))->select();
        $this->ajaxreturn($people);
    }

//显示正在档案的信息
    public function moreoverpeixunren(){
        $peoples=D('peoplemanager');
        $people=$peoples->where(array('name'=>I('name')))->order('id desc')->limit(1)->select();
        $user1=M('peixun')->where(array('name'=>I('name'),'over'=>1,'learntype'=>"岗前"))->order('id')->limit(3)->select();
        switch (count($user1)) {
            case 0:
                $user1=array(
                    array(),
                    array(),
                    array()
                    );
                break;
            case 1:
                $arr=array(
                    array(),
                    array()
                    );
                $user1=array_merge($user1,$arr);
                break;
            case 2:
                $arr=array(
                    array()
                    );
                $user1=array_merge($user1,$arr);
                break;
        }
        $user2=M('peixun')->where(array('name'=>I('name'),'over'=>1,'learntype'=>"岗后"))->order('id')->limit(9)->select();
        $arr;
        switch (count($user2)) {
            case 0:
                $arr=array(
                    array(),
                    array(),
                    array(),
                    array(),
                    array(),
                    array(),
                    array(),
                    array()
                    );
                break;
            case 1:
                $arr=array(
                    array(),
                    array(),
                    array(),
                    array(),
                    array(),
                    array(),
                    array()
                    );
                
                break;
            case 2:
                $arr=array(
                    array(),
                    array(),
                    array(),
                    array(),
                    array(),
                    array()
                    );
                break;
            case 3:
                $arr=array(
                    array(),
                    array(),
                    array(),
                    array(),
                    array()
                    );
                break;
            case 4:
                $arr=array(
                    array(),
                    array(),
                    array(),
                    array()
                    );
                break;
            case 5:
                $arr=array(
                    array(),
                    array(),
                    array()
                    );
                break;
            case 6:
                $arr=array(
                    array(),
                    array()
                    );
                break;
            case 7:
                $arr=array(
                    array()
                    );
                break;
        }
        $user2=array_merge($user2,$arr);
        $people=array_merge($people,$user1);
        $people=array_merge($people,$user2);

        // var_dump($people);
        // die;

        $this->ajaxreturn($people);
    }

//培训创建
    public function createpeixun(){
        if(!IS_POST){
            $this->error('页面不存在');
        }
        $data['peixuntype']=I('peixuntype');
        $data['users']=I('users');
        $data['begintime']=I('begintime');
        $data['overtime']=I('overtime');
        $data['peixundidian']=I('peixundidian');
        $data['peixunname']=I('peixunname');
        $data['peixundanwei']=I('peixundanwei');
        $data['teacher']=I('teacher');
        $data['peixuntongzhi']=I('peixuntongzhi');
        $data['peixunneirong']=I('peixunneirong');
        $data['peixunjihua']=I('peixunjihua');
        $data['xueshi']=I('xueshi');
        $data['over']=0;
        $data['createtime']=date('Y-m-d H:i:s',time());

        $learn=M('learn');
        $re=$learn->add($data);//将培训记录插入到learn表
        if($re){
            //往peixun表中插入个人的培训信息
            $userarr=explode(" ",trim(I('users')));
            for($i=0;$i<count($userarr);$i++){
                $peixun['name']=$userarr[$i];
                $peixun['peixunid']=$re;
                $peixun['peixunname']=I('peixunname');
                $peixun['learntype']=I('peixuntype');
                $peixun['peixunneirong']=I('peixunneirong');
                $peixun['teacher']=I('teacher');
                $peixun['peixundidian']=I('peixundidian');
                $peixun['peixundanwei']=I('peixundanwei');
                $peixun['xueshi']=I('xueshi');
                $peixun['over']=0;
                $peixun['peixuntime']=(string)(I('begintime'))." 至 ".(string)(I('overtime'));
                $r=M('peixun')->add($peixun);   
            }

            if($r){
                    $this->success('培训创建成功');
                }else{
                    M('learn')->where(array('peixunid'=>$re))->delete();
                    M('learn')->delete($re);
                    $this->error('培训创建失败');
                }

        }else{
            $this->error('培训创建失败');
        }
    }
    //培训创建结束


    //培训结束记录证书编号等
    public function peixunover(){
        if(!IS_POST) $this->error('结束失败');
        $learn=M('learn');
        $peixun=M('peixun');

        $l['qiandao']=I('qiandao');
        $l['id']=I('id');
        $l['kaohejilv']=I('kaohejilv');
        $l['kaohezongjie']=I('kaohezongjie');
        $l['over']=1;
        $l['peixunendtime']=date('Y-m-d h:i:s',time());

        $pid=I('id');
        $uidarr=$peixun->field('id')->where(array('peixunid'=>$pid))->select();
        //var_dump($uidarr);
        $time=date('Y-m-d',time());
        //插入证书编号信息
        for($i=0;$i<count($uidarr);$i++){
            $p['id']=$uidarr[$i]['id'];
            $p['zhengshu']=I($p['id']);
            $p['huode']=$time;
            $p['over']=1;
            $peixun->save($p);
        }
        $re=$learn->save($l);
        if($re){
            $this->success('结束培训成功');
        }else{
            $this->error('结束培训失败');
        }
        
        //var_dump(I('post.'));
    }

    //记录证书编号结束



    public function handle(){
        var_dump(I('post.'));

    }

    public function get_job(){
        $a=D('peoplemanager')->field('job')->where(array('danwei'=>I('danwei')))->select();
        //$b=[];
        foreach($a as $k => $v){
            $b[]=$v['job'];
        }
        $c=array_unique($b);
        echo json_encode($c);

    }

    public function get_people(){
        $a=D('peoplemanager')->where(array('danwei'=>I('danwei'),'job'=>I('job')))->field('name')->select();
        echo json_encode($a);

    }

//删除正在培训记录
    public function dezhengpeixun(){
        if(!IS_POST) $this->error('页面不存在');
        $id=I('deletezhengpeixun');
        $del=M('learn')->delete($id);
        $dep=M('peixun')->where(array('peixunid'=>$id))->delete();
        if($del&&$dep){
            $this->success('删除此培训成功');
        }else{
            $this->error('删除培训失败');
        }
    }
//删除已经培训完成的记录
    public function depeixun(){
        if(!IS_POST) $this->error('页面不存在');
        $id=I('deletepeixun');
        $del=M('learn')->delete($id);
        $dep=M('peixun')->where(array('peixunid'=>$id))->delete();
        if($del&&$dep){
            $this->success('删除此培训成功');
        }else{
            $this->error('删除培训失败');
        }
    }

//培训档案下载
    public function download(){
        if(!IS_POST) $this->error('页面不存在');

        $people=M('peoplemanager')->where(array('name'=>I('dangan')))->order('id desc')->find();
        $arr=explode("-", $people['zhicheng']);
        $people['zhicheng']=$arr[count($arr)-1];

        $user1=M('peixun')->where(array('name'=>I('dangan'),'over'=>1,'learntype'=>"岗前"))->order('id')->limit(3)->select();
        $user2=M('peixun')->where(array('name'=>I('dangan'),'over'=>1,'learntype'=>"岗后"))->order('id')->limit(9)->select();

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
                    font-size:18px;   
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
            <h4 style="text-align:center;font-size:26px;">专业技术人员培训档案</h4>
            <br/>
                                        <table class="border-table" style="margin:0px auto;width:700px;">
                                                <tr>
                                                    <td style="font-weight:bold;">姓名</td>
                                                    <td>'.$people["name"].'</td>
                                                    <td style="font-weight:bold;">性别</td>
                                                    <td>'.$people["sex"].'</td>
                                                    <td style="font-weight:bold;">民族</td>
                                                    <td>'.$people["nation"].'</td>
                                                    <td style="font-weight:bold;">籍贯</td>
                                                    <td>'.$people["birthplace"].'</td>
                                                    <td style="font-weight:bold;">出生年月</td>
                                                    <td>'.$people["birthday"].'</td>
                                                    <td style="font-weight:bold;">参加工作时间</td>
                                                    <td>'.$people["worktime"].'</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold;">政治面貌</td>
                                                    <td>'.$people["status"].'</td>
                                                    <td style="font-weight:bold;">学历</td>
                                                    <td>'.$people["largedegree"].'</td>
                                                    <td style="font-weight:bold;">岗位</td>
                                                    <td>'.$people["job"].'</td>
                                                    <td style="font-weight:bold;">职（务）称</td>
                                                    <td>'.$people["zhicheng"].'</td>
                                                    <td style="font-weight:bold;">执照/上岗证</td>
                                                    <td colspan="3">'.$people["licensenumber"].'</td>
                                                </tr>
                                                <tr >
                                                    <td rowspan="4" style="line-height:25px;font-weight:bold;">简   历</td>
                                                    <td colspan="4" style="font-weight:bold;">起止时间</td>
                                                    <td colspan="6" style="font-weight:bold;">工作单位</td>
                                                    <td style="font-weight:bold;">职务</td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td colspan="4">'.$people["worktime"].'至今</td>
                                                    <td colspan="6">'.$people["danwei"].'</td>
                                                    <td>'.$people["position"].'</td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td colspan="4"></td>
                                                    <td colspan="6"></td>
                                                    <td></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td colspan="4"></td>
                                                    <td colspan="6"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="4" style="line-height:25px;font-weight:bold;">岗前培训记录</td>
                                                    <td style="font-weight:bold;">培训时间</td>
                                                    <td colspan="4" style="font-weight:bold;">培训内容</td>
                                                    <td style="font-weight:bold;">学时</td>
                                                    <td style="font-weight:bold;">教员</td>
                                                    <td style="font-weight:bold;">地点</td>
                                                    <td style="font-weight:bold;">培训单位</td>
                                                    <td style="font-weight:bold;">证书编号</td>
                                                    <td style="font-weight:bold;">获得日期</td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td>'.$user1[0]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user1[0]["peixunneirong"].'</td>
                                                    <td>'.$user1[0]["xueshi"].'</td>
                                                    <td>'.$user1[0]["teacher"].'</td>
                                                    <td>'.$user1[0]["peixundidian"].'</td>
                                                    <td>'.$user1[0]["peixundanwei"].'</td>
                                                    <td>'.$user1[0]["zhengshu"].'</td>
                                                    <td>'.$user1[0]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user1[1]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user1[1]["peixunneirong"].'</td>
                                                    <td>'.$user1[1]["xueshi"].'</td>
                                                    <td>'.$user1[1]["teacher"].'</td>
                                                    <td>'.$user1[1]["peixundidian"].'</td>
                                                    <td>'.$user1[1]["peixundanwei"].'</td>
                                                    <td>'.$user1[1]["zhengshu"].'</td>
                                                    <td>'.$user1[1]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user1[2]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user1[2]["peixunneirong"].'</td>
                                                    <td>'.$user1[2]["xueshi"].'</td>
                                                    <td>'.$user1[2]["teacher"].'</td>
                                                    <td>'.$user1[2]["peixundidian"].'</td>
                                                    <td>'.$user1[2]["peixundanwei"].'</td>
                                                    <td>'.$user1[2]["zhengshu"].'</td>
                                                    <td>'.$user1[2]["huode"].'</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="9" style="font-weight:bold;">岗位培训记录</td>
                                                    <td style="font-weight:bold;">培训时间</td>
                                                    <td style="font-weight:bold;" colspan="4">培训内容</td>
                                                    <td style="font-weight:bold;">学时</td>
                                                    <td style="font-weight:bold;">教员</td>
                                                    <td style="font-weight:bold;">地点</td>
                                                    <td style="font-weight:bold;">培训单位</td>
                                                    <td style="font-weight:bold;">证书编号</td>
                                                    <td style="font-weight:bold;">获得日期</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[0]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[0]["peixunneirong"].'</td>
                                                    <td>'.$user2[0]["xueshi"].'</td>
                                                    <td>'.$user2[0]["teacher"].'</td>
                                                    <td>'.$user2[0]["peixundidian"].'</td>
                                                    <td>'.$user2[0]["peixundanwei"].'</td>
                                                    <td>'.$user2[0]["zhengshu"].'</td>
                                                    <td>'.$user2[0]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[1]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[1]["peixunneirong"].'</td>
                                                    <td>'.$user2[1]["xueshi"].'</td>
                                                    <td>'.$user2[1]["teacher"].'</td>
                                                    <td>'.$user2[1]["peixundidian"].'</td>
                                                    <td>'.$user2[1]["peixundanwei"].'</td>
                                                    <td>'.$user2[1]["zhengshu"].'</td>
                                                    <td>'.$user2[1]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[2]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[2]["peixunneirong"].'</td>
                                                    <td>'.$user2[2]["xueshi"].'</td>
                                                    <td>'.$user2[2]["teacher"].'</td>
                                                    <td>'.$user2[2]["peixundidian"].'</td>
                                                    <td>'.$user2[2]["peixundanwei"].'</td>
                                                    <td>'.$user2[2]["zhengshu"].'</td>
                                                    <td>'.$user2[2]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[3]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[3]["peixunneirong"].'</td>
                                                    <td>'.$user2[3]["xueshi"].'</td>
                                                    <td>'.$user2[3]["teacher"].'</td>
                                                    <td>'.$user2[3]["peixundidian"].'</td>
                                                    <td>'.$user2[3]["peixundanwei"].'</td>
                                                    <td>'.$user2[3]["zhengshu"].'</td>
                                                    <td>'.$user2[3]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[4]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[4]["peixunneirong"].'</td>
                                                    <td>'.$user2[4]["xueshi"].'</td>
                                                    <td>'.$user2[4]["teacher"].'</td>
                                                    <td>'.$user2[4]["peixundidian"].'</td>
                                                    <td>'.$user2[4]["peixundanwei"].'</td>
                                                    <td>'.$user2[4]["zhengshu"].'</td>
                                                    <td>'.$user2[4]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[5]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[5]["peixunneirong"].'</td>
                                                    <td>'.$user2[5]["xueshi"].'</td>
                                                    <td>'.$user2[5]["teacher"].'</td>
                                                    <td>'.$user2[5]["peixundidian"].'</td>
                                                    <td>'.$user2[5]["peixundanwei"].'</td>
                                                    <td>'.$user2[5]["zhengshu"].'</td>
                                                    <td>'.$user2[5]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[6]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[6]["peixunneirong"].'</td>
                                                    <td>'.$user2[6]["xueshi"].'</td>
                                                    <td>'.$user2[6]["teacher"].'</td>
                                                    <td>'.$user2[6]["peixundidian"].'</td>
                                                    <td>'.$user2[6]["peixundanwei"].'</td>
                                                    <td>'.$user2[6]["zhengshu"].'</td>
                                                    <td>'.$user2[6]["huode"].'</td>
                                                </tr>
                                                <tr style="height:30px;" >
                                                    <td>'.$user2[7]["peixuntime"].'</td>
                                                    <td colspan="4">'.$user2[7]["peixunneirong"].'</td>
                                                    <td>'.$user2[7]["xueshi"].'</td>
                                                    <td>'.$user2[7]["teacher"].'</td>
                                                    <td>'.$user2[7]["peixundidian"].'</td>
                                                    <td>'.$user2[7]["peixundanwei"].'</td>
                                                    <td>'.$user2[7]["zhengshu"].'</td>
                                                    <td>'.$user2[7]["huode"].'</td>
                                                </tr>
                                        </table>

        </div>';
        //文件下载
        $this->downloadfile("专业技术人员".$people["name"]."培训档案表.doc", $header.$content.$footer);
    }
//文件下载函数
    public function downloadfile($showname, $content) {
     
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