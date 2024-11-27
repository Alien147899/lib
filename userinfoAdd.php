<?php
session_start();
error_reporting(0);
include 'conn.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //图片上传
    $nums = rand(1000, 9999);
    $fileName123 = iconv('utf-8', 'gb2312', "upload/" . $nums . $_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $fileName123);
    //echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
    $picurl = "upload/" . $nums . $_FILES["file"]["name"];


    $sql = "insert into userinfo (id,username,password,picurl,role)values('$_POST[id]','$_POST[username]','$_POST[password]','$picurl','$_POST[role]')";
    $arr = mysqli_query($conn, $sql);
    if ($arr) {
        echo "<script language=javascript>alert('添加用户成功！');window.location='userinfoList.php'</script>";
    } else {
        echo "<script>alert('添加用户失败');history.go(-1);</script>";
    }
    return;

}
?>
<html>
<head>
    <title>用户信息添加页面</title>
    <!-- 引入css样式和js文件-->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body class="layui-container">
<?php
include 'nav.php';
?>
<div>

    <form class="layui-form  layui-form-pane" action="userinfoAdd.php" method="post" style="margin: 50px auto;" enctype="multipart/form-data">
        <div class="layui-form-item layui-hide">
            <label class="layui-form-label">编号</label>
            <div class="layui-input-block">
                <input type="text" name="id" id="id" value="0" lay-verify autocomplete="off"
                       placeholder="请输入编号"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
                <input type="text" name="username" id="username" value="" lay-verify autocomplete="off"
                       placeholder="请输入姓名"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="text" name="password" id="password" value="" lay-verify autocomplete="off"
                       placeholder="请输入密码"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">头像</label>
            <div class="layui-input-block">
                <input type="file" name="file"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">角色</label>
            <div class="layui-input-block">
                <input type="text" name="role" id="role" value="" lay-verify autocomplete="off"
                       placeholder="请输入角色"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

</div>
<?php
include 'foot.php';
?>
</body>
</html>
