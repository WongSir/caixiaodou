<?php

	//声明一个管理员对象
	$admin=new Admin();
	
	//通过管理员类的getAllProduct()方法来获取所有商品所有信息
	$rows=$admin->getAllProduct();

	//使用 smarty 模板的assign方法给前台传值
	$smarty->assign('allProduct',$rows);

	//smarty 模板打开首页 caixiaodou.html
	$smarty->display('caixiaodou.html');

?>
