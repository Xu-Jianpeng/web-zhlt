<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
include("top.php");
$con = mysqli_connect('localhost', 'root', '11111111', 'zhlt');
mysqli_query($con, 'set names utf8');
mysqli_query($con, 'set character_set_client=utf8');
mysqli_query($con, 'set character_set_results=utf8');
$sql = "select * from publish where title='珠海市人民政府关于修改部分市政府规章的决定（市政府128号令）'; ";
$query = $con->query($sql);
$rows = mysqli_fetch_object($query);
$rows->content = str_replace("\n", "<br>", $rows->content);
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>珠海市人民政府关于修改部分市政府规章的决定（市政府128号令）</title>
    <script src="../js/around.js"></script>
    <style>
        .title {
            width: 80%;
            height: 100px;
            margin: auto;
            /* background-color:red; */
            font-size: 40px;
        }

        .content {
            width: 80%;
            margin: auto;
            font-size: 25px;
        }

        .comment {
            width: 80%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="title"><?php echo $rows->title ?></div>
    <div style="float:right;margin-right:50px"><b>本文作者:<?echo $rows->author?></b></div>
    <br>
    <hr>
    <div class="content"><?php echo $rows->content ?></div>
    <br>
    <hr>
    <div class="comment">
    <?php 
    $articleId = $rows->id;
    if($_SESSION['username']!=''){
    ?>
        <form action="../article/comment.php" method="post">
        <table style="margin: auto;">
            <h1 style="font-family: 宋体;font-size:30px;width:800px;margin:auto">评论</h1>
            <tr>
                <td>
                <input type="hidden" name="atcid" value="<? echo $articleId?>"/>
                <textarea name="content" style="font-family: 宋体;font-size:30px;width:800px;height:200px"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                <input type="radio" checked="checked" name="commentName" value="<? echo $_SESSION['username'] ?>" />实名
            <input type="radio" name="commentName" value="匿名" />匿名
                </td>
            </tr>
            <tr>
                <td>

                <div><input type="submit" value="评论" /></div>
                </td>
            </tr>
        </form>
    <? }else {?>
        <p style="background-color:lightgrey;color:white;font-family: 宋体;font-size:30px;width:800px;height:200px;text-align:center;line-height:200px">请先<a href="../loginpage.php">登录</a>再评论</p>
    <? } ?>    
    </table>   
    <hr/> 
        <?php 
        $sql1 = "select * from comment where articleId='$articleId'; ";
        $query1 = $con->query($sql1);
        for($i=0;$i<mysqli_num_rows($query1);$i++){
            $rows1 = mysqli_fetch_object($query1);
            $rows2[$i]=$rows1->commentName;
            $rows3[$i]=$rows1->content;
            $rows4[$i]=$rows1->date;
            $rows5[$i]=$rows1->authorName;
            $rows6[$i]=$rows1->id;
        }

        for($i=0;$i<mysqli_num_rows($query1);$i++){
        ?>
        <form name="form<?echo $i?>" action="../article/deletecomment.php" method="POST">
        <div style="margin:auto;">
        <b style="font-size:18px"><? echo $rows2[$i];?>（用户）：</b><small style="float:right"><?echo $rows4[$i]?></small>
            <br>
            <br><p style="margin-left: 50px;font-size:20px"><? echo $rows3[$i]?></p>
            <?php if($_SESSION['username']==$rows2[$i]||$_SESSION['username']==$rows5[$i]||$_SESSION['username']=='root'){?>
            <input type="hidden" name="id" value="<? echo $rows6[$i]?>"/>
            <small style="float:right"><input type="submit" value="删除" /></small>
            <?php }?>
            <br>
            <hr/>
        </div>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
