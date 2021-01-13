<?php
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>删除文章</title>
    </head>
</html>
<?php
include("conn.php");
$id = $_POST['id1'];
$sql0 = "select * from publish where id='$id'";
echo $sql0;
$res0 = $con->query($sql0);
$row = mysqli_fetch_object($res0);
$path = $row->path;
$imgpath = $row->imgpath;
echo $imgpath;
unlink($path);
unlink($imgpath);
$sql = "delete from publish where id='" . $id . "'";
$sql1 = "delete from comment where articleId='" . $id . "'";
$res = $con->query($sql);
$res1 = $con->query($sql1);
header("location:editarticle.php");
echo "<script>alert(\"删除成功\");window.location='selfpage.php';</script>";
