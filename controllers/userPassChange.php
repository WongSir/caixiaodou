<?php
	/********************************************************************************************************
		userModify.php 接收用户填写修改的用户信息，然后根据用户账号，修改数据库里相应的资料信息

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	**********************************************************************************************************/
	//声明用户操作类对象
	$user=new userOperation();	

	//获取用户输入的旧密码
	$OldPass=isset($_GET['OldPass'])?$_GET['OldPass']:"";
	//获取用户修改输入的新密码
	$NewPass=isset($_GET['NewPass'])?$_GET['NewPass']:"";
	//获取用户修改输入的性别
	$Passf=isset($_GET['Passf'])?$_GET['Passf']:"";

	//通过 php转义函数 PAP_GetSafeParam 函数接收页面传值，防止sql语句入注
	$OldPass = PAPI_GetSafeParam($OldPass, "", XH_PARAM_TXT); 
	$NewPass = PAPI_GetSafeParam($NewPass, "", XH_PARAM_TXT);
	$Passf = PAPI_GetSafeParam($Passf, "", XH_PARAM_TXT);
	
	//加密转换密码
	$OldPass = sha1($OldPass) . SAFE;
	$phNum = $_SESSION['userTel'];

	//判断用户输入旧密码是否正确
	if( !$user->userCheckLogin($phNum , $OldPass) ){
		echo "旧密码错误";
		exit;
	}

	//对用户输入的新密码进行加密
	$NewPass = sha1($NewPass) . SAFE;
	//调用用户类的成员函数 userChangePassword 来修改用户密码
	$bool_isSuccess = $user->userChangePassword($phNum , $NewPass);

	//返回修改成功信息
	if($bool_isSuccess){
		echo "密码修改成功";
		exit;
	}

?>