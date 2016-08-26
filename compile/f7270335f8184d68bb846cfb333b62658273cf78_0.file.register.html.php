<?php /* Smarty version 3.1.24, created on 2016-08-10 15:55:31
         compiled from "D:/AppServ/www/public_html/views/register.html" */ ?>
<?php
/*%%SmartyHeaderCode:1880657aaddf36f32b7_17937455%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7270335f8184d68bb846cfb333b62658273cf78' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/register.html',
      1 => 1470815729,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1880657aaddf36f32b7_17937455',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aaddf385ff42_80530994',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aaddf385ff42_80530994')) {
function content_57aaddf385ff42_80530994 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1880657aaddf36f32b7_17937455';
echo $_smarty_tpl->getSubTemplate ("header_nohead.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<link href="css/register.css" rel="stylesheet" type="text/css">

<?php echo '<script'; ?>
 src="js/register.js" type="text/javascript"><?php echo '</script'; ?>
>

<div class="register-headbg">

     <div class="register-head">
        <div class="login-block">
            <span>已有账号？ </span>
            <a href="index.php?route=login">登录</a>
        </div>

    </div>
</div>

<!-- register背景   -->
<div class="register-bg">
    <!--register开始-->
    <div class="register">
        <!-- register左边 -->
        <div class="register_left">

             <div class="register-logo">
                <a href="index.php?route=home">
                <h1 id="logo-img">
                  <li id="logo_name">菜小兜</li>
                  <li id="http">caixiaodou.com</li>
               </h1>
              </a>

            </div>

            <div class="register_left-img">
                 
                <a><img src="images/adverts/advert5.jpg"/></a>            
            </div>  
                    
        </div>
        <!-- register左边 -->
        
        <!-- register右边 -->    
        <div class="register_right"> 
            <form class="register_right_down" action="index.php?route=register" method="post" onsubmit = "return checkInput()" autocomplete="off"><!--注册表单-->
                <div class="register_seg" id="mseg"> <!--表单开始-->
                    <li>
                        <span class="star">*</span>
                        <span class="text">用户名称</span>
                        <input class="frame" type="text" name="name"  />
                        <p id="name"></p>
                    </li>
           
                     <li>
                        <span class="star">*</span>
                        <span class="text">手机号码</span>
                        <input class="frame" id="phNum" type="text" name="phNum" />
                        <p id="phnum"></p>
                    </li>

                    <li id="btn">
                        <input type="button" class="btn-normal" value="免费获取短信动态码">
                    </li>

                    <li>
                        <span class="star">*</span>
                        <span class="text">动态号码</span>
                        <input class="frame" type="text" name="phP" /> 
                        <p id="phpass"></p>     
                    </li>
            
                    <li>
                        <span class="star">*</span>
                        <span class="text">创建密码</span>
                        <input class="frame" type="password" name="pass" />
                        <p id="passwd"></p>
                    </li>
                           
                    <li >
                        <span class="star">*</span>
                        <span class="text">确认密码</span>
                        <input class="frame" type="password" name="passf" />
                        <p id="frpasswd"></p>
                    </li>

                    <li>
                        <input class="submit_btn" id="submit_btn" type="submit" value="同意以下协议注册" style="cursor:pointer"/>
                    </li> 

                    <li>
                        <span>&nbsp;&nbsp;<a class="vip">《菜小兜用户协议》</a></span>
                    </li>   
                </div>
                <!--表单结束-->  
            </form>
            <!--注册表单结束-->
         </div>
         <!-- register右边 --> 

     </div>
    <!--register结束-->  
</div>
<!-- register背景   -->


  
  <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>