<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>文章发表（普通用户）</title>
    <script type="text/javascript" charset="utf-8" src="../gbk-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../gbk-php/ueditor.all.min.js"></script>
    <script type="text/javascript" src="../gbk-php/lang/zh-cn/zh-cn.js"></script>
    <!-- <style> 
            .btn {
                width:100px;
                text-align:center;
                line-height:100%;
                padding:0.3em;
                font:16px Arial,sans-serif bold;
                font-style:normal;
                text-decoration:none;
                margin:2px;
                vertical-align:text-bottom;
                zoom:1;
                outline:none;
                font-size-adjust:none;
                font-stretch:normal;
                border-radius:50px;
                box-shadow:0px 1px 2px rgba(0,0,0,0.2);
                text-shadow:0px 1px 1px rgba(0,0,0,0.3);
                color:#444441;
                border:0.2px solid #96ccfc;
                background-repeat:repeat;
                background-size:auto;
                background-origin:padding-box;
                background-clip:padding-box;
                background-color:#3399ff;
                background: linear-gradient(to bottom, #eeeff9 0%,#73b9ff 100%);
            }

            .btn:hover{
                background: #96ccfc;
            }
        </style> -->
</head>

<body>
    <!--  style="background-image: url(../images/bj.jpg);background-size: 100%;background-attachment:fixed;"> -->
    <? include("top.php");?>
    <div style="background-color: lightblue;z-index:-1000;padding:0;margin:auto;width:90%;height:830;">
        <p style="margin-left:20%;font-size: 20px"> 文章发表</p>
        <form action="add.php" method="post" name="publish1" enctype="multipart/form-data">
            <table style="margin: auto;background-color:while">
                <tr>
                    <td>
                        <input type="text" id="ititle" name="ntitle" class="ctitle" placeholder="标题" style="font-family: 黑体;font-size:30;width:800" />
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td>
                        <textarea type="hidden" id="editor" name="ncontent" class="ccontent" wrap="hard" style="font-family: 宋体;font-size:20;width:800;height:540;"></textarea>
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
                        <label for="file">请上传封面图：</label>
                        <input type="file" name="file" id="file"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        文章类别：
                        <input type="radio" name="category" value="时政">时政
                        <input type="radio" name="category" value="民生">民生
                        <input type="radio" name="category" value="新闻">新闻
                        <input type="radio" name="category" value="美食">美食
                        <input type="radio" name="category" value="教育">教育
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="pulishing" class="btn" value="发布">发布
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    // $title = $_POST["ntitle"];
    // $content = $_POST["ncontent"];
    // $category = $_POST["category"];
    // echo"<pre>";

    // $con = mysqli_connect('localhost','abc','11111111','zhlt');

    // // var_dump($con);
    // mysqli_connect_errno($con);
    // if($con){
    // // echo '连接成功';
    // // echo $category;
    //     mysqli_query($con,'set names utf8');
    //     mysqli_query($con,'set character_set_client=utf8');
    //     mysqli_query($con,'set character_set_results=utf8');

    //     if($_POST["pulishing"]=="发布"){
    //         if($title!=null&&$content!=null&&$category!=null){
    //             $sql = "insert into publish values('$title','$content','$category');";
    //             $result = $con->query($sql);
    //             echo "<script>alert(\"发布成功\");</script>";
    //         }
    //         else if($title==null){
    //             echo "<script>alert(\"请输入标题\");</script>";
    //         }	
    //         else if($content==null){
    //             echo "<script>alert(\"请输入内容\");</script>";
    //         }
    //         else if($category==null){
    //             echo "<script>alert(\"请选择文章类别\");</script>";
    //         }
    //     }
    //     // var_dump($sql);
    //     // var_dump($result);
    // }
    // else{echo '连接失败';}
    ?>
</body>

</html>