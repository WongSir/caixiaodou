<?php 
require_once 'include.php';
checkLogined();
//$_SESSION['order_string'] = "productId SORT_ASC";
$_SESSION['order_string'] = $_REQUEST['order']?$_REQUEST['order']:$_SESSION['order_string'];
$arr = explode(" ", $_SESSION['order_string']);
$_SESSION['order'] = $arr[0];
$_SESSION['sort'] = $arr[1];

//$orderBy=$order?"order by ".$order:null;

// $keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
// $where=$keywords?"where products.productName like '%{$keywords}%'":null;
// //得到数据库中所有商品
// $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id {$where}  ";
$sql = "select * from orders";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;

if($page<1||$page==null||!is_numeric($page))
	$page=1;

if($page>$totalPage)
	$page=$totalPage;
$offset=($page-1)*$pageSize;

$sql = "select * from orders";
$row_Order=fetchAll($sql);

$rows_init = $row_Order;

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
	$mes="<p>数据库中还没有订单!</p><a href='listPro.php' target='mainFrame'>返回商品列表</a>";
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
                        <!-- <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div> -->
                        <div class="fr">
                        	<div class="text">
                                <span>订单编号：</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="orderId SORT_ASC" >由低到高</option>
                                        <option value="orderId SORT_DESC">由高到底</option>
                                    </select>
                                </div>
                            </div>

                             <div class="text">
                                <span>取菜时间：</span>
                                <div class="bui_select">
                                 <select id="" class="select" onchange="change(this.value)">
                                 	<option>-请选择-</option>
                                        <option value="orderTime SORT_ASC" >由先到后</option>
                                        <option value="orderTime SORT_DESC">由后到先</option>
                                    </select>
                                </div>
                            </div>
                        	<div class="text">
                                <span>订单号：</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="orderNumber SORT_ASC" >由低到高</option>
                                        <option value="orderNumber SORT_DESC">由高到底</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>订单金额：</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="orderAmount SORT_ASC" >由低到高</option>
                                        <option value="orderAmount SORT_DESC">由高到底</option>
                                    </select>
                                </div>
                            </div>
                           
                           <!--  <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div> -->
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="8%">编号</th>
                                <th width="15%">订单号</th>
                                <th width="8%">用户手机</th>
                                <th width="10%">顾客名字</th>
                                <th width="10%">订单金额</th>
                                <th width="10%">取菜时间</th>
                                <th width="10%">订单状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>

                        	
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c<?php echo $row['orderId'];?>" class="check" value=<?php echo $row['orderId'];?>><label for="c1" class="label"><?php echo $row['orderId'];?></label></td>
                                <td><?php echo $row['orderNumber']; ?></td>
                                <td><?php echo $row['userPhone'];?></td>
                                <td><?php echo $row['userName'];?></td>
                                <td>￥&nbsp;<?php echo $row['orderAmount'];?></td>
                                <td><?php echo $row["orderTime"];?></td>
                                <td><?php echo $row['orderFlag'];?></td>
                                  
                                <td align="left">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['orderId'];?>,'<?php echo $row['orderNumber'];?>')">
                                				<?php if($row['orderFlag'] == "待付款"){?>
                                				<input type="button" value="取消" class="btn" onclick="editOrder(<?php echo $row['orderId'];?>)">
                                				<?php } ?>
                                				<input type="button" value="确认" class="btn" onclick="doneOrder(<?php echo $row['orderId'];?>)">
                                				<!-- <input type="button" value="删除" class="btn"onclick=")"> -->
					                            <div id="showDetail<?php echo $row['orderId'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="left">用户手机</td>
					                        			<td><?php echo $row['userPhone'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">用户名字</td>
					                        			<td><?php echo $row['userName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">订单金额</td>
					                        			<td>￥&nbsp;<?php echo $row['orderAmount'];?></td>
					                        		</tr>					                  
					                        			<td width="20%"  align="left">订单日期</td>
					                        			<td><?php echo $row['orderDate'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">取菜时间</td>
					                        			<td><?php echo $row['orderTime'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="left">订单状态</td>
					                        			<td><?php echo $row['orderFlag'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="left">订单地址</td>
					                        			<td><?php echo $row['orderAddress'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="left">用户信息</td>

					                        			<td>
					                        				<table>
					                        					<?php
                        											$orderUser = getUserByOrder($row['orderId']);
                        						
                        											if($orderUser){
																?>
					                        			
					                        				<tr>
					                        					<td>用户账号：<?php echo $orderUser['userTel']; ?></td>
					                        				</tr>
					                        				<tr>
					                        					<td>用户名称：<?php echo $orderUser['userName']; ?></td>
					                        				</tr>
					                        				<tr>
					                        					<td>用户性别：<?php echo $orderUser['sex']; ?></td>
					                        				</tr>
					                        				<tr>
					                        					<td>用户邮箱：<?php echo $orderUser['email']; ?></td>
					                        				</tr>
					                   							<?php  }?>
					                        			</table>
					                        				
														</td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="left">商品信息</td>

					                        			<td>
					                        				<table>
					                        					<?php
                        											$orderPro = getProductByOrder($row['orderId']);
                        						
                        											if($orderPro){
                        												// var_dump($orderPro);
                        												foreach($orderPro as $pro):
                        													// echo $pro['productNumber'];
																?>
					                        			
					                        				<tr>
					                        					<td>商品编号：<?php echo $pro['productNumber']; ?></td> 
					                        					<td>商品名称：<?php echo $pro['productName']; ?></td>
					                        				</tr>
					                        				<tr>
					                        					<td>商品图片：</td>
					                        						<?php 
					                        							$proImgs=getAllImgByProId($pro['productId']);
					                        							if($proImgs){
					                        								// var_dump($proImgs);
					                        								foreach($proImgs as $img):
					                        						?>
					                        								<td><img width="90" height="80" src="../<?php echo $img['imgRoot'] . $img['imgName'];?>" alt=""/> &nbsp;&nbsp;</td>
					                        							<?php endforeach; } else{ ?>
					                        							<td>无图片</td>
					                        							<?php } ?>
					                        				</tr>
					                        				<?php endforeach; } ?>

					                        			</table>
					                        				
														</td>
					                        		</tr>
					                        		
					                        	</table>
					                        	<!-- <span style="display:block;width:80%; ">
					                        	商品描述:<br/>
					                        	<?php echo $row['productInfo'];?>
					                        	</span> -->
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
	      title:"订单号："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	// function addPro(){
	// 	window.location='addPro.php';
	// }
	function editOrder(id){
		//window.location='editOrder.php?id='+id;
		if(window.confirm("您确认要取消用户的订单吗?")){
			window.location="doAdminAction.php?act=editOrder&id="+id;
		}
	}
	function doneOrder(id){
		//window.location='editOrder.php?id='+id;
		if(window.confirm("您真的要确认用户的订单吗?")){
			window.location="doAdminAction.php?act=doneOrder&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listOrder.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listOrder.php?order="+val;
	}
</script>
</body>
</html>