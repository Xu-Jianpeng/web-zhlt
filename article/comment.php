<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
$con = mysqli_connect('localhost','root','11111111','zhlt');
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_client=utf8');
    mysqli_query($con,'set character_set_results=utf8');
$content=$_POST['content'];
$commentName=$_POST['commentName'];
// $date=date("Y-m-d H:i:s");
$articleId=$_POST['atcid'];
$sql0="select * from publish where id='$articleId'";
$res0=$con->query($sql0);
$row0=mysqli_fetch_object($res0);
$authorName=$row0->author;
echo $authorName;
$sql="insert into comment (content,articleId,commentName,authorName) 
    values ('$content','$articleId','$commentName','$authorName')"; 
// echo $sql;
$res=$con->query($sql);
echo"<script>history.go(-1);</script>";  
?>
<html>
    <head>
        <meta charset="utf-8"> 
    </head>
</html>
