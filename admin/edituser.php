<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>用户管理</title>
  <style>
    a {
      text-decoration: none;
      color: black;
    }

    a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <form name="form1" method="post" action="deleteuser.php">
  <table width="600" height="271" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td style="text-align:center"><strong style="font-size:20px">全体用户信息</strong></td>
    </tr>
    <tr>
      <td>
        <table width="1050" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
          <tr bgcolor="#f0f0f0" height="50px">
            <td width="30%" style="text-align:center">用户名</td>
            <td width="30%" style="text-align:center">手机号</td>
            <td width="30%" style="text-align:center">邮箱</td>
            <td width="10%" style="text-align:center">移除</td>
          </tr>
          <?php
          $conn = mysqli_connect("localhost", 'abc', '11111111', 'zhlt') or die("数据库服务器连接错误");
          mysqli_query($conn, "set names utf8");
         // $keyword = $_POST["find"];
          $sql = "select * from users";
          $res = $conn->query($sql);
          $row = mysqli_fetch_object($res);
          // echo $sql1;
          // if (!$row) {
          //   echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
          // }
          do {
          ?>
            <tr bgcolor="#FFFFFF" height="50px">
              <td><?php echo $row->user ; ?></td>
              <td style="text-align:center"><?php echo $row->phone; ?></td>
              <td style="text-align:center"><?php echo $row->mail; ?></td>
              <td><input align="center" type="checkbox" name="<?php echo $row->user; ?>" value=<?php echo $row->user; ?>></td>
            </tr>
          <?php
          } while ($row = mysqli_fetch_object($res));
          mysqli_close($conn);
          ?>
        </table>
      </td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
  <table width="1100" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
    <td width="92">
      <div style="float:right;margin-right:50"><input type="submit" value="删除选项" class="buttoncss">
      </div>
    </td>
    </tr>

  </table>
  </form>

</body>

</html>