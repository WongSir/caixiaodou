<?php

	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){


		$cart=CartTool::getCart();
		$arr=$cart->all();

		// var_dump($arr);echo "</br>";echo "</br>";

		$arr_Info= $_POST;
		// var_dump($arr_Info);
		if(!isset($_SESSION['userTel'])){
			header('Location: index.php?route=home');
		}
		// $_SESSION['userName'] = isset($_SESSION['userName']) ? $_SESSION['userName'] : "菜小兜";
		// $_SESSION['userTel'] = isset($_SESSION['userTel']) ? $_SESSION['userTel'] : "13660559158";

		$arr_Info['name'] = $arr_Info['name'] !=="" ? $arr_Info['name'] : $_SESSION['userName'];
		$arr_Info['phone'] = $arr_Info['phone'] !=="" ? $arr_Info['phone'] : $_SESSION['userTel'];

		if($arr){
			$user_order=new Order();
			
			$user=new userOperation();

			 $allPrice = $cart->getPrice();

			$id0 = "GZBYJXMYJ";
			$id1 = substr(date("Ymd"), 2);
			$id2 = $arr_Info['phone'];


			$id  = $id0 . $id1 . $id2 ;
			

			$user_order->orderNumber  = $id;
			$user_order->userName     = $arr_Info['name'];
			$user_order->userPhone    = $arr_Info['phone'];
			$user_order->orderAmount  = $allPrice;
			$user_order->orderDate    = date("Y-m-d");
			$user_order->orderTime    = $arr_Info['confTime'];
			$user_order->orderFlag    = "待付款";
			$user_order->orderAddress = "广州白云区江夏地铁" . $arr_Info['addr'];
			
			$user_order->userTel = $_SESSION['userTel'];

			// $order=$user_order->arr;
			$i=0;
			foreach($arr as $item){
				// echo $item['productId'] , '->',$item['productNum'] ,"<br/>";
				$user_order->productId[$i] = $item['productId'];
				$user_order->quantity[$i] = $item['productNum'];
				$i++;
			}
			// var_dump($user_order);exit;
			// var_dump($arr_id);echo "</br>";echo "</br>";
			// var_dump($arr_num);echo "</br>";echo "</br>";
			// $user_order['productId'] =;
			// $user_order->productId = $arr_id;
			// $user_order->quantity = $arr_num;
			// var_dump($user_order);exit;
				// var_dump($user_order);exit;
			$orderId=$user->userMakeOrder($user_order);
			
			if($orderId){
				$cart->dellAllItem();
				$_SESSION['myFood'] = $cart->getNum();
				header('Location: index.php?route=member');
			}
			else 
				return false;

		}
		else
			header('Location: index.php');

	}

	else{
		$smarty->display('pay.html');
	}
	
	
?>