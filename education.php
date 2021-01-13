<?php
    session_start();
    $con = mysqli_connect('localhost','root','11111111','zhlt');
    mysqli_query($con,'set names utf8');
    mysqli_query($con,'set character_set_client=utf8');
    mysqli_query($con,'set character_set_results=utf8');
    $sql="select * from publish where category='教育' or category='education' order by id asc";
    $res=$con->query($sql);
    for($i=mysqli_num_rows($res)-1;$i>-1;$i--){
        $row=mysqli_fetch_object($res);
        $row0[$i]=$row->title;
        $row1[$i]=$row->path;
        $row2[$i]=$row->time;
        $row3[$i]=$row->content;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>珠海论坛-教育</title>
        <script src="js/homepage.js"></script>
    </head>
    <style>
        .paragrph{
            font-family: "楷体";
            font-size: 18px;
            color: gray; 
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        /* p{
            font-family: "楷体";
            font-size: 18px;
            color: gray; 
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        } */
    </style>
    <body>
        <?php
        include("top.php");
        ?>
        <div style="height:100px"></div>
        <table style="margin-left:200px;font-size:20px">
            <?php for($j=0;$j<mysqli_num_rows($res);$j++){?>
                <tr>
                    <td style="width:700px">
                    <form action="model.php" name=formed<?echo $j?> method="get">
                        <a href="javascript:formed<?echo $j?>.submit();">
                            <input type="hidden" name="title" value="<?echo $row0[$j]?>">
                            <?php //echo "<a href=".$row1[$j].">"
                            ?>
                            <?php echo $row0[$j]; ?>
                            <br><br>
                        </a>
                    </form>
                    </td>
                    <td>&nbsp;</td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <td><?php echo $row2[$j];?></td>
                </tr>
                <tr style="height: 50px;">
                    <td>
                        <?php echo "<a href=".$row1[$j].">";
                        $aa=$row3[$j];
                        $aa=str_replace(array('&nbsp;','<p style="line-height: 1.75em;">',"</p>","<p>","p","span","style",'< ="text-align: center;">','< ="text-align: justify;">'),"",$aa);//'<p style="line-height: 1.75em;">','<p style="text-align: left; line-height: 1.75em;">',"<p>","</p>",'<span style="font-family: 宋体", SimSun;><span style="font-size: 20px;">','<span style="font-family: 宋体, SimSun;">　　<span style="font-size: 20px; font-family: 宋体, SimSun;">',"</span>"),"",$aa);
                        //echo $aa?>
                        <p class="paragrph"><?php echo $aa;?></p><br>
                    </td>
                </tr>
            </div>
            <?php }?>
        </table>
    </body>
</html>