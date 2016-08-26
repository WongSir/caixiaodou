<?php /* Smarty version 3.1.24, created on 2016-08-10 15:31:14
         compiled from "D:/AppServ/www/public_html/views/home.html" */ ?>
<?php
/*%%SmartyHeaderCode:100657aad8424d84b0_89072810%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fac89491995f757646cdcb7079d9e65dc38956c' => 
    array (
      0 => 'D:/AppServ/www/public_html/views/home.html',
      1 => 1470809743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100657aad8424d84b0_89072810',
  'variables' => 
  array (
    'adverts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_57aad8427d3363_05069250',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57aad8427d3363_05069250')) {
function content_57aad8427d3363_05069250 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '100657aad8424d84b0_89072810';
echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


  <link href="css/home.css" rel="stylesheet" type="text/css" />
  <?php echo '<script'; ?>
 src="js/home.js" type="text/javascript"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript" src="js/toTop.js"><?php echo '</script'; ?>
> 

  <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.9.1.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="js/marquee2.js"><?php echo '</script'; ?>
>

  
<!-- main主页面 -->
<div class="main">

  
  <div id="rotation-bg">
    <!-- 轮播效果-->
   <!--  <div class="con marquee" direction="left">
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
        <li>  <a href="index.php?route=home"><img src="<?php echo $_smarty_tpl->tpl_vars['adverts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['advert']['index']]['imgRoot'];?>
" /></a> </li>
        <?php endfor; endif; ?>
        你好
      </ul>
    </div> -->
    <?php echo $_smarty_tpl->getSubTemplate ("advert.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


  <!-- 轮播图 -->
  </div>
  
  <div class="fiter-bg">
    <div class="fiter-body">
      <!-- 选择地址和菜式 -->
      <div class="filter">
        <!-- 显示栏 -->
        <div class="f-line clearfix">

          <!-- 地址信息 -->
          <div class="f-store">
            <div class="fs-cell delivery-location">收货地</div>
            <!-- 详细地址选择 -->
            <div id="store-selector" class>
              <div id="all" class="text" onmousemove="Show('store-content')" onmouseout="Hide('store-content')" >             
                <span id="CompeleteAdrr"><?php if (isset($_SESSION['choosedAddr']) && ($_SESSION['choosedAddr'])) {
echo $_SESSION['choosedAddr'];
} else { ?>广州市白云区江夏地铁<?php }?></span>
                <b></b>
              </div>

              <!-- 下方全部选择展示 -->
              <div id="store-content" class="store-content" onmousemove="Show('store-content')" onmouseout="Hide('store-content')">

                <!-- 展示开始 -->
                <div id="stock" data-widget="tabs" class="m stock">

                  <div class="mt">

                    <!-- 头部 -->
                    <ul class="tab">
                      <!-- 选择城市 -->
                      <li onclick="selectStoreTab(0)" data-widget="tab-item" id="CityTab" class="curr">
                        <a href="javascript:;">
                        <span id="city">请选择</span>
                        <i></i>
                        </a>
                      </li>
                      <!-- 选择城市 -->

                      <!-- 选择城区 -->
                      <li onclick="selectStoreTab(1)" data-widget="tab-item" id="AreaTab" class=" curr hide">
                        <a href="javascript:;">
                          <span id="area">请选择</span>
                          <i></i>
                          </a>
                      </li>
                      <!-- 选择城区 -->

                      <!-- 选择地铁站 -->
                      <li onclick="selectStoreTab(2)" data-widget="tab-item" id="MetroTab" class="curr hide">
                        <a href="javascript:;">
                          <span id="metro">请选择</span>
                          <i></i>
                          </a>
                      </li>
                      <!-- 选择地铁站 -->
                    </ul>
                    <!-- 头部 -->

                    <!-- 横线 -->
                    <div class="stock-line"></div>
                    <!-- 横线 -->
                  </div>
          
                  <!-- 城市选择展开 -->
                  <div data-area="0" data-widget="tab-content" id="CityShow" class="mc">
                    <ul class="area-list">
                      <li>
                        <a data-value="1601" href="#none" onclick="selectCity(1601 , '广州市')">广州市</a>
                      </li> 
                    </ul>
                    <p class="ac hide">请选择一级地区...</p>
                  </div>
                  <!-- 城市选择展开 -->

                  <!-- 城区选择展开 -->
                  <div data-area="1" data-widget="tab-content" id="AreaShow" class="mc hide">
                    <ul class="area-list">
                      <li>
                        <a data-value="50258" href="#none" onclick="selectArea(50258 , '白云区')">白云区</a>
                      </li>

                      <li>
                        <a data-value="3633" href="#none" onclick="selectArea(3633 , '天河区')">天河区</a>
                      </li>

                      <li>
                        <a data-value="3634" href="#none" onclick="selectArea(3634 , '海珠区')">海珠区</a>
                      </li>

                      <li>
                        <a data-value="3635" href="#none" onclick="selectArea(3635 , '荔湾区')">荔湾区</a>
                      </li>

                      <li>
                        <a data-value="3636" href="#none" onclick="selectArea(3636 , '越秀区')">越秀区</a>
                      </li>

                      <li>
                        <a data-value="36953" href="#none" onclick="selectArea(36953 , '番禺区')">番禺区</a>
                      </li>

                      <!-- <li>
                        <a data-value="50256" href="#none" onclick="selectArea(50256 , '花都区')">花都区</a>
                      </li>

                       <li>
                        <a data-value="50257" href="#none" onclick="selectArea(50257 , '萝岗区')">萝岗区</a>
                      </li> -->

                      <li>
                        <a data-value="50259" href="#none" onclick="selectArea(50259 , '南沙区')">南沙区</a>
                      </li>

                     <!--  <li>
                        <a data-value="50283" href="#none" onclick="selectArea(50283 , '黄浦区')">黄浦区</a>
                      </li>

                      <li>
                        <a data-value="50284" href="#none" onclick="selectArea(50284 , '增城市')">增城市</a>
                      </li>

                      <li>
                        <a data-value="50285" href="#none" onclick="selectArea(50285 , '从化市')">从化市</a>
                      </li>

                      <li>
                        <a data-value="51091" href="#none" onclick="selectArea(51091 , '广州大学城')">广州大学城</a>
                      </li> -->
                    </ul>
                    <p class="ac hide">请选择二级地区</p>
                  </div>
                  <!-- 城区选择展开 -->
                  
                  <!-- 所有地铁选择展开 -->
                  <div data-area="2" data-widget="tab-content" id="MetroShow" class="mc">
                    <!-- 白云区 地铁选择展开 -->
                    <div data-area="2" data-widget="tab-content" id="MetroShow50258" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="502581" href="#none" onclick="onclickMetro(502581 , '江夏地铁')">江夏地铁</a>
                        </li>

                        <li>
                          <a data-value="502582" href="#none" onclick="onclickMetro(502582 , '嘉禾望岗地铁')">嘉禾望岗地铁</a>
                        </li>

                        <li>
                          <a data-value="502583" href="#none" onclick="onclickMetro(502583 , '黄边地铁')">黄边地铁</a>
                        </li>
                        
                        <li>
                          <a data-value="502584" href="#none" onclick="onclickMetro(502584 , '萧岗地铁')">萧岗地铁</a>
                        </li>

                        <li>
                          <a data-value="502585" href="#none" onclick="onclickMetro(502585 , '白云文化广场地铁')">白云文化广场地铁</a>
                        </li>

                        <li>
                          <a data-value="502586" href="#none" onclick="onclickMetro(502586 , '文化公园地铁')">文化公园地铁</a>
                        </li>

                        <li>
                          <a data-value="502587" href="#none" onclick="onclickMetro(502587 , '飞翔公园地铁')">飞翔公园地铁</a>
                        </li>

                        <li>
                          <a data-value="502588" href="#none" onclick="onclickMetro(502588 , '三元里地铁')">三元里地铁</a>
                        </li>

                        <li>
                          <a data-value="502589" href="#none" onclick="onclickMetro(502589, '人和地铁')">人和地铁</a>
                        </li>

                        <li>
                          <a data-value="5025810" href="#none" onclick="onclickMetro(5025810 , '龙归地铁')">龙归地铁</a>
                        </li>

                        <li>
                          <a data-value="5025811" href="#none" onclick="onclickMetro(5025811 , '白云大道北地铁')">白云大道北地铁</a>
                        </li>

                        <li>
                          <a data-value="5025812" href="#none" onclick="onclickMetro(5025812 , '永泰地铁')">永泰地铁</a>
                        </li>

                        <li>
                          <a data-value="5025813" href="#none" onclick="onclickMetro(5025813 , '同和地铁')">同和地铁</a>
                        </li>

                        <li>
                          <a data-value="5025814" href="#none" onclick="onclickMetro(5025814 , '京西南医院地铁')">京西南医院地铁</a>
                        </li>

                        <li>
                          <a data-value="5025815" href="#none" onclick="onclickMetro(5025815 , '梅花园地铁')">梅花园地铁</a>
                        </li>                   

                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 白云区 地铁选择展开 -->

                    <!-- 天河区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow3633" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="36331" href="#none" onclick="onclickMetro(36331 , '广州东站')">广州东站</a>
                        </li>

                        <li>
                          <a data-value="36332" href="#none" onclick="onclickMetro(36332 , '体育中心')">体育中心</a>
                        </li>

                        <li>
                          <a data-value="36333" href="#none" onclick="onclickMetro(36333 , '天河客运站')">天河客运站</a>
                        </li>

                        <li>
                          <a data-value="36334" href="#none" onclick="onclickMetro(36334 , '五山')">五山</a>
                        </li>

                        <li>
                          <a data-value="36335" href="#none" onclick="onclickMetro(36335 , '华师')">华师</a>
                        </li> 

                        <li>
                          <a data-value="36336" href="#none" onclick="onclickMetro(36336 , '岗顶')">岗顶</a>
                        </li> 

                        <li>
                          <a data-value="36337" href="#none" onclick="onclickMetro(36337 , '石牌桥')">石牌桥</a>
                        </li> 

                        <li>
                          <a data-value="36338" href="#none" onclick="onclickMetro(36338 , '体育西')">体育西</a>
                        </li> 

                        <li>
                          <a data-value="36339" href="#none" onclick="onclickMetro(36339 , '珠江新城')">珠江新城</a>
                        </li> 

                        <li>
                          <a data-value="363310" href="#none" onclick="onclickMetro(363310 , '梅花园')">梅花园</a>
                        </li> 

                        <li>
                          <a data-value="363311" href="#none" onclick="onclickMetro(363311 , '燕塘')">燕塘</a>
                        </li> 

                        <li>
                          <a data-value="363312" href="#none" onclick="onclickMetro(363312 , '车陂')">车陂</a>
                        </li> 

                        <li>
                          <a data-value="363313" href="#none" onclick="onclickMetro(363313 , '林和西')">林和西</a>
                        </li>

                        <li>
                          <a data-value="363314" href="#none" onclick="onclickMetro(363314 , '黄村')">黄村</a>
                        </li>

                        <li>
                          <a data-value="363315" href="#none" onclick="onclickMetro(363315 , '猎德')">猎德</a>
                        </li>

                        <li>
                          <a data-value="363316" href="#none" onclick="onclickMetro(363316 , '潭村')">潭村</a>
                        </li>

                        <li>
                          <a data-value="363317" href="#none" onclick="onclickMetro(363317 , '员村')">员村</a>
                        </li>

                        <li>
                          <a data-value="363318" href="#none" onclick="onclickMetro(363318 , '科韵路')">科韵路</a>
                        </li>

                        <li>
                          <a data-value="363319" href="#none" onclick="onclickMetro(363319 , '东圃')">东圃</a>
                        </li>

                        <li>
                          <a data-value="363320" href="#none" onclick="onclickMetro(363320 , '三溪')">三溪</a>
                        </li>      
                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 天河区 地铁选择展开 -->

                    <!-- 海珠区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow3634" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="36341" href="#none" onclick="onclickMetro(36341 , '市二宫')">市二宫</a>
                        </li>

                        <li>
                          <a data-value="36342" href="#none" onclick="onclickMetro(36342 , '江南西')">江南西</a>
                        </li>

                        <li>
                          <a data-value="36343" href="#none" onclick="onclickMetro(36343 , '昌岗')">昌岗</a>
                        </li>

                        <li>
                          <a data-value="36344" href="#none" onclick="onclickMetro(36344 , '江泰路')">江泰路</a>
                        </li> 

                        <li>
                          <a data-value="36345" href="#none" onclick="onclickMetro(36345 , '东晓南')">东晓南</a>
                        </li> 

                        <li>
                          <a data-value="36346" href="#none" onclick="onclickMetro(36346 , '南洲')">南洲</a>
                        </li> 

                        <li>
                          <a data-value="36347" href="#none" onclick="onclickMetro(36347 , '凤凰新村')">凤凰新村</a>
                        </li>         
                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 海珠区 地铁选择展开 -->

                    <!-- 荔湾区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow3635" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="36351" href="#none" onclick="onclickMetro(36351 , '西朗')">西朗</a>
                        </li>

                        <li>
                          <a data-value="36352" href="#none" onclick="onclickMetro(36352 , '芳村')">芳村</a>
                        </li>

                        <li>
                          <a data-value="36353" href="#none" onclick="onclickMetro(36353 , '坑口')">坑口</a>
                        </li>

                        <li>
                          <a data-value="36354" href="#none" onclick="onclickMetro(36354 , '文化园')">文化园</a>
                        </li>         
                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 荔湾区 地铁选择展开 -->

                    <!-- 越秀区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow3636" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="36361" href="#none" onclick="onclickMetro(36361 , '西门口')">西门口</a>
                        </li>

                        <li>
                          <a data-value="36362" href="#none" onclick="onclickMetro(36362 , '公元前')">公元前</a>
                        </li>

                        <li>
                          <a data-value="36363" href="#none" onclick="onclickMetro(36363 , '农讲所')">农讲所</a>
                        </li>

                        <li>
                          <a data-value="36364" href="#none" onclick="onclickMetro(36364 , '烈士林园')">烈士林园</a>
                        </li>         
                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 越秀区 地铁选择展开 -->

                    <!-- 番禺区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow36953" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="369531" href="#none" onclick="onclickMetro(369531 , '大学城北')">大学城北</a>
                        </li>

                        <li>
                          <a data-value="369532" href="#none" onclick="onclickMetro(369532 , '大学城南')">大学城南</a>
                        </li>

                        <li>
                          <a data-value="369533" href="#none" onclick="onclickMetro(369533 , '新造')">新造</a>
                        </li>

                        <li>
                          <a data-value="369534" href="#none" onclick="onclickMetro(369534 , '石碁')">石碁</a>
                        </li>         
                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 番禺区 地铁选择展开 -->

                    <!-- 花都区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow50256" class="mc hide">
                      <!-- <ul class="area-list">
                        <li>
                          <a data-value="369531" href="#none" onclick="onclickMetro(369531 , '广州东站')">广州东站</a>
                        </li>

                        <li>
                          <a data-value="369532" href="#none" onclick="onclickMetro(369532 , '体育中心')">体育中心</a>
                        </li>

                        <li>
                          <a data-value="369533" href="#none" onclick="onclickMetro(369533 , '江夏')">江夏</a>
                        </li>

                        <li>
                          <a data-value="369534" href="#none" onclick="onclickMetro(369534 , '黄边')">黄边</a>
                        </li>         
                      </ul> -->
                      <p class="ac">抱歉，花都区尚未开张店面...</p>
                    </div>
                    <!-- 花都区 地铁选择展开 -->

                    <!-- 萝岗区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow50257" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="502571" href="#none" onclick="onclickMetro(502571 , '广州东站')">广州东站</a>
                        </li>

                        <li>
                          <a data-value="502572" href="#none" onclick="onclickMetro(502572 , '体育中心')">体育中心</a>
                        </li>

                        <li>
                          <a data-value="502573" href="#none" onclick="onclickMetro(502573 , '江夏')">江夏</a>
                        </li>

                        <li>
                          <a data-value="502574" href="#none" onclick="onclickMetro(502574 , '黄边')">黄边</a>
                        </li>         
                      </ul>
                      <p class="ac">抱歉，萝岗区尚未开张店面......</p>
                    </div>
                    <!-- 萝岗区 地铁选择展开 -->

                    <!-- 南沙区 地铁选择展开 -->
                    <div data-area="3" data-widget="tab-content" id="MetroShow50259" class="mc hide">
                      <ul class="area-list">
                        <li>
                          <a data-value="502591" href="#none" onclick="onclickMetro(502591 , '黄阁汽车城')">黄阁汽车城</a>
                        </li>

                        <li>
                          <a data-value="502592502593" href="#none" onclick="onclickMetro(502592502593 , '黄阁')">黄阁</a>
                        </li>

                        <li>
                          <a data-value="502593" href="#none" onclick="onclickMetro(502593 , '蕉门')">蕉门</a>
                        </li>

                        <li>
                          <a data-value="502594" href="#none" onclick="onclickMetro(502594 , '金洲')">金洲</a>
                        </li>         
                      </ul>
                      <p class="ac hide">请选择您附近地铁...</p>
                    </div>
                    <!-- 南沙区 地铁选择展开 -->
                  </div>
                  <!-- 所有地铁选择展开 -->

                </div>
                <!-- 展示开始 -->
              </div>
              <!-- 下方全部选择展示 -->

            </div>
            <!-- 详细地址选择 -->
          </div>
          <!-- 地址信息 -->

          <!-- 家常菜式 -->
          <div class="f-food">

            <!-- 显示当前菜式 -->
            <div class="food-choose">家常菜式</div>
            <!-- 显示当前菜式 -->

            <!-- 详细菜式分类选择 -->
            <div class="food-selector" onmousemove="Show('food-content')" onmouseout="Hide('food-content')">
              <!-- 选定菜式显示 -->
              <div id="food-all" class="text" >
                <span id="food-choosed"><?php if (isset($_SESSION['foodName']) && ($_SESSION['foodName'])) {
echo $_SESSION['foodName'];
} else { ?>全部菜品<?php }?></span>
                <b></b>
              </div>
              <!-- 选定菜式显示 -->

              <!-- 菜式全部选择展示 -->
              <div id="food-content" class="food-content"  >
                  <!-- 菜式展示开始 -->
                  <div id="food-stock" data-widget="tabs" class="m food-stock">
                    <!-- 头部 -->
                    <div class="mt">
                      <ul class="tab">

                        <!-- 分类 -->
                        <li onclick="selectFoodTab(0)" data-widget="tab-item" id="foodKindTab" class="curr">
                        <a href="javascript:;">
                          <span id="foodKind">请选择分类</span>
                          <i></i>
                        </a>
                        </li>
                        <!-- 分类 -->

                        <!-- 菜式 -->
                        <li onclick="selectFoodTab(1)" data-widget="tab-item" id="foodNameTab" class="curr hide">
                        <a href="javascript:;">
                          <span id="foodName">请选择菜式</span>
                        </a>
                        <i></i>
                        </li>
                        <!-- 菜式 -->
                      </ul>
                    </div>
                    <!-- 头部 -->

                    <!-- 菜品分类选择展开 -->
                    <div data-food="0" data-widget="tab-content" id="foodKindShow" class="mc">
                      <ul class="food-list">
                        
                        <li>
                          <a href="#none" onclick="selectFoodKind(101,'常见菜式')">常见菜式

                          </a>
                        </li>

                        <li>
                          <a href="#none" onclick="selectFoodKind(202,'烹饪时间')">烹饪时间
                            
                          </a>

                        <li>
                          <a href="#none" onclick="selectFoodKind(303,'中式菜系')">中式菜系
                            
                          </a>
                        </li>

                        <li>
                          <a href="#none" onclick="selectFoodKind(404,'菜品口味')">菜品口味
                            
                          </a>
                        </li>

                        <li>
                          <a href="#none" onclick="selectFoodKind(505,'主要工艺 ')">主要工艺 
                            
                          </a>
                        </li>

                        <li>
                          <a href="#none" onclick="selectFoodKind(606,'制作难度')">制作难度
                            
                          </a>
                        </li>

                        <li>
                          <a href="#none" onclick="selectFoodKind(707,'健康食谱')">健康食谱
                            
                          </a>
                        </li>

                        <li>
                          <a href="#none" onclick="selectFoodKind(100,'全部分类')">全部分类

                          </a>
                        </li>

                        <!-- <li>
                          <a href="#none" onclick="selectFoodKind(808,'适宜人群')">适宜人群
                            
                          </a>

                        </li> -->
                      </ul>
                      <!-- 横线 -->
                      <div class="stock-line"></div>
                      <!-- 横线 -->
                    </div>
                    <!-- 菜品分类选择展开 -->

                    <!-- 所有菜式展开 -->
                    <div data-area="2" data-widget="tab-content" id="foodNameShow" class="mc">

                      <!-- 全部菜品选择 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow100" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(100 , '全部菜品')">全部菜品
                              </a>

                            </li>
                          </ul>  
                        </div>
                      <!-- 全部菜品选择 -->

                      <!-- 常见菜式选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow101" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(1011 , '家常菜')">家常菜
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(1012 , '素菜')">素菜
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(1013 , '荤菜')">荤菜
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(1014 , '汤羹')">汤羹
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 常见菜式选择展开 -->

                      <!-- 烹饪时间选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow202" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(2021 , '十分钟')">十分钟
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(2022 , '廿分钟')">廿分钟
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(2023 , '半小时')">半小时
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 烹饪时间选择展开 -->

                      <!-- 中式菜系选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow303" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(3031 , '粤菜')">粤菜
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(3012 , '浙菜')">浙菜
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(3013 , '东北菜')">东北菜
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 中式菜系选择展开 -->

                      <!-- 菜品口味选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow404" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(4041 , '微辣')">微辣
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(4042 , '中辣')">中辣
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(4043 , '超辣')">超辣
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(4044 , '酸甜')">酸甜
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(4045 , '清淡')">清淡
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(4046 , '其他口味')">其他口味
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 菜品口味选择展开 -->

                      <!-- 主要工艺选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow505" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(5051 , '烧')">烧
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(5052 , '炒')">炒
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(5053 , '火锅')">火锅
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 主要工艺选择展开 -->

                      <!-- 制作难度选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow606" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(6062 , '简单')">简单
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(6063 , '普通')">普通
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(6064 , '高级')">高级
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(6065 , '未知')">未知
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 制作难度选择展开 -->

                      <!-- 健康食谱选择展开 -->
                        <div data-food="1" data-widget="tab-content" id="foodNameShow707" class="mc hide">
                          <ul class="food-list">
                            <li>
                              <a href="#none" onclick="selectFoodName(7071 , '减肥瘦身')">减肥瘦身
                              </a>

                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(7072 , '清热去火')">清热去火
                              </a>
                              
                            </li>

                            <li>
                              <a href="#none" onclick="selectFoodName(7073 , '健脾养胃')">健脾养胃
                              </a>
                              
                            </li>
                          </ul>  
                        </div>
                      <!-- 健康食谱选择展开 -->
                    </div>
                    <!-- 所有菜式展开 -->
                  </div>
                <!-- 菜式展示开始 -->
              </div>
              <!-- 菜式全部选择展示 -->
            </div>
            <!-- 详细菜式分类选择 -->

          </div>
          <!-- 家常菜式 -->
        </div>
        <!-- 显示栏 -->
      </div>
      <!-- 选择地址和菜式 -->
    </div>

  </div>

</div>
<!-- main主页 -->
  
  <!-- 商品展示区 -->
  <div id="show-bg">
    <div id="showKind">
			hello
    </div>
  </div>
    
  <!-- 商品展示区 -->



<!-- 右下角导航 -->
<div class="right-nav" id="right-nav">
  <a href="javascript:;" id="top" >
    <span id="span-top">回到顶部</span>
  </a> 
</div>

<!-- 右下角导航 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>