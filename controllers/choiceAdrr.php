<?php

	$cityname = $_GET['cityname'];
	$areaname = $_GET['areaname'];
	$metroname = $_GET['metroname'];

	echo $metroname;
	$_SESSION['choosedadrr'] = $cityname + $areaname + $metroname;  


?>