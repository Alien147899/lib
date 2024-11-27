<?php
$mysql_host = "localhost";    //链接地址
$mysql_user = "root";         //数据库用户名
$mysql_password = "root";     //数据库登录密码
$mysql_database = "php_3004";     //数据库名
$db = new mysqli("$mysql_host", "$mysql_user", "$mysql_password", "$mysql_database") or die("数据库链接错误");
$db->query("SET NAMES utf8");//写法一
header("Content-type:text/html; charset=utf-8");


$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password); //数据库账号 密码
mysqli_select_db($conn, $mysql_database); //数据库名称
if ($conn == null) {
    echo "数据库打开失败";
    exit; //数据库打开失败，退出
}

$conn->query("SET NAMES 'UTF8'"); //设置数据库编码
?>
