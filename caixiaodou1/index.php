<?php
  
  /****************************************************************************
  index.php 用来作为整个网站的跳转接口，实现网站各个页面之间的逻辑跳转和数据通信。
    考虑到网站性能优化和后期维护等各种问题，该文件只是实现游客和用户浏览交易的网页
    跳转。而管理员实现网页跳转的功能不在这里实现，而是在目录：/admin/下的index.php

  程序 猿 ：黄建东 English Name：Wongsrir
  编写日期：30/07/2015

  修改人员：
  修改日期：

  ****************************************************************************/
 
  //初始化整个网站
  include 'init.php';

  //设置转换页面变量(默认转到首页)
  $op = isset($_GET['op']) ? $_GET['op'] : 'caixiaodou';

  //记录用户是否登录的标志
  $isLogin = isset($_SESSION['loginFlag']) && $_SESSION['loginFlag'] == true;

  //用switch语法来判断页面的转换
  switch ($op){
  	case 'caixiaodou': 	 
  			
        include 'controllers/users/caixiaodou.php';       //转到首页
      	break;

    case 'details':
        include 'controllers/users/details.php';        //转到详情页

    case 'addToCart':
       
        include 'controllers/users/addToCart.php';        //调用购物车类的操作
        break;

  	case 'register':
      	
        include 'controllers/users/register.php';         //用户注册操作
      	break;   
  		
  	case 'login':
     	
      	include 'controllers/users/login.php';            //用户登录操作
      	break;

    case 'loginout':

        $_SESSION['loginFlag'] = false;                   //注销用户登状态
  	    $_SESSION['userTel']=NULL;                        //销毁用户登录手机信息

        include 'controllers/users/login.php';            //转到登录界面
        break;    

    case 'caidou':
        
        include 'controllers/users/caidou.php';           //转到购物车页面
        break;

    case 'member':

      	if (!$isLogin) {                                  //判断用户是否登录
            $_SESSION['loginOp'] = "M";        
        		header('Location: index.php?op=login');       //如果还没登录则转到登录界面
      	}
      	
        else
            include 'controllers/users/member.php';           //如果已经登录则进入会员中心界面
      	break;

    case 'help':
   
      	include 'controllers/users/help.php';            //转到帮助界面
      	break;
  		
  	case 'userModify':
      
      	include 'controllers/users/userModify.php';       //转到用户修改信息操作
      	break;


    case 'userChangePassword':
     
        include 'controllers/users/userChangePassword.php'; //用户修改密码操作
        break;
  		
  	case 'userSearch':
      
      	include 'controllers/users/userSearch.php';         //获取用户信息
      	break;

  	case 'userMakeOrder':

        if (!$isLogin) {                                  //判断用户是否登录
            $_SESSION['loginOp'] = "U";        
            header('Location: index.php?op=login');       //如果还没登录则转到登录界面
        }
        else
      	   include 'controllers/users/userMakeOrder.php';     //用户下订单操作
      	break;
  	case 'userCheckOrder':
     
      	include 'controllers/users/userCheckOrder.php';    //用户查询订单操作
      	break;
  		
  	case 'userChangeOrder':
     
      	include 'controllers/users/userChangeOrder.php';   //用户修改订单操作
      	break;
  		
  	case 'getProduct':
     
      	include 'controllers/admin/getProduct.php';        //获取商品信息
      	break;
    default:
      echo '无效操作';
      exit;
}
