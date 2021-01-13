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
$yzm=$_POST['yzm'];
$num=$_POST['num'];
// echo strval($yz);
// echo strval($num);
if(strval($yzm)!=strval($num))
 {
  echo "<script>alert('验证码错误!');history.go(-1);</script>";
  exit;
 }
$con = mysqli_connect('localhost','root','11111111','zhlt');
 
//  var_dump($con);
//  mysqli_connect_errno($con);
 if($con){
  //  echo '连接成功';
   mysqli_query($con,'set names utf8');
   mysqli_query($con,'set character_set_client=utf8');
   mysqli_query($con,'set character_set_results=utf8');

    if($_POST["submit"]=="登录"){
      if($_POST["username"]!=null&&$_POST["password"]!=null){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sql="select * from admin where name='$username'";
        $res=$con->query($sql);
        $row=mysqli_fetch_object($res);
        // $sql=mysqli_query($con,"select * from users where user='$username'");
        // var_dump($row);
        // echo $res;
        if($row){
          if($row->password==$password){
	           $_SESSION['username']=$row->name;
               echo "<script>alert('登录成功!');window.location='backstage.php';</script>";
               exit;
          }
          else{
            echo "<script>alert(\"请输入正确的密码\");window.location='index.php';</script>";
            exit;
          }
        }
        else{
          echo "<script>alert(\"账号/用户名不存在\");window.location='index.php';</script>";
          exit;
        }
      }
      else if($_POST["username"]==null){
        echo "<script>alert(\"请输入账号/用户名\");window.location='index.php';</script>";
        exit;
      }	
      else if($_POST["password"]==null){
        echo "<script>alert(\"请输入密码\");window.location='index.php';</script>";
        exit;
      }
    }
  }
?>