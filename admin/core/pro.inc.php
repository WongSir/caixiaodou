<?php 
/**
 * 添加商品
 * @return string
 */

function addPro(){

	$arr=$_POST;

	$arr['productOn'] = date('Y-m-d', time());

	// var_dump($arr);
	// $arr_Detail = Info_mod($arr,"productdetail");
	// var_dump($arr_Detail);
	// exit;

	foreach($arr as $value){
		if(!$value){
			$mes="<p>信息填写遗漏!</p><a href='addPro.php' target='mainFrame'>返回添加</a>";
			return $mes;
		}
	}

	$path="../images/products/";

	$uploadFiles=uploadFile($path);
	// var_dump($uploadFiles);
	// exit;
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path.$uploadFile['name'],"$path/image_80_80/".$uploadFile['name'],80,80);
			thumb($path.$uploadFile['name'],"$path/image_200_220/".$uploadFile['name'],200,220);
			thumb($path.$uploadFile['name'],"$path/image_460_282/".$uploadFile['name'],460,282);
			thumb($path.$uploadFile['name'],"$path/image_600_600/".$uploadFile['name'],600,600);

		}
	}
	
	//信息整合成适合商品表 products 的数组 
	$arr_Info = Info_mod($arr,"products");

	$res=insert("products",$arr_Info);
	// echo $res;exit;
	$pid=getInsertId();

	if($res&&$pid){
		if($uploadFiles){
			// var_dump($updateFiles);
			$i = 0;
			foreach($uploadFiles as $uploadFile){
				
				$arr_add['productId'] = $pid;
				$arr_add['productName'] = $arr_Info['productName'];
				$arr_add['imgName'] = $uploadFile['imgName'];
				$arr_add['imgRoot'] = "images/products/";
				// $arr_add['imgFlag'] = $arr['imgFlag'][$i];
				$i++;

				addAlbum($arr_add);
			}
		}

			//信息整合成适合商品类型表格 productkind 数组
		$arr_Kind = Info_mod($arr,"productkind");

		$res = insert("productkind",$arr_Kind);

		//信息整合成适合商品类型表格 productchange 数组
		$arr_Change = Info_mod($arr,"productchange");

		$res = insert("productchange",$arr_Change);

		//信息整合成适合商品类型表格 productdetail 数组
		$arr_Detail = Info_mod($arr,"productdetail");

		$res = insert("productdetail",$arr_Detail);

		$mes="<p>添加成功!</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
		return $mes;
	}
	else{
		foreach($uploadFiles as $uploadFile){

			if(file_exists($path . $uploadFile['name'])){
				unlink($path .$uploadFile['name']);
			}
			if(file_exists($path . "image_80_80/".$uploadFile['name'])){
				unlink($path . "image_80_80/".$uploadFile['name']);
			}
			if(file_exists($path . "image_200_220/".$uploadFile['name'])){
				unlink($path . "image_200_220/".$uploadFile['name']);
			}
			if(file_exists($path . "image_460_282/".$uploadFile['name'])){
				unlink($path . "image_460_282/".$uploadFile['name']);
			}
			if(file_exists($path . "image_600_600/".$uploadFile['name'])){
				unlink($path . "image_600_600/".$uploadFile['name']);
			}
			
		}
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
		return $mes;
		
	}
}
/**
 *编辑商品
 * @param int $id
 * @return string
 */
function editPro($id){
	$arr=$_POST;

	var_dump($arr);
	foreach($arr as $value){
		if(!$value){
			$mes="<p>修改信息填写遗漏!</p><a href='editPro.php?id=$id' target='mainFrame'>返回修改</a>";
			return $mes;
		}
	}
	// var_dump($arr);exit;
	$where=" productId= '{$id}' ";

	$arr_Info = Info_mod($arr,"products");

	$res=update("products",$arr_Info,$where);

	$pid=$id;

	if(!$res){
		$mes = "修改 products 失败!";
		return $mes;
	}
	else{

		//信息整合成适合商品类型表格 productkind 数组
		$arr_Kind = Info_mod($arr,"productkind");

		//查询 productkind 表格是否已有记录
		$productKindId = fetchOne("select productId from productkind where productId = '$id' ");

		if($productKindId){
			//修改 商品类型表格 productkind
			$res = update("productkind",$arr_Kind,$where);
		}
		else{
			$arr_Kind['productId'] = $id;
			$res = insert("productkind",$arr_Kind);
		}
		
		//信息整合成适合商品类型表格 productkind 数组
		$arr_Change = Info_mod($arr,"productchange");

		//查询 productchange 表格是否已有记录
		$productChangeId = fetchOne("select productId from productchange where productId = '$id' ");

		if($productChangeId){
			//修改 商品类型表格 productchange
			$res = update("productchange",$arr_Change,$where);
		}
		else{
			$arr_Change['productId'] = $id;
			$res = insert("productchange",$arr_Change);
		}

		//信息整合成适合商品类型表格 productkind 数组
		$arr_Detail = Info_mod($arr,"productdetail");

		//查询 productdetail 表格是否已有记录
		$productDetailId = fetchOne("select productId from productdetail where productId = '$id' ");

		if($productDetailId){
			//修改 商品类型表格 productdetail
			$res = update("productdetail",$arr_Detail,$where);
		}
		else{
			$arr_Detail['productId'] = $id;
			$res = insert("productdetail",$arr_Detail);
		}	

		//上传图片到文件夹
		$path="../images/products/";
		// $uploadFiles=uploadFile($path,$arr['productNumber']);
		// $uploadFiles=uploadFile("../images/products/image_80_80/",$arr['productNumber']);
		if(isset($arr['imgFlag'])){
			switch($arr['imgFlag']){
				case '80*80':
					$uploadFiles=uploadFile("../images/products/image_80_80/",$arr['productNumber']);
					break;
				case '200*220':
					$uploadFiles=uploadFile("../images/products/image_200_220/",$arr['productNumber']);
					break;
				case '460*282':
					$uploadFiles=uploadFile("../images/products/image_460_282/",$arr['productNumber']);
					break;
				case '600*600':
					$uploadFiles=uploadFile("../images/products/image_600_600/",$arr['productNumber']);
					break;
				default:
					$uploadFiles=uploadFile("../images/products/",$arr['productNumber']);
					break;
			}
		}
		// $uploadFiles=uploadFile("../images/products/image_200_220/",$arr['productNumber']);
		var_dump($uploadFiles);
		//制作缩略图并且上传到文件夹
		// if(is_array($uploadFiles)&&$uploadFiles){
		// 	foreach($uploadFiles as $key=>$uploadFile){

		// 		// $updateFiles[]['imgName'] = $uploadFile['imgName'];
		// 		$updateFiles[]['imgName'] = $uploadFile['imgName'];

		// 		// thumb($path.$uploadFile['name'],"$path/image_80_80/".$uploadFile['name'],80,80);
		// 		// thumb($path.$uploadFile['name'],"$path/image_200_220/".$uploadFile['name'],200,220);
		// 		// thumb($path.$uploadFile['name'],"$path/image_460_282/".$uploadFile['name'],460,282);
		// 		// thumb($path.$uploadFile['name'],"$path/image_600_600/".$uploadFile['name'],600,600);
				
		// 	}
		// }
		 
		//删除文件夹中被替换的文件
		$deleteFiles = $arr['imgName'];

		// var_dump($deleteFiles);exit;
		if($deleteFiles){

			foreach($deleteFiles as $deleteFile){

				if(file_exists($path.$deleteFile)){
					unlink($path.$deleteFile);
				}
				// if(file_exists($path . "image_80_80/".$deleteFile))
				// 	unlink($path . "image_80_80/".$deleteFile);
				// if(file_exists($path . "image_200_220/".$deleteFile))
				// 	unlink($path . "image_200_220/".$deleteFile);
				// if(file_exists($path . "image_460_282/".$deleteFile))
				// 	unlink($path . "image_460_282/".$deleteFile);
				// if(file_exists($path . "image_600_600/".$deleteFile))
				// 	unlink($path . "image_600_600/".$deleteFile);
				
			}
		}

		if($deleteFiles){
			foreach($deleteFiles as $deleteFile){
				$where = "imgName='$deleteFile'";
				deleteAlbum("productimg",$where);
			}
			
		}
		if($uploadFiles){
			// var_dump($updateFiles);
			$sql = "select imgId from productimg where productimg.productId = '$pid' ";
			$row = fetchOne($sql);
			if(!$row){
				$i = 0;
			foreach($uploadFiles as $uploadFile){
				
				$arr_add['productId'] = $pid;
				$arr_add['productName'] = $arr_Info['productName'];
				$arr_add['imgName'] = $uploadFile['imgName'];
				$arr_add['imgRoot'] = "images/products/";
				$i++;

				addAlbum($arr_add);
			}
			}
			
		}
		$mes = $mes="<p>修改成功!</p><a href='editPro.php?id=$id' target='mainFrame'>继续修改</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";

		return $mes;
	}
}

function delPro($id){
	$where="productId=$id";
	$res_Info=delete("products",$where);
	$res_Kind=delete("productkind",$where);
	$res_Change=delete("productchange",$where);
	$res_Detail=delete("productdetail",$where);
	
	$proImgs = getAllImgByProId($id);
	// var_dump($proImgs);
	// exit;

	// $path="../images/products/";

	if($proImgs&&is_array($proImgs)){
		foreach($proImgs as $proImg){
			$path = "../".$proImg['imgRoot'];
			if(file_exists($path.$proImg['imgName'])){
				unlink($path.$proImg['imgName']);
			}
			if(file_exists($path . "image_80_80/".$proImg['imgName'])){
				unlink($path . "image_80_80/".$proImg['imgName']);
			}
			if(file_exists($path . "image_200_220/".$proImg['imgName'])){
				unlink($path . "image_200_220/".$proImg['imgName']);
			}
			if(file_exists($path . "image_460_282/".$proImg['imgName'])){
				unlink($path . "image_460_282/".$proImg['imgName']);
			}	
			if(file_exists($path . "image_600_600/".$proImg['imgName'])){
				unlink($path . "image_600_600/".$proImg['imgName']);
			}
				
		}
	}
	// exit;
	$where="productId={$id}";
	$res_Img=delete("productimg",$where);
	if($res_Info && $res_Kind && $res_Change && $res_Img){
		$mes="删除成功!<br/><a href='listPro.php' target='mainFrame'><p>查看商品列表</p></a>" . "</br>";
	}else{
		$mes="删除失败!<br/><a href='listPro.php' target='mainFrame'><p>重新删除</p></a>" . "</br>";
	}
	return $mes;
}

function Info_mod($arr,$db){

	switch($db){

		case 'products':
			$arr_Mod["productNumber"]    = $arr["productNumber"];
			$arr_Mod["productName"]      = $arr["productName"];
			$arr_Mod["productCharacter"] = $arr["productCharacter"];
			$arr_Mod["productInfo"]      = $arr["productInfo"];
			$arr_Mod["productWeigth"]    = $arr["productWeigth"];
			$arr_Mod["productOrigin"]    = $arr["productOrigin"];
			$arr_Mod["productOldPrice"]  = $arr["productOldPrice"];
			$arr_Mod["productNewPrice"]  = $arr["productNewPrice"];
			$arr_Mod["productTime"]      = $arr["productTime"];
			$arr_Mod["productOn"]        = $arr["productOn"];
			
			return $arr_Mod;
			
			break;

		case 'productkind':
			$arr_Mod['productkind'] = $arr['productKind'];
			$arr_Mod['productToday'] = $arr['productToday'];
			$arr_Mod['productFlag']  = $arr['productFlag'];
			$arr_Mod['productNew']  = $arr['productNew'];
			// $arr_Mod["productShow"]      = $arr["productShow"];

			return $arr_Mod;
			
			break;

		case 'productchange':
			$arr_Mod['productQuantity'] = $arr['productQuantity'];
			$arr_Mod['productLove'] = $arr['productLove'];

			return $arr_Mod;

			break;

		case 'productdetail':
			$arr_Mod['ingredient']   = $arr['ingredient'];
			$arr_Mod['flavouring']   = $arr{'flavouring'};
			$arr_Mod['feature']	     = $arr['feature'];
			$arr_Mod['keep']         = $arr['keep'];
			$arr_Mod['detailsInfo']   = $arr['detailsInfo'];
			$arr_Mod['cokingMethod'] = $arr['cokingMethod'];

			return $arr_Mod;

			break;
		default :
			echo "No choice";
			exit;
			break;
	}
}


/**
 * 得到商品的所有信息
 * @return array
 */
function getAllProByAdmin(){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id){
	$sql="select imgName,imgRoot from productimg where productId={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 根据id得到商品的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){

		$sql="select * from products where productId = $id ";
		$row_Info=fetchOne($sql);

		$sql = "select * from productkind where productId = $id";
		$row_Kind = fetchOne($sql);

		$sql = "select * from productstate where productId = $id";
		$row_State = fetchOne($sql);

		$sql = "select productQuantity , productLove from productchange where productId = $id";
		$row_Change = fetchOne($sql);

		$sql = "select imgName , imgRoot from productimg where productId = $id";
		$row_Img = fetchOne($sql);

		$sql = "select * from productdetail where productId = $id";
		$row_Detail = fetchOne($sql);
		
		if($row_Img){
			$rows = array_merge($row_Info,$row_Kind,$row_State,$row_Change,$row_Img,$row_Detail);
		}
		else{
			$rows = array_merge($row_Info,$row_Kind,$row_State,$row_Change,$row_Detail);
		}

		return $rows;
		// if ($row_Kind && $row_Change && $row_Img && $row_Detail){
		// 	$rows = array_merge($row_Info,$row_Kind,$row_Change,$row_Img,$row_Detail);
		// }
		// elseif ($row_Kind && $row_Change && $row_Img)
		// 	$rows = array_merge($row_Info,$row_Kind,$row_Change,$row_Img);

		// elseif ($row_Kind && $row_Change && $row_Detail)
		// 	$rows = array_merge($row_Info,$row_Kind,$row_Change,$row_Detail);

		// elseif ($row_Change && $row_Img && $row_Detail)
		// 	$rows = array_merge($row_Info,$row_Change,$row_Img,$row_Detail);

		// elseif ($row_Kind && $row_Change)
		// 	$rows = array_merge($row_Info,$row_Kind,$row_Change);

		// elseif ($row_Kind && $row_Img)
		// 	$rows = array_merge($row_Info,$row_Kind,$row_Img);

		// elseif ($row_Kind && $row_Detail)
		// 	$rows = array_merge($row_Info,$row_Kind,$row_Detail);

		// elseif ($row_Change && $row_Img)
		// 	$rows = array_merge($row_Info,$row_Change,$row_Img);

		// elseif($row_Change && $row_Detail)
		// 	$rows = array_merge($row_Info,$row_Change,$row_Detail);

		// elseif($row_Img && $row_Detail)
		// 	$rows = array_merge($row_Info,$row_Img,$row_Detail);

		// elseif($row_Kind)
		// 	$rows = array_merge($row_Info,$row_Kind);

		// elseif($row_Change)
		// 	$rows = array_merge($row_Info,$row_Change);

		// elseif($row_Img)
		// 	$rows = array_merge($row_Info,$row_Img);

		// elseif($row_Detail)
		// 	$rows = array_merge($row_Info,$row_Detail);	
		
		// elseif($row_Info)
		// 	$rows = $row_Info;

		// else{
		// 	echo "pro.inc.php";
		// 	exit;
		// }
		// return $rows;
}
/**
 * 检查分类下是否有产品
 * @param int $cid
 * @return array
 */
function checkProExist($cid){
	$sql="select * from imooc_pro where cId={$cid}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到所有商品
 * @return array
 */
function getAllPros(){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id ";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *根据cid得到4条产品
 * @param int $cid
 * @return Array
 */
function getProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 得到下4条产品
 * @param int $cid
 * @return array
 */
function getSmallProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到商品ID和商品名称
 * @return array
 */
function getProInfo(){
	$sql="select productId,productName from products order by productId asc";
	$rows=fetchAll($sql);
	return $rows;
}
