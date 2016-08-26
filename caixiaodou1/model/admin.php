<?php
	
	require_once('DB.php');
	
	class Admin{
		
		var $managerName;
		var $managerPassword;


		function _construct(){
			
			$this->managerName=NULL;
			$this->managerPassword=NULL;
		}
		
		function ManagerName(){
			
			return $this->managerName;	
		}
		function addManager(){
			
		}	
		
		function updateManager(){
			
		}
		
		function getManager(){
			
		}
		
		function deleteManager(){
			
		}
		
		function addUser(){
			
		}
		
		function getUser(){
			
		}
		
		function getOrder(){
			
		}
		
		function cancleOrder(){
			
		}
		
		function deleteOrder(){
			
		}
		
		function addProduct(){
			
		}
		
		function getAllProduct(){
			
			$admin=new DB();
			$result=$admin->getAllProduct();
			if($result)
				return $result;
			else
				return false;
		}
		
		function modifyProduct(){
			
		}
		
		function changeProduct(){
			
		}
		
		function deleteProduct(){
			
		}
		
	}
?>