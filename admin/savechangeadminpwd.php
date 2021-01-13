<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
$p1=trim($_POST['p1']);
$p2=trim($_POST['p2']);

$name=$_SESSION['username'];
class chkchange
   {
	   var $name;
	   var $p1;
	   var $p2;
	   function chkchange($x,$y,$z)
	    {
		  $this->name=$x;
		  $this->p1=$y;
		  $this->p2=$z;
		
		}
	   function changepassword()
	   {include("conn.php");
		$sql="select * from admin where name='".$this->name."'";
		$res=$con->query($sql);
		$row=mysqli_fetch_array($res);
		if($row['password']!=$this->p1)
		 {
		   echo "<script>alert('".$this->p1.$row['password']."请输入正确的密码!');history.back();</script>";
		   exit;
		 }
		 else
		 {
		   $sql1="update admin set password='".$this->p2."'  where name='$this->name'";
		   $res1=$con->query($sql1);
		   echo "<script>alert('修改密码成功!');history.back();</script>";
		   exit;
		 }
	   }
  }
 $obj=new chkchange($name,$p1,$p2); 
 $obj->changepassword() 
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
</html>