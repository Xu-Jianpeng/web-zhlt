<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
$con = mysqli_connect('localhost','root','11111111','zhlt');
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_client=utf8');
    mysqli_query($con,'set character_set_results=utf8');
$id=$_POST['rid'];
echo $id;
$sql="delete from reply where id='$id'";
echo $sql;
$res=$con->query($sql);
echo"<script>alert('删除成功');history.go(-1);</script>";  
?>
<html>
    <head>
        <meta charset="utf-8"> 
    </head>
</html>
