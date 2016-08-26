<?php

	/********************************************************************************************************
		caixiaodou.php文件是展示首页中商品和广告等信息的首页入口页面，其先通过数据库获取所有上架商品信息，然后
	再将数据传到前台页面，使用 smarty 打印出来

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/

	//开启缓存
	// $smarty->caching = true;

	//设置一个缓存的生成周期
	$smarty->cache_lifetime = 60;

	//设置 smarty 模板缓存目录。用于存储缓存文件
	$smarty->cache_dir = './cache';


	if(!$smarty->isCached("home.html")){

		//声明一个管理员对象
		$admin=new Admin();

		// unset($_SESSION['orderNum']);

		// $where = "where productkind.productShow = 'true1' ";

		//通过管理员类的getAllProduct($where)方法来获取展示的商品所有信息
		// $row=$admin->getAllProducts($where);
		
		// $rows = NULL;
		//通过商品id来获取其对应商品首页图片
		// if($row){
		// 	foreach ($row as $key => $value) {
		// 		$rows_Img = $admin->getImgsByPage($value['productId']);
	
		// 		if($rows_Img){
		// 			$value['imgRoot'] = $rows_Img['imgRoot'] . "image_210_109" . $rows_Img['imgName'];
		// 		}
				
		// 		$rows[] = $value;
		// 	}
		// }
		// else{
		// 	$rows = NULL;
		// }

		//通过管理员类的 getSearchNotice() 方法来获取展示广告图片信息
		$row_notices = $admin->getSearchNotice();
		//var_dump($row_notices);
		$num = count($row_notices);

		if( !isset($_SESSION['i']) ){
			$_SESSION['i'] = 0;
		}
		else{
			$_SESSION['i'] += 1;

			if($_SESSION['i'] >=$num){
				$_SESSION['i'] = 0;
			}
		}
		// $_SESSION['i'] = isset($_SESSION['i'])?$_SESSION['i'] +1 : 0;
		// echo $_SESSION['i'];

		
		$_SESSION['notice'] = $row_notices[$_SESSION['i']]['noticeContent'];
		

		//通过管理员类的 getAdvertImgs() 方法来获取展示广告图片信息
		$row_img = $admin->getAdvertImgs();

		foreach ($row_img as $key => $value) {
			$adverts[]['imgRoot'] = $value['imgRoot'];
		}

		//使用 smarty 模板的assign方法给前台传值
		$smarty->assign('adverts' , $adverts);
		// $smarty->assign('notice' , $row_notice);
		
		// $smarty->assign('showProduct',$rows);
	}
	

	//smarty 模板打开首页 caixiaodou.html
	$smarty->display('home.html');

?>
