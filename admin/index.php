<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>管理员登录页</title>
  <!-- <link href="../css/style.css" rel="stylesheet" type="text/css"/> -->
  <script src=".. /js/lunbo.js"></script>
  <style>
    .login-box {
      height: 378px;
      width: 308px;
      background-color: rgba(173, 216, 230, 0.527);
      float: left;
      margin-left: 40%;
      margin-top: 8%;
    }

    .login-box-img {
      width: 75%;
      height: 100px;
      margin: auto;
      /* background-color: lightcoral; */
      opacity: .6;
    }

    #login-box-t {
      margin: auto;
    }

    #login-box-text {
      width: 80%;
      height: 50px;
      margin: auto;
      margin-top: 20px;
      /* background-color: lightcyan; */
      /* line-height: 50px; */
    }

    #login-box-button {
      width: 25%;
      height: 35px;
      margin-top: 25px;
      /* margin: auto; */
      /* background-color: lightgoldenrodyellow; */
      line-height: 35px;
    }

    .username {
      height: 30px;
      width: 92.5%;
      font-size: 15px;
      margin-left: 9px;
      margin-top: 10px;
      opacity: .6;
    }
    
    .yzm {
      height: 30px;
      width: 55%;
      font-size: 15px;
      margin-left: 9px;
      margin-top: 10px;
      opacity: .6;
    }

    .password {
      height: 30px;
      width: 92.5%;
      font-size: 15px;
      margin-top: 10px;
      margin-left: 9px;
      float: left;
      opacity: .6;
    }

    .btn {
      width: 100px;
      text-align: center;
      line-height: 100%;
      padding: 0.3em;
      font: 16px Arial, sans-serif bold;
      font-style: normal;
      text-decoration: none;
      margin: 2px;
      vertical-align: text-bottom;
      zoom: 1;
      outline: none;
      font-size-adjust: none;
      font-stretch: normal;
      border-radius: 50px;
      box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
      text-shadow: 0px 1px 1px rgba(0, 0, 0, 0.3);
      color: #444441;
      border: 0.2px solid #96ccfc;
      background-repeat: repeat;
      background-size: auto;
      background-origin: padding-box;
      background-clip: padding-box;
      background-color: #3399ff;
      background: linear-gradient(to bottom, #eeeff9 0%, #73b9ff 100%);
    }

    .btn:hover {
      background: #96ccfc;
    }
    img{
      height:65%;
    }
  </style>
</head>

<body style="background-image: url(../images/bj.jpg);background-size: 100%;">
  <div style="margin:auto">
    <div class="login-box" id="login-box">
      <form name="form1" method="post" action="chkadmin.php">
        <div class="login-box-img">
          <!-- style="background-image: url(images/login-img.png);" -->
          <img src="../images/login-img.png" style="height:100%" onclick="showloginboxt()">
        </div>
        <div id="login-box-t">
          <div id="login-box-text">
            &nbsp&nbsp账号/用户名<input type="text" id="username" class="username" name="username" placeholder="账号/用户名">
          </div>
          <div id="login-box-text">
            &nbsp&nbsp密&nbsp&nbsp码<input type="password" id="password" class="password" name="password" placeholder="密码">
            <!-- <div id="showorhide"> -->
            <img src="images/view.png" alt="" id="showorhide" onclick="hideShow()">
            <!-- </div> -->
          </div>
          <div id="login-box-text">
            &nbsp&nbsp验证码<br><input type="text" id="yzm" class="yzm" name="yzm" placeholder="验证码"/>
            <div style="float: right;height:100%;margin-top:10px;margin-right:5px">
            <?php
            $num = intval(mt_rand(1000, 9999));

            for ($i = 0; $i < 4; $i++) {
              echo "<img src=../images/code/" . substr(strval($num), $i, 1) . ".gif>";
            }
            ?>
            </div>
            <input type="hidden" value="<?php echo $num;?>" name="num"/>
          </div>
          <div id="login-box-button" style="float: left;margin-left:35% ;">
            <button type="submit" class="btn" name="submit" value="登录" style="font-size: 15px; width: 100%;margin-top: 7px;height: 30px;">登录</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>