<?php
session_start();
error_reporting(0);
include 'conn.php';
if (!isset($_SESSION['username'])) {//如果$_SESSION['username']为空，用户先登录才可以留言
    echo "<script type=\"text/javascript\">alert('请先登录');</script>"; //提示
    echo "<script type=\"text/javascript\">window.location.href='login.php';</script>"; //页面跳转查看编辑的结果
}
$keyword = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>书海</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body class="layui-container">
<?php
include 'nav.php';
?>
<div>
    <!--    下面代码实现搜索框-->
    <div style="margin:10px auto; ">
        <form class="layui-form" action="datainfoList.php" method="post">
            <div class="layui-form-item" style="text-align: center;">
                <div class="layui-inline">
                    <div class="layui-input-inline" style="">
                        <input type="text" class="layui-input dateIcon" name="keyword" id="keyword"
                               value="<?php echo $keyword; ?>"
                               placeholder="请输入关键词搜索"
                               style="width: 240px;"/>
                    </div>

                    <div class="layui-input-inline">
                        <button type="submit" class="layui-btn layui-btn-blue"><i
                                    class="layui-icon layui-icon-search"></i> 搜索
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>


    <table class="layui-table layui-table-hover" id="showtable">
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>分类</th>
            <th>内容</th>
            <th>图片</th>
            <th>借阅状态</th>
            <th>用户</th>
            <td>操作</td>
        </tr>
        <?php
        $sql = "select * from datainfo ";
        if ($_SESSION['role'] != '管理员') {
            $sql = " select * from datainfo where author ='$_SESSION[username]' ";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = " select * from datainfo where title like '%$_POST[keyword]%' ";
        }
        $result = $db->query($sql);
        $total = 0;
        while ($row = $result->fetch_row()) {
            $total++;
            ?>

            <tr bgColor="#ffffff">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><img src="<?php echo $row[4]; ?>" width="50px"/></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td>
                    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="updateMsg(<?php echo $row[0]; ?>);">修改</button>
                    <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="deleteMsg(<?php echo $row[0]; ?>);">删除</button>
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
        function updateMsg(id) {
            if (confirm("确定要修改图书吗？")) {
                window.location.href = "datainfoUpdate.php?id=" + id;
            }
        }

        function deleteMsg(id) {
            if (confirm("确定要删除图书吗？")) {
                window.location.href = "datainfoDelete.php?id=" + id;
            }
        }
    </script>
    <script>

        layui.use('layer', function () {
            var layer = layui.layer;
            //调用示例
            layer.photos({
                photos: '#showtable'
                , anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
            });
        });
    </script>
</div>
<?php
include 'foot.php';
?>
</body>
</html>
