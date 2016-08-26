<?php

	/***********************************************************************
	
	addToCart.php用来接收前台ajax对后台数据库的请求和操作
	主要任务：完成用户的购物下订单流程
	具体功能如下：
	1、用户添加商品到购物车
	2、用户修改购物车
	3、用户提交结算
	4、用户填写订单信息
	5、用户提交订单、付款完成整个购物流程


	程序 猿 ：黄树茂	English Name：Andy
	编写日期：27/07/2015

	修改人员：
	修改日期：

	****************************************************************************/
	
	//打开session
	session_start();


	//获取用户操作指令
	$action=isset($_GET['action'])?$_GET['action']:"";
	
	//获取用户提交的商品id、商品名称和商品单价
	$id=isset($_GET["id"])?$_GET['id']:"";
	$name=isset($_GET['name'])?$_GET['name']:"";
	$price=isset($_GET['price'])?$_GET['price']:"";
	$num=isset($_GET['num'])?$_GET['num']:"";

	//声明调用购物车类单例
	$cart=CartTool::getCart();

	//对用户操作的判断和执行
	switch($action){

		case "buy":

			$cart->addItem($id,$name,$price,1);		//向购物车类加入商品
			break;

		case "add":

			$cart->incNum($id);						//增加购物车单例的商品数量
			break;

		case "reduce":

			$cart->indNum($id);						//减少购物车单例的商品数量
			break;

		case "modify":

			$cart->modNum($id,$num);				//批量修改购物车单例的商品数量
			break;

		case "delete" :

			$cart->dellItem($id);					//按照商品Id来删除相应地商品
			break;

		case "deleteAll" :

			$cart->dellAllItem();					//批量删除所有商品
			break;

		default:
			header('Location:index.php');			//用户没有操作时默认回到首页
			break;
	}

?>