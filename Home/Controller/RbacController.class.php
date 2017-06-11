<?php
namespace Home\Controller;
use Think\Controller;
class RbacController extends CommonController
{
    public function index()
    {
        $this->display();

    }

    public function user()
    {
        $info=[];
        $a = D('user')->select();
        foreach($a as $v){
            $b=D('role_user')->field('role_id')->where(array('user_id'=>$v['id']))->select();
            foreach($b as $vv){
                foreach($vv as $vvv){
                    $c=D('role')->field('remark')->where(array('id'=>$vvv))->select()[0]['remark'];
                    $v['re'][]=$c;
                }
            }
            $info[]=$v;
        }
        $this->assign('info', $info);
        $this->display();
    }


    public function character()
    {
        $a = D('role')->select();
        $this->assign('info', $a);
        $this->display();
    }


    public function edit()
    {
        $a = D('role')->where(array('id' => I('id')))->select();
        $this->assign('info', $a);
        $this->display();

    }

    public function edit_handle()
    {
        D('role')->where(array('id' => I('id')))->save(array(
            'name' => I('name'),
            'status' => I('status'),
            'remark' => I('remark')
        )) ? $this->success('操作成功', U('rbac/character')) : $this->error('操作失败');

    }

    public function add_character()
    {
        $this->display();
    }

    public function add_character_handle()
    {
        D('role')->add(I('post.')) ? $this->success('操作成功', U('rbac/character')) : $this->error('操作失败');
    }

    public function add_node()
    {
        $a = D('node')->where(array('level' => '1'))->select();
        $this->assign('info', $a);
        $this->display();
    }

    public function add_yingyong()
    {
        $this->display();
    }

    public function add_yingyong_handle()
    {
        D('node')->add(I('post.')) ? $this->success('操作成功', U('rbac/add_node')) : $this->error('操作失败');
    }

    public function add_controller()
    {
        $a = D('node')->where(array('pid' => I('id'), 'level' => '2'))->select();
        $this->assign('info', $a);
        $this->assign('id', I('id'));
        $this->display();
    }

    public function add_controller_show()
    {
        $this->assign('id', I('id'));
        $this->display();
    }

    public function add_controller_handle()
    {
        D('node')->add(I('post.')) ? $this->success('操作成功', U('rbac/add_controller', array('id' => I('pid')))) : $this->error('操作失败');
    }

    public function add_action_show()
    {
        $a = D('node')->where(array('pid' => I('id'), 'level' => '3'))->select();
        $this->assign('info', $a);
        $this->assign('id', I('id'));
        $this->display();
    }

    public function add_action()
    {
        $this->assign('id', I('id'));
        $this->display();


    }

    public function add_action_handle()
    {
        D('node')->add(I('post.')) ? $this->success('操作成功', U('rbac/add_action_show', array('id' => I('pid')))) : $this->error('操作失败');
    }

    public function node()
    {
        $a = D('node')->select();
        $arr = array();

//        foreach($a as $v){
//            $v['child']=array();
//        }
        foreach ($a as $v) {
            if ($v['level'] == 1) {
                foreach ($a as $vv) {
                    if ($vv['level'] == 2 && $vv['pid'] == $v['id']) {
                        foreach ($a as $vvv) {
                            if ($vvv['level'] == 3 && $vvv['pid'] == $vv['id']) {
                                $vv['child'][] = $vvv;
                            }
                        }
                        $v['child'][] = $vv;
                    }

                }
                $arr[] = $v;
            }
        }
//        $aa=array();
//        $aaa=array();
//        foreach($a as $v){
//            $aa[]=D('node')->where(array('level'=>2,'pid'=>$v['id']))->select();
//        }
//        foreach($aa as $value){
//            foreach($value as $value2){
//             $aaa[]=D('node')->where(array('level'=>3,'pid'=>$value2['id']))->select();
//            }
//        }
//        $this->assign('info1',$a);
//        $this->assign('info2',$aa);
//        $this->assign('info3',$aaa);
//        var_dump($arr);die;
        $this->assign('info', $arr);
        $this->display();

    }

    public function access()
    {
        $aa = D('access')->field('node_id')->where(array('role_id' => I('id')))->select();
        foreach ($aa as $v) {
            $b[] = $v['node_id'];
        }
        $a = D('node')->select();
        $arr = array();
        foreach ($a as $v) {
            if ($v['level'] == 1) {
                foreach ($a as $vv) {
                    if ($vv['level'] == 2 && $vv['pid'] == $v['id']) {
                        foreach ($a as $vvv) {
                            if ($vvv['level'] == 3 && $vvv['pid'] == $vv['id']) {
                                if (in_array($vvv['id'], $b)) {
                                    $vvv['access'] = 1;
                                } else {
                                    $vvv['access'] = 0;
                                }
                                $vv['child'][] = $vvv;
                            }
                        }
                        if (in_array($vv['id'], $b)) {
                            $vv['access'] = 1;
                        } else {
                            $vv['access'] = 0;
                        }
                        $v['child'][] = $vv;
                    }

                }
                if (in_array($v['id'], $b)) {
                    $v['access'] = 1;
                } else {
                    $v['access'] = 0;
                }
                $arr[] = $v;
            }
        }
        $this->assign('info', $arr);
//        var_dump($arr);die;
        $this->id = I('id');
        $this->display();

    }

    public function access_handle()
    {
        D('access')->where(array('role_id'=>I('id')))->delete();
        $a = I('check');
        foreach ($a as $v) {
            $b = D('node')->where(array('id' => $v))->field('level')->select()[0]['level'];
            D('access')->add(array(
                'role_id' => I('id'),
                'node_id' => $v,
                'level' => $b
            )) ? $this->success('操作成功', U('rbac/character')) : $this->error('操作失败');


        }

    }

    public function add_user(){
        $this->display();

    }
    public function add_user_handle(){
        D('user')->add(array(
            'username' => I('username'),
            'password' => I('password')
        ))? $this->success('操作成功', U('rbac/character')) : $this->error('操作失败');


    }
    public function add_role_user(){
        $uid=I('id');

       $info=[];
        $a=D('role_user')->field('role_id')->where(array('user_id'=>I('id')))->select();
        $aa=[];
        foreach($a as $v){
            $aa[]=$v['role_id'];
        }
        $c=D('role')->select();
        foreach($c as $v){
            if(in_array($v['id'],$aa)){
                $v['include']=1;
            }else{
                $v['include']=0;
            }
            $info[]=$v;
        }
//        var_dump($info);die;
        $this->assign('info', $info);
        $this->assign('uid', $uid);
$this->display();

    }


    public function add_role_user_handle(){
      D('role_user')->where(array('user_id'=>I('id')))->delete();
        $b=[];
        $i=0;
        foreach(I('role_id') as $v){
            $b[$i]['user_id']=I('id');
            $b[$i]['role_id']=$v;
            $i++;
        }
        D('role_user')->addAll($b)? $this->success('操作成功', U('rbac/user')) : $this->error('操作失败');

    }

    public function delete_action(){
        D('node')->where(array('id'=>I('id')))->delete()? $this->success('操作成功', U('rbac/add_action_show')) : $this->error('操作失败');
    }




}