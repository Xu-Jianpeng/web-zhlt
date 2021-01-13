<?php
session_start();
include("top.php");
?>
<html>

<head>
    <meta charset="utf-8">
    <title>个人中心</title>
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
    <!-- <form name="form1" method="post" action="userarticle.php"> -->
    <table width="600" height="271" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td style="text-align:center"><strong style="font-size:20px">发布文章信息</strong></td>
        </tr>
        <tr>
            <td>

                <?php
                $conn = mysqli_connect("localhost", 'abc', '11111111', 'zhlt') or die("数据库服务器连接错误");
                mysqli_query($conn, "set names utf8");
                $author = $_SESSION['username'];
                $sql = "select * from publish where author='$author' order by id desc;";
                $res = $conn->query($sql);
                // $row = mysqli_fetch_object($res);
                for ($i = 0; $i < mysqli_num_rows($res); $i++) {
                    $rows1 = mysqli_fetch_object($res);
                    $rows2[$i] = $rows1->title;
                    $rows3[$i] = $rows1->time;
                    $rows4[$i] = $rows1->path;
                    $rows5[$i] = $rows1->id;
                    $rows6[$i] = $rows1->category;
                }
                // $row = mysqli_fetch_array($res);
                // echo $sql1;
                if (!$rows1) { ?>

                    <p style="background-color:lightgrey;color:white;font-family: 宋体;font-size:30px;width:800px;height:200px;text-align:center;line-height:200px">
                        尚未发布文章,<a href="article/publish.php">点击发布</a>
                    </p>

                    <?}else{?>
                    <table width="1050" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
                        <tr bgcolor="#f0f0f0" height="50px">
                            <td width="50%" style="text-align:center">标题</td>
                            <td width="15%" style="text-align:center">类型</td>
                            <td width="25%" style="text-align:center">发布时间</td>
                            <td width="5%" style="text-align:center">编辑</td>
                            <td width="5%" style="text-align:center">删除</td>
                        </tr>
                        <? 
                        for($i=0;$i<mysqli_num_rows($res);$i++){
                            ?>
                        <!-- <form name="form<?echo $i?>" action="userarticle.php" method="POST"> -->
                            <tr bgcolor="#FFFFFF" height="50px">
                                <td><?php //echo "<a href=" . $rows4[$i] . ">" . $rows2[$i] . "</a>"; ?>
                                <form action="model.php" name=formse<?echo $i?> method="get">
                                    <a href="javascript:formse<?echo $i?>.submit();">
                                        <input type="hidden" name="title" value="<?echo $rows2[$i]?>">
                                        <?php //echo "<a href=".$row1[$j].">"
                                        ?>
                                        <?php echo $rows2[$i]; ?>
                                        <br><br>
                                    </a>
                                </form>
                            </td>
                            <form name="form<?echo $i?>" action="userarticle.php" method="POST">
                                <td style="text-align:center"><?php echo $rows6[$i]; ?></td>
                                <td style="text-align:center"><?php echo $rows3[$i]; ?></td>
                                <td width="92">
                                    <input type="hidden" name="id" value="<?php echo $rows5[$i] ?>">
                                    <div style="float:right;margin-right:50"><input type="submit" value="编辑">
                                    </div>
                                </td>
                        </form>
                        <form name="form<?echo $i?>" action="deletearticle.php" method="POST">
                            <td width="92">
                                <input type="hidden" name="id1" value="<?php echo $rows5[$i] ?>">
                                <div style="float:right;margin-right:50"><input type="submit" value="删除" onclick="javascript:return confirm('您确认要删除文章吗？');">
                                </div>
                            </td>
                        </form>
        </tr>
    <?php
                }
                mysqli_close($conn);
    ?>
    </table>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    <? }?>

</body>

</html>