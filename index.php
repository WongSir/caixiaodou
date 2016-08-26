<?php
  
  /************************************************************************************************
      index.php 用来作为整个网站的跳转接口，实现网站各个页面之间的逻辑跳转和数据通信。考虑到网站性能
    优化和后期维护等各种问题，该文件只是实现游客和用户浏览交易的网页跳转。而管理员实现网页跳转的功能
    不在这里实现，而是在目录：/admin/下的index.php

  程序 猿 ：黄建东  English Name:Wongsir
  编写日期：30/07/2015

  修改人员：
  修改日期：

  *************************************************************************************************/
 
  //初始化整个网站
  include 'init.php';

  //生成网站背景图随机数组
  $_SESSION['bgNum'] = rand(1,10);

  //设置转换页面变量(默认转到首页)
  $route = isset($_GET['route']) ? $_GET['route'] : 'home';

  //记录用户是否登录的标志
  $isLogin = isset($_SESSION['loginFlag']) && $_SESSION['loginFlag'] == true;
  // var_dump($isLogin);

  //用switch语法来判断页面的转换
  switch ($route){

  	case 'home': 	 
  			
        include 'controllers/home.php';       //转到首页
      	break;

    case 'advert':   
       
        include 'controllers/advert.php';       //转到首页
        break;

    case 'productAdrr':   
       
        include 'controllers/productAdrr.php';       //转到首页
        break;

    case 'details':   
    
        include 'controllers/details.php';       //转到首页
        break;

    case 'addToCart':
       
        include 'controllers/addToCart.php';        //调用购物车类的操作
        break;

  	case 'register':
      	
        include 'controllers/register.php';         //用户注册操作
      	break;   
  		
  	case 'login':

      	include 'controllers/login.php';            //用户登录操作
      	break;

    case 'loginout':

        session_unset();                         //销毁用户登录手机信息

        include 'controllers/login.php';            //转到登录界面
        break;    

    case 'caidou':
        
        include 'controllers/caidou.php';           //转到购物车页面
        break;

    case 'member':

      	if (!$isLogin) {                                  //判断用户是否登录
            $_SESSION['loginOp'] = "M";        
        		header('Location: index.php?route=login');       //如果还没登录则转到登录界面
      	}
      	
        else
            include 'controllers/member.php';           //如果已经登录则进入会员中心界面
      	break;

    case 'help':
   
      	include 'controllers/help.php';            //转到帮助界面
      	break;
  		
  	case 'userModify':
      
      	include 'controllers/userModify.php';       //转到用户修改信息操作
      	break;

    case 'userPassChange':
      
        include 'controllers/userPassChange.php';       //转到用户修改密码操作
        break;
  		
  	case 'userSearch':
      
      	include 'controllers/userSearch.php';         //获取用户信息
      	break;

  	case 'userMakeOrder':

      	include 'controllers/userMakeOrder.php';     //用户下订单操作
      	break;
  	case 'orderFlag':   
   
        include 'controllers/orderFlag.php';       //转到首页
        break;

  	case 'orderDetail':   
       
        include 'controllers/orderDetail.php';       //转到首页
        break;

  	case 'orderCancle':
       
      	include 'controllers/userCancleOrder.php';   //用户修改订单操作
      	break;
  		
  	case 'getProduct':
     
      	include 'controllers/getProduct.php';        //获取商品信息
      	break;

    case 'pay':
        // if (!$isLogin) {                                  //判断用户是否登录
        //   $_SESSION['logidnOp'] = "O";        
          // header('Location: index.php?route=login');       //如果还没登录则转到登录界面
          // include 'controllers/userMakeOrder.php';
        // }
        if($_SESSION['myFood'] <1 ){
          header('Location: index.php'); 
        }
        include 'controllers/userMakeOrder.php';        //获取商品信息
        break;

   case 'getVerify':
   
      include 'controllers/getVerify.php';        //获取商品信息
      break;

    case 'loveChange':
   
      include 'controllers/loveChange.php';        //点赞累加
      break;

    //修改收货地地址 
    case 'ChoiceAddr':

      $_SESSION['choosedAddr'] = $_GET['AddrName'];
      $_SESSION['foodName'] = $_GET['foodName'];      
      break;

    case 'productAddr':

      include 'controllers/productAddr.php';      
      break;

    default:
      echo 'No action';
      exit;
}
