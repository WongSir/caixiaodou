<?php

	//声明用户信息类
	class User {
		
		public $userTel;			//用户手机号码(登录手机号)
		var $userPassword;			//用户登录密码
		var $userName;				//用户名称
		var $sex;					//用户性别
		var $email;					//用户邮箱
		var $regTime;				//用户注册时间

	function __construct(){
		
		//对用户的信息变量初始化为 NULL
		$this->userTel=NULL;
		$this->userPassword=NULL;
		$this->userName=NULL;
		$this->sex=NULL;
		$this->email=NULL;
		$this->regTime=NULL;
	}
}

?>