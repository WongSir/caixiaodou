<?php /* Smarty version 3.1.24, created on 2016-08-10 15:38:06
         compiled from "D:/AppServ/www/public_html/views/advert.html" */ ?>
<?php
/*%%SmartyHeaderCode:1711357aad9de0f01b8_65118565%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46a27c1e025ddf38b5cda3eb38283d86f3ee38f3' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/advert.html',
      1 => 1470814627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1711357aad9de0f01b8_65118565',
  'variables' => 
  array (
    'adverts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aad9de16d5d8_71302855',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aad9de16d5d8_71302855')) {
function content_57aad9de16d5d8_71302855 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1711357aad9de0f01b8_65118565';
?>
<!-- 轮播效果-->
<div class="con marquee" direction="left">
  <ul>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['advert'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['name'] = 'advert';
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['adverts']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['advert']['total']);
?>
    <li><img src="<?php echo $_smarty_tpl->tpl_vars['adverts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['advert']['index']]['imgRoot'];?>
" /></li>
    <?php endfor; endif; ?>
  </ul>
</div>
<!-- 轮播效果-->
<?php }
}
?>