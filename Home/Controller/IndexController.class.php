<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $name=session('name');
        $userid=session('id');
        $this->assign('name',$name);
        $this->assign('userid',$userid);
        $this->display();
    }

    //添加用户展示
    public function usermanager(){
    	$name=session('name');
        $this->assign('name',$name);
        
        if(session('level')!=1){
        	$this->error('页面不存在');
        }
        $map['username']  = array('neq',C('RBAC_SUPERADMIN'));
        $users=D('user')->where($map)->select();
        $this->assign('users',$users);
    	$this->display();
    }

    //添加用户检测
    public function adduser_check(){
         if(session('level')!=1){
            $this->error('页面不存在');
        }
    	if(!IS_POST) $this->error('页面不存在');

    	$data['username']=trim(I('username'));

    	$re=D('user')->where(array('username'=>$data['username']))->select();
    	if($re){
    		$this->error('该帐号已经存在,请换帐号');
    	}
    	$data['name']=trim(I('name'));
    	$data['password']=trim(I('password'));

    	if(strpos($data['username']," ")||strpos($data['name']," ")||strpos($data['password']," ")){
    		$this->error('用户名，帐号，密码不都含有空格');
    	}
    	if($data['username']==null||$data['name']==null||$data['password']==null){
    		$this->error('用户名，帐号，密码都不能为空');
    	}
        $data['danwei']=I('danwei');
    	$data['level']=0;
    	$data['password']=md5($data['password']);
    	$result=D('user')->add($data);
    	if($result){
    		$this->success('添加用户成功');
    	}else{
    		$this->error('添加用户失败');
    	}
    }

    //用户密码修改页面
    public function infochange(){
    	$data['id']=I('id');
    	$users=D('user');
    	if($data['id']==null||$data['id']==""){
    		$re=$users->where(array('username'=>session('username')))->select();
    		$this->assign('name',session('name'));
	    	$this->assign('name1',$re[0]['name']);
	    	$this->assign('id',$re[0]['id']);
	    	$this->assign('username1',$re[0]['username']);
    	}else{
    		$re=$users->find($data['id']);
    		$this->assign('name',session('name'));
	    	$this->assign('name1',$re['name']);
	    	$this->assign('id',$re['id']);
	    	$this->assign('username1',$re['username']);
    	}
    	$this->display();
    }

     //修改密码检测
    public function infochange_check(){
    	if(!IS_POST) $this->error('页面不存在');
    	$data['id']=I('id');
    	$re=D('user')->find($data['id']);
    	$data['oldpwd']=trim(I('oldpwd'));
    	$data['newpwd']=trim(I('newpwd'));
    	$data['cnewpwd']=trim(I('cnewpwd'));
    	if(strpos($data['oldpwd']," ")||strpos($data['newpwd']," ")||strpos($data['cnewpwd']," ")){
    		$this->error('帐号，用户名，密码中不能含有空格');
    		die;
    	}
    	if(md5($data['oldpwd'])!=$re['password']){
    		$this->error('原密码错误，修改失败');
    		die;
    	}
    	if($data['newpwd']!=$data['cnewpwd']){
    		$this->error('新密码与确认密码不一样,修改失败');
    		die;
    	}
    	$r['id']=$data['id'];
    	$r['username']=$re['username'];
    	$r['name']=$re['name'];
        $r['level']=$re['level'];
    	$r['password']=md5($data['newpwd']);
    	$e=D('user')->save($r);
    	if($e){
    		$this->success('修改密码成功',U('login/logout'));
    	}else{
    		$this->error('密码修改失败');
    	}
    	
    }
    //用户删除
    public function userdelete(){
        if(session('level')!=1){
            $this->error('页面不存在');
        }
        $id=I('id');
        $re=D('user')->delete($id);
        if($re){
            $this->success('删除帐号成功');
        }else{
            $this->error('删除帐号失败');
        }
    }

    //用户密码修改
    public function change(){
        $a=D('user')->where(array('id'=>I('id')))->select();
        echo json_encode($a[0]);
    }
    //用ajax修改数据
    public function edit(){
        $id=I('id');
        $data['id']=$id;
        $data['password']=trim(I('password'));
        $re=D('user')->find($id);
        $data['name']=$re['name'];
        $data['username']=$re['username'];
        $data['level']=$re['level'];
        if($data['password']==null||$data['password']==""){
            $this->error('新密码不能为空');
        }
        $data['password']=md5($data['password']);
        D('user')->save($data)?$this->success('修改成功'):$this->error('修改失败');
    }



}