<?php
// @function 公共控制器
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    function _initialize()
    {
        // 用户权限检查
        if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
            //1.如果需要验证
            if (!\Org\Util\Rbac::AccessDecision()) {

                // 2.没有登陆
                if (!$_SESSION [C('USER_AUTH_KEY')]) {
                    // 3.游客可访问
                    if (C('GUEST_AUTH_ON')) {
                        // 4.游客授权
                        if (!isset($_SESSION['_ACCESS_LIST']))
                            // 保存游客权限
                            \Org\Util\Rbac::saveAccessList(C('GUEST_AUTH_ID'));
                    } else {
                        // 5.无登陆，禁止游客访问，无权限页面
                        $this->error('没有浏览权限，请先登录','index.php/home/login/login');
                    }
                }

                // // 6.登陆，没有权限， 如果有错误页面则定向
                // if (C('RBAC_ERROR_PAGE')) {
                //     // 定义权限错误页面
                //     redirect(C('RBAC_ERROR_PAGE'));
                // } //7.没有定义错误页面定向，跳到登陆页面
                // else {
                //     $this->error('没有权限');
                // }
                
            }
        }
    }
}