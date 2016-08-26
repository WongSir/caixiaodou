<?php /* Smarty version 3.1.24, created on 2016-08-10 22:36:44
         compiled from "D:/AppServ/www/public_html/views/orderDetail.html" */ ?>
<?php
/*%%SmartyHeaderCode:1589457ab3bfcea5d48_09353980%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6682f187fad7206b846014b3c2caf7a496bce79a' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/orderDetail.html',
      1 => 1441661262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1589457ab3bfcea5d48_09353980',
  'variables' => 
  array (
    'userOrder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57ab3bfd1d8a07_24735616',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57ab3bfd1d8a07_24735616')) {
function content_57ab3bfd1d8a07_24735616 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1589457ab3bfcea5d48_09353980';
if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['order'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['order']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['name'] = 'order';
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userOrder']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['order']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['order']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['order']['total']);
?>
 <tr id="head">
    <td colspan="2" class="head" align="left"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderFlag'];?>
订单</td>
   
</tr>
<tr>
    <td class="head"  align="left" >订单编号:</td>
    <td class="details" ><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderNumber'];?>
</td>
</tr>
<tr>
    <td class="head" align="left" >用户姓名:</td>
    <td class="details" ><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['userName'];?>
</td>
</tr>
<tr>
    <td class="head" align="left" >手机号码:</td>
    <td class="details"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['userPhone'];?>
</td>
</tr>
<tr>
    <td class="head" align="left" >订单状态</td>
    <td class="details"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderFlag'];?>
</td>
</tr>
<tr>
    <td class="head" align="left" >取菜时间</td>
    <td class="details"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderTime'];?>
</td>
</tr>
<tr>
    <td class="head" align="left" >订单金额</td>
    <td class="details"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderAmount'];?>
 ￥</td>
</tr>
    <td class="head" align="left" >取菜地址</td>
    <td class="details"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderAddress'];?>
</td>
</tr>

<?php endfor; endif; ?>
                     <?php }
}
?>