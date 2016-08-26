<?php
	/********************************************************************************************************
		userModify.php 接收用户填写修改的用户信息，然后根据用户账号，修改数据库里相应的资料信息

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/
	
	header("content-type:text/html;charset=utf-8;");

	//声明用户操作类对象
	$user=new userOperation();	

	//获取用户的账号
	$phNum=isset($_GET['phNum'])?$_GET['phNum']:"";
	//获取用户修改输入的名称
	$name=isset($_GET['name'])?$_GET['name']:"";
	//获取用户修改输入的性别
	$sex=isset($_GET['sex'])?$_GET['sex']:"";
	//获取用户修噶输入的邮箱
	$email=isset($_GET['email'])?$_GET['email']:"";
	echo $name;
	//通过 php转义函数 PAP_GetSafeParam 函数接收页面传值，防止sql语句入注
	$user->userName = PAPI_GetSafeParam($name, "", XH_PARAM_TXT); 
	$user->sex = PAPI_GetSafeParam($sex, "", XH_PARAM_TXT); 
	$user->email = PAPI_GetSafeParam($email, "", XH_PARAM_TXT);

	//调用用户类的成员函数 userModify 来修改用户信息，并返回执行结果
	$bool_isSuccess = $user->userModify($phNum , $user);

	//如果用户信息修改成功
	if($bool_isSuccess){
		//更新用户的用户名、性别和emial等信息
		$_SESSION['userName'] = $user->userName;
		$_SESSION['sex'] = $user->sex;
		$_SESSION['email'] = $user->email;
		// $_SESSION['email'] = $user->userName;
	}
?>