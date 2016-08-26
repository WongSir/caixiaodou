<?php /* Smarty version 3.1.24, created on 2016-08-10 16:34:32
         compiled from "D:/AppServ/www/public_html/views/pay.html" */ ?>
<?php
/*%%SmartyHeaderCode:451057aae71898d655_87478503%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c6840cc2f33317d7354aa6977ba41a3ce60d36c' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/pay.html',
      1 => 1442011858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '451057aae71898d655_87478503',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aae718d2b1d0_04162300',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aae718d2b1d0_04162300')) {
function content_57aae718d2b1d0_04162300 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '451057aae71898d655_87478503';
echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo '<script'; ?>
 type="text/javascript" src="js/pay.js"><?php echo '</script'; ?>
>

<link href="css/pay.css" rel="stylesheet" type="text/css" />

<select style="display:none" name="place" id="Adderss" size="1">

</select>

<!-- step-bg -->
<div class="step-bg">

    <!-- step开始 -->
    <div class="buy-process-container">

        <!-- step内容 -->
        <ol class="step-container">
            <!-- <span>d</span> -->
            <li class="step " style="25%" id="step1">查看菜篮</li>

            <li class="step current" style="25%" id="step2">提交订单</li>

            <li class="step" style="25%" id="step3">选择支付方式</li>

            <li class="step" style="25%" id="step4">购买成功</li>

        </ol> 
        <!-- step内容 -->
    </div>
    <!-- step结束 -->
   
</div>
<!-- step-bg -->
      
<div id="container"><!-- 主体开始 -->
    <!-- <div id="step"> --><!-- 交易步骤指示图区 -->
        <!-- <img src="images/pay-step2.png" alt="交易步骤2" /> -->
   <!--  </div> --><!-- 交易步骤指示图区 -->
    <div id="messeges"><!-- 交易信息区 -->
        <h2 id="mhead">填写核对信息</h2>
        <hr />
        <div id="conf"><!-- 确认地址 -->
            <div id="ahead">
                <h2>取菜信息</h2>                   
                <p><label>收货人：</label><span id="Name"></span></p>
                <p><label>电话：</label><span id="Phone"></span></p>
                <p><label>便利店：</label><span id="Addr"></span></p>
                <p><label>取菜时间：</label><span id="Time"></span></p>
                <label id="btn1"><input type="button" calss="fr" value="修改"/> </label>
            </div>
            <form id="pay" action="#" method="post">
                <h2>付款方式</h2>
                <table>
                    <tr>
                        <td><input type="radio" value="支付宝支付" name="payStyle" checked = "checked"/></td>
                        <td><img src="images/pay-style.png" alt="支付宝"/></td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="线下支付" name="payStyle" checked = "checked" /></td>
                        <td><label>线下支付</label></td>
                    </tr>
                </table>                    
            </form>
            <form action="index.php?route=userMakeOrder" method="post">
                <div id="skin">
                <h2>信息总览</h2>
                <!-- <p><label>支付方式：</label><span id="Pay" name="pay" >线下支付</span></p> -->
                <p><label>支付方式：</label><input style="border-style:none" id="Pay" name="pay" value="线下支付" readonly /></p>
                <p><label>收货人：</label><input style="border-style:none" id="confName" name="name" value="" readonly /></p>
                <p><label>手机号码：</label><input style="border-style:none" id="confPhone" name="phone" value="" readonly /></p>
                <!-- <p><label>便利店：</label><span id="confAddr" name="confAddr" >江夏地铁B出口美宜佳店面</span></p> -->
                <p><label>取菜便利店：</label><input style="border-style:none" id="confAddr" name="addr" value="" readonly /></p>
                <!-- <p><label>取菜时间：</label><span id="confTime" >17:30:00</span></p> -->
                <p><label>取菜时间：</label><input style="border-style:none" id="confTime" name="confTime" value="" readonly /></p>
                </div>
                <div id="money">
                    <p id="prsum" name="prsum"><label>菜品总金额：</label><span><?php echo $_SESSION['allPrice'];?>
</span></p>
                    <p id="resum" name="resum"><label>应付总金额：</label><span><?php echo $_SESSION['allPrice'];?>
</span></p>  
                    <label id="btn2"><input type="submit" value="提交订单"/></label>
                </div>
            </form>
            
        </div><!-- 确认地址 -->
    </div><!-- 交易信息区 -->
</div><!-- 主体结束 -->


<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>