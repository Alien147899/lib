<?php
session_start();
error_reporting(0);
include 'conn.php';
if ($_GET['id']) {
    $sql = "delete from userinfo where id='$_GET[id]' ";
    $result = $db->query($sql);
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>alert('删除用户成功');window.location.href='userinfoList.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('删除用户失败');window.location.href='userinfoList.php';</script>";
    }
}
?>
