<?php
	/********************************************************************************************************
		member.php后台文件主要获取用户在数据库里储存的个人资料信息和订单信息，用户可以查询个人信息、修改个人信
	息和查询操作订单。

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/

	$phNum=$_SESSION['userTel'];		//使用 $_SESSON 超期全局变量来获取登录在线的用户账号手机号码


	$user=new userOperation();			//声明一个用户操作类的对象

	// unset($userOrder);
	$rows=$user->userCheckOrder($phNum);		//调用用户操作类的 userCheckOrder 方法来获取用户的订单信息
	
	// //先按照日期降序的方式排序
	// $userOrder_mid = multi_array_sort($rows,"orderDate",SORT_DESC);
	// //然后按照取菜时间升序方式排序
	// $userOrder_mid = multi_array_sort($rows,"orderTime",SORT_ASC);

	$_SESSION['all']     = 0;			//记录所有订单的数量
	$_SESSION['paying']  = 0;			//记录待付款订单的数量
	$_SESSION['taking']  = 0;			//记录待取菜订单的数量
	$_SESSION['done']    = 0;			//记录已完成订单的数量
	$_SESSION['cancled'] = 0;			//记录已取消订单的数量

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
	//统计不同类型订单数量
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


	
 	$smarty->display('member.html');
?>