<?php
session_start();
error_reporting(0);
include 'conn.php';
?>
<?php
$sql = "select * from userinfo ";
$rs = mysqli_query($conn, $sql);
?>
<html>
<head>
    <title>用户信息列表页面</title>
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


    <table class="layui-table">
        <tbody>
        <tr class="layui-bg-blue">
            <th>编号</th>
            <th>姓名</th>
            <th>密码</th>
            <th>头像</th>
            <th>角色</th>
            <th>操作</th>
        </tr>


        <?php while ($rows = mysqli_fetch_array($rs)) { ?>
            <tr>
                <td><?php echo $rows['id'] ?></td>
                <td><?php echo $rows['username'] ?></td>
                <td><?php echo $rows['password'] ?></td>
                <td><img src="<?php echo $rows['picurl']; ?>" width="50px"/></td>
                <td><?php echo $rows['role'] ?></td>
                <td style="width: 180px;">
                    <a href="userinfoUpdate.php?id=<?php echo $rows['id'] ?>" class="layui-btn layui-btn layui-btn-sm">修改</a>
                    <a href="userinfoDelete.php?id=<?php echo $rows['id'] ?>" class="layui-btn layui-btn-danger layui-btn-sm">删除</a>
                </td>
            </tr>
        <?php } ?>


        </tbody>
    </table>


</div>
<?php
include 'foot.php';
?>
</body>
</html>
