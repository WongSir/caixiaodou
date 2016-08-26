<?php

	$cart=CartTool::getCart();
	$arr=$cart->all();

	if($arr){
		$user_order=new Order();
		
		$user=new userOperation();

		 $_SESSION['allPrice'] = $cart->getPrice();
		
		$user_order->orderNumber  = rand(1,1000000000);
		$user_order->userName     = $_SESSION['userName'];
		$user_order->userPhone    = $_SESSION['userTel'];
		$user_order->orderAmount  = $_SESSION['allPrice'];
		$user_order->orderDate    = date("Y-m-d H:i:s");
		$user_order->orderTime    = "16:30";
		$user_order->orderFlag    = "待付款";
		$user_order->orderAddress = "广州大学城华南理工大学C10——247房";
		
		$user_order->userTel = $_SESSION['userTel'];

		// $order=$user_order->arr;
		$i=0;
		foreach($arr as $item){
			// echo $item['productId'] , '->',$item['productNum'] ,"<br/>";
			$user_order->arr[$i]['productId'] = $item['productId'];
			$user_order->arr[$i]['productNum'] = $item['productNum'];
			$i++;
		}
		
		$orderId=$user->userMakeOrder($user_order);
		
		if($orderId){
			$cart->dellAllItem();
			header('Location: index.php?op=member');
		}
		else 
			return false;

	}
	else
		header('Location: index.php');
?>