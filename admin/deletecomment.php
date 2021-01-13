<?php
include("conn.php");
while (list($name, $value) = each($_POST)) 
{
  $sql= "delete from comment where id='". $value . "'";
  $res = $con->query($sql);
  $sql1= "delete from reply where commentId='". $value . "'";
  $res1 = $con->query($sql1);
}
echo "<script>alert(\"删除成功\");window.location='editcomment.php';</script>";
?>