<?php
	
	/*************************************************************************
	
	init.php用来初始化整个网站，主要是宏定义了根目录、包含进来其他的 .php 文件
		设置时区为亚洲·上海、加载 smarty 模块和打开 session

	程序 猿 ：黄建东	English Name：Wongsrir
	编写日期：27/07/2015

	修改人员：
	修改日期：

	***************************************************************************/

	//定义根目录
	define('ROOT', dirname(__FILE__));

	//设置网页的编码为 utf-8
	header("content-type:text/html;charset=utf-8;");

	//将网站所有的 .php 文件包含到初始化文件中
	require_once('model/admin.php');
	require_once('model/order.php');
	require_once('model/product.php');
	require_once('model/user.php');

	require_once('model/userOperation.php');
	require_once('model/CartTool.php');

	//声明初始化网站的 SESSION 变量
	// $_SESSION['loginFlag']  = "";		//登录与否的标志
	// $_SESSION['loginOp']    = "";		//无
	// $_SESSION['userName']   = "";		//用户名称
	// $_SESSION['userTel']	= "";		//用户手机号码(即是用户登录手机号)
	// $_SESSION['sex']		= "";		//用户性别信息
	// $_SESSION['email']		= "";		//用户邮箱

	//设置时区为 亚洲·上海
	date_default_timezone_set('Asia/Shanghai');

	//将 smarty 模板的类文件包含进来
	require_once 'smarty/Smarty.class.php';

	//声明全局变量 $smarty
	global $smarty;

	//声明 smarty 对象
	$smarty = new Smarty();
	//设置 smarty 模板调用 .hmtl 文件的路径为 根目录下的 views
	$smarty->setTemplateDir(ROOT . '/views');
	//设置 smarty 模板的编译缓存文件目录
	$smarty->setCompileDir('/tmp');

	session_start();
?>