<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {

    public function message(){
        $username=session('username');
        $this->assign('username',$username);
        $name=session('name');
        $this->assign('name',$name);
        $peoples=D('peoplemanager');
        $people=$peoples->select();
        $this->assign("people",$people);
        $this->display();
    }
    public function moremessage(){
        $peoples=D('peoplemanager');
        $people=$peoples->where(array('id'=>I('id')))->select();
        $this->ajaxreturn($people);
    }


    public function delete(){
        $id=I('id');
        $peoples=D('peoplemanager');
        $re=$peoples->delete($id);
        if($re){
            $this->success('删除信息成功');
        }else{
            $this->error('删除信息失败');
        }

    }


    public function handle(){
        if(!IS_POST) halt('页面不存在');
        $peoples=D('peoplemanager');
        $data['danwei']=I('param.danwei');
        $data['name']=str_replace(' ', '', trim(I('param.name')));
        //$data['name']=I('param.name');
        $data['sex']=I('param.sex');
        $data['nation']=I('param.nation');
        $data['status']=I('param.status');
        $data['birthday']=I('param.birthday');
        $data['age']=I('param.age');
        $data['birthplace']=I('param.birthplace');
        $data['major']=I('param.major');
        $data['job']=I('param.job');
        $data['position']=I('param.position');
        $data['largedegree']=I('param.largedegree');
        $data['graduateschool']=I('param.graduateschool');
        $data['graduatetime']=I('param.graduatetime');
        $data['licensetype']=I('param.licensetype');
        $data['licensenumber']=I('param.licensenumber');
        $data['licensetime']=I('param.licensetime');
        $data['zhicheng']=I('param.zhicheng');
        $data['zhichengtime']=I('param.zhichengtime');
        $data['worktime']=I('param.worktime');
        $data['learnmethod']=I('param.learnmethod');
        $data['largedegreetime']=I('param.largedegreetime');
        $data['licenseregisttime']=I('param.licenseregisttime');
        $data['licenseregistnumber']=I('param.licenseregistnumber');
        $data['workstate']=I('param.workstate');
        $data['tongji']=I('param.tongji');
        $data['others']=I('param.others');
        
        $re=$peoples->add($data);
        if($re){
            $this->success("信息增加成功");
        }else{
            $this->error("信息插入失败");
        }
    }


public function ajax(){
        $a=D('peoplemanager')->where(array('id'=>I('id')))->select();
        echo json_encode($a[0]);
    }

    public function edit(){
        D('peoplemanager')->where(array('id'=>I('id')))->save(I('post.'))?$this->success("修改成功"):$this->error("修改失败");
    }



}