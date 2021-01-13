<?PHP include("conn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/index.css" rel="stylesheet">
	 <link  rel="stylesheet" href="../../css/2.css" type="text/css">
</head>
<body>
<img src="../../image/logo2.png" alt="#" width="219" height="48" >
<div id="right"  style="background-color:#4F2C1F">
    <a href="../../index.php">首页</a>
     <a href="../../web/影视科普.html">影视科普</a>
     <a href="../../web/硬件科普.html">硬件科普</a>
     <a href="https://space.bilibili.com/7161352" target="_blank">个人频道</a>
      <a href="../../web/打地鼠.html" target="_blank">小游戏</a>
</div>
	<br/>
<form action="http://www.baidu.com/baidu" target="_blank">
      <table height="40" align="center"><tr><td height="36">
          <input name="tn" type="hidden" value="SE_zzsearchcode_shhzc78w">
          <a href="http://www.baidu.com/"></a>
<input type="text"  name="word" size="40" baidusug="2">
          <input type="submit"  value="百度搜索" >
  </td></tr></table>
    </form>
	<br/><br/><br/><br/>
<div class="content">
    <div class="con_left">
        <div class="con_left1">
           <div class="con_header" ><div class="title" ><span>技术论坛</span></div></div>
            <div class="">
                <ul><li><a href="add_notice.php">发布论坛帖子</a></li></ul><hr/>
				<ul><li><a href="search_notice.php">搜索论坛内容</a></li></ul><hr/>
                <ul><li><a href="page_notice.php">论坛相关技术内容</a></li></ul><hr/>
				<ul><li><a href="update_notice.php">修改论坛文章内容</a></li></ul><hr/>
				<ul><li><a href="delete_notice.php">删除文章</a></li></ul><hr/>
            </div>
        </div>
    </div>
    <div class="con_right">
        <div class="">
            <div class="">
             <div class="con_header"><div class="title"><span>不耻下问，文明发言！</span></div></div>
                				<div style="margin-top: 20px; margin-bottom:30px; margin-left: 260px; color:#6DEFD6; font-weight:bold">论坛相关技术内容</div>
                <table class="table1">
                    <tr>
                        <td>文章标题</td>
                        <td>文章信息</td>
                    </tr>
                    <?php
                    	/*  $_GET[page]为当前页，如果$_GET[page]为空，则初始化为1  */
					 $con=@mysqli_connect("localhost","root","11111111","zhlt");//or die("链接数据库失败！");
mysqli_query($con,"set names UTF8");
                    
					 if(@$_GET['page']==""){$_GET['page']=1;}
					   if (is_numeric($_GET['page'])){                            //判断变量$page是否为数字，如果是则返回true
						$page_size = 3;     		   					        //每页显示3条记录
						$sql= "select * from publish";
						echo $sql;
						$query = $con->query($sql);      				//查询符合条件的记录总条数
						$message_count = mysqli_num_rows($query);		        //要显示的总记录数
						$page_count = ceil($message_count/$page_size);	  	    //根据记录总数除以每页显示的记录数求出所分的页数
						$offset = ($_GET['page']-1)*$page_size;				    //计算下一页从第几条数据开始循环  
						$sql1 ="select * from publish limit $offset, $page_size";
						echo $sql1;
					    $query1= $con->query($sql1);
						$row = mysqli_fetch_object($query);                       //获取查询结果集
					
						if(!$row){                                              //如果未检索到信息，则输出提示信息
							echo "<font color='red'>暂无文章发布!</font>";
						}
						do{
						?>
					<tr>
					    <td style="font-size:14px;color:black"><?php echo $row->title;?></td>
						<!-- <td style="font-size:14px;color:aliceblue"><?php echo $row->content;?></td> -->
					</tr>
                    <?php
					}while($row = mysqli_fetch_array($query));         //循环语句结束
					}
					?>
				</table>
                 <br>
                      <table style="width:100%; font-size:14px; border:0px; " class="color">
                        <tr>
                          <!--  翻页条 -->
							<td width="37%">&nbsp;&nbsp;页次：<?php echo $_GET['page'];?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="right">
							<?php
							if($_GET['page']!=1){                                           //如果当前页不是首页
							echo  "<a href=page_notice.php?page=1>首页</a>&nbsp;";        //显示“首页”超链接
							echo "<a href=page_notice.php?page=".($_GET['page']-1).">上一页</a>&nbsp;";      //显示“上一页”超链接
							}
							if($_GET['page']<$page_count){                                  //如果当前页不是尾页
							echo "<a href=page_notice.php?page=".($_GET['page']+1).">下一页</a>&nbsp;";       //显示“下一页”超链接
							echo "<a href=page_notice.php?page=".$page_count.">尾页</a>";                  //显示“尾页”超链接
							}
							?>
                        </tr>
                      </table>
			</div>
    </div>
</div>
<div class="clear"></div>
</div><br><br><br>
<?php
include('footer.php');
?>			
</body>
</html>