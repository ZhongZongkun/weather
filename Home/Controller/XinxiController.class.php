<?php
namespace Home\Controller;
use Think\Controller;
class XinxiController extends CommonController {
    public function index(){
    	$share=D('share');
    	$result=$share->order('time desc')->select();
    	$this->assign('data',$result);
        $username=session('username');
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);
        $this->display();
    }

      //文件上传检查
    public function addcheck(){
    	if(!IS_POST) halt('页面不存在');
    	$share=D('share');
        $upload= new \Think\Upload();// 实例化上传类
        $upload->maxSize  =0 ;// 设置附件上传大小
        $upload->exts  = array('word', 'doc','docx','pptx','ppt', 'xls','xlsx','pdf');// 设置附件上传类型
        $upload->saveName = '';
        $upload->subName='';
        $upload->rootPath  = './Uploads/files/'; // 设置附件上传根目录
        $upload->saveName='time';
        // $upload->savePath  =time(); // 设置附件上传（子）目录
        $upload->savePath  =''; // 设置附件上传（子）目录
        $info = $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
        	$data['name']=$info['file']['name'];
        	$data['savename']=$info['file']['savename'];
        	$data['savepath']='./Uploads/files/';
        	$data['ext']=$info['file']['ext'];
        	$data['time']=time();
        	$re=$share->add($data);
        	if($re){
        		$this->success('上传成功');
        	}else{
        		$this->error('上传失败');
        	}
        }

    }

     //文件下载
    public function download(){
        header('content-type:text/html;charset=UTF-8;');
        $id = I('id','','intval');
        $re=D('share')->find($id);
        $filename=$re['savepath'].$re['savename'];
        $file=$re['name'];
        header('content-disposition:attachment;filename='.basename($filename));
        header('content-length:'.filesize($filename));
        readfile($filename);
    }

    //文件删除
    public function defile(){
        $id=I('id');
        $re=D('share')->find($id);
        $file=$re['savepath'].$re['savename'];
        $shan=unlink($file);
        if($shan){
            if(D('share')->delete($id)){
                $this->success('删除成功');
            }else{
                $this->error('删除记录失败');
            }
        }else{
            $this->error('未找到要删除的文件');
        }
    }





}