<?php
include("conn.php");
while(list($name,$value)=each($_POST))
  {
    $sql="delete from users where user='".$value."'";
    $res=$con->query($sql);
    // echo $sql;
  }
// header("location:edituser.php");
echo "<script>alert(\"删除成功\");window.location='edituser.php';</script>";
?>