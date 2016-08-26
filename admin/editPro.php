<?php 
require_once 'include.php';
checkLogined();

$productId=$_REQUEST['id'];

$proInfo = getProById($productId);

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
                window.editor = K.create('#editor_id');
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
<h3>修改商品信息</h3>
<form action="doAdminAction.php?act=editPro&id=<?php echo $productId;?>" method="post" enctype="multipart/form-data">
<table width="90%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="center">商品名称</td>
		<td><input type="text" name="productName"  value="<?php echo $proInfo['productName'];?>"/></td>
	</tr>
	<tr>
		<td align="center">商品类别</td>
		<td><input type="text" name="productKind"  value="<?php echo $proInfo['productKind'];?>"/></td>
	</tr>
	<tr>
		<td align="center">是否上架</td>
		<td><input type="text" name="productFlag"  value="<?php echo $proInfo['productFlag'];?>"/></td>
	</tr>
	<tr>
		<td align="center">是否新品</td>
		<td><input type="text" name="productNew"  value="<?php echo $proInfo['productNew'];?>"/></td>
	</tr>
	
	<tr>
		<td align="center">当天供应</td>
		<td><input type="text" name="productToday"  value="<?php echo $proInfo['productToday'];?>"/></td>
	</tr>
	
	<tr>
		<td align="center">商品货号</td>
		<td><input type="text" name="productNumber"  value="<?php echo $proInfo['productNumber'];?>"/></td>
	</tr>
	<tr>
		<td align="center">商品重量</td>
		<td><input type="text" name="productWeigth"  value="<?php echo $proInfo['productWeigth'];?>"/></td>
	</tr>
	<tr>
		<td align="center">商品产地</td>
		<td><input type="text" name="productOrigin"  value="<?php echo $proInfo['productOrigin'];?>"/></td>
	</tr>

	<tr>
		<td align="center">商品原价</td>
		<td><input type="text" name="productOldPrice"  value="<?php echo $proInfo['productOldPrice'];?>"/>￥</td>
	</tr>
	<tr>
		<td align="center">商品优惠</td>
		<td><input type="text" name="productNewPrice"  value="<?php echo $proInfo['productNewPrice'];?>"/>￥</td>
	</tr>
	
	<tr>
		<td align="center">烹饪时间</td>
		<td><input type="text" name="productTime"  value="<?php echo $proInfo['productTime'];?>"/>分钟</td>
	</tr>
	<tr>
		<td align="center">商品数量</td>
		<td><input type="text" name="productQuantity"  value="<?php echo $proInfo['productQuantity'];?>"/></td>
	</tr>
	<tr>
		<td align="center">点赞次数</td>
		<td><input type="text" name="productLove"  value="<?php echo $proInfo['productLove'];?>"/>次</td>
	</tr>
	<tr>
		<td align="center">上传日期</td>
		<td><input type="text" name="productOn"  value="<?php echo $proInfo['productOn'];?>"/></td>
	</tr>
	<tr>
		<td align="center">商品简介</td>
		<td>
			<textarea name="productCharacter" id="editor_id1" style="width:100%;height:50px;"><?php echo $proInfo['productCharacter'];?></textarea>
		</td>
	</tr>
	<tr>
		<td align="center">商品描述</td>
		<td>
			<textarea name="productInfo" id="editor_id" style="width:100%;height:80px;"><?php echo $proInfo['productInfo'];?></textarea>
		</td>
	</tr>
	<tr>
		<td align="center">商品详情</td>
		<td>
			&nbsp;<span>主料:</span><input name="ingredient" value="<?php echo $proInfo['ingredient'];?>" style="width:40%;height:25px;"/>
			&nbsp;<span>配料:</span><input name="flavouring" value="<?php echo $proInfo['flavouring'];?>" style="width:40%;height:25px;"/>
			</br></br>
			&nbsp;<span>特点:</span><input name="feature" value="<?php echo $proInfo['feature'];?>" style="width:40%;height:25px;"/>
			&nbsp;<span>存储:</span><input name="keep" value="<?php echo $proInfo['keep'];?>" style="width:40%;height:25px;"/>
			</br></br>
			<span>详细情况:</span><textarea name="detailsInfo" id="editor_id" style="width:100%;height:50px;"><?php echo $proInfo['detailsInfo'];?></textarea>
			<span>烹饪方法:</span><textarea name="cokingMethod" id="editor_id" style="width:100%;height:50px;"><?php echo $proInfo['cokingMethod'];?></textarea>
		</td>
	</tr>
	<tr>
		<td align="center">商品图像</td>
		<td>
			&nbsp;选中删除:
			<form>
				<?php 
					$proImgs = getAllImgByProId($proInfo['productId']);
					if($proImgs){
					foreach($proImgs as $img):
				?>	
				 
				<label><input name="imgName[]" type="checkbox" value="<?php echo $img['imgName']; ?>" />
					<span><?php echo $img['imgFlag']; ?></span><img width="100" height="80" src="../<?php echo $img['imgRoot'] . "image_80_80/" . $img['imgName'];?>" alt=""/>&nbsp;
				 </label> 			
				<?php endforeach; }?>
			</form> 
		</td>
	</tr>
 	<tr>
		 <td align="center">商品图像</td>
			<td>
			</br>
				<div>
					<label><input name="imgFlag" type="checkbox" value="80*80" /><span>80*80</span></label>
					<label><input name="imgFlag" type="checkbox" value="200*220" /><span>200*220</span></label> 
					<label><input name="imgFlag" type="checkbox" value="460*282" /><span>460*282</span></label>
					<label><input name="imgFlag" type="checkbox" value="600*600" /><span>600*600</span></label>
				</div>
				<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
				<div id="attachList" class="clear"></div>
			</td>
	</tr>  
	<tr>
		<td colspan="2"><input type="submit"  value="编辑商品"/></td>
	</tr>
</table>
</form>
</body>
</html>