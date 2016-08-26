<?php

require_once('DB.php');

class Admin{
	
	var $managerName;
	var $managerPassword;


	function _construct(){
		
		$this->managerName=NULL;
		$this->managerPassword=NULL;
	}
	
	function isRegister($phNum){

		$user_db = new DB();

		$sql_IfReg = "select userId from users where users.userTel = '$phNum' ";
		$row = $user_db->fetchOne($sql_IfReg);

		if($row){
			return $row;
		}
		else{
			return NULL;
		}

	}

	function userRegister($arr_Info){
		
		$user=new DB();			//create a object of the DB class
		
		$bool_isSuccess=$user->insert("users",$arr_Info);
		
		if($bool_isSuccess)	//call the userAdd member functon of the DB class
			return true;	//user register successfunlly
		else
			return false;	//user register unsuccessfully
	}

	function userCheckLogin($userTel,$userPassword){
		
		$user_db=new DB();	//create a object of the DB class
		
		$sql_Check = "select userId from users where userTel = '$userTel' and userPassword = '$userPassword' ";
	
		$row = $user_db->fetchOne($sql_Check);
		
		if($row){

			return $row;
		}
		else{
			return NULL;
		}

		
	}
	
	function getProductByPid($Pid){

		$product_db = new DB();

		//获取数据库中商品的基本信息
		$sql_Info = "select * from products where productId = '$Pid' ";
		$arr_Info = $product_db->fetchOne($sql_Info);

		//获取数据库中商品的分类、当天供应和是否是上架等信息
		$sql_Kind = "select productKind,productToday,productFlag from productkind where productkind.productId = '$Pid' ";
		$arr_Kind = $product_db->fetchOne($sql_Kind);


		//获取数据库中商品的数量和点赞次数
		$sql_Change = "select productQuantity , productSales , productLove from productchange where productchange.productId = '$Pid' ";
		$arr_Change = $product_db->fetchOne($sql_Change);
		
		//将以上获取的商品在于各个表格里的信息合并在一个数组里
		if( $arr_Kind && $arr_Change ){
			$arr_product = array_merge( $arr_Info,$arr_Kind,$arr_Change );
		}
		elseif( $arr_Kind ){
			$arr_product = array_merge( $arr_Info,$arr_Kind );
		}
		elseif($arr_Change){
			$arr_product = array_merge( $arr_Info,$arr_Change );
		}
		else{
			$arr_product = $arr_Info;
		}

		return $arr_product;
	}

	function getProductDetail($pId){

		$product_db = new DB();

		//获取数据库中商品的基本信息
		$sql_Detail = "select * from productdetail where productId = '$pId' ";
		$arr_Detail = $product_db->fetchOne($sql_Detail);

		return $arr_Detail;
	}

	function checkAddr($addr){

		$addr_db = new DB();

		//检测客户选择的地铁站是否存在数据库中
		$sql = "select addrFlag from addr where addr.addrName = '$addr' ";

		$rows_addr = $addr_db->fetchOne($sql);

		if(!$rows_addr['addrFlag']){
			return false;
		}
		else{
			return true;
		}
	}

	function getAllProducts($where){

		$products_db = new DB();
		
		//获取products表中所有商品Id
		$sql= "select productId from productkind " . $where;
		// echo $sql;
	
		$rows_Id = $products_db->fetchAll($sql);

		if(!$rows_Id){
			return false;
		}

		$result_num = count($rows_Id);
		
	
		//通过商品Id来获取所有商品的所有信息
		$arr_products = NULL;

		for($i = 0; $i < $result_num; ++$i){

			$id = $rows_Id[$i]['productId'];

			$arr_products[$i] = $this->getProductByPid($id);
		}

		return $arr_products;	//返回获取的商品信息
	}

	function getProductByOrder($id){

		$product_db = new DB();

			
		$sqlOrder = " select productId , quantity from order_product where order_product.orderId = '$id' ";
			
		$orderPro = $product_db->fetchAll($sqlOrder);

		if(!$orderPro){
			return NULL;
		}

		return $orderPro;
		
	}

	function getSearchNotice(){

		$notice_db = new DB();

		//获取搜索框广告语
		$sqlNotice = "select noticeContent from searchnotice";

		$resultNotices = $notice_db->fetchAll($sqlNotice);
		
		if($resultNotices)
			return $resultNotices;
		else
			return NULL;
	}

	function getAdvertImgs(){

		$advert_db = new DB();

		//获取处于展示状态的广告图片
		$sqlImg = "select imgName , imgRoot from adverts where adverts.imgFlag = 'true' ";
		//echo $sqlImg;
		$resultImgs = $advert_db->fetchAll($sqlImg);
		//echo $resultImgs[1]['imgRoot'];
		if($resultImgs)
			return $resultImgs;
		else
			return NULL;
	}	

	function getImgsByKind($id){

		$img_db = new DB();

		//获取 productimg 表指定Id的有商品的图片信息
		$sqlImg = "select imgName,imgRoot from productimg where productimg.productId='$id' ";
		//echo $sqlImg;
		$resultImgs = $img_db->fetchAll($sqlImg);
		// var_dump($resultImgs);exit;
		if(count($resultImgs) == 1){
			return $resultImgs[0];
		}
		if($resultImgs){
			return $resultImgs;
		}
		else{
			return NULL;
		}
	}

	function loveChange($id){

		$love_db = new DB();

		$sqlLove = "select productLove from productchange where productchange.productId = '$id' ";

		$num = $love_db->fetchOne($sqlLove);

		if($num){
			$love_num = (int)$num['productLove'] + 1;
		}

		$arr_love['productLove'] = $love_num;

		$where = "productchange.productId = '$id' ";

		$bool_isSuccess = $love_db->update('productchange' , $arr_love , $where);

		if($bool_isSuccess){
			return $love_num;
		}
		else{
			return false;
		}
	}
	
	
}

?>