<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>权限控制</title>
</head>
<body>
<ul>
    <li><a href="<?php echo U('Rbac/user');?>">用户列表</a></li>
    <li><a href="<?php echo U('Rbac/node');?>">节点列表</a></li>
    <li><a href="<?php echo U('Rbac/character');?>">角色列表</a></li>
    <li><a href="<?php echo U('Rbac/add_user');?>">添加用户</a></li>
    <li><a href="<?php echo U('Rbac/add_node');?>">添加节点</a></li>
    <li><a href="<?php echo U('Rbac/add_character');?>">添加角色</a></li>
</ul>


</body>
</html>