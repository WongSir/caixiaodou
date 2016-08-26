<?php /* Smarty version 3.1.24, created on 2016-08-10 15:31:14
         compiled from "D:/AppServ/www/public_html/views/header.html" */ ?>
<?php
/*%%SmartyHeaderCode:2471957aad8428313b2_66742580%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c027db5bf9899adad981ac59cdd666fd6afd1412' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/header.html',
      1 => 1443240472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2471957aad8428313b2_66742580',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aad8428a8a08_99532752',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aad8428a8a08_99532752')) {
function content_57aad8428a8a08_99532752 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2471957aad8428313b2_66742580';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- <meta charset="utf-8"> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <meta charset="utf-8"> -->
  <title>菜小兜</title>

  <link href="css/header.css" rel="stylesheet" type="text/css" />

</head>

<body>

  <!-- 头部信息 -->
  <header id="header-h">

    <!-- 头部底色 -->
    <div class="header-bg">
      <!-- 头部body -->
      <div class="header-body">
        <!-- 头部信息 -->
        <div class="header"> 
          <ul class="basic-info">

               <?php if (isset($_SESSION['loginFlag']) && $_SESSION['loginFlag']) {?>
            <li class="user"> 
              <a id="login" href="index.php?route=member">
                <span id="nameB" ><?php echo $_SESSION['userName'];?>
</span>
              </a>
            </li>

             <?php } else { ?>
            <li class="user">
              <a id="login" href="index.php?route=login">嘿，请登录</a>
              <a id="register" href="index.php?route=register">免费注册</a> 
            </li>

            <?php }?>  

          </ul>
         
     
          <ul class="user-guid">
            <li>
              <a href="index.php?route=home">首页</a>
              <b class="head">|</b>
            </li>

            <li>
              <a href="index.php?route=member">我的订单</a>
              <b class="head">|</b>
            </li>

            <li>
              <a href="index.php?route=member">我的小兜</a>
              <b class="head">|</b>
            </li>

            <li>
              <a href="#">美食秘笈</a>
              <b class="head">|</b>
            </li>

            <a href="index.php?route=caidou">
              <li id="basket">
              <span class="<?php if (isset($_SESSION['style'])) {
echo $_SESSION['style'];
} else { ?>less<?php }?>" id="myFood">
                
                <?php if (isset($_SESSION['myFood'])) {
echo $_SESSION['myFood'];?>

                <?php } else { ?>0
                <?php }?>
                
              </span>
              </li>
            </a>                           
          </ul>
        </div> 
        <!-- 头部信息   -->
      </div>
      <!-- 头部body -->
      
    </div>
    <!-- 头部底色 -->
  </header>
  <!-- 头部信息 -->
  
  <!-- brand-body -->
  <div class="brand-body">
    <!-- logo等信息brand -->
    <div class="brand">

      <!-- logo -->
      <div class="logo">
        <a href="index.php?route=home">
        <h1 id="logo-img">
          <li id="logo_name">菜小兜</li>
          <li id="http">caixiaodou.com</li>
       </h1>
      </a>
      </div> 
      <!-- logo -->

      <!-- 搜索输入框 -->
      <div id="nav-search">
        <form class="serach-box-form" name="searchForm" method="get">
         
          <input tabindex="1" type="text" name="product" autocomplete="off" class="search-box_input" value placeholder="<?php if (isset($_SESSION['notice'])) {
echo $_SESSION['notice'];
}?>" />

          <input type="submit" class="search-box_btn" hidefocus="true" value="" data-mod="sr" />
          
        </form>
      </div>
      <!-- 搜索输入框 -->
    
  </div>
  <!-- logo等信息brand  -->    
</div>
<!-- brand-body -->


<?php }
}
?>