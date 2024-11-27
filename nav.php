<?php
header("Content-type:text/html; charset=utf-8");
?>
<div>
    <ul class="layui-nav layui-bg-cyan" lay-filter="">
        <li class="layui-nav-item"><a href="index.php">首页</a></li>

        <?php if (!isset($_SESSION['username'])) { ?>
            <li class="layui-nav-item"><a href="login.php">点我登陆</a></li>
        <?php } ?>

        <?php if (isset($_SESSION['username'])) { ?>
            <li class="layui-nav-item"><a href="datainfoAdd.php">添加图书</a></li>
            <li class="layui-nav-item"><a href="datainfoList.php">图书列表</a></li>
            <?php if ($_SESSION['role'] == '管理员') { ?>
                <li class="layui-nav-item"><a href="typeinfoAdd.php">添加分类</a></li>
                <li class="layui-nav-item"><a href="typeinfoList.php">分类列表</a></li>
                <li class="layui-nav-item"><a href="userinfoAdd.php">添加用户</a></li>
                <li class="layui-nav-item"><a href="userinfoList.php">用户管理</a></li>
            <?php } ?>
            <li class="layui-nav-item">
                <a href=""><img src="<?php echo $_SESSION['picurl']; ?>" class="layui-nav-img"><?php echo $_SESSION['username']; ?>[<?php echo $_SESSION['role']; ?>]</a>
                <dl class="layui-nav-child">
                    <dd><a href="loginout.php">退出登录</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="loginout.php">退出登录</a></li>
        <?php } ?>

    </ul>
</div>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function () {
        var element = layui.element;

        //…
    });
</script>
