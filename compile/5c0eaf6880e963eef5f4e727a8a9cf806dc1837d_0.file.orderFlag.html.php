<?php /* Smarty version 3.1.24, created on 2016-08-10 19:46:56
         compiled from "D:/AppServ/www/public_html/views/orderFlag.html" */ ?>
<?php
/*%%SmartyHeaderCode:1331657ab14302a3864_43094655%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c0eaf6880e963eef5f4e727a8a9cf806dc1837d' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/orderFlag.html',
      1 => 1470829606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1331657ab14302a3864_43094655',
  'variables' => 
  array (
    'userOrder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57ab14304f2d67_41148140',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57ab14304f2d67_41148140')) {
function content_57ab14304f2d67_41148140 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1331657ab14302a3864_43094655';
if ($_SESSION['result']) {?> 
<caption ><span id="orderFlag"><?php echo $_SESSION['orderFlag'];?>
：</span></caption>
<table>

        <thead>
              <tr>
                <th>订单号</th>
                <th>订单商品</th>
                <!-- <th>收货人</th> -->
                <th>合计</th>
                <th>取菜时间</th>
                <th>状态</th>
                <th>操作</th>
              </tr>            
        </thead>
          <tbody>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['order'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['order']);
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
      
            <tr>
                <td class="boxNo"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderNumber'];?>

                </td>

                <td class="goods">
                 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['product'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['product']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['name'] = 'product';
$_smarty_tpl->tpl_vars['smarty']->value['section']['product']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderProduct']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                    <div>
                    <a href="index.php?route=details&id=<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderProduct'][$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['productId'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderProduct'][$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRootS'];?>
"  alt="goods" class = "gsimg"/>
                    </a>
                    <span>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderProduct'][$_smarty_tpl->getVariable('smarty')->value['section']['product']['index']]['imgRootL'];?>
" alt="goods" class = "bigGsimg"/>
                    </span>
                    </div>

                    <?php endfor; endif; ?>
                </td>

                <!-- <td class="Name" ><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['userName'];?>
 </td> -->

                <td class="allPrice" ><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderAmount'];?>
￥</td>
                <td class="time" ><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderTime'];?>
</td>
                <td class="status" ><?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderFlag'];?>
 </td>

                <td class="operation">
                 <?php if ($_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderFlag'] == '待付款') {?>
                <span><a id="pay" href="javascript:pay(<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderId'];?>
)">付款</a></span> 
                </br>                  
                <?php }?>

                <span >
                <a class="do " id="detail"  href="javascript:showDetail(<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderId'];?>
)">详情</a>
                </span>
                
                <?php if ($_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderFlag'] == '待付款') {?>
                 <span>
                <a class="do" id="cancle" href="javascript:cancle(<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderId'];?>
)">取消</a>
                </span>
                <input id="cancled" value="<?php echo $_SESSION['cancled'];?>
" style="display:none" >
                 </input>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderFlag'] == '待取菜') {?>
                <span >
                <a class="do " id="detail"  href="javascript:showDetail1(<?php echo $_smarty_tpl->tpl_vars['userOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['order']['index']]['orderId'];?>
)">确认</a>
                </span>
                <?php }?>

                </td> 

            </tr>

            <tr >
            
                <img id="out" style="display:none;" src="images/icons/out.png">
                <tbody id="tb_detail" style="display:none;">
                   
                </tbody>
            </tr>

            <?php endfor; endif; ?>
           
            <tr>
                <td colspan="7">
                </br>
                <span class="fy">总共:<?php echo $_SESSION['num'];?>
页</span>
                <span class="fy">第:<?php echo $_SESSION['page'];?>
页</span>
                 <a href="javascript:fy_onclick('first')" class="fy" id="fy_first">首页
                 </a>
                 <a href="javascript:fy_onclick('pre')" class="fy" id="fy_pre">上一页
                 </a>
                <a href="javascript:fy_onclick('next',<?php echo $_SESSION['num'];?>
)" class="fy" id="fy_next">下一页
                 </a>
                <a href="javascript:fy_onclick('last',<?php echo $_SESSION['num'];?>
)" class="fy" id="fy_last">尾页
                 </a>
                
                </td>
            </tr>

        </tbody> 

    </table>    

        


    <?php } else { ?>
    <div id="order_n">
        <li><?php echo $_SESSION['orderFlag'];?>
：空空也</li>
        <li id="tishi"> <a href="index.php?route=home">返回首页</a></li>
        <!-- <img src="images/order.jpg" width="800" height="300"> -->
        <img  width="800" height="300">
    </div>
    
     <?php }?> <?php }
}
?>