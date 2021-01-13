<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>文章管理</title>
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
  <!-- <form name="form1" method="post" action=""> -->
    <table width="600" height="271" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td style="text-align:center"><strong style="font-size:20px">查询文章信息</strong></td>
      </tr>
      <tr>
        <td>
          <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
              <td>
                <form name="formeee2" method="get" action="editarticle.php">
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
              <td width="45%" style="text-align:center">文章标题</td>
              <td width="10%" style="text-align:center">作者</td>
              <td width="10%" style="text-align:center">类型</td>
              <td width="15%" style="text-align:center">发布时间</td>
              <td width="3%" style="text-align:center">删除</td>
            </tr>
            <form name="form3" method="post" action="deletearticle.php">
            <?php
            $conn = mysqli_connect("localhost", 'abc', '11111111', 'zhlt') or die("数据库服务器连接错误");
            mysqli_query($conn, "set names utf8");
            $keyword = $_GET["find"];
            // echo $keyword;
            // $sql1="select * from publish where title like '%$keyword%' or content like '%$keyword%'";
            $sql = "select * from publish where title like '%$keyword%' or content like '%$keyword%' order by id desc";
            $res = $conn->query($sql);
            $row = mysqli_fetch_object($res);
            //echo $sql;
            if (!$row) {
              echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索!</font>";
            }
            do {
            ?>
              <tr bgcolor="#FFFFFF" height="50px">
                <td><?php echo "<a href='../" . $row->path . "' target='_blank'>" . $row->title . "</a>";?></td>
                <!-- <form name="form3" method="post" action="deletearticle.php"> -->
                <td style="text-align:center"><?php echo $row->author; ?></td>
                <td style="text-align:center"><?php echo $row->category; ?></td>
                <td style="text-align:center"><?php echo $row->time; ?></td>
                <td style="text-align:center"><input align="center" type="checkbox" name="<?php echo $row->title; ?>" value=<?php echo $row->title; ?>></td>
              </tr>
            <?php
            } while ($row = mysqli_fetch_object($res));
            mysqli_close($conn);
            ?>
            <table width="1100" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
              <td width="92">
                <div style="float:right;margin-right:50"><input type="submit" name="submit" value="删除选项" onclick="javascript:return confirm('您确认要删除文章吗？');">
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

  <!-- </form> -->

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