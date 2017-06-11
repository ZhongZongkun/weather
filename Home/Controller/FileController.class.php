<?php
namespace Home\Controller;
use Think\Controller;
class fileController extends CommonController {
    public function index(){
    	$file=D('file');
    	$data1['type']='g';
    	$data2['type']='z';
    	$data3['type']='w';
    	$data4['type']='q';
    	$result1=$file->where($data1)->order('time desc')->select();
    	$result2=$file->where($data2)->order('time desc')->select();
    	$result3=$file->where($data3)->order('time desc')->select();
    	$result4=$file->where($data4)->order('time desc')->select();
    	$this->assign('data1',$result1);
    	$this->assign('data2',$result2);
    	$this->assign('data3',$result3);
    	$this->assign('data4',$result4);
        $username=session('username');
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);
        $this->display();
    }

     //文件管理上传
    public function uploadfile(){
    	if(!IS_POST) halt('页面不存在');
    	$file=D('file');
        $upload= new \Think\Upload();// 实例化上传类
        $upload->maxSize  =0 ;// 设置附件上传大小
        $upload->exts  = '';// 设置附件上传类型
        $upload->saveName = '';
        $upload->subName='';
        $upload->rootPath  = './Uploads/upfile/'; // 设置附件上传根目录
        $upload->saveName='time';
        // $upload->savePath  =time(); // 设置附件上传（子）目录
        $upload->savePath  =''; // 设置附件上传（子）目录
        $info = $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
        	$data['filename']=$info['file']['name'];
        	$data['savename']=$info['file']['savename'];
        	$data['savepath']='./Uploads/upfile/';
        	$data['des']=I('param.des');
        	$data['type']=I('param.type');
        	$data['time']=time();
        	$re=$file->add($data);
        	if($re){
        		$this->success('上传成功');
        	}else{
        		$this->error('上传失败');
        	}
        }
    }//上传结束

    //文件下载
    public function download(){
        header('content-type:text/html;charset=UTF-8;');
        $id = I('id','','intval');
        $re=D('file')->find($id);
        $filename=$re['savepath'].$re['savename'];
        header('content-disposition:attachment;filename='.basename($filename));
        header('content-length:'.filesize($filename));
        readfile($filename);
    }//文件下载结束

    public function search(){
        $content=$_REQUEST['content']=trim($_REQUEST['content']);
        $key='%'.$content.'%';
        $where['filename|des'] = array('like',$key); 
        $files=D('file');
        $result=$files->where($where)->order('time desc')->select();
        if($content==null){
            $this->assign('search',null);
        }else{
            $this->assign('search',$result);
        }
        
        $this->assign('re',true);

        $file=D('file');
        $data1['type']='g';
        $data2['type']='z';
        $data3['type']='w';
        $data4['type']='q';
        $result1=$file->where($data1)->order('time desc')->select();
        $result2=$file->where($data2)->order('time desc')->select();
        $result3=$file->where($data3)->order('time desc')->select();
        $result4=$file->where($data4)->order('time desc')->select();
        $this->assign('data1',$result1);
        $this->assign('data2',$result2);
        $this->assign('data3',$result3);
        $this->assign('data4',$result4);
        $username=session('username');
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);

        $this->display('index');

    }

    //文件删除
    public function upfiledelete(){
        $id = I('id','','intval');
        $r=D('file')->find($id);
        $filename=$r['savepath'].$r['savename'];
        $shan=unlink($filename);
        if($shan){
            $re=D('file')->delete($id);
            if($re){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }else{
            $this->error('未找到要删除的文件');
        }
        
    }



}