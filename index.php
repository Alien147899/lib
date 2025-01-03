<?php
session_start();
error_reporting(0);
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>系统首页</title>
    <link rel="stylesheet" href="common/css/layui.css"/>
    <script src="common/layui.js"></script>
</head>
<body class="layui-container">
<?php
include 'nav.php';
?>
<?php
include 'banner.php';
?>

<div style="margin-top: 20px;">
    <?php
    $sql2 = " select * from sorttype ";
    $result2 = $db->query($sql2);
    while ($row2 = $result2->fetch_row()) {
        ?>
        <a class="layui-btn layui-btn-primary" href="index.php?sorttype=<?php echo $row2[1]; ?>"><?php echo $row2[1]; ?></a>
    <?php } ?>
</div>

<div style="padding-top: 10px;padding-left: 0px;">


    <div class="j02 main clearfix" style="margin-top: 30px">
        <!-- 把这段代码重复copy 6次 start -->

        <?php
        $sql = "select * from datainfo ";

        if ($_GET['sorttype']) {
            $sql = " select * from datainfo where sorttype='$_GET[sorttype]' ";
        }
        $result = $db->query($sql);
        $total = 0;
        while ($row = $result->fetch_row()) {
            $total++;
            ?>
            <div class="product">
                <a href="detail.php?id=<?php echo $row[0]; ?>" target="_blank" class="iwrap">
                    <img src="<?php echo $row[4]; ?>">
                    <p class="f16 line1"><?php echo $row[2]; ?></p>
                    <p class="f12 line2 red"><?php echo $row[3]; ?></p>
                    <dl class="line3">
                        <dd class="c2 red"><span class="rmb">最新</span></dd>
                        <dd class="c3 f16"><i class="triangle"></i>点我查看</dd>
                    </dl>
                </a>
            </div>
            <?php
        }
        if ($total == 0) {
            echo "没有记录";
        }
        ?>
        <!-- 把这段代码重复copy 6次  end-->
    </div>
</div>
<?php
include 'foot.php';
?>


<style type="text/css">
    html, body, ul, li, dl {
        margin: 0;
        padding: 0;
    }

    .j02 {
        width: 100%;
    }

    .j02 .product {
        width: 268px;
        height: 333px;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .j02 .product:nth-of-type(4n) {
        margin-right: 0;
    }

    .j02 .product-box {
        width: 100%;
        margin-right: -20px;
    }

    .j02 .iwrap img {
        height: 210px;
    }

    /* ******** 商品展示:图片列表 start  *********** */
    /* 使用说明： 要在具体页面加下列css
    .j02 .product{width:282px;height:333px;margin-right:20px;margin-bottom:20px;}//图片是280x210
    .j02 .product-box{width:1208px;margin-right:-20px;}//宽度是4个（容器+margin-right）的宽度之和
    .j02 .iwrap img{height:210px;}    //限图片高度(此行可不写)    */
    .product {
        position: relative;
        float: left;
        background: #fff;
        line-height: 1.5;
        overflow: visible;
        z-index: 1;
    }

    .product:hover {
        overflow: visible;
        z-index: 3;
    }

    .product:hover .iwrap {
        margin: -3px;
        border: 4px solid #f83760;
        -webkit-transition: border-color .2s ease-in;
        -moz-transition: border-color .2s ease-in;
        -ms-transition: border-color .2s ease-in;
        -o-transition: border-color .2s ease-in;
        transition: border-color .2s ease-in;
    }

    .iwrap {
        display: block;
        position: absolute;
        background: #fff;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        border: 1px solid #ececec;
        box-sizing: content-box;
    }

    .iwrap img {
        width: 100%;
        margin-bottom: 10px;
    }

    .iwrap p.line1 {
        margin-left: 10px;
        margin-right: 10px;
        color: #333;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .iwrap p.line2 {
        margin-left: 10px;
        margin-right: 10px;
        margin-bottom: 13px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .iwrap .line3 {
        position: absolute;
        bottom: 0;
        background: #f8f8f8;
        width: 100%;
        height: 56px;
    }

    .iwrap .line3 dd {
        display: block;
        float: left;
        line-height: 1;
    }

    .iwrap .line3 .c1 {
        width: 35%;
        font-size: 26px;
        overflow: hidden;
        white-space: nowrap;
    }

    .iwrap .rmb {
        display: block;
        float: left;
        font-size: 16px;
        padding-left: 0.5em;
    }

    .iwrap .money {
        display: block;
        float: left;
    }

    .iwrap .line3 .c2 {
        min-width: 22%;
        max-width: 28%;
        height: 56px;
        box-sizing: border-box;
        overflow: hidden;
        text-align: center;
    }

    .iwrap .triangle {
        display: block;
        float: left;
        width: 0;
        height: 0;
        box-sizing: border-box;
        border-width: 28px 14px 28px 14px;
        border-style: solid;
        border-color: #f8f8f8 #f73760 #f8f8f8 #f8f8f8;
    }

    .iwrap .line3 .c3 {
        width: 40%;
        height: 56px;
        background: #f73760;
        color: #fff;
        line-height: 56px;
        text-align: center;
        float: right;
        cursor: pointer;
    }

    /* ******** 商品展示:图片列表 end  *********** */
</style>
</body>
</html>
