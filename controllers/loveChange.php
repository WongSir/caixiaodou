<?php

	$id = $_GET['id'];

	$love_admin = new Admin();

	$loveNum = $love_admin->loveChange($id);

	if($loveNum){
		echo $loveNum;
	}
	else{
		return null;
	}




?>