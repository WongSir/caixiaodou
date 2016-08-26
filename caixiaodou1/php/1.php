<?php

	date_default_timezone_set('Asia/Shanghai');


	echo time();
	echo "<br/>";
	$time = time();

	echo date('Y-m-d 星期N h:i:s',$time),'<br/>';
	echo date('Y-m-d 星期N h:i:s'),'<br/>';

	echo date('Y-m-d 星期N h:i:s',0),'<br/>';

	echo gmdate('Y-m-d 星期N h:i:s',$time),'<br/>';

	echo mktime (  ),'<br/>';
	echo strtotime("now"),'<br/>';

	echo strtotime("now+1 day"),'<br/>';

	var_dump( checkdate(13, 22, 2015));

	echo "<br/>";

	$str=<<<HTML

	hello

	world	abc
			ok	

		dddddd

HTML;

echo $str;





?>