<?php

	//声明一个管理员对象
	$admin=new Admin();
	// echo "走了数据库";
	// unset($_SESSION['orderNum']);

	//通过管理员类的 getAdvertImgs() 方法来获取展示广告图片信息
	$row_img = $admin->getAdvertImgs();

	foreach ($row_img as $key => $value) {
		$adverts[]['imgRoot'] = $value['imgRoot'];
	}
	
	// $_SESSION['advertRoot'] = $adverts[$rotationId]['imgRoot'];
	
	$smarty->assign('adverts',$adverts);

	$smarty->display('advert.html');


?>