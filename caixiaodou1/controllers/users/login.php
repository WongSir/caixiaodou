<?php

	/*****************************************************************************
	

	程序 猿 ：黄建东	English Name：Wongsrir
	编写日期：30/07/2015
	
	修改人员：
	修改日期：

	*******************************************************************************/

	$user=new userOperation(NULL);
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		$arr=$_POST;
		$user->userTel=mysql_escape_string($arr['userTel']); //转义一个字符串用于mysql_query,防sql注入
		
		$user->userPassword=sha1($arr['userPassword']);
		
		$row=$user->userLogin($user->userTel);
		/*echo $user->userTel;
		exit;*/
		//var_dump($row);exit;
	
		if($row){
			if($row[0]['userPassword']==$user->userPassword){
				$_SESSION['loginFlag']=true;
				$_SESSION['userName']=$row[0]['userName'];
				$_SESSION['userTel']=$row[0]['userTel'];
				$_SESSION['sex']=$row[0]['sex'];
				$_SESSION['email']=$row[0]['email'];

				//$smarty->assign('user',$row);
				/*$smarty->display('caixiaodou.html');*/
				if($_SESSION['loginOp'] === "M"){
					//header('Location: index.php');
					header('Location: index.php?op=member');
					$_SESSION['loginOp']="";
				}

				else if($_SESSION['loginOp'] === "U"){
					//header('Location: index.php');
					header('Location: index.php?op=caidou');
					$_SESSION['loginOp']="";
				}
				else
					header('Location: index.php');
			}
			else{
				$_SESSION['userTel']=$user->userTel;
				echo "<script>alert('密码不正确！请重新登录！');</script>";	
				$smarty->display('login.html');
				$_SESSION['userTel']="";
			}
		}
		else{
			echo "<script>alert('该账号不存在！请注册！');</script>";	
			$smarty->display('register.html');	
		}
	
	}else{
		$smarty->display('login.html');
	
	}
?>