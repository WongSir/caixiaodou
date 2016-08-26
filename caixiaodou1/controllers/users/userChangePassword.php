<?php
	
	require_once('model/userOperation.php');
	$user=new userOperation(NULL);
	
	$oldPassword='1';
	
	$user->userTel="1";
	$user->userPassword="11";

	$userDb=$user->userLogin($user->userTel);
	
	 ;
	if(sha1($oldPassword)==$userDb[0]['userPassword'])
	{
		$bool_isSuccess=$user->userChangePassword($user->userTel,sha1($user->userPassword));
		if($bool_isSuccess)
			echo "Yes!";
		else
			echo "No!";
	}
	else
	{
		echo "not correct";
	}
	
?>



