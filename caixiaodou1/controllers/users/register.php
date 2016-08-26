<?php
	
	/*****************************************************************************
	register.php文件实现用户注册的任务，即是将用户信息记录到数据库保存下来
	实现功能：从前台页面获取用户输入的登录手机号、密码等信息，进而将那些信息插入
		数据库中保存下来，从而用户下次可以直接登录进入所欲自己的错界面

	程序 猿 ：黄建东	English Name：Wongsrir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	*******************************************************************************/
	
	//声明用户操作类的一个对象
	$user=new userOperation();
	
	//判断前台是否有传值到该页面
	if(isset($_POST['userTel'])){
		
		//使用 post 的方式获取前台传来的所有数据
		$arr=$_POST;
		$user->userTel=$arr['userTel'];
		$user->userName=$arr['userName'];
		$user->userPassword=sha1($arr['userPassword']);
		$user->email=$arr['email']?$arr['email']:'@caixiaodou.com';
		$user->regTime=date("Y-m-d H:i:s");
		$user->sex="保密";
		$bool_isSuccess=$user->userRegister($user);
		if($bool_isSuccess)
			$smarty->display('login.html');		//如果注册成功，则跳转到登录界面
	
		else{
			//如果该用户账号已经存在数据库中，则提醒用户直接登录
			echo "<script>alert('该用户已注册！请登录！');</script>";
			$smarty->display('login.html');
		}
	
	}else{
		$smarty->display('register.html');	//前台没有传来数据，则回到注册页面
	
	}



