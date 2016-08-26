<?php

	$userTel=$_SESSION['userTel'];


	$user=new userOperation();


	$userOrder=$user->userCheckOrder($userTel);

	
	$_SESSION['all']     = 0;
	$_SESSION['paying']  = 0;
	$_SESSION['taking']  = 0;
	$_SESSION['done']    = 0;
	$_SESSION['cancled'] = 0;

	$_SESSION['checkM'] = "";
	$_SESSION['checkF']  = "";

	if($_SESSION['sex'] == "男"){
		$_SESSION['checkM'] = "checked = 'checked'";
		$_SESSION['checkF'] = "";
	}
	else if($_SESSION['sex'] == "女"){
			$_SESSION['checkF'] = "checked = 'checked'";
			$_SESSION['checkM'] = "";
		}

	if($userOrder){
		
		foreach($userOrder as $order){

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

	//echo $_SESSION['cancled'];exit;

	//$userInfo=$user->userSearch($userTel);

	//$_SESSION['order']=$userOrder;
	//$_SESSION['user']=$userInfo;

	$smarty->assign('userOrder',$userOrder);
	// $smarty->assign('orderProduct',$orderProduct);
	


	//$smarty->assign('userInfo',$userInfo);
	
 	$smarty->display('member.html');
?>