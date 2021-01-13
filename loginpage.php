<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>登录页</title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="js/lunbo.js">
  </script>
</head>

<body style="background-image: url(images/loginbj.jpg);background-size: 100%;">
  <div id="container">
    <div id="list" style="left:-600px;">
      <a href="城市简介.html"><img src="images/5.jpg" width="600px"></a>
      <a href="首页.html"><img src="images/1.jpg" width="600px"></a>
      <a href="历史沿革.html"><img src="images/2.jpg" width="600px"></a>
      <a href="地理环境.html"><img src="images/3.jpg" width="600px"></a>
      <a href="旅游.html"><img src="images/4.jpg" width="600px"></a>
      <a href="城市简介.html"><img src="images/5.jpg" width="600px"></a>
      <a href="首页.html"><img src="images/1.jpg" width="600px"></a>
    </div>
    <div id="title" style="left: -600px;">
      <div class="title-text">城市简介</div>
      <div class="title-text">首页</div>
      <div class="title-text">历史沿革</div>
      <div class="title-text">地理环境</div>
      <div class="title-text">旅游</div>
      <div class="title-text">城市简介</div>
      <div class="title-text">首页</div>

    </div>

    <div id="buttons">
      <span index="1" class="on"> </span>
      <span index="2"></span>
      <span index="3"></span>
      <span index="4"></span>
      <span index="5"></span>
    </div>
    <a href="javascript:;" class="arrow" id="prev">&lt;</a>
    <a href="javascript:;" class="arrow" id="next">&gt;</a>
  </div>
  <div class="login-box" id="login-box">
    <form name="form1" method="post" action="chkuser.php">
      <div class="login-box-img">
        <!-- style="background-image: url(images/login-img.png);" -->
        <img src="images/login-img.png" onclick="showloginboxt()">
      </div>
      <div id="login-box-t">
        <div id="login-box-text">
          &nbsp&nbsp账号/用户名<input type="text" id="username" class="username" name="username" placeholder="账号/用户名">
        </div>
        <div id="login-box-text">
          &nbsp&nbsp密&nbsp&nbsp码<a href="findpasw.php" style="float:right;font-size:smaller;margin-top:5px;margin-right:6px">忘记密码</a>
          <input type="password" id="password" class="password" name="password" placeholder="密码">
          <!-- <div id="showorhide"> -->
          <img src="images/view.png" alt="" id="showorhide" onclick="hideShow()">
          <!-- </div> -->
        </div>
        <div id="login-box-text">
          &nbsp&nbsp验证码<br><input type="text" id="yzm" class="yzm" name="yzm" placeholder="验证码" />
          <div style="float: right;height:100%;margin-top:10px;margin-right:5px;margin-bottom:-30px">
            <?php
            $num = intval(mt_rand(1000, 9999));

            for ($i = 0; $i < 4; $i++) {
              echo "<img src=images/code/" . substr(strval($num), $i, 1) . ".gif>";
            }
            ?>
          </div>
          <input type="hidden" value="<?php echo $num; ?>" name="num" />
        </div>
        <div id="login-box-button" style="float: left;margin-left:25px ;">
          <button type="submit" class="btn" name="submit" value="登录" style="font-size: 15px; width: 100%;margin-top: 7px;height: 30px;">登录</button>
        </div>
        <div id="login-box-button" style="float: left;margin-left:15px ">
          <button type="button" class="btn" onclick="register()" style="font-size: 15px; width: 100%;margin-top: 7px;height: 30px;">注册</button>
        </div>
    </form>
        <div id="login-box-button" style="float: left;margin-left:15px; ">
          <button class="btn" onclick="tourist()" style="font-size: 15px; width: 100%;margin-top: 7px;height: 30px;">游客访问</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
  <div class="register-box" id="register-box">
    <form name="form2" method="post" action="">
      <div id="register-box-t">
        <div id="register-box-text">
          &nbsp&nbsp账号/用户名<input type="text" id="username" name="user" class="username" placeholder="账号/用户名">
        </div>
        <div id="register-box-text">
          &nbsp&nbsp密&nbsp&nbsp码<input type="password" id="pasw" name="pasw" class="password" placeholder="密码">
          <div id="showorhide">
            <img src="images/view.png" alt="" id="showorhide1" onclick="hideShow()">
          </div>
        </div>
        <div id="register-box-text">
          &nbsp&nbsp手&nbsp&nbsp机<input type="text" id="phone" name="phon" placeholder="手机">
        </div>
        <div id="register-box-text">
          &nbsp&nbsp邮&nbsp&nbsp箱<input type="text" id="mail" name="mail" placeholder="邮箱">
        </div>
        <div id="register-box-button" style="float: left;margin-left:25px ;">
          <button type="submit" class="btn" name="submit" value="提交" onclick="checkreg()" style="font-size: 15px; width: 100%;margin-top: -7px;height: 30px;">提交</button>
        </div>
        <div id="register-box-button" style="float: left;margin-left:15px ">
          <button type="reset" class="btn" value="重填" style="font-size: 15px; width: 100%;margin-top: -7px;height: 30px;">重填</button>
        </div>
        <div id="register-box-button" style="float: left;margin-left:15px ">
          <button type="reset" class="btn" onclick="register()" style="font-size: 15px; width: 100%;margin-top: -7px;height: 30px;">取消</button>
        </div>
      </div>
    </form>
  </div>
  <?php
  echo "<pre>";

  $con = mysqli_connect('localhost', 'root', '11111111', 'zhlt');

  //  var_dump($con);
  //  mysqli_connect_errno($con);
  if ($con) {
    //  echo '连接成功';
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_client=utf8');
    mysqli_query($con, 'set character_set_results=utf8');

    //     if($_POST["submit"]=="登录"){
    //       if($_POST["username"]!=null&&$_POST["password"]!=null){
    //         $username=$_POST["username"];
    //         $password=$_POST["password"];
    //         $sql="select * from users where user='$username'";
    //         $res=$con->query($sql);
    //         $row=mysqli_fetch_object($res);
    //         // $sql=mysqli_query($con,"select * from users where user='$username'");
    //         var_dump($row);
    //         // echo $res;
    //         if($row){
    //           if($row->password==$password){

    // 	           $_SESSION['username']=$this->user;

    //                echo "<script>alert('登录成功!');window.location='homepage.php';</script>";
    //                exit;
    //           }
    //           else{echo "<script>alert(\"请输入正确的密码\");</script>";}
    //         }
    //         else{echo "<script>alert(\"账号/用户名不存在\");</script>";}

    //       }
    //       else if($_POST["username"]==null){
    //         echo "<script>alert(\"请输入账号/用户名\");</script>";
    //       }	
    //       else if($_POST["password"]==null){
    //         echo "<script>alert(\"请输入密码\");</script>";
    //       }
    //     }


    if ($_POST["submit"] == "提交") {
      if ($_POST["user"] != null && $_POST["pasw"] != null) {
        $user = $_POST["user"];
        $pasw = $_POST["pasw"];
        $phon = $_POST["phon"];
        $mail = $_POST["mail"];
        $sql1 = "select * from users where user='$user'";
        $res1 = $con->query($sql1);
        $row = mysqli_fetch_object($res1);
        if ($row->user == null) {
          $sql = "insert into users(user,password,phone,mail) values('$user','$pasw','$phon','$mail');";
          $result = $con->query($sql);
          echo "<script>alert(\"注册成功（温馨提示：请您尽快进入个人中心设置密保问题保障账号安全）\");</script>";
        } else {
          echo "<script>alert(\"用户名重复\");</script>";
        }
      } else if ($_POST["user"] == null) {
        echo "<script>alert(\"请输入账号/用户名\");</script>";
      } else if ($_POST["pasw"] == null) {
        echo "<script>alert(\"请输入密码\");</script>";
      }
    }
  } else {
    echo '连接失败';
  }
  ?>
</body>

</html>