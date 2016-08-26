<?php

	class DB{
		private $db_UserName;
		private $db_Password;
		private $db_Host;
		private $db_DBName;
		
		function __construct(){
			
			// $this->db_UserName='maomao';
			// $this->db_Password='maomao';
			// $this->db_Host='localhost';
			// $this->db_DBName='caixiaodou';

			$this->db_UserName='root';
			$this->db_Password='root';
			$this->db_Host='localhost';
			$this->db_DBName='caixiaodou';
		}
		
		function __destruct(){
		
		}
		
		function userAdd($Info){
			
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}
				
			$query="insert into users(userTel,userPassword,userName,sex,email,regTime) 
				values('$Info->userTel','$Info->userPassword','$Info->userName','$Info->sex','$Info->email','$Info->regTime')";	
			
			$db->query("SET NAMES UTF8");	
			
			$bool_isSuccess=$result=$db->query($query);
			
			/*echo $db->insert_id;exit;*/
			
				$db->close();
				if($bool_isSuccess)
					return true;
				else
					return false;
		}
		
		function getUser($userId){
		
			//connect the database
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "Can't connect to the database!'";
				return false;	
			}
			
			$query="select * from users where users.userId=$userId";
			$db->query("SET NAMES UTF8");
			
			$result=$db->query($query);
			
			$db->close();
			if($result)
				return $result->fetch_array(MYSQLI_ASSOC);
			else
				return false;
				
		}
		
		function userSearch($userTel){
		
			//connect the database
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "<script> alert('Can't connect to the database!');</script>";
				return false;	
			}
			
			$query="select userId from users where users.userTel=$userTel";
			$db->query("SET NAMES UTF8");
			
			$result=$db->query($query);
			//var_dump($result);exit;
			$db->close();
			if(!isset($result))
				return false;
			
			$result_num=$result->num_rows;
			
			$arr_userId=NULL;
				for($i=0;$i<$result_num;$i++){
					$row=$result->fetch_array(MYSQLI_ASSOC);
					$arr_userId[$i]=stripslashes($row['userId']);	
				}
				
			$arr_user=NULL;
			
			for($i=0;$i<$result_num;$i++){
					$arr_user[$i]=$this->getUser($arr_userId[$i]);	
				}
				
			return $arr_user;	
		}
		
		function userModify($userTel,$Info){
			
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "<script>alert('Can't connect to the database!');</script>";
				return false;
			}
			
			$query="update users set users.userName='$Info->userName',users.sex='$Info->sex',users.email='$Info->email' 
					where users.userTel=$userTel";
					
			$db->query("SET NAMES UTF8");
			
			$result=$db->query($query);
			
			$db->close();
			
			if($result)
				return true;
			else
				return false;
			
		}
		
		function userChangePassword($userTel,$userPassword){
			
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "<script>alert('Can't connect to the database!')</script>";
				return false;
			}
			
			$query="update users set users.userPassword='$userPassword' 
					where users.userTel=$userTel";
			$db->query("SET NAMES UTF8");
			
			
			$result=$db->query($query);
			$db->close();
			
			if($result)
			 	return true;
			else
				return false;
		}
		
		function userMakeOrder($Info){
			
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}
			
			$query="insert into orders(orderNumber,userPhone,userName,orderAmount,orderDate,orderTime,orderFlag,orderAddress) 
				values('$Info->orderNumber','$Info->userPhone','$Info->userName','$Info->orderAmount','$Info->orderDate','$Info->orderTime','$Info->orderFlag','$Info->orderAddress')";	
			
			$db->query("SET NAMES UTF8");
			
			$bool_isSuccess=$result=$db->query($query);
			
			
			if($bool_isSuccess){
				
				$orderId=$db->insert_id;
				
				$query="insert into user_order(userTel,orderId) values('$Info->userTel','$orderId')";
				$db->query("SET NAMES UTF8");
				$db->query($query);
				
				for($i=0;$i<count($Info->arr);$i++)
				{
					$productId=$Info->arr[$i]['productId'];
					$quantity=$Info->arr[$i]['productNum'];
					$query="insert into order_product(productId,orderId,quantity) 
							values('$productId','$orderId','$quantity')";
					$db->query("SET NAMES UTF8");
					$db->query($query);
				}
				$db->close();
				
				return $orderId;
			}
			else{
				$db->close();
				return false;
			}
			
		}

		function getOrderId($userTel){

			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}
			
			$query=" select orderId from user_order where user_order.userTel='$userTel'";
			$db->query("SET NAMES UTF8");
	
			$result_orderId=$db->query($query);

			$db->close();
			
			if($result_orderId){
			
				$result_num=$result_orderId->num_rows;	
			
				$orderId=NULL;
				for($i=0;$i<$result_num;++$i){
					
					$result=$result_orderId->fetch_array(MYSQLI_ASSOC);
					$orderId[$i]=$result['orderId'];
				}

			}

			return $orderId;
		}
		
		function getOrderProduct($orderId){

			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}
			
			$query=" select productId , quantity from order_product where order_product.orderId='$orderId'";
			$db->query("SET NAMES UTF8");
			
			//echo $query;exit;

			$result=$db->query($query);

			if(!isset($result))
				return NULL;

			$result_num = $result->num_rows;
			$row=NULL;

			for($i=0;$i<$result_num;++$i){

				$row[$i]=$result->fetch_array(MYSQLI_ASSOC);
				$productId = $row[$i]['productId'];

				$query="select * from productimg where productimg.productId = '$productId'";
				$db->query("SET NAMES UTF8");
				
				$imgResult=$db->query($query);
				$img = $imgResult->fetch_array(MYSQLI_ASSOC);
				$row[$i]['imgRoot'] = $img['imgRoot'];
			}


			return $row;

			$db->close();
		}

		function getOrder($userTel){

			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}

			$orderId = $this->getOrderId($userTel);

			//var_dump($orderId);exit;

			$order=NULL;
			for($i=0;$i<count($orderId);++$i)
			{

				$arr=$this->getOrderProduct($orderId[$i]);
				
				$query="select * from orders where orders.orderId='$orderId[$i]'";
				$db->query("SET NAMES UTF8");
			
				$result_order=$db->query($query);
				
				if($result_order){
				
					$result=$result_order->fetch_array(MYSQLI_ASSOC);
					$order[$i]=$result;
				}
				else
					return false;

				$order[$i]['orderProduct'] = $arr;

			}
			
			$db->close();
			//var_dump($order);exit;
			return $order;		
		}
		
		function userChangeOrder($orderNumber,$orderFlag){
			
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}
			
			$query="select orderFlag from orders where orders.orderNumber='$orderNumber' ";
			
			$db->query("SET NAMES UTF8");
			$result=$db->query($query);
			
			if($result){
				
				$arrFlag=$result->fetch_array(MYSQLI_ASSOC);
				$dbFlag=$arrFlag['orderFlag'];
			}
			else
				return false;
				
			switch($dbFlag)
			{
			
				case "待付款":
					if($orderFlag=="待取菜"||$orderFlag=="已取消"){
						
						$query="update orders set orders.orderFlag='$orderFlag' where orders.orderNumber='$orderNumber'";
						$db->query("SET NAMES UTF8");
						$bool_isSuccess=$db->query($query);
						$db->close;
						
						if($bool_isSuccess)
							return true;
						else
							return false;
					}
					else{
						$db->close;
						return false;
					}
					break;
				case "待取菜":
					if($orderFlag=="已完成"){
					
						$query="update orders set orders.orderFlag='$orderFlag' where orders.orderNumber='$orderNumber'";
						$db->query("SET NAMES UTF8");
						$bool_isSuccess=$db->query($query);	
						$db->close;
						if($bool_isSuccess)
							return true;
						else
							return false;
					}
					else{
						$db->close;
						return false;
					}
					break;
				case "已取消":
					if($orderFlag=="待取菜"){
					
						$query="update orders set orders.orderFlag='$orderFlag' where orders.orderNumber='$orderNumber'";
						$db->query("SET NAMES UTF8");
						$bool_isSuccess=$db->query($query);	
						$db->close;
						if($bool_isSuccess)
							return true;
						else
							return false;
					}
					else{
						$db->close;
						return false;
					}	
					break;
				default:
					break;
				
			}
			
		}
		
		function getProduct($productId){
			
			//链接数据库
			@ $db = new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}
			
			//获取 products 表指定Id的商品所有基本信息
			$queryInfo = "select * from products where products.productId='$productId'";
			
			//获取 productimg 表指定Id的有商品的图片信息
			$queryImg = "select imgName,imgRoot,imgFlag from productimg where productimg.productId='$productId'";
			
			//获取 producchange 表指定Id的商品的库存数量和点赞次数
			$queryChange = "select productQuantity,productLove from productchange where productchange.productId='$productId'";
			
			//获取 productkind 表指定Id的商品的商品类型、供应时间和是否有货等信息
			$queryKind = "select productKind,productToday,productFlag from productkind where productkind.productId='$productId'";
			

			$db->query("SET NAMES UTF8");

			//执行 query 语句
			$resultInfo = $db->query($queryInfo);

			$resultImg = $db->query($queryImg);
			
			$resultChange = $db->query($queryChange);
			
			$resultKind = $db->query($queryKind);
			
			//判断数据库表格获取是否有错误
			if (!isset($resultInfo) || !isset($resultImg) || !isset($resultChange) || !isset($resultKind)) 
			 	return NULL;
			
			//将以上获取的结果集转换成数组形式
			$rowInfo = $resultInfo->fetch_array(MYSQLI_ASSOC);
			
			$rowImg = $resultImg->fetch_array(MYSQLI_ASSOC);
			
			$rowChange = $resultChange->fetch_array(MYSQLI_ASSOC);
			
			$rowKind = $resultKind->fetch_array(MYSQLI_ASSOC);

			//将以上获取的商品在于各个表格里的信息合并在一个数组里
			$row = array_merge($rowInfo,$rowImg,$rowChange,$rowKind);
				
			$db->close();	//关闭数据库

			return $row;	//返回数据库里商品的所有信息
		}
		

		function getAllProduct(){
			
			//链接数据库
			@ $db = new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
				
				echo "'Can't connect to the database!'";
				return false;
			}
			
			//获取products表中所有商品Id
			$query = "select productId from products";
			$db->query("SET NAMES UTF8");
			$result = $db->query($query);
			
			if(!isset($result))
				return false;
			
			$result_num = $result->num_rows;
			
			$arr_productId = NULL;
			for($i = 0; $i < $result_num; ++$i){
				
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$arr_productId[$i] = $row['productId'];
			}
		
			//通过商品Id来获取所有商品的所有信息
			$arr_product = NULL;
			for($i = 0; $i < $result_num; ++$i){
				
				$arr_product[$i] = $this->getProduct($arr_productId[$i]);	
			}

			$db->close(); //关闭数据库
			return $arr_product;	//返回获取的商品信息
		}
		
		
	}