<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        $this->display();
    }

    public function verify()
     {
        header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
        header ("Pragma: no-cache");
         $Verify = new \Think\Verify();
         $Verify->fontSize = 18;
         $Verify->length   = 4;
         $Verify->useNoise = false;
         $Verify->codeSet = '0123456789';
         $Verify->imageW = 130;
         $Verify->imageH = 35;
//         $Verify->useZh = true;

         //$Verify->expire = 600;
         ob_end_clean();
         $Verify->entry(1);
     }




     /* 验证码校验 */
     public function check_verify($code, $id = ''){
           $verify = new \Think\Verify();
         $res = $verify->check($code, $id);
         $this->ajaxReturn($res, 'json');
     }


    public function login_handle(){
        if(!IS_POST){
            $this->error('页面不存在');
        }
        $verify = new \Think\Verify();
        if (!$verify->check(I('verify'), 1)) {
            $this->error('验证码错误');
        }else{
            $username=I('email');
            $psw=I('password','',md5);
            $user=M('user')->where(array('username'=>$username))->find();
            if(!$user||$user['password'] != $psw){
                $this->error('用户名或密码错误');
            }else{
                // if($user['username']==C('RBAC_SUPERADMIN')){
                //     session(C('ADMIN_AUTH_KEY'),true);
                // }
                session("username",$username);
                session("name",$user['name']);
                session("id",$user['id']);
                session("level",$user['level']);
                session(C('USER_AUTH_KEY'),$user['id']);
                \Org\Util\Rbac::saveAccessList();

               $this->redirect('index/index');
            }
        }
    }


    function logout(){

        if(!empty($_SESSION[C('USER_AUTH_KEY')])){

            unset($_SESSION[C('USER_AUTH_KEY')]);

            $_SESSION=array();

            session_destroy();

            $this->success('登出成功','login/login');

        }else{

            $this->error('已经登出了','login/login');

        }

    }


}
?>