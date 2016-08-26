<?php

	/********************************************************************************************************
		caixiaodou.php文件是展示首页中商品和广告等信息的首页入口页面，其先通过数据库获取所有上架商品信息，然后
	再将数据传到前台页面，使用 smarty 打印出来

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/
	

	$phNum = $_SESSION['userTel'];
	//获取页面传过来的订单状态类型
	$Flag = isset($_GET['Flag'])? $_GET['Flag']:null;
	
	//根据页面选择订单类型来筛选数据库订单
	//而且给页面返回订单类型表头
	switch($Flag){

		case 'paying':
			$where = "and orders.orderFlag = '待付款 '";
			$_SESSION['orderFlag'] = "待付款订单";
			$_SESSION['paying'] = 0;
			break;
		case 'all':
			$where = null;
			$_SESSION['orderFlag'] = "我的订单";
			$_SESSION['all'] = 0;
			$_SESSION['paying'] = 0;
			$_SESSION['taking'] = 0;
			$_SESSION['done'] = 0;
			$_SESSION['cancled'] = 0;
			break;
		case 'taking':
			$where = "and orders.orderFlag = '待取菜 '";
			$_SESSION['orderFlag'] = "待取菜订单";
			$_SESSION['taking'] = 0;
			break;
		case 'done':
			$where = "and orders.orderFlag = '已完成 '";
			$_SESSION['orderFlag'] = "已完成订单";
			$_SESSION['done'] = 0;
			break;
		case 'cancled':
			$where = "and orders.orderFlag = '已取消 '";
			$_SESSION['orderFlag'] = "已取消订单";
			$_SESSION['cancled'] = 0;
			break;
		default:
			$where = null;
			$_SESSION['orderFlag'] = "我的订单";
			$_SESSION['all'] = 0;
			break;

	}

	// $_SESSION['userName'] = $Flag;
	
	
	$phNum=$_SESSION['userTel'];		//使用 $_SESSON 超期全局变量来获取登录在线的用户账号手机号码


	$user=new userOperation();			//声明一个用户操作类的对象

	// unset($userOrder);
	$rows=$user->userCheckOrder($phNum , $where);		//调用用户操作类的 userCheckOrder 方法来获取用户的订单信息
	// var_dump($rows);
	//先按照日期降序的方式排序
	$userOrder_mid = multi_array_sort($rows,"orderDate",SORT_DESC);
	//然后按照取菜时间升序方式排序
	$userOrder_mid = multi_array_sort($rows,"orderTime",SORT_ASC);

	// //然后按照订单状态升序方式排序
	// $userOrder_mid = multi_array_sort($rows,"orderFlag",SORT_DESC);


	$_SESSION['checkM'] = "";			//标记用户性别信息(男)
	$_SESSION['checkF']  = "";			//标记用户性别信息(女)
	$_SESSION['checkO']  = "";			//标记用户性别信息(保密)



	

	//如果性别是 “男” ，则给 checkM 赋值 checked
	if($_SESSION['sex'] == "男"){
		$_SESSION['checkM'] = "checked = 'checked'";
		// $_SESSION['checkF'] = "";
	}
	//如果性别是 “女” ，则给 checkF 赋值 checked
	else if($_SESSION['sex'] == "女"){
			$_SESSION['checkF'] = "checked = 'checked'";
			// $_SESSION['checkM'] = "";
		}
		else{
			$_SESSION['checkO'] = "checked = 'checked'";
		}

	//处理用户订单信息
	if($rows){
		
		foreach($rows as $order){

			switch($order['orderFlag']){

				case "待付款":
					$_SESSION['paying'] += 1;
					break;
				case "待取菜":
					$_SESSION['taking'] +=1;
					break;
				case "已完成":
					$_SESSION['done']   +=1;
					break;
				case "已取消":
					$_SESSION['cancled'] +=1;
					break;
				default :
					break;
			}

			$_SESSION['all'] +=1;
		}

	}

	//获取全部订单数量
	$totalRows=count($rows);
	$pageSize=3;
	$totalPage=ceil($totalRows/$pageSize);
	
	$page = $_GET['page'];
	
	$offset = "";

	if($page<1||$page==null||!is_numeric($page) ||$page ==0)
		$page=1;

	if($totalPage !=0 && $page>$totalPage)
		$page=$totalPage;

	$offset=($page-1)*$pageSize;
	
	
	//分页处理
	$count = ($offset+$pageSize) > $totalRows ? $totalRows : ($offset+$pageSize);
	
	$j = 0;
	for($i=$offset; $i<$count ;++$i){
		$userOrder[$j] = $userOrder_mid[$i];
		$j++;
	}

	$_SESSION['result'] = true;
	if($count ===0){
		$userOrder = null;
		$_SESSION['result'] = false;
	}

	$_SESSION['page'] = $page;
	$_SESSION['num'] = $totalPage;
	
	//处理订单号输出格式
	for($i=0; $i<count($userOrder); ++$i){

		//获取数据库中记录的订单编号
		$number = $userOrder[$i]['orderNumber'];

		//分离订单编号中的字母和数字
		$number = preg_split("/([a-zA-Z]+)/", $number, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
	
		//获取订单编号中日期的年月日，如150901
		$dNumber = substr($number[1],0,6);
		// isset($number)?$dNumber = substr($number[1],0,6);

		//获取订单编号中用户电话号码后三位数字
		$pNumber = substr($number[1], -3 ,3);
		
		$id = $userOrder[$i]['orderId'];

		$userOrder[$i]['orderNumber'] = $dNumber . $pNumber . $id;

	}
	
	$smarty->assign('userOrder',$userOrder);
	// var_dump($userOrder);exit;

	//使用 smarty 打开用户中心页面
 	$smarty->display('orderFlag.html');
?>
