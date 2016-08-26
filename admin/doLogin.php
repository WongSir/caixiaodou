<?php 
require_once 'include.php';

$adminName=$_POST['adminName'];

$adminName=addslashes($adminName);
$adminPassword=sha1($_POST['adminPassword']) . SAFE;

$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if($verify == $verify1){
	$sql="select * from city_admin where adminName='{$adminName}' and adminPassword='{$adminPassword}'";
	$row=checkAdmin($sql);

	if($row){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['adminId'],time()+7*24*3600);
			setcookie("adminName",$row['adminName'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['adminName'];
		$_SESSION['adminId']=$row['adminId'];
		alertMes("登陆成功","index.php");
	}else{
		alertMes("登陆失败，重新登陆","index.php");
	}
}else{
	alertMes("验证码错误","login.php");
}