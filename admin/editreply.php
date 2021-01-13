<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>评论管理</title>
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
  <!-- <table>
        <td>
            <tr>
                <?php
                include("left.php")
                ?>
            </tr>
        </td>
    </table> -->
  <div style="float: left;">
    <?php
    // include("left.php");
    ?>
  </div>
  <form name="form1" method="post" action="">
    <table width="600" height="271" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td style="text-align:center"><strong style="font-size:20px">查询评论信息</strong></td>
      </tr>
      <tr>
        <td>
          <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
              <td>
                <form name="form2" method="post" action="editreply.php">
                  <p style="text-align: center;">查询关键字&nbsp;</p>
                  <input name="find" type="text" id="txt_keyword" size="40">
                  &nbsp;
                  <input type="submit" name="Submit" value="搜索" onClick="return check(form)">
                </form>
              </td>
            </tr>
          </table>
          <table width="1050" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#999999">
            <tr bgcolor="#f0f0f0" height="50px">
              <td width="25%" style="text-align:center">回复内容</td>
              <td width="25%" style="text-align:center">发布时间</td>
              <td width="40%" style="text-align:center">文章标题</td>
              <td width="10%" style="text-align:center">删除</td>
            </tr>
            <form name="form3" method="post" action="deletereply.php">
              <?php
              $conn = mysqli_connect("localhost", 'abc', '11111111', 'zhlt') or die("数据库服务器连接错误");
              mysqli_query($conn, "set names utf8");
              $keyword = $_POST["find"];
              // echo $keyword;
              $sql = "select * from reply where content like '%$keyword%' order by id desc";
              $res = $conn->query($sql);
              $row = mysqli_fetch_object($res);
              
              if (!$row) {
                echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
              }
              do{
                $sql1 = "select * from publish where id='$row->articleId'";
                $res1 = $conn->query($sql1);
                $row1 = mysqli_fetch_object($res1);
              ?>
                <tr bgcolor="#FFFFFF" height="50px">
                  <td style="text-align:center"><?php echo $row->content; ?></td>
                  <td style="text-align:center"><?php echo $row->date; ?></td>
                  <td style="text-align:center"><?php echo "<a href='../" . $row1->path . "' target='_blank'>" . $row1->title . "</a>"; ?></td>
                  <td style="text-align:center"><input align="center" type="checkbox" name="<?php echo $row->id; ?>" value=<?php echo $row->id; ?>></td>
                </tr>
              <?php
              // $i++;
              } while($row = mysqli_fetch_object($res));
              mysqli_close($conn);
              ?>
              <table width="1100" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                <td width="92">
                  <div style="float:right;margin-right:50"><input type="submit" name="submit" value="删除选项" onclick="javascript:return confirm('您确认要删除回复吗？');">
                  </div>
                </td>
      </tr>

    </table>
  </form>
  </table>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>

  </form>

</body>

</html>
<?php
// if($_POST['submit']=="删除选项"){
//   while (list($name, $value) = each($_POST)) 
//   {
//   $sql0 = "select * from publish where title='" . $value . "'";
//   $res0 = $con->query($sql0);
//   echo $sql0;
//   $row = mysqli_fetch_object($res0);
//   $path = $row->path;
//   $imgpath = $row->imgpath;
//   $id = $row->id;
//   // echo $imgpath;
//   unlink($path);
//   unlink($imgpath);
//   $sql = "delete from publish where title='" . $value . "'";
//   $sql1= "delete from comment where articleId='". $id . "'";
//   $res = $con->query($sql);
//   $res1 = $con->query($sql1);
//   }
//   // header("location:editarticle.php");
//   echo "<script>alert(\"删除成功\");window.location='selfpage.php';</script>";
// }
// 
?>