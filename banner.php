<?php
header("Content-type:text/html; charset=utf-8");
?>
<div class="layui-carousel" id="test1">
    <div carousel-item>
        <div><img src="upload/j1.jpg" style="width:100%;height: 100%;"/></div>
        <div><img src="upload/img9.jpg" style="width:100%;height: 100%;"/></div>
        <div><img src="upload/w3.jpg" style="width:100%;height: 100%;"/></div>
    </div>
</div>
<!-- 条目中可以是任意内容，如：<img src=""> -->

<script>
    layui.use('carousel', function () {
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
            elem: '#test1'
            , width: '100%' //设置容器宽度
            , arrow: 'always' //始终显示箭头
            //,anim: 'updown' //切换动画方式
        });
    });
</script>
