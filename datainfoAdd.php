<?php
session_start();
error_reporting(0);
include 'conn.php';
// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
if (!isset($_SESSION['username'])) {//如果$_SESSION['username']为空，用户先登录才可以留言
    echo "<script type=\"text/javascript\">alert('请先登录');</script>"; //提示
    echo "<script type=\"text/javascript\">window.location.href='login.php';</script>"; //页面跳转查看编辑的结果
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //图片上传
    $nums = rand(1000, 9999);
    $fileName123 = iconv('utf-8', 'gb2312', "upload/" . $nums . $_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $fileName123);
    //echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
    $picurl = "upload/" . $nums . $_FILES["file"]["name"];

    $sql = "insert into datainfo (id,title,sorttype,content,picurl,intro,author)values('$_POST[id]','$_POST[title]','$_POST[sorttype]','$_POST[content]','$picurl','$_POST[intro]','$_POST[author]')";
    $result = $db->query($sql);
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>alert('添加成功');window.location.href='datainfoList.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('添加失败');window.location.href='datainfoAdd.php';</script>";
    }
}
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

<form class="layui-form" action="datainfoAdd.php" method="post" style="" enctype="multipart/form-data">
    <div class="layui-col-md12" style="padding-right: 80px;border: 1px solid #ccc;padding-top: 100px;">

        <input type="hidden" name="id" value="0">
        <div class="layui-form-item">
            <label class="layui-form-label">图书名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" placeholder="请输入图书名称"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">图书分类</label>
            <div class="layui-input-block">
                <select name="sorttype" lay-verify="required">
                    <?php
                    $sql = "select * from sorttype ";
                    $result = $db->query($sql);
                    $total = 0;
                    while ($row = $result->fetch_row()) {
                        ?>
                        <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                        <?php
                    }
                    ?> </select>

            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图书图片</label>
            <div class="layui-input-block">
                <input type="file" name="file"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">图书内容</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入图书内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">添加用户</label>
            <div class="layui-input-block">
                <input type="text" name="author" required lay-verify="required" value="<?php echo $_SESSION['username']; ?>" placeholder="请输入添加用户"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">借阅状态</label>
            <div class="layui-input-block">
                <input type="text" name="intro" required lay-verify="required" placeholder="请输入借阅状态"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div style="height: 50px;"></div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <a class="layui-btn" href="datainfoList.php">返回首页</a>
                <button class="layui-btn" lay-submit lay-filter="formDemo">添加图书</button>
                <button type="reset" class="layui-btn layui-btn-primary">点我重置</button>
            </div>
        </div>
    </div>
</form>

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
