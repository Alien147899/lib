<?php
session_start();
error_reporting(0);
include 'conn.php';
if ($_GET['id']) {
    $sql = "delete from sorttype where typeid='$_GET[id]' ";
    $result = $db->query($sql);
    if ($result) {
        echo "<script language='javascript' type='text/javascript'>alert('删除分类成功');window.location.href='typeinfoList.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('删除分类失败');window.location.href='typeinfoList.php';</script>";
    }
}
?>
