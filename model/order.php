<?php

	//声明订单类
	class Order{

		public $orderNumber;		//订单编号
		var $userPhone;				//用户取菜的电话号码(不一定是登录手机号)
		var $userName;				//用户取菜的用户名字
		var $orderAmount;			//订单总价
		var $orderDate;				//下订单日期
		var $orderTime;				//用户预订取菜的时间
		var $orderFlag;				//订单状态(待付款、待取菜、已完成和已取消)
		var $orderAddress;			//用户地址	
		var $productId;				//订单里的商品Id	
		var $quantity;				//订单每件商品的数量
		// var $arr=array(array());	//声明二维数组来关联记录订单和商品Id关系
		
		
		function _construct(){

			//初始化订单信息变量为 NULL
			$this->orderNumber=NULL;
			$this->userPhone=NULL;
			$this->userName=NULL;
			$this->orderAmount=NULL;
			$this->orderDate=NULL;
			$this->orderTime=NULL;
			$this->orderFlag=NULL;
			$this->orderAddress=NULL;
			$this->productId=NULL;
			$this->quantity=NULL;
		}
		
	}
	

?>