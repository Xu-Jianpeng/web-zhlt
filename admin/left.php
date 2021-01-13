<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
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

<body >
    <table style="text-align:center;width:202;background-color:lightblue">
        <br><br>
        <tr>
            <td height="34" style="background-color: lightblue;color:dimgrey;font-family:华文新魏;font-size:20px"><br>&nbsp;
                <?php
                if ($_SESSION['username'] != "") {
                    echo "欢迎管理员：" ;
                    echo  $_SESSION['username'];
                    echo  "<br>";
                    echo  "<hr>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="edituser.php" target="main">用户管理</a><br><br>
            <hr>
            </td>
        </tr>
        <tr>
            <td>
                <a href="editarticle.php" target="main">文章管理</a><br><br>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <a href="editcomment.php" target="main">评论管理</a><br><br>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <a href="editreply.php" target="main">回复管理</a><br><br>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <a href="changeadminpwd.php" target="main">更改密码</a><br><br>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <a href="logout.php" target="_top">退出登录</a><br><br>
            </td>
        </tr>
    </table>
</body>

</html>