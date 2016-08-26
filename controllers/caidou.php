<?php
	
	/********************************************************************************************************
		caidou.php展示用户选择的商品，用户可以对自己选择的商品种类和数量进行修改，最后确定自己需要购买的商品

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/
	$cart=CartTool::getCart();		//声明一个购物类的对象

	$arr=$cart->all();				//用购物车类对象获取用户选择的所有商品

	$i=0;							//声明变量 $i

	//对购物车类商品信息进行重组成一个新数组
	foreach($arr as $item){
	
		$myCart[$i]['productId'] = $item['productId'];
		$myCart[$i]['productName'] = $item['productName'];
		$myCart[$i]['productPrice'] = sprintf("%.2f",$item['productPrice']);
		$myCart[$i]['productNum'] = $item['productNum'];
		$myCart[$i]['priceTotal'] = sprintf("%.2f",$item['productPrice']*$item['productNum']);
		$i++;
	}

	$admin = new admin();

	// var_dump($myCart);
	//var_dump($rows);
	if(isset($myCart)){

		foreach ($myCart as $key => $value) {
			$rows_Img = $admin->getImgsByKind($value['productId']);
			$rows_Img['imgRoot'] = $rows_Img['imgRoot'] . 'image_80_80/';
			// var_dump($rows_Img);
			if($rows_Img){
				$value = array_merge($value , $rows_Img);
			}
			
			$rows_myCart[] = $value;
		}
	}
	else{
		$rows_myCart = NULL;
	}

	//使用 smarty 模板给页面传值
	$smarty->assign('myCart',$rows_myCart);
	

	//使用 smarty 模板打开页面链接
	$smarty->display('caidou.html');
?>