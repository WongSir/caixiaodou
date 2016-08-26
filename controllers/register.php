<?php
	
	/*****************************************************************************
	register.php文件实现用户注册的任务，即是将用户信息记录到数据库保存下来
	实现功能：从前台页面获取用户输入的登录手机号、密码等信息，进而将那些信息插入
		数据库中保存下来，从而用户下次可以直接登录进入所欲自己的错界面

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	*******************************************************************************/
	
	//判断前台是否有传值到该页面
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		//声明用户操作类的一个对象
		$user = new userOperation();
		
		//使用 post 的方式获取前台传来的所有数据
		$arr=$_POST;
		
		////通过 php转义函数 PAP_GetSafeParam 函数转义接收到的页面传值，防止sql语句入注
		foreach ($arr as $key => $value) {
			$arr_userInfo[$key] = PAPI_GetSafeParam("$value", "", XH_PARAM_TXT); 
		}

		//判断该用户账号是否已经注册 如若已经注册，则转到用户登录界面
		if($user->isRegister($arr_userInfo['phNum'])){
			echo "<script>alert('该手机用户已注册，请登录');</script>";
			$smarty->display('login.html');
			exit;
		}

		//判断两次输入密码是否一致 若否则返回注册页面
		if($arr_userInfo['pass'] != $arr_userInfo['passf']){

			echo "<script>alert('两次填写密码不一致');</script>";
			$smarty->display('register.html');
			exit;
		}
		//给用户类变量逐个赋值，即是转换成数据库变量名称
		$user->userTel = $arr_userInfo['phNum'];
		$user->userName = $arr_userInfo['name'];
		//$user->email=$arr_userInfo['email']?$arr_userInfo['email']:'OP@caixiaodou.com';
		$user->regTime=date("Y-m-d H:i:s");
		$user->sex="保密";

		//将页面输入的密码采取 sha1 加密并且加上后台加密码
		$user->userPassword = sha1($arr_userInfo['passf']) . SAFE;

		//调用用户 user 类的用户注册函数 userRegister($user) 来存储信息到数据库
		$bool_isSuccess=$user->userRegister($user);

		//如果注册成功，则转到用户登录页面
		if($bool_isSuccess)
			$smarty->display('login.html');		

		else{

		//如果注册失败，则转到注册页面重新注册
			echo "<script>alert('注册不成功，请重新注册');</script>";
			$smarty->display('register.html');
		}
	//前台没有传来数据，则回到注册页面
	}else{
		$smarty->display('register.html');	
	
	}



