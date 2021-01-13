<?php
session_start();
include("conn.php");
?>
<html>

<head>
    <meta charset="utf-8">
    <title>找回密码</title>
</head>

<body>
    <form action="" method="POST">
        <table width="1000" height="100" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:18px">
            <tr>
                <td height="60" bgcolor="#555555">
                    <div align="center" style="color: #FFFFFF;font-size:20px">找回密码</div>
                </td>
            </tr>
            <tr>
                <td  height="60" >
                    <input type="text" name="id" placeholder="账号/用户名" size="20px"/>
                    <input type="submit" name="send" value="确认" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_POST["send"] == "确认") {
        $sql = "select * from users where user='" . $_POST['id'] . "'";
        // echo $sql;
        $res = $con->query($sql);
        $row = mysqli_fetch_array($res);
        if($row['question']!=""){
    ?>
        <form action="" method="POST">
            <table width="1000" height="100" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:18px">
                <tr>
                    <td>
                        <input type="hidden" name="question" value="<?php echo $row['question']; ?>" />
                        <?php 
                            echo $row['question']; 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="answer">
                        <input type="submit" name="send" value="找回" />
                    </td>
                </tr>
            </table>
        </form>
        <?php
        }
        else{
            ?>
            <table width="1000" height="100" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:18px">
                <tr>
                    <td>
            <?
            echo "尚未设置密保问题";
            ?> 
                    </td>
                </tr>
            </table>
            <?
        }
    }
    if ($_POST['send'] == "找回") {?>
    <table width="1000" height="100" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:18px">
                <tr>
                    <td>
    <?
        $sql1 = "select * from users where question='" . $_POST['question'] . "'";
        // echo $sql1;
        $res1 = $con->query($sql1);
        $row1 = mysqli_fetch_array($res1);
        if ($_POST['answer'] == $row1['answer']) {
            echo "密码是：" . $row1['password'];
        ?>
            <a href="loginpage.php">返回登录页</a>
    <?php
        } else {
            echo "<script>alert('密保答案错误!');</script>";
        }
    }
    ?>
                    </td>
                </tr>
            </table>
    </form>
</body>

</html>
