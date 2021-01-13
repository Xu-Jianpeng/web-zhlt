<?php
include("conn.php");
while (list($name, $value) = each($_POST)) 
{
  $sql0 = "select * from publish where title='" . $value . "'";
  $res0 = $con->query($sql0);
  echo $sql0;
  $row = mysqli_fetch_object($res0);
  $path = $row->path;
  $imgpath = $row->imgpath;
  $id = $row->id;
  // echo $imgpath;
  unlink("../" . $path);
  unlink("../" . $imgpath);
  $sql = "delete from publish where title='" . $value . "'";
  $sql1= "delete from comment where articleId='". $id . "'";
  $res = $con->query($sql);
  $res1 = $con->query($sql1);
}
// header("location:editarticle.php");
echo "<script>alert(\"删除成功\");window.location='editarticle.php';</script>";
?>