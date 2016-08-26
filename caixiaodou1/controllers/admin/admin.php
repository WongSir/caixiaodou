<?php
/**
 * Example Application
 *
 * @package Example-application
 */

require 'smarty/Smarty.class.php';

$smarty = new Smarty;

$smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
$smarty->left_delimiter="{";
$smarty->right_delimiter="}";
//$smarty->template_dir="index";
//$smarty->compile_dir=false;
//$smarty->compile_dir="template_c";
//$smarty->cache_dir="cache";


$smarty->display('caixiaodou.html');

?>
