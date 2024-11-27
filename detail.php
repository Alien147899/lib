<?php
session_start();
error_reporting(0);
include 'conn.php';
$sql = "select * from datainfo where id=$_GET[id]";
$arr = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($arr);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图书信息添加</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body class="layui-container">
<?php
include 'nav.php';

?>
<div style="padding: 10px;">
    <h1 style="text-align: center;">图书详细信息</h1>
</div>
<table class="layui-table">
    <tbody>
    <tr>
        <td style="width:150px;">编号</td>
        <td><?php echo $rows['id'] ?></td>
    </tr>
    <tr>
        <td style="width:150px;">名称</td>
        <td><?php echo $rows['title'] ?></td>
    </tr>
    <tr>
        <td style="width:150px;">分类</td>
        <td><?php echo $rows['sorttype'] ?></td>
    </tr>
    <tr>
        <td style="width:150px;">内容</td>
        <td><?php echo $rows['content'] ?></td>
    </tr>
    <tr>
        <td style="width:150px;">图片</td>
        <td><img src="<?php echo $rows['picurl'] ?>" style="max-width: 300px;"/></td>
    </tr>
    <tr>
        <td style="width:150px;">备注</td>
        <td><?php echo $rows['intro'] ?></td>
    </tr>
    <tr>
        <td style="width:150px;">用户</td>
        <td><?php echo $rows['author'] ?></td>
    </tr>
    </tbody>
</table>


<?php
include 'foot.php';
?>
<script>
    //Demo
    layui.use(['form', 'laydate'], function () {
        var form = layui.form;
        var laydate = layui.laydate;
    });
</script>
</body>
</html>
