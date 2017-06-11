<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo U('rbac/add_user_handle');?>" method="post">
    邮箱：<input type="email" name="username" ><br/>
    密码：<input type="password" name="password">
<input type="submit" value="添加用户">

</form>
</body>
</html>