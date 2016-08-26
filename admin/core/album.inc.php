<?php 

function addAlbum($arr){
	insert("productimg", $arr);
}
//update($table,$array,$where=null){
function updateAlbum($arr,$where){
	update("productimg",$arr,$where);
}

function deleteAlbum($table,$where){
	delete($table,$where);
}
/**
 * 根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
	$sql="select albumPath from imooc_album where pid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据商品id得到所有图片
 * @param int $id
 * @return array
 */
function getProImgsById($id){
	$sql="select * from productimg where productId={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 文字水印的效果
 * @param int $id
 * @return string
 */
function doWaterText($id){
	$rows=getProImgsById($id);
	// var_dump($rows);
	if($rows){
		foreach($rows as $row){
			$filename="../" . $row['imgRoot'] . "image_80/" . $row['imgName'];
		
			waterText($filename);
		}
		$mes="<p>操作成功!</p><a href='listProImages.php' target='mainFrame'>返回</a>";
		return $mes;
	}
	else{
		$mes="<p>该商品还没上传图片!</p><a href='listProImages.php' target='mainFrame'>返回</a>";
		return $mes;
	}
	
}

/**
 *图片水印
 * @param int $id
 * @return string
 */
function doWaterPic($id){
	$rows=getProImgsById($id);
	if($rows){
		foreach($rows as $row){
			$filename="../" . $row['imgRoot'] . "image_80/" . $row['imgName'];
			
			waterPic($filename);
		}
		$mes="<p>操作成功!</p><a href='listProImages.php' target='mainFrame'>返回</a>";
		return $mes;
	}
	else{
		$mes="<p>该商品还没上传图片!</p><a href='listProImages.php' target='mainFrame'>返回</a>";
		return $mes;
	}
}




