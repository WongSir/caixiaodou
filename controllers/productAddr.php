<?php

	/********************************************************************************************************
		caixiaodou.php文件是展示首页中商品和广告等信息的首页入口页面，其先通过数据库获取所有上架商品信息，然后
	再将数据传到前台页面，使用 smarty 打印出来

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/
	
	// //开启缓存
	// $smarty->caching = true;

	// //设置一个缓存的生成周期
	// $smarty->cache_lifetime = 10;

	// //设置 smarty 模板缓存目录。用于存储缓存文件
	// $smarty->cache_dir = './cache';

	// if(!$smarty->isCached('caixiaodouK.html' , $_GET['kind']) ){

	// $kind = $_GET['kind'];

	$productAddr = $_GET['productAddr'];
	$productKind = $_GET['foodName'];
	// echo $productKind;
	// echo $productAdrr;
	if($productKind === "全部菜品"){
		$where = "where productkind.productAddr = '$productAddr' ";
		// echo $where;
	}
	else{
		$where = "where productkind.productAddr = '$productAddr' and productKind.productKind = '$productKind' ";
		// echo $where;
	}
	// echo $where;

	//声明一个管理员对象
	$admin=new Admin();

	//通过管理员类的checkAddr()方法来检测该地铁站是否开展业务
	$_SESSION['addr'] = $admin->checkAddr($productAddr);
	
	//通过管理员类的getAllProduct()方法来获取所有商品所有信息
	$row=$admin->getAllProducts($where);
	// var_dump($row);
	$rows = NULL;
	//通过商品id来获取其对应商品首页图片
	if($row){
		foreach ($row as $key => $value) {
			$rows_Img = $admin->getImgsByKind($value['productId']);
			// var_dump($rows_Img);
			if($rows_Img){
				$value['imgRoot'] = $rows_Img['imgRoot'] . "image_200_220/" . $rows_Img['imgName'];
				//$value['imgName'] = $rows_Img[0]['imgName'];
			}
			
			$rows[] = $value;
		}
	}
	else{
		$rows = NULL;
	}
	// var_dump($rows);
	// var_dump($_SESSION['addr']);
	//使用 smarty 模板的assign方法给前台传值
	$smarty->assign('allProduct',$rows);
// }


	//smarty 模板打开首页 caixiaodou.html
	$smarty->display('product.html');

?>
