<?php

	require_once('DB.php');		//include the DB class
	//require_once('user.php'); 	//include the user class
	
	class UserOperation extends User {  //UserOperation class extends User class
		
		public $userTel;
		
		function __construct(){
			
			parent::__construct();
			//$this->userTel=$userTel;
		}
		
		function userRegister($Info){
			
			$user=new DB();			//create a object of the DB class
			
			$bool_isSuccess=$user->userAdd($Info);
			
			if($bool_isSuccess)	//call the userAdd member functon of the DB class
				return true;	//user register successfunlly
			else
				return false;	//user register unsuccessfully
		}
		
		function userLogin($userTel){
			
			$user_db=new DB();	//create a object of the DB class
			
			$bool_isSuccess=$user_db->userSearch($userTel);		//call the userLogin member functon of the DB class
			
			//var_dump($bool_isSuccess);exit;
			return $bool_isSuccess;		
		}
		
		function userSearch($userTel){
			
			$user_db=new DB();	//create a object of the DB class
			
			$result=$user_db->userSearch($userTel);		//call the userSearch member functon of the DB class
			
			if($result)
				return $result;		//return the result of the user successfully
			else
				return false;	//the user isn't exits;
			
		}
		
		function userModify($userTel,$Info){
			
			$user_db=new DB();
			$bool_isSuccess=$user_db->userModify($userTel,$Info);
			
			if($bool_isSuccess)
				return true;
			else
				return true;
				
		}
		
		function userChangePassword($userTel,$userPassword)
		{
			$user_db=new DB();
			$bool_isSuccess=$user_db->userChangePassword($userTel,$userPassword);
			return $bool_isSuccess;
		}
		
		function userMakeOrder($Info){
			
			$user_db=new DB();
			$orderId=$user_db->userMakeOrder($Info);
			return $orderId;
		}
		
		function userCheckOrder($userTel){
			$user_db=new DB();
			$result=$user_db->getOrder($userTel);
			
			if($result)
				return $result;
			else;
				return false;
		}
		
		function userChangeOrder($orderNumber,$orderFlag)
		{
			
			$user_db=new DB();
			$result=$user_db->userChangeOrder($orderNumber,$orderFlag);
			if($result)
				echo "yesu";
			else
				echo "Nou";
			exit;	
		}
		function cancleOrder(){
			
		}
}

?>
