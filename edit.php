<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
</html>
<?php 
  $title=$_POST["ntitle"]; 
  $content=$_POST["ncontent"]; //获得表单变量 
  // $content=str_replace("<br>",chr(10),$content); //chr(10)换行符的ascii码
  if($_POST["pulishing"]=="确认修改"){
    if($title!=null&&$content!=null){
        // echo "<script>alert(\"发布成功\");</script>";
    }
    else if($title==null){
      echo "<script>alert(\"请输入标题\");history.go(-1);</script>";
      exit;
    }	
    else if($content==null){
      echo "<script>alert(\"请输入内容\");history.go(-1);</script>";
      exit;
    }
  }
  require_once("conn.php"); //引用conn.php，连接数据库 
  $sql="update publish set content='$content' where title='$title'"; 
  $query=$con->query($sql);
  // echo $sql;
  // echo $query; 
 
//收尾工作: 
  echo "<script>alert(\"修改成功\");window.location='selfpage.php';</script>";
?>