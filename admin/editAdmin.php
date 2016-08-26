<?php 
require_once 'include.php';
$id=$_REQUEST['id'];
$sql="select adminId,adminName,adminPassword,adminEmail from admin where adminId='{$id}'";

$row=fetchOne($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>编辑管理员</h3>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员名称</td>
		<td><input type="text" name="adminName" value="<?php echo $row['adminName'];?>"/></td>
	</tr>
	<tr style="display:none">
		<td align="right">数据库密码</td>
		<td><input type="password" name="adminPasswordDB" value="<?php echo $row['adminPassword'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="adminPassword"  value="<?php echo $row['adminPassword'];?>"/></td>
	</tr>
	<tr>
		<td align="right">请确认密码</td>
		<td><input type="password" name="adminPasswordf"  value="<?php echo $row['adminPassword'];?>"/></td>
	</tr>
	
	<tr>
		<td align="right">管理员邮箱</td>
		<td><input type="text" name="adminEmail" value="<?php echo $row['adminEmail'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑管理员"/></td>
	</tr>

</table>
</form>
</body>
</html>