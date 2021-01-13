<?php
session_start();
$con = mysqli_connect('localhost', 'root', '11111111', 'zhlt');
mysqli_query($con, 'set names utf8');
mysqli_query($con, 'set character_set_client=utf8');
mysqli_query($con, 'set character_set_results=utf8');
$sql1 = "select * from publish where category='时政' or category='political' order by id asc";
$sql2 = "select * from publish where category='民生' or category='livelihood' order by id asc";
$sql3 = "select * from publish where category='新闻' or category='news' order by id asc";
$sql4 = "select * from publish where category='美食' or category='food' order by id asc";
$sql5 = "select * from publish where category='教育' or category='education' order by id asc";
$res1 = $con->query($sql1);
$res2 = $con->query($sql2);
$res3 = $con->query($sql3);
$res4 = $con->query($sql4);
$res5 = $con->query($sql5);
for ($i = mysqli_num_rows($res1) - 1; $i > -1; $i--) {
    $row = mysqli_fetch_object($res1);
    $row1[$i] = $row->title;
    $row14[$i] = $row->path;
    $row15[$i] = $row->imgpath;
    $row16[$i] = $row->id;

}
for ($i = mysqli_num_rows($res2) - 1; $i > -1; $i--) {
    $row = mysqli_fetch_object($res2);
    $row2[$i] = $row->title;
    $row24[$i] = $row->path;
    $row25[$i] = $row->imgpath;
}
for ($i = mysqli_num_rows($res3) - 1; $i > -1; $i--) {
    $row = mysqli_fetch_object($res3);
    $row3[$i] = $row->title;
    $row34[$i] = $row->path;
    $row35[$i] = $row->imgpath;
}
for ($i = mysqli_num_rows($res4) - 1; $i > -1; $i--) {
    $row = mysqli_fetch_object($res4);
    $row4[$i] = $row->title;
    $row44[$i] = $row->path;
    $row45[$i] = $row->imgpath;
}
for ($i = mysqli_num_rows($res5) - 1; $i > -1; $i--) {
    $row = mysqli_fetch_object($res5);
    $row5[$i] = $row->title;
    $row54[$i] = $row->path;
    $row55[$i] = $row->imgpath;
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>珠海论坛-首页</title>
    <script src="js/homepage.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link href="css/homepage.css" rel="stylesheet" type="text/css" />
</head>
<style>
    .paragrph {
        font-family: "楷体";
        font-size: 18px;
        color: black;
        overflow: hidden;
        /* 超出的文本隐藏 */
        text-overflow: ellipsis;
        /* 溢出用省略号显示 */
        display: -webkit-box;
        /* 将对象作为弹性伸缩盒子模型显示 */
        -webkit-box-orient: vertical;
        /* 这个属性不是css的规范属性，需要组合上面两个属性，表示显示的行数 */
        -webkit-line-clamp: 2;
        /*  从上到下垂直排列子元素（设置伸缩盒子的子元素排列方式） */
    }
</style>

<body>
    <!-- <div class="header">
            <div style="float: right;line-height:60px;margin-right:20px;font-size:15px">
                <?php
                if ($_SESSION['username'] != "") {
                    echo "欢迎：" . $_SESSION['username'];
                }
                ?>
                </div>
            <div class="header-main">
                <div class="header-logo">
                    <a href="homepage.php"><img src="images/homepage/logo.png"></a>
                </div>
                    <div class="dropdown" style="float: right;line-height:60px;">
                        <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" style="background-color: bisque;"><img src="images/homepage/user.png" height=20px>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">个人主页</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">更改账号信息</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="logout.php">退出登录</a>
                            </li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">注销账号</a>
                            </li>
                        </ul>
                    </div>
                <a href="地图.html" target="_blank" ><div class="header-text">地图</div></a>
                <a href="education.php"><div class="header-text">教育</div></a>
                <a href="food.php"><div class="header-text">美食</div></a>
                <a href="news.php"><div class="header-text">新闻</div></a>
                <a href="livelihood.php"><div class="header-text">民生</div></a>
                <a href="political.php"><div class="header-text">时政</div></a>
                <div class="search" style="float:right;">
                    <form name="form1" method="post" action="users/search.php">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="30">
                                    <input type="search" name="find" size="20" width="400px" placeholder="搜索">
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>
            </div>
        </div> -->
    <?php
    include("top.php");
    ?>
    <div class="central">
        <div class="central-main">

            <div class="central-rectangle">
                <div class="central-sub" style="font-size: 20px;"><img src="images/homepage/political.png" style="height: 25px;margin-top: -3px;">
                    时政&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:gray">站稳人民立场，投身强国伟业</small>
                    <a href="political.php" style="float: right;font-size: 15px;">更多<img src="images/homepage/go.png" style="height: 10px;margin-top: -3px;"></a>
                </div>
                <hr />
                <div class="central-container">
                    <?php for ($j = 0; $j < 4; $j++) { ?>
                        <form action="model.php" name=form1<?echo $j?> method="get">
                            <a href="javascript:form1<?echo $j?>.submit();">
                                <input type="hidden" name="title" value="<?echo $row1[$j]?>">
                                <?php //echo "<a href=".$row14[$j].">"
                                ?>
                                <div class="central-box">
                                    <?php echo "<img src=\"" . $row15[$j] . "\" style=\"width:208px;height:140px;margin: auto;\">"; ?><br>
                                    <p class="paragrph">&nbsp;&nbsp;
                                        <?php
                                        echo $row1[$j];
                                        ?>
                                </div>
                            </a>
                        </form>
                        </a>
                    <?php } ?>
                </div>
                <div class="central-inf"></div>
            </div>
            <div class="central-rectangle">
                <div class="central-sub" style="font-size: 20px;"><img src="images/homepage/livelihood.png" style="height: 25px;margin-top: -3px;">
                    民生&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:gray">民生是幸福之基</small>
                    <a href="livelihood.php" style="float: right;font-size: 15px;">更多<img src="images/homepage/go.png" style="height: 10px;margin-top: -3px;"></a>
                </div>
                <hr />
                <div class="central-container">
                    <?php for ($j = 0; $j < 4; $j++) { ?>
                        <form action="model.php" name=form2<?echo $j?> method="get">
                            <a href="javascript:form2<?echo $j?>.submit();">
                                <input type="hidden" name="title" value="<?echo $row2[$j]?>">
                                <?php //echo "<a href=".$row24[$j].">"
                                ?>
                                <div class="central-box">
                                    <?php echo "<img src=\"" . $row25[$j] . "\" style=\"width:208px;height:140px;margin: auto;\">"; ?><br>
                                    <p class="paragrph">&nbsp;&nbsp;
                                        <?php
                                        echo $row2[$j];
                                        ?>
                                </div>
                            </a>
                        </form>
                        </a>
                    <?php } ?>
                </div>
                <div class="central-inf"></div>
            </div>
            <div class="central-rectangle">
                <div class="central-sub" style="font-size: 20px;"><img src="images/homepage/news.png" style="height: 25px;margin-top: -3px;">
                    新闻&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:gray">带你了解世界</small>
                    <a href="news.php" style="float: right;font-size: 15px;">更多<img src="images/homepage/go.png" style="height: 10px;margin-top: -3px;"></a>
                </div>
                <hr />
                <div class="central-container">
                    <?php for ($j = 0; $j < 4; $j++) { ?>
                        <form action="model.php" name=form3<?echo $j?> method="get">
                            <a href="javascript:form3<?echo $j?>.submit();">
                                <input type="hidden" name="title" value="<?echo $row3[$j]?>">
                                <?php //echo "<a href=".$row14[$j].">"
                                ?>
                                <div class="central-box">
                                    <?php echo "<img src=\"" . $row35[$j] . "\" style=\"width:208px;height:140px;margin: auto;\">"; ?><br>
                                    <p class="paragrph">&nbsp;&nbsp;
                                        <?php
                                        echo $row3[$j];
                                        ?>
                                </div>
                            </a>
                        </form>
                        </a>
                    <?php } ?>
                </div>
                <div class="central-inf"></div>
            </div>
            <div class="central-rectangle">
                <div class="central-sub" style="font-size: 20px;"><img src="images/homepage/food.png" style="height: 25px;margin-top: -3px;">
                    美食&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:gray">民以食为天</small>
                    <a href="food.php" style="float: right;font-size: 15px;">更多<img src="images/homepage/go.png" style="height: 10px;margin-top: -3px;"></a>
                </div>
                <hr />
                <div class="central-container">
                    <?php for ($j = 0; $j < 4; $j++) { ?>
                        <form action="model.php" name=form4<?echo $j?> method="get">
                            <a href="javascript:form4<?echo $j?>.submit();">
                                <input type="hidden" name="title" value="<?echo $row4[$j]?>">
                                <?php //echo "<a href=".$row14[$j].">"
                                ?>
                                <div class="central-box">
                                    <?php echo "<img src=\"" . $row45[$j] . "\" style=\"width:208px;height:140px;margin: auto;\">"; ?><br>
                                    <p class="paragrph">&nbsp;&nbsp;
                                        <?php
                                        echo $row4[$j];
                                        ?>
                                </div>
                            </a>
                        </form>
                        </a>
                    <?php } ?>
                </div>
                <div class="central-inf"></div>
            </div>
            <div class="central-rectangle">
                <div class="central-sub" style="font-size: 20px;"><img src="images/homepage/education.png" style="height: 25px;margin-top: -3px;">
                    教育&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:gray">教育是立国之本</small>
                    <a href="education.php" style="float: right;font-size: 15px;">更多<img src="images/homepage/go.png" style="height: 10px;margin-top: -3px;"></a>
                </div>
                <hr />
                <div class="central-container">
                    <?php for ($j = 0; $j < 4; $j++) { ?>
                        <form action="model.php" name=form5<?echo $j?> method="get">
                            <a href="javascript:form5<?echo $j?>.submit();">
                                <input type="hidden" name="title" value="<?echo $row5[$j]?>">
                                <?php //echo "<a href=".$row14[$j].">"
                                ?>
                                <div class="central-box">
                                    <?php echo "<img src=\"" . $row55[$j] . "\" style=\"width:208px;height:140px;margin: auto;\">"; ?><br>
                                    <p class="paragrph">&nbsp;&nbsp;
                                        <?php
                                        echo $row5[$j];
                                        ?>
                                </div>
                            </a>
                        </form>
                        </a>
                    <?php } ?>
                </div>
                <div class="central-inf"></div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>
<?php
//  echo"<pre>";
// for($i=0;$i<6;$i++){
//     echo $row4[$i]->title;
// }
// var_dump($row4);
// for($i=0;$i<5;$i++){
//     echo $row1[$i];
// }
// for($i=0;$i<5;$i++){
//     echo $row2[$i];
// }
// for($i=0;$i<5;$i++){
//     echo $row3[$i];
// }
// for($i=0;$i<5;$i++){
//     echo $row4[$i];
// }
// for($i=0;$i<5;$i++){
//     echo $row5[$i];
// }
?>