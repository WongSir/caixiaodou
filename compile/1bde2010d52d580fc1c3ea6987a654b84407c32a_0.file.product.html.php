<?php /* Smarty version 3.1.24, created on 2016-08-10 15:31:15
         compiled from "D:/AppServ/www/public_html/views/product.html" */ ?>
<?php
/*%%SmartyHeaderCode:3037957aad8431f2aa2_87904969%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bde2010d52d580fc1c3ea6987a654b84407c32a' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/product.html',
      1 => 1443247740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3037957aad8431f2aa2_87904969',
  'variables' => 
  array (
    'allProduct' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aad843485266_52667796',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aad843485266_52667796')) {
function content_57aad843485266_52667796 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3037957aad8431f2aa2_87904969';
if ($_SESSION['addr']) {?>
  <?php if ($_smarty_tpl->tpl_vars['allProduct']->value) {?>  
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['allProduct']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['product']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['product']['total']);
?> 

    <!--product开始-->  
    <div class="product"> 

      <!-- 商品 top -->
      <div class="pic-box J_PicBox">

        <div class="pic-box-inner">
          <!-- 商品图片 -->
          <div class="pic">

            <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRoot'];?>
" id="good" />
            </a> 

          </div>
          <!-- 商品图片 -->
        </div>
      </div>
      <!-- 商品 top  -->
      
      <!-- 商品价格 -->
      <div class="ctx-box">

        <div class="p-row row1"> 
          <strong class="p-price">
            <b>￥</b>
            <b><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productNewPrice'];?>
</b>
          </strong>
        </div>

        <div class="p-row row2">
          <span>买一送一</span>
        </div>

        <div class="p-row row3">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productName'];?>
</a>
        </div>

        <div class="p-row row4">
          <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><?php echo $_smarty_tpl->tpl_vars['allProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productCharacter'];?>
</a>
        </div>
      </div>
      

    </div>
    <!--product结束-->
    <?php endfor; endif; ?> 

  <?php } else { ?>
    <div class="empty">
      <div class="notice-filter-noresult">
        <div class="nf-n-wrap clearfix">
          <span class="nf-icon"></span>
          <div class="nf-content">
            <span class="result">抱歉，没有找到相关的商品</span>
            <p>建议您：</p>
            <p>1、选择其他菜式</p>
            <p>2、查看
              <a class="nf-all" href="#none" onclick="selectFoodName(100 , '全部菜品')">全部菜品</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  <?php }?>

<?php } else { ?>

<div class="empty">
      <div class="notice-filter-noresult">
        <div class="nf-n-wrap clearfix">
          <span class="nf-icon"></span>
          <div class="nf-content">
            <span class="result">抱歉，该地铁还未有营业</span>
            <p>建议您：</p>
            <p>1、选择离自己家较近的地铁</p>
          </div>
        </div>
      </div>
    </div>

<?php }
}
}
?>