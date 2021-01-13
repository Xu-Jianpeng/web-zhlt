<?php
// session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script src="js/homepage.js"></script>
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/homepage.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="header">
            <div style="float: right;line-height:60px;margin-right:20px;font-size:15px">
                <?php
                    if($_SESSION['username']!="")
                    {
                    echo "欢迎：".$_SESSION['username'];
                    }
                ?>
                </div>
            <div class="header-main">
                <div class="header-logo">
                    <a href="homepage.php"><img src="images/homepage/logo.png"></a>
                </div>
                <!-- <div class="header-text"> -->
                    <div class="dropdown" style="float: right;line-height:60px;">
                        <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" style="background-color: bisque;"><img src="images/homepage/user.png" height=20px>
                            <span class="caret"></span>
                        </button>
                        <?php 
                        if($_SESSION['username']!=""){
                            echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
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
                                <a role="menuitem" tabindex="-1" href="article/publish.php">发布文章</a>
                            </li>
                        </ul>';
                        }
                        else {
                            echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="loginpage.php">返回登录</a>
                            </li>
                        </ul>';
                        }
                        ?>
                    </div>
                <!-- </div> -->
                <a href="地图.html" target="_blank" ><div class="header-text">地图</div></a>
                <a href="education.php"><div class="header-text">教育</div></a>
                <a href="food.php"><div class="header-text">美食</div></a>
                <a href="news.php"><div class="header-text">新闻</div></a>
                <a href="livelihood.php"><div class="header-text">民生</div></a>
                <a href="political.php"><div class="header-text">时政</div></a>
                <div class="search" style="float:right;">
                    <!-- <form name="form1" method="post" action="search.php">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="30">
                                    <input type="search" name="find" size="20" width="400px" placeholder="搜索">    
                                    
                                </td>
                            </tr>
                        </table>
                    </form>     -->
                </div>
            </div>
        </div>
        <div class="header-padding"></div>
    </body>
</html>