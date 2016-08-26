<?php 
require_once 'include.php';
checkLogined();
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];

switch($act){
	case 'logout':
		logout();
		break;

	case 'addAdmin':
		$mes = addAdmin();
		break;

	case 'editAdmin':
		$mes = editAdmin($id);
		break;

	case 'delAdmin':
		$mes = delAdmin($id);
		break;

	case 'addCate':
		$meta = addCate();
		break;

	case 'editCate':
		$where="id={$id}";
		$mes=editCate($where);
		break;

	case 'delCate':
		$mes = delCate($id);
		break;

	case 'addPro':
		$mes = addPro();
		break;

	case 'editPro':
		$mes = editPro($id);
		break;

	case 'delPro':
		$mes = delPro($id);
		break;

	case 'editOrder':
		$mes = editOrder($id);
		break;

	case 'doneOrder':
		$mes = doneOrder($id);
		break;

	case 'addUser':
		$mes = addUser();
		break;

	case 'editUser':
		$mes = editUser($id);
		break;

	case 'delUser':
		$mes = delUser($id);
		break;

	case 'waterText':
		$mes = doWaterText($id);
		break;

	case 'waterPic':
		$mes = doWaterPic($id);
		break;

	default :
		echo "No action";
		exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}
?>
</body>
</html>