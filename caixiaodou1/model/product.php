<?php

	//声明 商品信息类
	class Product{
		
		public $productNumber;			//商品编号
		var $productName;				//商品名称
		var $productCharacter;			//商品简介
		var $productInfo;				//商品详细信息
		var $productWeigth;				//商品重量
		var $productOrigin;				//商品源产地
		var $productPrice;				//商品单价
		var $productTime;				//商品烹饪所需时间
		var $productQuantity;			//商品数量
		var $productLove;				//商品点赞次数
		var $productKind;				//商品口味类型
		var $productToday;				//商品供应时间(是否为当天)
		var $productFlag;				//商品是否处于供应状态
		var $imgName;					//商品图片名称
		var $imgRoot;					//商品图片路径
		var $imgFlag;					//商品大小类型
		
		function _construct(){

			//对商品信息变量初始化为 NULL 
			$this->productNumber    = NULL;
			$this->productName      = NULL;
			$this->productCharacter = NULL;
			$this->productInfo      = NULL;
			$this->productWeigth    = NULL;
			$this->productOrigin    = NULL;
			$this->productPrice     = NULL;
			$this->productTime      = NULL;
			$this->productQuantity  = NULL;
			$this->productLove      = NULL;
			$this->productKind      = NULL;
			$this->productToday     = NULL;
			$this->productFlag      = NULL;
			$this->imgName          = NULL;
			$this->imgRoot          = NULL;
			$this->imgFlag          = NULL;
		}
	}
?>