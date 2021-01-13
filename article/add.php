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
  $content=$_POST["ncontent"]; 
  // $content=str_replace("<br>",chr(10),$content); //chr(10)换行符的ascii码
  if($_POST["pulishing"]=="发布"){
    if($title!=null&&$content!=null&&$_POST["category"]!=null){
        echo "<script>alert(\"发布成功\");</script>";
    }
    else if($title==null){
      echo "<script>alert(\"请输入标题\");history.go(-1);</script>";
      exit;
    }	
    else if($content==null){
      echo "<script>alert(\"请输入内容\");history.go(-1);</script>";
      exit;
    }
    else if($_POST["category"]==null){
      echo "<script>alert(\"请选择文章类别\");history.go(-1);</script>";
      exit;
    }
  }
  require_once("conn.php"); //引用conn.php，连接数据库 
  if($_POST["category"]=='时政')
    $category='political';
  else if($_POST["category"]=='民生')
    $category='livelihood';
  else if($_POST["category"]=='新闻')
    $category='news';
  else if($_POST["category"]=='美食')
    $category='food';
  else if($_POST["category"]=='教育')
    $category='education';

  $countfile="../".$category."/count.txt"; 
  if(!file_exists($countfile)) 
  { 
    fopen($countfile,"w"); 
  } 
  $fp=fopen($countfile,"r"); 
  $num=fgets($fp,20); 
  $num=$num+1; 
  fclose($fp); 
  $fp=fopen($countfile,"w"); 
  fwrite($fp,$num); 
  fclose($fp); 
 
  $houzui=".php"; 
  $path=$category.$num.$houzui; 
  $pathss="../".$category."/".$path;
  $paths=$category."/".$path;
 
  $file=$_FILES["file"]["tmp_name"];
  $filename=$category.$num.".png";
  $imgpath="images/".$category."/";
  $imgpaths="../images/".$category."/";
  $res=move_uploaded_file($file,$imgpaths.$filename);

  $date=date("Y-m-d");

  // $sql="insert into $category (title,content,path) values (".$title.",".$content.",".$path.")"; 
  $sql="insert into publish (title,content,author,category,path,imgpath,time) values ('$title','$content','$_SESSION[username]','$category','$paths','$imgpath$filename','$date')"; 
  $query=$con->query($sql);
  echo $sql;
  // echo $query;
 
  // $content=str_replace("\n","<br>",$content);
  $fp=fopen("model.php","r"); 
  $str=fread($fp,filesize("model.php"));
  $str=str_replace("{title}",$title,$str); 
  $str=str_replace("{content}",$content,$str);
  fclose($fp); 
 
  $handle=fopen("../".$category."/".$path,"w"); 
  fwrite($handle,$str); 
  fclose($handle); 
 
 
  echo "<script>window.location='../homepage.php';</script>";
?>