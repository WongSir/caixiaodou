<?php
	
	$cart=CartTool::getCart();
	$arr=$cart->all();
	//var_dump($arr);
	$i=0;
	foreach($arr as $item){
		//echo $item['productId'];
		$myCart[$i]['productId']=$item['productId'];
		$myCart[$i]['productName']=$item['productName'];
		$myCart[$i]['productPrice']=sprintf("%.2f",$item['productPrice']);
		$myCart[$i]['productNum']=$item['productNum'];
		$myCart[$i]['priceTotal']=sprintf("%.2f",$item['productPrice']*$item['productNum']);
		$i++;
	}

	$smarty->assign('myCart',$myCart);

	$smarty->display('caidou.html');
?>