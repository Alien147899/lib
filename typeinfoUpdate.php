<?php
session_start();
//error_reporting(0);
include 'conn.php';
if (!isset($_SESSION['username'])) {//如果$_SESSION['username']为空，用户先登录才可以留言
    echo "<script type=\"text/javascript\">alert('请先登录');</script>"; //提示
    echo "<script type=\"text/javascript\">window.location.href='login.php';</script>"; //页面跳转查看编辑的结果
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "update sorttype set typeid='$_POST[typeid]',typename='$_POST[typename]',typecontent='$_POST[typecontent]' where typeid='$_POST[typeid]'";
    $result = $db->query($sql);
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>alert('修改分类成功');window.location.href='typeinfoList.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('修改分类失败');window.location.href='typeinfoList.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图书分类信息</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body class="layui-container">
<?php
include 'nav.php';
$sql = "select * from sorttype where typeid='$_GET[id]'";
$result = $db->query($sql);
$total = 0;
while ($row = $result->fetch_row()) {
    ?>

    <form class="layui-form" action="typeinfoUpdate.php" method="post" style="">
        <div class="layui-col-md12" style="padding-right: 80px;border: 1px solid #ccc;padding-top: 100px;">
            <p></p>
            <p></p>
            <p></p>
            <div class="layui-form-item">
                <label class="layui-form-label">分类编号</label>
                <div class="layui-input-block">
                    <input type="text" name="typeid" readonly id="typeid" value="<?php echo $row[0] ?>" lay-verify autocomplete="off"
                           placeholder="请输入分类编号"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" name="typename" id="typename" value="<?php echo $row[1] ?>" lay-verify autocomplete="off"
                           placeholder="请输入分类名称"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分类介绍</label>
                <div class="layui-input-block">
                    <input type="text" name="typecontent" id="typecontent" value="<?php echo $row[2] ?>" lay-verify autocomplete="off"
                           placeholder="请输入分类介绍"
                           class="layui-input">
                </div>
            </div>

            <div style="height: 50px;"></div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a class="layui-btn" href="typeinfoList.php">返回列表</a>
                    <button class="layui-btn" lay-submit lay-filter="formDemo">修改分类</button>
                    <button type="reset" class="layui-btn layui-btn-primary">点我重置</button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
<?php
include 'foot.php';
?>
<script>
    //Demo
    layui.use(['form', 'laydate'], function () {
        var form = layui.form;
        var laydate = layui.laydate;
        //日期时间选择器
    });
</script>
</body>
</html>
