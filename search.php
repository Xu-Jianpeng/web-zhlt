<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
  <title>文章检索</title>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
  <!-- <link href="css/homepage.css" rel="stylesheet"> -->
</head>

<body>
  <?php
  include("top.php");
  ?>
  <script language="javascript">
    function check(form) {
      if (form.txt_keyword.value == "") {
        alert("请输入查询关键字!");
        form.txt_keyword.focus();
        return false;
      }
      form.submit();
    }
  </script>
  <table style="margin:auto;width:100%">
    <tr>
      <td style="text-align:center"><strong style="font-size:20px">查询文章信息</strong></td>
    </tr>
    <tr>
      <td>
        <table style="margin:auto;margin-top:20px;margin-bottom:20px">
          <tr>
            <td>
              <form name="form1" method="get" action="">
                查询关键字&nbsp;
                <input name="find" type="text" id="txt_keyword" size="40">
                &nbsp;
                <input type="submit" name="Submit" value="搜索" onClick="return check(form)">
              </form>
            </td>
          </tr>
        </table>
        <table style="width:80%;margin:auto; font-size:18px;">
          <tr bgcolor="#f0f0f0" height="50px">
            <td width="60%" style="text-align:center">文章标题</td>
            <td width="40%" style="text-align:center">发布时间</td>
          </tr>
          <?php
          $conn = mysqli_connect("localhost", 'abc', '11111111', 'zhlt') or die("数据库服务器连接错误");
          mysqli_query($conn, "set names utf8");
          // $keyword = $_POST["find"];
          $keyword = $_GET["find"];
          // echo $keyword;
          // $sql1="select * from publish where title like '%$keyword%' or content like '%$keyword%'";
          $sql = "select * from publish where title like '%$keyword%' or content like '%$keyword%' order by id desc";
          $res = $conn->query($sql);
          $row = mysqli_fetch_object($res);
          // echo $sql1;
          if (!$row) {
            echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
          }
          do {
          ?>
            <tr bgcolor="#FFFFFF" height="50px">
              <td><?php //echo "<a href=".$row->path.">".$row->title."</a>"; ?>
                <form action="model.php" name=formse<?echo $row->id?> method="get">
                  <a href="javascript:formse<?echo $row->id?>.submit();">
                    <input type="hidden" name="title" value="<?echo $row->title?>">
                    <?php //echo "<a href=".$row1[$j].">"
                    ?>
                    <?php echo $row->title; ?>
                    <br><br>
                  </a>
                </form>
              </td>
              <td style="text-align:center"><?php echo $row->time; ?></td>
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
</body>

</html>