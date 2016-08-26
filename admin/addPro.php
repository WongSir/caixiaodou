<?php 
require_once 'include.php';
checkLogined();
// $rows=getAllCate();
// if(!$rows){
// 	alertMes("没有相应分类，请先添加分类!!", "addCate.php");
// }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id1');
                window.editor = K.create('#editor_id2');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3>添加商品</h3>
<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data">
<table width="90%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

	<tr>
		<td align="center">商品名称</td>
		<td><input type="text" name="productName"  placeholder="请输入商品名称"/></td>
	</tr>
	<tr>
		<td align="center">商品类型</td>
		<td><input type="text" name="productKind"  placeholder="请输入商品类型"/></td>
	</tr>
	<tr>
		<td align="center">商品上架</td>
		<td><input type="text" name="productFlag"  placeholder="请输入true或者false"/></td>
	</tr>
	<tr>
		<td align="center">是否新品</td>
		<td><input type="text" name="productNew"  placeholder="请输入true或者false"/></td>
	</tr>
	<tr>
		<td align="center">当天供应</td>
		<td><input type="text" name="productToday"  placeholder="请输入true或者false"/></td>
	</tr>

	
	<tr>
		<td align="center">商品货号</td>
		<td><input type="text" name="productNumber"  placeholder="请输入商品货号"/></td>
	</tr>
	<tr>
		<td align="center">商品重量</td>
		<td><input type="text" name="productWeigth"  placeholder="请输入商品重量"/></td>
	</tr>
	<tr>
		<td align="center">商品产地</td>
		<td><input type="text" name="productOrigin"  placeholder="请输入商品产地"/></td>
	</tr>
	<tr>
		<td align="center">商品原价</td>
		<td><input type="text" name="productOldPrice"  placeholder="请输入商品原价"/>￥</td>
	</tr>
	<tr>
		<td align="center">商品优惠</td>
		<td><input type="text" name="productNewPrice"  placeholder="请输入商品优惠价"/>￥</td>
	</tr>
	<tr>
		<td align="center">烹饪时间</td>
		<td><input type="text" name="productTime"  placeholder="请输入商品烹饪时间"/>分钟</td>
	</tr>
	<tr>
		<td align="center">商品数量</td>
		<td><input type="text" name="productQuantity"  placeholder="请输入商品数量"/></td>
	</tr>
	<tr>
		<td align="center">点赞次数</td>
		<td><input type="text" name="productLove"  placeholder="请输入商品点赞次数"/></td>
	</tr>
	<tr>
		<td align="center">商品简介</td>
		<td>
			<textarea name="productCharacter" id="editor_id" style="width:100%;height:50px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="center">商品描述</td>
		<td>
			<textarea name="productInfo" id="editor_id1" style="width:100%;height:100px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="center">商品详情</td>
		<td>
			&nbsp;<span>主料:</span><input name="ingredient" placeholder="主料" style="width:40%;height:25px;"/>
			&nbsp;<span>配料:</span><input name="flavouring" placeholder="配料" style="width:40%;height:25px;"/>
			</br></br>
			&nbsp;<span>特点:</span><input name="feature" placeholder="特点" style="width:40%;height:25px;"/>
			&nbsp;<span>存储:</span><input name="keep" placeholder="存储方式" style="width:40%;height:25px;"/>
			</br></br>
			<span>详细情况:</span><textarea name="detailsInfo" placeholder="填写该商品的详细情况" style="width:100%;height:50px;"></textarea>
			<span>烹饪方法:</span><textarea name="cokingMethod" placeholder="给客户指导该道菜的烹饪方式" style="width:100%;height:50px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="center">商品图像</td>
			<td>
			</br>
				<!-- <div>
					<label><input name="imgFlag[]" type="checkbox" value="" /><span>选择图片</span></label> 
					<label><input name="imgFlag[]" type="checkbox" value="详情" /><span>详情</span></label>
					<label><input name="imgFlag[]" type="checkbox" value="其他" /><span>其他</span></label>
				</div> -->
				<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
				<div id="attachList" class="clear"></div>
			</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="添加商品"/></td>
	</tr>
</table>
</form>
</body>
</html>