<?php 

	$orderId = $_GET['orderId'];

	$user=new userOperation();

	$order_Detail = $user->orderDetail($orderId);

	$order_Details[] = $order_Detail;

	$smarty->assign('userOrder',$order_Details);

	$smarty->display('orderDetail.html');
?>