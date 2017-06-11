<?php
namespace Home\Controller;
use Think\Controller;
class EquipController extends CommonController {

    public function index(){
        $username=session('username');
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);
        $devicelist=D('devicemanager');
        $info1=$devicelist->order('devicetype')->select();
        $ondevicelist=D('ondevice');
        $info2=$ondevicelist->select();
        $sparedevicelist=D('sparedevice');
        $info3=$sparedevicelist->select();
        $baofeidevicelist=D('baofeidevice');
        $info4=$baofeidevicelist->select();
        $this->assign('info1',$info1);
        $this->assign('info2',$info2);
        $this->assign('info3',$info3);
        $this->assign('info4',$info4);
        $this->display();
    }

    //基本设备添加
    public function jibenhandle(){
        if(!IS_POST) halt('页面不存在');

        $devicemanager=D('devicemanager');

        $data['danwei']=I('param.danwei');
        $data['devicetype']=I('param.devicetype');
        $data['device']=I('param.device');
        $data['number']=I('param.number');
        $data['begintime']=I('param.begintime');
        $data['workyear']=I('param.workyear');
        $data['changjia']=I('param.changjia');
        $data['devicenumber']=I('param.devicenumber');
        $data['install']=I('param.install');
        $data['fit']=I('param.fit');
        $data['add']=I('param.add');
        $data['workstatus']=I('param.workstatus');
        $data['check']=I('param.check');
        $data['others']=I('param.others');

        $re=$devicemanager->add($data);
        if($re){
            $this->success("记录添加成功");
        }else{
            $this->error("记录添加失败");
        }
    }
    //设备备件添加
    public function beijianhandle(){
        if(!IS_POST) halt('页面不存在');

        $sparedevice=D('sparedevice');

        $data['danwei']=I('param.danwei');
        $data['device']=I('param.device');
        $data['device']=I('param.device');
        $data['number']=I('param.number');
        $data['buytime']=I('param.buytime');
        $data['changjia']=I('param.changjia');
        $data['devicenumber']=I('param.devicenumber');
        $data['status']=I('param.status');
        $data['money']=I('param.money');
        $data['others']=I('param.others');

        $re=$sparedevice->add($data);
        if($re){
            $this->success("记录添加成功");
        }else{
            $this->error("记录添加失败");
        }
    }

    //在建设备添加
    public function onhandle(){
        if(!IS_POST) halt('页面不存在');
        $ondevice=M('ondevice');
        $upload= new \Think\Upload();// 实例化上传类
        $upload->maxSize  =0 ;// 设置附件上传大小
        $upload->allowExts  = '';// 设置附件上传类型
        $upload->saveName = '';
        $upload->rootPath  =      './Uploads/ondevices/'; // 设置附件上传根目录
        //$upload->subName=time();
        // $upload->savePath  =time(); // 设置附件上传（子）目录
        $upload->savePath  =''; // 设置附件上传（子）目录
        $info = $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //var_dump($info);
            //var_dump($info['lxfile']['savename']);
            $data['danwei']=I('param.danwei');
            $data['devicename']=I('param.device');
            $data['number']=I('param.number');
            $data['changjia']=I('param.changjia');
            $data['devicenumber']=I('param.devicenumber');
            $data['lxtime']=I('param.lxtime');
            $data['httime']=I('param.httime');
            $data['installtime']=I('param.installtime');
            $data['ystime']=I('param.ystime');
            $data['others']=I('param.others');
            $data['lxname']=$info['lxfile']['savename'];
            $data['lxpath']=$info['lxfile']['savepath'];
            $data['htname']=$info['htfile']['savename'];
            $data['htpath']=$info['htfile']['savepath'];
            $data['ysname']=$info['ysfile']['savename'];
            $data['yspath']=$info['ysfile']['savepath'];
            $re=$ondevice->add($data);
            if($re){
            $this->success("记录添加成功");
            }else{
                $this->error("记录添加失败");
            }
            
        }
        //var_dump($_POST);
    }
    //立项文件下载
    public function lxdownload(){
        header('content-type:text/html;charset=UTF-8;');
        $id = I('id','','intval');
        $re=M('ondevice')->find($id);
        $filename="./Uploads/ondevices/".$re['lxpath'].$re['lxname'];
        // var_dump($re);
        // die;
        // $filename=$_GET['filename'];
        header('content-disposition:attachment;filename='.basename($filename));
        header('content-length:'.filesize($filename));
        readfile($filename);
    }
    //合同文件下载
    public function htdownload(){
        header('content-type:text/html;charset=UTF-8;');
        $id = I('id','','intval');
        $re=M('ondevice')->find($id);
        $filename="./Uploads/ondevices/".$re['htpath'].$re['htname'];
        // var_dump($re);
        // die;
        // $filename=$_GET['filename'];
        header('content-disposition:attachment;filename='.basename($filename));
        header('content-length:'.filesize($filename));
        readfile($filename);
    }
    //验收文件下载
    public function ysdownload(){
        header('content-type:text/html;charset=UTF-8;');
        $id = I('id','','intval');
        $re=M('ondevice')->find($id);
        $filename="./Uploads/ondevices/".$re['yspath'].$re['ysname'];
        // var_dump($re);
        // die;
        // $filename=$_GET['filename'];
        header('content-disposition:attachment;filename='.basename($filename));
        header('content-length:'.filesize($filename));
        readfile($filename);
    }


    //基本设备删除加入到报废设备
    public function baofeiadd(){
        $id = I('id','','intval');
        $devicemanager=D('devicemanager');
        $r=$devicemanager->find($id);
        $e=D('baofeidevice')->add($r);
        if($e){
            $re=$devicemanager->delete($id);
            if($re){
                $this->success("删除记录成功");
            }else{
                $this->error("删除记录失败");
            }
        }
        
    }
    //在建设备删除
    public function ondevicedelete(){
        $id = I('id','','intval');
        $ondevice=D('ondevice');
        $re=$ondevice->find($id);
        $r=true;
        if($re['lxpath']!=null){
            if( is_dir("./Uploads/ondevices/".$re['lxpath']) ){
                $r=false;
                $r=$this->deletedir("./Uploads/ondevices/".$re['lxpath']);
            }
            
        }
        if($re['htpath']!=null){
            if( is_dir("./Uploads/ondevices/".$re['htpath']) ){
                $r=false;
                $r=$this->deletedir("./Uploads/ondevices/".$re['htpath']);
            }
        }
        if($re['yspath']!=null){
            if( is_dir("./Uploads/ondevices/".$re['htpath']) ){
                $r=false;
                $r=$this->deletedir("./Uploads/ondevices/".$re['htpath']);
            }
        }
        //$r=$this->deletedir("./Uploads/ondevices/".$re['lxpath']);
        if($r){
            $er=$ondevice->delete($id);
            if($er){
                $this->success("删除记录成功");
            }else{
                $this->success("删除记录失败");
            }
        }else{
            $this->error("删除记录失败");
        }
    }
    //设备备件删除
    public function beijiandelete(){
        $id = I('id','','intval');
        $sparedevice=D('sparedevice');
        $re=$sparedevice->delete($id);
        if($re){
            $this->success("删除记录成功");
        }else{
            $this->error("删除记录失败");
        }
    }

    //报废设备删除
    public function baofeidelete(){
        $id = I('id','','intval');
        $baofeidevice=D('baofeidevice');
        $re=$baofeidevice->delete($id);
        if($re){
            $this->success("删除记录成功");
        }else{
            $this->error("删除记录失败");
        }
    }



    //ajax修改
    public function update(){
        $id=I('id');
        $b=I('b');
        $table='';
        switch ($b){
            case('item1') : $table='devicemanager';break;
            case('item2') : $table='ondevice';break;
            case('item3') : $table='sparedevice';break;
        }
        $result=D($table)->where(array('id'=>$id))->select();
        $this->ajaxreturn($result);
    }

    public function updatehandle(){
        if(!IS_POST) halt('页面不存在');
        if(I('form')=='devicemanager'){
            $data['danwei']=I('danwei');
            $data['devicetype']=I('devicetype');
            $data['device']=I('device');
            $data['number']=I('number');
            $data['begintime']=I('begintime');
            $data['workyear']=I('workyear');
            $data['changjia']=I('changjia');
            $data['devicenumber']=I('devicenumber');
            $data['install']=I('install');
            $data['fit']=I('fit');
            $data['add']=I('add');
            $data['workstatus']=I('workstatus');
            $data['check']=I('check');
            $data['others']=I('others');
            D(I('form'))->where(array('id'=>I('id')))->save($data)?$this->success("记录修改成功"):$this->error("记录修改失败");
        }elseif(I('form')=='ondevice'){


            if(!IS_POST) halt('页面不存在');
            $ondevice=M('ondevice');
            $id=I('id');
            $yuan=$ondevice->find($id);
            $upload= new \Think\Upload();// 实例化上传类
            $upload->maxSize  =0 ;// 设置附件上传大小
            $upload->allowExts  = '';// 设置附件上传类型
            $upload->saveName = '';
            $upload->rootPath  =      './Uploads/ondevices/'; // 设置附件上传根目录
            //$upload->subName='';
            //$str=$yuan['lxpath'];
            //$newstr = substr($str,0,strlen($str)-1); 
            $upload->savePath  =''; // 设置附件上传（子）目录
            $info = $upload->upload();

            $id=I('id');
            $yuan=$ondevice->find($id);
                $data['danwei']=I('param.danwei');
                $data['devicename']=I('param.device');
                $data['number']=I('param.number');
                $data['changjia']=I('param.changjia');
                $data['devicenumber']=I('param.devicenumber');
                $data['lxtime']=I('param.lxtime');
                $data['httime']=I('param.httime');
                $data['installtime']=I('param.installtime');
                $data['ystime']=I('param.ystime');
                $data['others']=I('param.others');
                //未找到新上传立项的附件就使用原纪录中的附件
                if($info['lxfile']==null){
                    $data['lxname']=$yuan['lxname'];
                    $data['lxpath']=$yuan['lxpath'];
                }else{
                    unlink('./Uploads/ondevices/'.$yuan['lxpath'].$yuan['lxname']);

                    $kong=$this->dir_is_empty('./Uploads/ondevices/'.$yuan['lxpath']);//判断删除原文件后文件夹是否为空
                    if($kong){
                        //如果为空就删除该文件夹
                        rmdir('./Uploads/ondevices/'.$yuan['lxpath']);
                    }
                    $data['lxname']=$info['lxfile']['savename'];
                    $data['lxpath']=$info['lxfile']['savepath'];
                }
                //未找到新上传合同的附件就使用原纪录中的附件
                if($info['htfile']==null){
                    $data['htname']=$yuan['htname'];
                    $data['htpath']=$yuan['htpath'];
                }else{
                    unlink('./Uploads/ondevices/'.$yuan['htpath'].$yuan['htname']);
                    $kong=$this->dir_is_empty('./Uploads/ondevices/'.$yuan['htpath']);//判断删除原文件后文件夹是否为空
                    if($kong){
                        //如果为空就删除该文件夹
                        rmdir('./Uploads/ondevices/'.$yuan['htpath']);
                    }
                    $data['htname']=$info['htfile']['savename'];
                    $data['htpath']=$info['htfile']['savepath'];
                }
                //未找到新上传验收的附件就使用原纪录中的附件
                if($info['ysfile']==null){
                    $data['ysname']=$yuan['ysname'];
                    $data['yspath']=$yuan['yspath'];
                }else{
                    unlink('./Uploads/ondevices/'.$yuan['yspath'].$yuan['ysname']);
                    $kong=$this->dir_is_empty('./Uploads/ondevices/'.$yuan['yspath']);//判断删除原文件后文件夹是否为空
                    if($kong){
                        //如果为空就删除该文件夹
                        rmdir('./Uploads/ondevices/'.$yuan['yspath']);
                    }
                    $data['ysname']=$info['ysfile']['savename'];
                    $data['yspath']=$info['ysfile']['savepath'];
                }
                $re=$ondevice->where(array('id'=>I('id')))->save($data);
                if($re){
                    $this->success("记录修改成功");
                }else{
                    $this->error("记录修改失败");
                }

        }elseif(I('form')=='sparedevice'){
            if(!IS_POST) halt('页面不存在');

            $sparedevice=D('sparedevice');

            $data['danwei']=I('danwei');
            $data['devicename']=I('devicetype');
            $data['number']=I('number');
            $data['buytime']=I('buytime');
            $data['changjia']=I('changjia');
            $data['devicenumber']=I('devicenumber');
            $data['status']=I('status');
            $data['money']=I('money');
            $data['others']=I('others');

            $re=$sparedevice->where(array('id'=>I('id')))->save($data);
            if($re){
                $this->success("记录修改成功");
            }else{
                $this->error("记录修改失败");
            }

        }

    }

    //删除文件夹下的所有文件
    public function deletedir($dir) {
          //先删除目录下的文件：
          $dh=opendir($dir);
          while ($file=readdir($dh)) {
            if($file!="." && $file!="..") {
              $fullpath=$dir."/".$file;
              if(!is_dir($fullpath)) {
                  unlink($fullpath);
              } else {
                  $this->deletedir($fullpath);
              }
            }
          }
         
          closedir($dh);
          //删除当前文件夹：
          if(rmdir($dir)) {
            return true;
          } else {
            return false;
          }
    }//删除文件夹方法结束
    //判断文件夹是否为空
    public function dir_is_empty($dir){
     if($handle = opendir($dir)){
       while($item = readdir($handle)){
          if ($item != "." && $item != "..")
             return false;
            }
        }
        return true;
    }
   
}