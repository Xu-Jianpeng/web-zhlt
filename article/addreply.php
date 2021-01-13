<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
$con = mysqli_connect('localhost','root','11111111','zhlt');
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_client=utf8');
    mysqli_query($con,'set character_set_results=utf8');
$content=$_POST['content'];
$replyName=$_POST['replyName'];
// $date=date("Y-m-d H:i:s");
$articleId=$_POST['atcid'];
$commentId=$_POST['cmtid'];
$replyId=$_POST['repid'];
$sql0="select * from publish where id='$articleId'";
$res0=$con->query($sql0);
$row0=mysqli_fetch_object($res0);
$authorName=$row0->author;
if($replyId==0){
$sql1="select * from comment where id='$commentId'";
$res1=$con->query($sql1);
$row1=mysqli_fetch_object($res1);
$commentName=$row1->commentName;
}
else{
$sql2="select * from reply where id='$replyId'";
$res2=$con->query($sql2);
$row2=mysqli_fetch_object($res2);
$commentName=$row2->replyName;
}
echo $authorName;
if(!$replyId){
$sql="insert into reply (content,articleId,commentId,replyName,commentName,authorName) 
    values ('$content','$articleId','$commentId','$replyName','$commentName','$authorName')"; 
// echo $sql;
$res=$con->query($sql);
}
else{
    $sqll="insert into reply (content,articleId,replyId,commentId,replyName,commentName,authorName) 
    values ('$content','$articleId','$replyId','$commentId','$replyName','$commentName','$authorName')"; 
// echo $sql;
    $ress=$con->query($sqll);
}
echo"<script>history.go(-1);</script>";  
?>
<html>
    <head>
        <meta charset="utf-8"> 
    </head>
</html>
