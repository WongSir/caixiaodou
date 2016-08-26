<?php

//php字符转义函数，防止 sql 语法入注
define("XH_PARAM_INT",0);
define("XH_PARAM_TXT",1);

function PAPI_GetSafeParam($pi_strName, $pi_Def = "", $pi_iType = XH_PARAM_TXT)
{
  if ( isset($_GET[$pi_strName]) )
    $t_Val = trim($_GET[$pi_strName]);
  else if ( isset($_POST[$pi_strName]))
    $t_Val = trim($_POST[$pi_strName]);
  else
    $t_Val = trim($pi_strName);
 
  // INT
  if ( XH_PARAM_INT == $pi_iType)
  {
    if (is_numeric($t_Val))
      return $t_Val;
    else
      return $pi_Def;
  }
  
  // String
  $t_Val = str_replace("&", "&amp;",$t_Val);
  $t_Val = str_replace("<", "&lt;",$t_Val);
  $t_Val = str_replace(">", "&gt;",$t_Val);
  if ( get_magic_quotes_gpc() )
  {
    $t_Val = str_replace("\\\"", "&quot;",$t_Val);
    $t_Val = str_replace("\\''", "&#039;",$t_Val);
  }
  else
  {
    $t_Val = str_replace("\"", "&quot;",$t_Val);
    $t_Val = str_replace("'", "&#039;",$t_Val);
  }
  return $t_Val;
} 

//通过GD库做验证码
function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name = "verify"){
  //创建画布
  $width = 80;
  $height = 28;
  $image = imagecreatetruecolor ( $width, $height );
  $white = imagecolorallocate ( $image, 255, 255, 255 );
  $black = imagecolorallocate ( $image, 0, 0, 0 );
  //用填充矩形填充画布
  imagefilledrectangle ( $image, 1, 1, $width - 2, $height - 2, $white );
  $chars = buildRandomString ( $type, $length );
  $_SESSION [$sess_name] = $chars;
  //$fontfiles = array ("MSYH.TTF", "MSYHBD.TTF", "SIMLI.TTF", "SIMSUN.TTC", "SIMYOU.TTF", "STZHONGS.TTF" );
  $fontfiles = array ("STXINWEI.TTF" );
  //由于字体文件比较大，就只保留一个字体，如果有需要的同学可以自己添加字体，字体在你的电脑中的fonts文件夹里有，直接运行输入fonts就能看到相应字体
  for($i = 0; $i < $length; $i ++) {
    $size = mt_rand ( 14, 18 );
    $angle = mt_rand ( - 15, 15 );
    $x = 5 + $i * $size;
    $y = mt_rand ( 20, 26 );
    $fontfile = "fonts/" . $fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
    $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
    $text = substr ( $chars, $i, 1 );
    imagettftext ( $image, $size, $angle, $x, $y, $color, $fontfile, $text );
  }
  if ($pixel) {
    for($i = 0; $i < 50; $i ++) {
      imagesetpixel ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $black );
    }
  }
  if ($line) {
    for($i = 1; $i < $line; $i ++) {
      $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
      imageline ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
    }
  }
  header ( "content-type:image/gif" );
  imagegif ( $image );
  imagedestroy ( $image );
}

/**
 * 生成验证码
 * @param int $type
 * @param int $length
 * @return string
 */
function buildRandomString($type=1,$length=4){
  if ($type == 1) {
    $chars = join ( "", range ( 0, 9 ) );
  } elseif ($type == 2) {
    $chars = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ) ) );
  } elseif ($type == 3) {
    $chars = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ), range ( 0, 9 ) ) );
  }
  if ($length > strlen ( $chars )) {
    exit ( "字符串长度不够" );
  }
  $chars = str_shuffle ( $chars );
  return substr ( $chars, 0, $length );
}

//数组排序函数
function multi_array_sort($multi_array,$sort_key,$sort){ 
  if(is_array($multi_array)){ 
    foreach ($multi_array as $row_array){ 
      if(is_array($row_array)){ 
      $key_array[] = $row_array[$sort_key]; 
      }
      else{ 
        return false; 
      } 
    } 
  }
  else{ 
    return false; 
  } 
array_multisort($key_array,$sort,$multi_array); 
return $multi_array; 
} 

// //分页处理函数
function showPage($page=1,$totalPage=5,$where=null,$sep="&nbsp;"){
  $p=null;
  $where=($where==null)?null:"&".$where;
  $url = $_SERVER ['PHP_SELF'];
  $index = ($page == 1) ? "首页" : "<a href='{$url}?op=member&page=1{$where}'>首页</a>";
  $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
  $prevPage=($page>=1)?$page-1:1;
  $nextPage=($page>=$totalPage)?$totalPage:$page+1;
  $prev = ($page == 1) ? "上一页" : "<a href='{$url}?op=member&page={$prevPage}{$where}'>上一页</a>";
  $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?op=member&page={$nextPage}{$where}'>下一页</a>";
  $str = "总共{$totalPage}页/当前是第{$page}页";
  for($i = 1; $i <= $totalPage; $i ++) {
    //当前页无连接
    if ($page == $i) {
      $p .= "[{$i}]";
    } else {
      $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
    }
  }
  $pageStr=$str.$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
  return $pageStr;
}