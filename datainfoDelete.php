<?php
session_start();
error_reporting(0);
include 'conn.php';
if ($_GET['id']) {
    $sql = "delete from datainfo where id='$_GET[id]' ";
    $result = $db->query($sql);
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>alert('删除图书信息成功');window.location.href='datainfoList.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('删除图书信息失败');window.location.href='datainfoList.php';</script>";
    }
}
?>
