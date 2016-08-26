<?php

	$pId = $_GET['id'];

	//声明一个管理员对象
	$admin=new Admin();
	// echo "走了数据库";
	// unset($_SESSION['orderNum']);

	//通过管理员类的 getProductByPid($pid) 方法来获取展示的商品所有信息
	$row_Info = $admin->getProductByPid($pId);

	$row_Detail = $admin->getProductDetail($pId);

	$row_Detail['detailsInfo'] = explode('|', $row_Detail['detailsInfo']);
	$row_Detail['cokingMethod'] = explode('|', $row_Detail['cokingMethod']);

	$row = array_merge($row_Info , $row_Detail);

	$rows_Img = $admin->getImgsByKind($row['productId']);

	if($rows_Img){
		$row['imgRootS'] = $rows_Img['imgRoot'] . "image_460_282/" . $rows_Img['imgName'];
		$row['imgRootL'] = $rows_Img['imgRoot'] . "image_600_600/" . $rows_Img['imgName'];
		$row['imgRootB'] = $rows_Img['imgRoot'] . 'image_80_80/' . $rows_Img['imgName'];
	}
	
	$rows[] = $row;
	//使用 smarty 模板的assign方法给前台传值
	$smarty->assign('Detail',$rows);

	$smarty->display('details.html');

?>