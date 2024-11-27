<?php
session_start();
error_reporting(0);
include 'conn.php';
if (!isset($_SESSION['username'])) {//如果$_SESSION['username']为空，用户先登录才可以留言
    echo "<script type=\"text/javascript\">alert('请先登录');</script>"; //提示
    echo "<script type=\"text/javascript\">window.location.href='login.php';</script>"; //页面跳转查看编辑的结果
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>分类管理</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body class="layui-container">
<?php
include 'nav.php';
?>
<div>
    <table class="layui-table layui-table-hover">
        <tr>
            <th>分类编号</th>
            <th>分类名称</th>
            <th>分类介绍</th>
            <td>操作</td>
        </tr>
        <?php
        $sql = "select * from sorttype ";
        $result = $db->query($sql);
        $total = 0;
        while ($row = $result->fetch_row()) {
            $total++;
            ?>

            <tr bgColor="#ffffff">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td>
                    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="updateinfo(<?php echo $row[0]; ?>)">修改</button>
                    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="deleteinfo(<?php echo $row[0]; ?>)">删除</button>
                </td>
            </tr>
            <?php
        }
        if ($total == 0) {
            echo "没有记录";
        }
        ?>
    </table>

    <script>
        function updateinfo(id) {
            if (confirm("确定要修改图书分类吗？")) {
                window.location.href = "typeinfoUpdate.php?id=" + id;
            }
        }

        function deleteinfo(id) {
            if (confirm("确定要删除图书分类吗？")) {
                window.location.href = "typeinfoDelete.php?id=" + id;
            }
        }
    </script>
</div>
<?php
include 'foot.php';
?>
</body>
</html>
