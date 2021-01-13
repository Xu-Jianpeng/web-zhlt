<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>后台管理页面</title>
    <script src="../js/around.js"></script>
</head>

<body>
    <!-- <table>
        <td>
            <tr style="height:100%;width:20%;">
                <?php
                include("left.php")
                ?>
            </tr>
        </td>
    </table> -->
    <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="120" height="600" valign="top" bgcolor="lightblue" id="lt" >
                <div align="center">
                    <IFRAME frameBorder=0 id=left name=left scrolling=yes src="left.php" style="height: 100%; visibility: inherit; width: 100%; z-index: 2">
                    </IFRAME>
                </div>
            </td>
            <!-- <td width="15" height="15" bgcolor="#999999">
                <div align="center"><img id="img1" src="images/point2.gif" width="10" height="10" onClick="showhidden()" title="关闭"></div>
            </td> -->
            <td width="785" height="580" id="mn">
                <div align="center">
                    <IFRAME frameBorder=0 id=main name=main scrolling=yes src="edituser.php" style="height: 100%; visibility: inherit; width: 100%; z-index: 1">
                    </IFRAME>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>