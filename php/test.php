<?php 
// header("Content-type:text/html; charset=utf-8");
// $num=5;
// $category="education";
// echo $_POST["file"];
// $file=$_FILES["file"]["tmp_name"];
// $filename=$category.$num.".png";
// $imgpath="../images/".$category."/";
// $res=move_uploaded_file($file,$imgpath.$filename);
// // echo $file;
// // echo $_FILES["file"]["name"];
// // echo $imgpath.$filename;
// if($res){
//     echo "文件上传成功：".$imgpath.$filename;
// }
// else{echo "文件上传失败";}
?>
<head>
	<script type="text/javascript">
	//设置根路径
	window.UEDITOR_HOME_URL = "${ctx}/js/ueditor/";
	</script>
	<script type="text/javascript" charset="utf-8" src="${ctx }/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="${ctx }/js/ueditor/ueditor.all.js"> </script>
	<script type="text/javascript" charset="utf-8" src="${ctx }/js/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<script>
$(function(){
	var toolbars = [["fullscreen","source","undo","redo","insertunorderedlist",
	"insertorderedlist","cleardoc","selectall","searchreplace","preview","date","time",
	"bold","italic","underline","fontborder","strikethrough","forecolor","backcolor",
	"superscript","subscript","justifyleft","justifycenter","justifyright","justifyjustify",
	"touppercase","tolowercase","directionalityltr","directionalityrtl","indent","removeformat",
	"formatmatch","autotypeset","customstyle","paragraph","rowspacingbottom","rowspacingtop",
	"lineheight","fontfamily","fontsize","imagenone","imageleft","imageright","imagecenter",
	"inserttable","deletetable","mergeright","mergedown","splittorows","splittocols","splittocells",
	"mergecells","insertcol","insertrow","deletecol","deleterow","insertparagraphbeforetable","charts","print","help"]];
	var ue = UE.getEditor('infoEditor',{  
            toolbars: toolbars
       });
 
	//初始化编辑框内容
    var htmlStr = $("#editorValue").val();
	ue.ready(function() {
	    ue.setContent(htmlStr, false);
	});
	$("input[type='checkbox']").prop("disabled",true)
})
function save(){
     var content= UE.getEditor('infoEditor').getContent();
     content = content.replace(new RegExp("<","g"),"<").replace(new RegExp(">","g"),">").replace(new RegExp("\"","g"),"");
	 $("#editorValue").val(content);
	 $("#ueform").submit();
}
</script>
<body>
	<form action="${ctx}/save.do" id="ueform">
		<input id="editorValue"  value="${bean.content}" type="hidden" />
		<div style="width: 99%;">
			<script id="infoEditor" type="text/plain" style="width:100%;"></script>
		</div>
	</form>
</body>
