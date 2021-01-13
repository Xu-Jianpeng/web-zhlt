<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
// include("top.php");
?>
<html>

<head>
  <meta charset="utf-8">
  <title>修改密码</title>
</head>

<body>
  <table width="1000" height="100" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:18px">
    <tr>
      <td height="60" bgcolor="#555555">
        <div align="center" style="color: #FFFFFF;font-size:20px">修改管理员密码</div>
      </td>
    </tr>
    <tr>
      <td height="80" bgcolor="#555555">
        <table width="1000" height="80" border="0" align="center" cellpadding="0" cellspacing="1">
          <script language="javascript">
            function chkinput1(form) {
              if (form.p1.value == "") {
                alert("请输入原密码!");
                form.p1.select();
                return (false);
              }
              if (form.p2.value == "") {
                alert("请输新密码!");
                form.p2.select();
                return (false);
              }
              if (form.p3.value == "") {
                alert("请输确认密码!");
                form.p3.select();
                return (false);
              }
              if (form.p2.value != form.p3.value) {
                alert("密码与确认密码不同!");
                form.p2.select();
                return (false);
              }
              // if (form.p2.value.length < 6) {
              //   alert("新密码长度应大于6!");
              //   form.p2.select();
              //   return (false);
              // }
              return (true);
            }
          </script>
          <form name="form1" method="post" action="savechangeadminpwd.php" onSubmit="return chkinput1(this)">
            <tr>
              <td width="377" height="60" bgcolor="#FFFFFF">
                <div align="right">原密码：</div>
              </td>
              <td width="570" bgcolor="#FFFFFF">
                <div align="left"><input type="password" name="p1" size="20" class="inputcss"></div>
              </td>
            </tr>
            <tr>
              <td height="60" bgcolor="#FFFFFF">
                <div align="right">新密码：</div>
              </td>
              <td height="60" bgcolor="#FFFFFF">
                <div align="left"><input type="password" name="p2" size="20" class="inputcss"></div>
              </td>
            </tr>
            <tr>
              <td height="60" bgcolor="#FFFFFF">
                <div align="right">确认新密码：</div>
              </td>
              <td height="60" bgcolor="#FFFFFF">
                <div align="left"><input type="password" name="p3" size="20" class="inputcss"></div>
              </td>
            </tr>
            <tr>
              <td height="60" colspan="2" bgcolor="#FFFFFF">
                <div align="center"><input type="submit" value="更改" class="buttoncss"></div>
              </td>
            </tr>
          </form>
        </table>
      </td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
  <table width="1000" height="20" border="0" align="center" cellpadding="0" cellspacing="0" > 
    <tr>
      <td bgcolor="#555555">
      </td>
    </tr>
  </table>
</body>

</html>