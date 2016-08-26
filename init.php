<?php
	
	/*************************************************************************
	
	init.php用来初始化整个网站，主要是宏定义了根目录、包含进来其他的 .php 文件
		设置时区为亚洲·上海、加载 smarty 模块和打开 session

	程序 猿 ：黄建东  English Name:Wongsir
	编写日期：27/07/2015

	修改人员：
	修改日期：

	***************************************************************************/

	//定义根目录
	define('ROOT', dirname(__FILE__));
	
	//在开发时，声明一个 DEBUG 模式
	define('DEBUG',true);

	//定义后台密码加密字符
	define('SAFE' , '1c2x3d');

	//设置网页的编码为 utf-8
	header("content-type:text/html;charset=utf-8;");

	//将网站所有的 .php 文件包含到初始化文件中
	require('model/admin.php');
	require('model/order.php');
	require('model/product.php');
	require('model/user.php');

	require('model/userOperation.php');
	require('model/CartTool.php');

	require('config.php');


	//设置时区为 亚洲·上海
	date_default_timezone_set('Asia/Shanghai');

	//将 smarty 模板的类文件包含进来
	require 'smarty/Smarty.class.php';

	//声明全局变量 $smarty
	global $smarty;

	//声明 smarty 对象
	$smarty = new Smarty();

	//设置 smarty 模板调用 .hmtl 文件的路径为 根目录下的 views
  	$smarty->setTemplateDir(ROOT . '/views');

	//设置 smarty 模板的编译缓存文件目录
	$smarty->setCompileDir(ROOT . '/compile');
	
	// //开启缓存
	// $smarty->caching = true;

	// //设置一个缓存的生成周期
	// $smarty->cache_lifetime = 3600;

	// //设置 smarty 模板缓存目录。用于存储缓存文件
	// $smarty->cache_dir = './cache';

	session_start();


	//初始化声明 $_SESSION 变量

	//账号和登录密码是否匹配正确
	$_SESSION['boolLogin'] = "";
	//
	$_SESSION['boolRegister'] = "";

	//检测到处于开发模式
	if(defined('DEBUG')){
		error_reporting(E_ALL);
	}
	else{
		error_reporting(0);
		// error_reporting(E_ERROR  | E_PARSE | E_NOTICE);
		// 表示php错误，警告，语法错误，提醒都返错。
	}
	if(!isset($_SESSION['orderNum'])){
		$_SESSION['orderNum'] = 1 ;
	}

?>