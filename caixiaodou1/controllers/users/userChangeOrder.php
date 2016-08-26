<?php
	
	$user=new userOperation(NULL);
	
	$_SSESION['orderNumber']="4332435";
	$_SSESION['orderFlag']="已取消";
	
	$orderNumber=$_SSESION['orderNumber'];
	$orderFlag=$_SSESION['orderFlag'];
	
	$user->userChangeOrder($orderNumber,$orderFlag);



