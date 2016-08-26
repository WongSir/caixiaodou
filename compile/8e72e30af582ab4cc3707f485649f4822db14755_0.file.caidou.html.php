<?php /* Smarty version 3.1.24, created on 2016-08-10 15:38:55
         compiled from "D:/AppServ/www/public_html/views/caidou.html" */ ?>
<?php
/*%%SmartyHeaderCode:1825257aada0fa96645_65097763%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e72e30af582ab4cc3707f485649f4822db14755' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/caidou.html',
      1 => 1442485656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1825257aada0fa96645_65097763',
  'variables' => 
  array (
    'myCart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aada0fbb2730_11674976',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aada0fbb2730_11674976')) {
function content_57aada0fbb2730_11674976 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1825257aada0fa96645_65097763';
echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<link href="css/caidou.css" rel="stylesheet" type="text/css">

<?php echo '<script'; ?>
 type="text/javascript" src="js/caidou.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/jquery-2.0.2.min.js" type="text/javascript"><?php echo '</script'; ?>
>

<!-- step-bg -->
<div class="step-bg">

    <!-- step开始 -->
    <div class="buy-process-container">

        <!-- step内容 -->
        <ol class="step-container">
            <!-- <span>d</span> -->
            <li class="step current" style="25%" id="step1">查看菜篮</li>

            <li class="step" style="25%" id="step2">提交订单</li>

            <li class="step" style="25%" id="step3">选择支付方式</li>

            <li class="step" style="25%" id="step4">购买成功</li>

        </ol> 
        <!-- step内容 -->
    </div>
    <!-- step结束 -->
   
</div>
<!-- step-bg -->


<div class="basket-body">

    <?php if ($_smarty_tpl->tpl_vars['myCart']->value) {?>

    <!-- 菜兜表格开始 -->
    <div class="basket">

        <!-- 菜兜表格 table开始 -->
        <table id="basketTable">

            <!-- 表头 -->
            <thead>
                <tr>
                    <th><label><input class="check-all check" type="checkbox" />&nbsp;全选</label></th>
                    <th>菜品</th>
                    <th>单价</th>
                    <th>数量</th>
                    <th>小计</th>
                    <th>操作</th>
                </tr>
            </thead>
            <!-- 表头结束 -->

            <!-- 表体 -->
            <tbody>

                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['cart'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['name'] = 'cart';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['myCart']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cart']['total']);
?>
                <tr>
                    <td class="check-box"><input class="check-one check"type="checkbox" />
                    </td>

                    <td class="goods"><a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['productId'];?>
" target="_blank"><img title="" src="<?php echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['imgRoot'];
echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['imgName'];?>
" alt="goods" /></a><span></span>
                    </td>

                    <td class="price"><?php echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['productPrice'];?>

                    </td>

                    <td class="count"><span class="reduce">-</span>
                    <input class="count-input"    type="text" value="<?php echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['productNum'];?>
" />
                       <span class="add">+</span>
                    </td>

                    <td class="sub-total"><?php echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['priceTotal'];?>

                    </td>

                    <!-- 隐藏productId，传值到js文件 -->
                    <td class="operation"><span class="delete">删除</span><input class="count-input"    type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['myCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['cart']['index']]['productId'];?>
" />
                    </td>
                </tr>
                <?php endfor; endif; ?>              
            </tbody>
            <!-- 表体结束 -->

        </table>
        <!-- 菜兜表格 table结束 -->
    </div>
    <!-- 菜兜表格结束 -->
        

    <!-- 脚部信息 -->
    <div class="foot" id="foot">

        <label class="fl selectAll">
            <input type="checkbox" class="check-all check" />&nbsp;全选
        </label>

        <a href="javascript:;" class="fl delete" id="deleteAll">删除</a>

        <div class="fr costing">
            <a href="index.php?route=pay">结&nbsp;算</a>
        </div>

        <div class="fr total">合计：￥<span id="priceTotal">0.00</span>

        </div>

        <div class="fr selected" id="selected">已选商品
            <span id="selectTotal">0</span>件
            <!-- <span class="arrow up">︽</span>
            <span class="arrow down">︾</span> -->
        </div>

        <div class="selected-view">
            <div id="selectedViewList" class="clearfix">
                <!-- <div><img src="images/1.jpg"><span>取消选择</span></div> -->
            </div>
            <!-- <span class="arrow"><span></span></span> -->
        </div>
    </div>
    <!-- 脚部信息 -->

    <?php } else { ?>
    <!-- 菜篮空空 -->
    <div class="empty">
        <div class="food-no">
            <h2 id="note">您的菜篮还是空的，赶紧选菜吧！</h2>
            <ul>
                <li class="action">
                    <span>开始</span>
                    <a href="index.php?route-home" target="_blank">点菜</a>
                </li>

                <li class="action">
                    <span>查看</span>
                    <a href="index.php?route=member" target="_blank">订单</a>
                </li>
            </ul>
            
        </div>
        
    </div>
    <!-- 菜篮空空 -->

    <?php }?>

</div>
<!-- 菜篮 body -->

    
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>