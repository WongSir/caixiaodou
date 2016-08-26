<?php

	session_start();
	
	class CartTool{
		
		private static $ins=NULL;
		public $items=array();
		
		final protected function __construct(){
				
		}
		final protected function __clone(){
			
		}
		
		//获取实例
		protected static function getIns(){
			
			if(!(self::$ins instanceof self)){
				self::$ins=new self();
			}
			return self::$ins;
		}
		
		//把购物车的单例对象放到session里
		public static function getCart(){
			
			if(!isset($_SESSION['cart'])|| !($_SESSION['cart'] instanceof self)){
				$_SESSION['cart']=self::getIns();
	
			}
			return $_SESSION['cart'];
		}
		
		
		//添加商品
		public function addItem($id,$name,$price,$num=1){
			
			if($this->hasItem($id)){
				$this->incNum($id,$num);
				return;	
			}
			$item=array();
			$item['productId']=$id;
			$item['productName']=$name;
			$item['productPrice']=$price;
			$item['productNum']=$num;
			
			$this->items[$id]=$item;
		}

		
		//修改购物车中的商品数量
		public function modNum($id,$num){
			if(!$this->hasItem($id)){
				return false;
			}
			//$modnum=$num>=1 ? $num : 1;
			$this->items[$id]['productNum']=$num;	
		}
		//商品数量增1加
		public function incNum($id){
			if($this->hasItem($id)){
				$this->items[$id]['productNum']+=1;	
			}	
		}
		
		//商品数量减少1
		public function indNum($id){
			if($this->hasItem($id)){
				
				if($this->items[$id]['productNum']<1){
					$this->dellItem($id);	
				}
				else{
					$this->items[$id]['productNum']-=1;	
				}
				
			}
				
		}

		//删除商品
		public function dellItem($id){
			unset($this->items[$id]);	
		}

		//清空购物车
		public function dellAllItem(){

			$this->items=array();
		}
		//判断商品是否存在
		public function hasItem($id){
			return array_key_exists($id,$this->items);	
		}

		//查询购物车中的种类
		public function getCnt(){
			return count($this->items);	
		}
		
		//查询购物车中商品的个数
		public function getNum(){
			if($this->getCnt()==0){
				return 0;	
			}
			$sum=0;
			foreach($this->items as $item){
				$sum+=$item['productNum'];
				
			}
			return $sum;
		}
		
		//查询购物车中的总金额
		public function getPrice(){
			if($this->getCnt()==0){
				return 0;	
			}
			$price=0.0;
			foreach($this->items as $item){
				$price+=$item['productNum'] * $item['productPrice'];	
			}
			return $price;	
		}
		
		//返回购物车汇总的所有商品
		public function all(){
			return $this->items;	
		}
		//清空购物车
		public function clear(){
			$this->items=array();
		}
	}
	
	// //print_r(CartTool::getCart());
	// $cart=CartTool::getCart();
	
	// if(!isset($_GET['test'])){
	// 	$_GET['test']='';	
	// }
	
	// if($_GET['test']=='add'){
	// 	$cart->addItem(3,'王八',23.4,1);
	// 	$cart->addItem(4,'王王八八',23.4,1);
	// 	echo "ok";
	// }else if($_GET['test']=='clear'){
	// 		$cart->clear();
	// 	}
	// else if($_GET['test']=='show'){
	// 	print_r($cart->all());
	// 	echo '<br />';
	// 	echo '共',$cart->getCnt(),'种',$cart->getNum(),'个商品<br />';
	// 	echo '共',$cart->getPrice(),'元';
	// 	}
?>