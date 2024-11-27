<?php
session_start();
error_reporting(0);
include 'conn.php';
if ($_POST['username']) {
    $sql = "select * from userinfo where username='$_POST[username]' and password='$_POST[loginPW]' and role='$_POST[role]' ";
    $result = $db->query($sql);
    if ($attr = $result->fetch_row()) {
        $_SESSION["username"] = $_POST['username'];  //session写入用户名
        $_SESSION["picurl"] = $attr[3];  //session写入用户名
        $_SESSION["role"] = $attr[4];  //session写入用户名
        echo "<script type=\"text/javascript\">alert('用户登录成功');</script>"; //提示
        echo "<script type=\"text/javascript\">window.location.href='datainfoList.php';</script>"; //页面跳转查看编辑的结果
    } else {
        echo '<h1 style="color: red;text-align: center;">用户名或者密码错误，请重新登录！</h1>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图书管理系统</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body>
<div style="width: 500px;margin: 50px auto;border: 2px #ccc solid;border-radius:10px;background: rgba(255,255,255,0.8);padding-top: 50px; ">
    <h1 style="text-align: center;">书 海</h1>
    <br>
    <br>
    <br>
    <form name="addForm" class="layui-form" action="login.php" method="post" style="padding-right: 80px;">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="username" required lay-verify="required" placeholder="请输入用户名"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录密码</label>
            <div class="layui-input-block">
                <input type="password" name="loginPW" required lay-verify="required" placeholder="请输入密码"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录角色</label>
            <div class="layui-input-block">
                <input type="radio" name="role" value="用户" title="用户">
                <input type="radio" name="role" value="管理员" title="管理员" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="index.php">返回首页</a>
                <button class="layui-btn" type="submit">立即提交</button>
            </div>
        </div>
    </form>
</div>

<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('form', function () {
        var form = layui.form;

        //…
    });
</script>
<style>
    body {
        background: url('./upload/bg123.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
    }

</style>
</body>
</html>
