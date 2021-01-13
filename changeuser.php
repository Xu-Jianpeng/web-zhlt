<?php
session_start();
include("conn.php");
$mail=$_POST['mail'];
$sex=$_POST['sex'];
$self=$_POST['self-introduce'];
$phone=$_POST['phone'];
$qq=$_POST['qq'];
$address=$_POST['address'];
$hometown=$_POST['hometown'];
$question=$_POST['question'];
$answer=$_POST['answer'];
$sql="update users 
    set sex='$sex',mail='$mail',phone='$phone',qq='$qq', address='$address',hometown='$hometown',self='$self',question='$question',answer='$answer'
    where user='$_SESSION[username]'" ;
$res=$con->query($sql);
header("location:usercenter.php");

?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
</html>