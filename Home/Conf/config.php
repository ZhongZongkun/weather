<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'weather',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'wea_',    // 数据库表前缀




    "USER_AUTH_ON" => true,                    //是否开启权限验证(必配)
    "USER_AUTH_TYPE" => 1,                     //验证方式（1、登录验证；2、实时验证）

    "USER_AUTH_KEY" => 'id',                  //用户认证识别号(必配)
    "ADMIN_AUTH_KEY" => 'admin',          //超级管理员识别号(必配)
    "USER_AUTH_MODEL" => 'wea_user',               //验证用户表模型 ly_user
    'USER_AUTH_GATEWAY'  =>  'login/login',  //用户认证失败，跳转URL

    'AUTH_PWD_ENCODER'=>'md5',                 //默认密码加密方式

    "RBAC_SUPERADMIN" => '1128',              //超级管理员名称


    "NOT_AUTH_MODULE" => 'login',       //无需认证的控制器
    "NOT_AUTH_ACTION" => 'login,login_handle,verify',              //无需认证的方法

    'REQUIRE_AUTH_MODULE' =>  'baobiao,equip,file,index,training,user,xinxi,rbac',              //默认需要认证的模块
    'REQUIRE_AUTH_ACTION' =>  'index,adduser,addcheck,edit,ajax,jibenhandle,beijianhandle,onhandle,lxdownload,htdownload,ysdownload,jibendelete,ondevicedelete,beijiandelete,updatehandle,deletedir,handle,get_job,get_people,message',              //默认需要认证的动作

    'GUEST_AUTH_ON'   =>  false,               //是否开启游客授权访问
    'GUEST_AUTH_ID'   =>  0,                   //游客标记

    "RBAC_ROLE_TABLE" => 'wea_role',            //角色表名称(必配)
    "RBAC_USER_TABLE" => 'wea_role_user',       //用户角色中间表名称(必配)
    "RBAC_ACCESS_TABLE" => 'wea_access',        //权限表名称(必配)
    "RBAC_NODE_TABLE" => 'wea_node',            //节点表名称(必配)
);