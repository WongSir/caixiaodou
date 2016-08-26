<?php

	//require_once('model/userOperation.php');
	
	$user=new userOperation(NULL);
	
	/*echo $_SESSION['userTel'];exit;*/
	if($_SESSION['userTel'])
		var_dump( $user->userSearch($_SESSION['userTel']));
	else
		$smarty->display('login.html');
	
	//var_dump( $user->userSearch(1));
?>
