<?php 
require_once 'include.php';
checkLogined();
//$_SESSION['order_string'] = "productId SORT_ASC";
$_SESSION['order_string'] = $_REQUEST['order']?$_REQUEST['order']:$_SESSION['order_string'];
$arr = explode(" ", $_SESSION['order_string']);
$_SESSION['order'] = $arr[0];
$_SESSION['sort'] = $arr[1];

$sql = "select * from products";
$totalRows=getResultNum($sql);
$pageSize=8;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;

if($page<1||$page==null||!is_numeric($page))
	$page=1;

if($page>$totalPage)
	$page=$totalPage;
$offset=($page-1)*$pageSize;

$sql = "select * from products";
$row_Info=fetchAll($sql);
//echo $sql;

$sql = "select * from productkind";
$row_Kind=fetchAll($sql);

 $sql = "select * from productchange";
 $row_Change=fetchAll($sql);

 $row_Kind = $row_Kind ? $row_Kind : array();
 $row_Change = $row_Change ? $row_Change : array();

if($row_Info){
	for($i=0;$i<count($row_Info);++$i){
		$row_Info[$i] = $row_Info[$i] ? $row_Info[$i] : array();
		$row_Kind[$i] = $row_Kind[$i] ? $row_Kind[$i] : array();
		$row_Change[$i] = $row_Change[$i] ? $row_Change[$i] : array();
		$rows_init[$i] = array_merge($row_Info[$i],$row_Kind[$i],$row_Change[$i]);
	}
}

if(isset($rows_init) && $rows_init){
	//排序处理
	if($_SESSION['sort'] ==="SORT_ASC")
		$rows_mid=multi_array_sort($rows_init,$_SESSION['order'],SORT_ASC);
	else
		$rows_mid=multi_array_sort($rows_init,$_SESSION['order'],SORT_DESC);

	//分页处理
	$count = ($offset+$pageSize) > $totalRows ? $totalRows : ($offset+$pageSize);

	for($i=$offset; $i<$count ;++$i){
		$rows[] = $rows_mid[$i];
	}
}
else{
	$mes="<p>数据库中还没有商品，请添加!</p><a href='addPro.php' target='mainFrame'>添加商品</a>";
	echo $mes;
	return true;
}
//var_dump($rows);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                        	<div class="text">
                                <span>商品编号:</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="productId SORT_ASC" >由低到高</option>
                                        <option value="productId SORT_DESC">由高到底</option>
                                    </select>
                                </div>
                            </div>
                        	<div class="text">
                                <span>商品类型:</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="productKind SORT_ASC" >由低到高</option>
                                        <option value="productKind SORT_DESC">由高到底</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>商品价格:</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="productNewPrice SORT_ASC" >由低到高</option>
                                        <option value="productNewPrice SORT_DESC">由高到底</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>上架时间:</span>
                                <div class="bui_select">
                                 <select id="" class="select" onchange="change(this.value)">
                                 	<option>-请选择-</option>
                                        <option value="productOn SORT_DESC" >最新上架</option>
                                        <option value="productOn SORT_ASC">历史上架</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="8%">编号</th>
                                <th width="15%">商品名称</th>
                                <th width="8%">商品分类</th>
                                <th width="8%">是否新品</th>
                                <th width="10%">商品单价</th>
                                <th width="8%">上/下架</th>
                                <th width="15%">上架时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c<?php echo $row['productId'];?>" class="check" value=<?php echo $row['productId'];?>><label for="c1" class="label"><?php echo $row['productId'];?></label></td>
                                <td><?php echo $row['productName']; ?></td>
                                <td><?php echo $row['productKind'];?></td>
                                <td><?php echo $row['productNew'] ==="true"?"新品推荐":"不是新品" ;?></td>
                                <td>￥&nbsp;<?php echo $row['productNewPrice'];?></td>
                                <td>
                                	<?php echo $row['productFlag']=== "true"?"上架":"下架";?>
                                </td>
                                <td><?php echo $row["productOn"];?></td>
                                  
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['productId'];?>,'<?php echo $row['productName'];?>')">
                                				<input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['productId'];?>)">
                                				<input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['productId'];?>)">
					                           <div id="showDetail<?php echo $row['productId'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="left">商品名称</td>
					                        			<td><?php echo $row['productName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">商品类别</td>
					                        			<td><?php echo $row['productKind'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">是否新品</td>
					                        			<td>
					                        				<?php echo $row['productNew']==="true"?"新品推荐":"不是新品";?>
					                        			</td>
					                        		</tr>
					                   
					                        		<tr>
					                        			<td width="20%"  align="left">商品货号</td>
					                        			<td><?php echo $row['productNumber'];?></td>
					                        		</tr>
					                        		<tr>					                  
					                        			<td width="20%"  align="left">商品重量</td>
					                        			<td><?php echo $row['productWeigth'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">商品产地</td>
					                        			<td><?php echo $row['productOrigin'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">商品数量</td>
					                        			<td><?php echo $row['productQuantity'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="left">商品原价</td>
					                        			<td>￥&nbsp;<?php echo $row['productOldPrice'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="left">商品优惠</td>
					                        			<td>￥&nbsp;<?php echo $row['productNewPrice'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">烹饪时间</td>
					                        			<td><?php echo $row['productTime'];?>&nbsp;分钟</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">点赞次数</td>
					                        			<td><?php echo $row['productLove'];?>&nbsp;次</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">商品图片</td>
					                        			<td>
					                        			<?php 
					                        			$proImgs=getAllImgByProId($row['productId']);
					                        			// var_dump($proImgs);exit;
					                        			if($proImgs){
					                        				// var_dump($proImgs);exit;
					                        			foreach($proImgs as $img):
					                        			?>
					                        			<?php  echo $img['imgFlag']; ?><img width="100" height="100" src="../<?php echo $img['imgRoot'] . "image_80_80/". $img['imgName'];?>" alt=""/> &nbsp;&nbsp;
					                        			<?php endforeach; }?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">是否上架</td>
					                        			<td>
					                        				<?php echo $row['productFlag']==="true"?"上架":"下架";?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">上架日期</td>
					                        			<td><?php echo $row['productOn'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">送菜时间</td>
					                        			<td>
					                        				<?php echo $row['productToday']==="true"?"当天送菜":"隔天送菜";?>
					                        			</td>
					                        		</tr>				                        	
					                        		<tr>
					                        			<td width="20%"  align="left">是否热卖</td>
					                        			<td>
					                        				<?php echo $row['productLove'] >=15 ?"热卖":"正常";?>
					                        			</td>
					                        		</tr>
					                        	</table>
					                        	<span style="display:block;width:80%; ">
					                        	商品描述:<br/>
					                        	<?php echo $row['productInfo'];?>
					                        	</span>
					                        </div>
                                
                                </td>
                            </tr>
                           <?php  endforeach;?>
                           <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="8"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:true,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
	}
</script>
</body>
</html>