<?php

	/********************************************************************************************************
		login.php文件是用户登录自己账号的页面，通过获取用户输入的账号手机号码，和数据库的账号和密码匹配。如果
	匹配成功，用户便可以登录自己的账号；如果匹配不成功，用户则再次回到登录界面填写账号和密码。

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/
	
	//检测是否有数据采取 post 的方式传到该后台文件
	if($_SERVER['REQUEST_METHOD'] == 'POST'){		
	
		//声明一个用户操作类对象,装载用户基本信息
		$user = new userOperation();		
		
		//声明 $_SESSION 变量
		$_SESSION['loginFlag'] = isset($_SESSION['loginFlag']) ? $_SESSION['loginFlag'] :false;
		$_SESSION['loginOp'] = isset($_SESSION['loginOp']) ? $_SESSION['loginOp'] :false;
		// echo $_SESSION['loginOp'];
		if(!$_SESSION['loginFlag']){
			
			//通过 php转义函数 PAP_GetSafeParam 函数接收页面传值，防止sql语句入注
			$user->userTel = PAPI_GetSafeParam("phNum", "", XH_PARAM_TXT); 
			$user->userPassword = PAPI_GetSafeParam("pass", "", XH_PARAM_TXT); 
			
			//判断该用户账号是否已经注册
			if( !( $user->isRegister($user->userTel) ) ){
				$_SESSION['boolLogin'] = "该账号不存在，请重新输入"	;
				$smarty->display('login.html');
				exit;
			}

			//将页面输入的密码采取 sha1 加密并且加上后台加密码
			$user->userPassword = sha1($user->userPassword) . SAFE;

			// var_dump($arr_Login);exit;
			//通过用户输入的手机号和密码，检测用户输入的账号和密码匹配正确
			$bool_isSuccess=$user->userCheckLogin($user->userTel , $user->userPassword);		
			
	
			//如果用户输入的密码和数据库储存的密码匹配成功
			if($bool_isSuccess){

				//获取该用户账号信息
				$row = $user->userSearch($user->userTel);

				//如果获取用户信息失败，则返回重新登录
				if(!$row){
					$smarty->display('login.html');
					exit;
				}
				//设置用户登录状态和记录基本信息
				$_SESSION['loginFlag']=true;
				$_SESSION['userName']=$row['userName'];
				$_SESSION['userTel']=$row['userTel'];
				$_SESSION['sex']=$row['sex'];
				$_SESSION['email']=$row['email'];
				
				//登录后直接进入会员中心页面
				if($_SESSION['loginOp'] == "M"){
			
					header('Location: index.php?route=member');
					$_SESSION['loginOp']="";
				}

				//登录后直接进入我的菜兜页面
				else if($_SESSION['loginOp'] == "O"){
					
					$_SESSION['loginOp']="";
					$smarty->display('pay.html');
					// header('Location: index.php?op=caidou');
				
				}
				//登录后直接进入首页
				else{
					header('Location: index.php');
				}
				
			}
			//用户账号和密码不匹配，用户重新登录
			else{

				$_SESSION['userTel']=$user->userTel;
				$_SESSION['boolLogin'] = "账号或密码错误"	;
				$smarty->display('login.html');
				$_SESSION['userTel']="";
				exit;
			}
			
		}
		
	}
	else{
		$smarty->display('login.html');		//跳转到用户填写登录账号和密码的页面
	
	}
?>