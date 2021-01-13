<?php
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>编辑文章</title>
        <script type="text/javascript" charset="utf-8" src="gbk-php/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="gbk-php/ueditor.all.min.js"></script>
        <script type="text/javascript" src="vgbk-php/lang/zh-cn/zh-cn.js"></script>
    </head>
</html>
<?php
// echo $_POST['submit'];
// echo $_POST['chk'];
// if($_POST['submit']=="删除"){
//     for($i=0;$i<count($_POST['chk']);$i++) 
//     {
//     $sql0 = "select * from publish where title='" . $_POST['chk'][$i] . "'";
//     echo $sql0;
//     $res0 = $con->query($sql0);
//     $row = mysqli_fetch_object($res0);
//     $path = $row->path;
//     $imgpath = $row->imgpath;
//     $id = $row->id;
//     // echo $imgpath;
//     unlink($path);
//     unlink($imgpath);
//     // $sql = "delete from publish where title='" . $value . "'";
//     // $sql1= "delete from comment where articleId='". $id . "'";
//     $res = $con->query($sql);
//     $res1 = $con->query($sql1);
//     }
//     // header("location:editarticle.php");
//     // echo "<script>alert(\"删除成功\");window.location='selfpage.php';</script>";
// }
// else{
include("conn.php");
?>
<body> <!--  style="background-image: url(../images/bj.jpg);background-size: 100%;background-attachment:fixed;"> -->
    <? include("top.php");
    $id=$_POST['id'];
    // echo $id;
    $sql0 = "select * from publish where id='$id'";
    $res0 = $con->query($sql0);
    $row = mysqli_fetch_object($res0);
    // $row->content = str_replace("\n", "<br>", $row->content);
    ?>
    <div style="background-color: lightblue;;padding:0;margin:auto;width:90%;height:830;">
        <p style="margin-left:20%;font-size: 20px"> 文章编辑</p>
        <form  action="edit.php" method="post" name="publish1" enctype="multipart/form-data">
            <table style="margin: auto;background-color:while">
                <tr>
                    <td>
                        <input type="text" id="ititle" name="ntitle" class="ctitle" value="<?php echo $row->title?>" style="font-family: 黑体;font-size:30;width:800"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea type="hidden" id="editor" name="ncontent" class="ccontent" wrap="hard" style="font-family: 宋体;font-size:20;width:800px;height:540px;"><?php echo $row->content ?></textarea>
                        <div>
                            <!-- <h1>完整demo</h1> -->
                            <script id="editor" name="ncontent" type="text/plain" style="width:1024px;height:500px;">
                                
                            </script>
                        </div>
                        <!-- <div id="btns">
                            <div>
                                <button onclick="getAllHtml()">获得整个html的内容</button>
                                <button onclick="getContent()">获得内容</button>
                                <button onclick="setContent()">写入内容</button>
                                <button onclick="setContent(true)">追加内容</button>
                                <button onclick="getContentTxt()">获得纯文本</button>
                                <button onclick="getPlainTxt()">获得带格式的纯文本</button>
                                <button onclick="hasContent()">判断是否有内容</button>
                                <button onclick="setFocus()">使编辑器获得焦点</button>
                                <button onmousedown="isFocus(event)">编辑器是否获得焦点</button>
                                <button onmousedown="setblur(event)">编辑器失去焦点</button>

                            </div>
                            <div>
                                <button onclick="getText()">获得当前选中的文本</button>
                                <button onclick="insertHtml()">插入给定的内容</button>
                                <button id="enable" onclick="setEnabled()">可以编辑</button>
                                <button onclick="setDisabled()">不可编辑</button>
                                <button onclick=" UE.getEditor('editor').setHide()">隐藏编辑器</button>
                                <button onclick=" UE.getEditor('editor').setShow()">显示编辑器</button>
                                <button onclick=" UE.getEditor('editor').setHeight(300)">设置高度为300默认关闭了自动长高</button>
                            </div>

                            <div>
                                <button onclick="getLocalData()">获取草稿箱内容</button>
                                <button onclick="clearLocalData()">清空草稿箱</button>
                            </div>

                        </div> -->
                        <!-- <div>
                            <button onclick="createEditor()">
                                创建编辑器</button>
                            <button onclick="deleteEditor()">
                                删除编辑器</button>
                        </div> -->

                        <script type="text/javascript">
                            //实例化编辑器
                            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                            var ue = UE.getEditor('editor');


                            function isFocus(e) {
                                alert(UE.getEditor('editor').isFocus());
                                UE.dom.domUtils.preventDefault(e)
                            }

                            function setblur(e) {
                                UE.getEditor('editor').blur();
                                UE.dom.domUtils.preventDefault(e)
                            }

                            function insertHtml() {
                                var value = prompt('插入html代码', '');
                                UE.getEditor('editor').execCommand('insertHtml', value)
                            }

                            function createEditor() {
                                enableBtn();
                                UE.getEditor('editor');
                            }

                            function getAllHtml() {
                                alert(UE.getEditor('editor').getAllHtml())
                            }

                            function getContent() {
                                var arr = [];
                                arr.push("使用editor.getContent()方法可以获得编辑器的内容");
                                arr.push("内容为：");
                                arr.push(UE.getEditor('editor').getContent());
                                alert(arr.join("\n"));
                            }

                            function getPlainTxt() {
                                var arr = [];
                                arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
                                arr.push("内容为：");
                                arr.push(UE.getEditor('editor').getPlainTxt());
                                alert(arr.join('\n'))
                            }

                            function setContent(isAppendTo) {
                                var arr = [];
                                arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
                                UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
                                alert(arr.join("\n"));
                            }

                            function setDisabled() {
                                UE.getEditor('editor').setDisabled('fullscreen');
                                disableBtn("enable");
                            }

                            function setEnabled() {
                                UE.getEditor('editor').setEnabled();
                                enableBtn();
                            }

                            function getText() {
                                //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                                var range = UE.getEditor('editor').selection.getRange();
                                range.select();
                                var txt = UE.getEditor('editor').selection.getText();
                                alert(txt)
                            }

                            function getContentTxt() {
                                var arr = [];
                                arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
                                arr.push("编辑器的纯文本内容为：");
                                arr.push(UE.getEditor('editor').getContentTxt());
                                alert(arr.join("\n"));
                            }

                            function hasContent() {
                                var arr = [];
                                arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
                                arr.push("判断结果为：");
                                arr.push(UE.getEditor('editor').hasContents());
                                alert(arr.join("\n"));
                            }

                            function setFocus() {
                                UE.getEditor('editor').focus();
                            }

                            function deleteEditor() {
                                disableBtn();
                                UE.getEditor('editor').destroy();
                            }

                            function disableBtn(str) {
                                var div = document.getElementById('btns');
                                var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                                for (var i = 0, btn; btn = btns[i++];) {
                                    if (btn.id == str) {
                                        UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                                    } else {
                                        btn.setAttribute("disabled", "true");
                                    }
                                }
                            }

                            function enableBtn() {
                                var div = document.getElementById('btns');
                                var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                                for (var i = 0, btn; btn = btns[i++];) {
                                    UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                                }
                            }

                            function getLocalData() {
                                alert(UE.getEditor('editor').execCommand("getlocaldata"));
                            }

                            function clearLocalData() {
                                UE.getEditor('editor').execCommand("clearlocaldata");
                                alert("已清空草稿箱")
                            }
                        </script>    
                    </td>                    
                </tr>
                <tr>
                    <td>
                    <button type="submit" name="pulishing" value="确认修改">确认修改
                    </td>
                </tr>
                </table>
        </form>
    </div>
</body>