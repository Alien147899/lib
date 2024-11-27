<?php
session_start();
error_reporting(0);
include 'conn.php';
?>
<?php
if (isset($_GET[id])) {

    $sql = "select * from userinfo where id=$_GET[id]";
    $arr = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($arr);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //图片上传
    $nums = rand(1000, 9999);
    $fileName123 = iconv('utf-8', 'gb2312', "upload/" . $nums . $_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $fileName123);
    //echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
    $picurl = "upload/" . $nums . $_FILES["file"]["name"];


    $sql = "update userinfo set id='$_POST[id]',username='$_POST[username]',password='$_POST[password]',picurl='$picurl',role='$_POST[role]' where id='$_POST[id]'";
    $arr = mysqli_query($conn, $sql);
    if ($arr) {
        echo "<script language=javascript>alert('修改操作成功！');window.location='userinfoList.php'</script>";
    } else {
        echo "<script>alert('修改操作失败');history.go(-1);</script>";
    }

}
?>
<html>
<head>
    <title>用户信息修改页面</title>
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
    <form class="layui-form  layui-form-pane" action="userinfoUpdate.php" method="post" style="margin: 50px auto;" enctype="multipart/form-data">

        <div class="layui-form-item">
            <label class="layui-form-label">编号</label>
            <div class="layui-input-block">
                <input type="text" name="id" readonly id="id" value="<?php echo $rows['id'] ?>" lay-verify autocomplete="off"
                       placeholder="请输入编号"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
                <input type="text" name="username" id="username" value="<?php echo $rows['username'] ?>" lay-verify autocomplete="off"
                       placeholder="请输入姓名"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="text" name="password" id="password" value="<?php echo $rows['password'] ?>" lay-verify autocomplete="off"
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
                <input type="text" name="role" id="role" value="<?php echo $rows['role'] ?>" lay-verify autocomplete="off"
                       placeholder="请输入角色"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即修改</button>
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
