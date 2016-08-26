<?php 
/**
 * 检查管理员是否存在
 * @param unknown_type $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkAdmin($sql){
	return fetchOne($sql);
}
/**
 * 检测是否有管理员登陆.
 */
function checkLogined(){
	if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
		require('login.php');
		exit;
	}
}
/**
 * 添加管理员
 * @return string
 */
function addAdmin(){
	$arr=$_POST;
	
	$arr['adminEmail'] = $arr['adminEmail'] ? $arr['adminEmail'] : "admin@caixiaodou.com";
	
	foreach($arr as $value){
		if(!$value){
			$mes="<p>信息填写遗漏!</p><a href='addAdmin.php?id=$id' target='mainFrame'>返回填写</a>";
			return $mes;
		}
	}

	if($arr['adminPassword'] !== $arr['adminPasswordf']){
		$mes="<p>两次输入密码不一致!</p><a href='addAdmin.php?id=$id' target='mainFrame'>返回填写</a>";
		return $mes;
	}
	$arr['adminPassword']=sha1($_POST['adminPasswordf']) . SAFE;
	unset($arr['adminPasswordf']);

	if(insert("admin",$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}

/**
 * 编辑管理员
 * @param int $id
 * @return string
 */
function editAdmin($id){
	$arr=$_POST;

	$arr['adminEmail'] = $arr['adminEmail'] ? $arr['adminEmail'] : "admin@caixiaodou.com";
	foreach($arr as $value){
		if(!$value){
			$mes="<p>修改信息填写遗漏!</p><a href='editAdmin.php?id=$id' target='mainFrame'>返回修改</a>";
			return $mes;
		}
	}
	if($arr['adminPassword'] !== $arr['adminPasswordf']){
		$mes="<p>两次输入密码不一致!</p><a href='editAdmin.php?id=$id' target='mainFrame'>返回输入</a>";
		return $mes;
	}

	if($arr['adminPassword'] === $arr['adminPasswordDB']){
		$arr['adminPassword']=$_POST['adminPassword'];
	}
	else{
		$arr['adminPassword']=sha1($_POST['adminPassword']) . SAFE;
	}

	unset($arr['adminPasswordDB'],$arr['adminPasswordf']);
	if(update("admin", $arr,"adminId={$id}")){
		$mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
	}
	return $mes;
}

/**
 * 删除管理员的操作
 * @param int $id
 * @return string
 */
function delAdmin($id){
	if(delete("admin","adminId={$id}")){
		$mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
	}
	return $mes;
}


function editOrder($id){
	$arr['orderFlag'] = "已取消";
	
	if(update("orders", $arr,"orderId={$id}")){
		$mes="取消订单成功!<br/><a href='listOrder.php'>查询订单</a>";
		return $mes;
	}
	else{
		$mes="取消订单失败!<br/><a href='listOrder.php'>返回</a>";
		return $mes;
	}

}

function doneOrder($id){
	$arr['orderFlag'] = "已完成";

	// $sql = "select orderFlag from orders where orders.orderId = '$id' ";

	// if(fetchOne($sql) === "待付款"){

	// }

	
	if(update("orders", $arr,"orderId= '{$id}' ")){
		$mes="确认订单成功!<br/><a href='listOrder.php'>查询订单</a>";
		return $mes;
	}
	else{
		$mes="确认订单失败!<br/><a href='listOrder.php'>返回重新操作</a>";
		return $mes;
	}

}

/**
 * 注销管理员
 */
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:login.php");
}


/**
 * 得到所有的管理员
 * @return array
 */
function getAllAdmin(){
	
	$sql="select id,username,email from imooc_admin ";
	$rows=fetchAll($sql);
	return $rows;
}
function getAdminByPage($page,$pageSize=2){
	$sql="select * from admin";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select adminId,adminName,adminEmail from admin limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getUserByOrder($id){
	$sql = "select userTel from user_order where orderId = $id";
	$row_Tel = fetchOne($sql);

	if($row_Tel){
		$Tel = $row_Tel['userTel'];
		$sql = "select userTel , userName , sex , email from users where userTel = $Tel ";
		
		$row_User = fetchOne($sql);

		return $row_User;
	}
	else{
		return false;
	}
}


function getProductByOrder($id){
	$sql = "select productId , quantity from order_product where orderId = $id";
	$row_ProId = fetchAll($sql);

	// var_dump($row_ProId); echo "</br>";echo "</br>";
	if($row_ProId){
		foreach ($row_ProId as $key => $value) {
			$pro_Id = $value['productId'];

			$sql = "select productId , productNumber , productName from products where productId = $pro_Id";
			$order_Pro[] = fetchOne($sql);

			// $sql = "select imgRoot , imgName from productimg where productId = $pro_Id";
			// $row_Img = fetchAll($sql);

			// var_dump($row_Pro);echo "</br>";echo "</br>";
			// var_dump($row_Img);echo "</br>";echo "</br>";
			// if($row_Pro && $row_Img){
			// 	$order_Pro = array_merge($row_Pro , $row_Img);
			// }
			// elseif($row_Pro){
			// 	$order_Pro = $row_Pro;
			// }

			// var_dump($order_Pro);echo "</br>";echo "</br>";
		}
		return $order_Pro;
	}
	//var_dump($row_ProId);
}

/**
 * 添加用户的操作
 * @param int $id
 * @return string
 */
function addUser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=time();
	$uploadFile=uploadFile("../uploads");
	if($uploadFile&&is_array($uploadFile)){
		$arr['face']=$uploadFile[0]['name'];
	}else{
		return "添加失败<a href='addUser.php'>重新添加</a>";
	}
	if(insert("imooc_user", $arr)){
		$mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
	}else{
		$filename="../uploads/".$uploadFile[0]['name'];
		if(file_exists($filename)){
			unlink($filename);
		}
		$mes="添加失败!<br/><a href='arrUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
	}
	return $mes;
}
/**
 * 删除用户的操作
 * @param int $id
 * @return string
 */
function delUser($id){
	$sql="select face from imooc_user where id=".$id;
	$row=fetchOne($sql);
	$face=$row['face'];
	if(file_exists("../uploads/".$face)){
		unlink("../uploads/".$face);
	}
	if(delete("imooc_user","id={$id}")){
		$mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
	}
	return $mes;
}
/**
 * 编辑用户的操作
 * @param int $id
 * @return string
 */
function editUser($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("imooc_user", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
	}
	return $mes;
}

function multi_array_sort($multi_array,$sort_key,$sort){ 
	if(is_array($multi_array)){ 
		foreach ($multi_array as $row_array){ 
			if(is_array($row_array)){ 
			$key_array[] = $row_array[$sort_key]; 
			}
			else{ 
				return false; 
			} 
		} 
	}
	else{ 
		return false; 
	} 
array_multisort($key_array,$sort,$multi_array); 
return $multi_array; 
} 