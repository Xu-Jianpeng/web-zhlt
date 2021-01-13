<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
include("top.php");
$con = mysqli_connect('localhost', 'root', '11111111', 'zhlt');
mysqli_query($con, 'set names utf8');
mysqli_query($con, 'set character_set_client=utf8');
mysqli_query($con, 'set character_set_results=utf8');
$sql = "select * from publish where title='图解《珠海市珠港澳科技创新合作项目管理办法》'; ";
$query = $con->query($sql);
$rows = mysqli_fetch_object($query);
$rows->content = str_replace("\n", "<br>", $rows->content);
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>图解《珠海市珠港澳科技创新合作项目管理办法》</title>
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
    <script>
        var hide=true;
        var i;
    function reply(i){
        // var rep="reply".join(i);
        var rep="reply".concat(i);
      var reply = document.getElementById(rep);
    //   var rebx = document.getElementById("register-box");
      if(hide){
        reply.style.display = "block";
        hide=false; 
      } else{
        reply.style.display = "none";
        hide=true;
      }
    }
    </script>
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
            <small style="float:right">
            <!-- <a onclick="reply(<?php echo $i?>)">回复</a> -->
            <!-- <input type="submit" value="删除" /> -->
            <a href="javascript:form<?echo $i?>.submit();" onclick="javascript:return confirm('您确认要删除评论吗？');">删除&nbsp;&nbsp;</a>
            </small>
            <?php }?>
            <?php if($_SESSION['username']!=""){?>
            <small style="float:right">
            <a onclick="reply(<?php echo $i?>)">回复&nbsp;&nbsp;</a>
            </small>
            <?}?>
            <br>
        </div>
        </form>
        <div id="reply<?echo $i?>" style="display:none">
        <form name="form<?echo $i."n"?>" action="../article/addreply.php" method="post" style="float: right;">
            <input type="text" name="content" />
            <input type="radio" checked="checked" name="replyName" value="<? echo $_SESSION['username'] ?>" />实名
            <input type="radio" name="replyName" value="匿名" />匿名
            <input type="submit" value="评论" />
            <input type="hidden" name="atcid" value="<? echo $articleId?>"/>
            <input type="hidden" name="cmtid" value="<? echo $rows6[$i]?>"/>
        </form>
        <br>
        <br>
        </div>
        <?php 
        $commentId=$rows6[$i];
        $sql2 = "select * from reply where commentId='$commentId' order by id asc;";
        $query2 = $con->query($sql2);
        for($j=0;$j<mysqli_num_rows($query2);$j++){
            $rows11 = mysqli_fetch_object($query2);
            $rows21[$j]=$rows11->replyName;
            $rows31[$j]=$rows11->content;
            $rows41[$j]=$rows11->date;
            $rows51[$j]=$rows11->commentName;
            $rows61[$j]=$rows11->id;
            $rows71[$j]=$rows11->authorName;
        }

        for($j=0;$j<mysqli_num_rows($query2);$j++){
        ?>
        <form name="formm<?echo $j?>" action="../article/deletereply.php" method="POST" style="margin-left:60px;">
        <div style="margin:auto;">
        <b style="font-size:15px"><? echo $rows21[$j];?>：@<? echo $rows51[$j];?></b><small style="float:right"><?echo $rows41[$j]?></small>
            <br>
            <br><p style="margin-left: 50px;font-size:15px"><? echo $rows31[$j]?></p>
            <?php if($_SESSION['username']==$rows21[$j]||$_SESSION['username']==$rows51[$j]||$_SESSION['username']==$rows71[$j]||$_SESSION['username']=='root'){?>
            <input type="hidden" name="rid" value="<? echo $rows61[$j]?>"/>
            <small style="float:right">
            <!-- <a onclick="reply(<?php echo $i?>)">回复</a> -->
            <!-- <input type="submit" value="删除" /> -->
            <a href="javascript:formm<?echo $j?>.submit();" onclick="javascript:return confirm('您确认要删除回复吗？');">删除&nbsp;&nbsp;</a>
            </small>
            <?php }?>
            <?php if($_SESSION['username']!=""){?>
            <small style="float:right">
            <a onclick="reply('<?php echo $i.$j?>p')">回复&nbsp;&nbsp;</a>
            </small>
            <?}?>
            <br>
        </div>
        </form>
        <div id="reply<?echo $i.$j?>p" style="display:none">
        <form name="form<?echo $i.$j?>p" action="../article/addreply.php" method="post" style="float: right;">
            <input type="text" name="content" />
            <input type="radio" checked="checked" name="replyName" value="<? echo $_SESSION['username'] ?>" />实名
            <input type="radio" name="replyName" value="匿名" />匿名
            <input type="submit" value="评论" />
            <input type="hidden" name="atcid" value="<? echo $articleId?>"/>
            <input type="hidden" name="cmtid" value="<? echo $rows6[$i]?>"/>
            <input type="hidden" name="repid" value="<? echo $rows61[$j]?>"/>
        </form>
        <br>
        <br>
        </div>
        <?}?>
        <hr/>
        <?php
        
    }
        ?>
    </div>
</body>
</html>
