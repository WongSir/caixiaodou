window.onload = function () {
	var AllInput = document.getElementsByTagName('input');
	var PhoneNo = AllInput[0];
	var Passwd = AllInput[1];
	var submit = AllInput[2];
	var PhoneNo_msg = document.getElementById('phnum');
	var Passwd_msg = document.getElementById('passwd');

//手机号码
	var rePoneNo = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;
	PhoneNo.onfocus = function () {
		PhoneNo_msg.style.display = "inline";
		PhoneNo_msg.innerHTML = '请输入手机号码';
		PhoneNo_msg.style.color = "#666";
	}	
	PhoneNo.onblur = function () {
		//不能为空
		if (this.value.length == 0) {
			PhoneNo_msg.innerHTML = '手机号码不能为空';
			PhoneNo_msg.style.color = "red";
		}
		//要以1开头
		else if (!rePoneNo.test(this.value)) {
			PhoneNo_msg.innerHTML = '请输入正确的手机号码';
			PhoneNo_msg.style.color = "red";
		}
		//要11位
		else if (this.value.length != 11) {
			PhoneNo_msg.innerHTML = '手机号码位数不正确';
			PhoneNo_msg.style.color = "red";
		}
		else{
			PhoneNo_msg.style.display = "none";
		}
	}
//密码
	Passwd.onfocus = function () {
		Passwd_msg.style.display = "inline";
		Passwd_msg.innerHTML = '请输入密码';
		Passwd_msg.style.color = "#666";
	}	
	Passwd.onblur = function () {
		// alert(this.value.length);
		//不能为空
		if (this.value.length == 0) {
			Passwd_msg.innerHTML = '密码不能为空';
			this.value = '';
			Passwd_msg.style.color = "red";
		}
		/*//不能多于20个字符
		else if (this.value.length > 20) {
			Passwd_msg.innerHTML = '密码不正确';
			this.value = '';
			Passwd_msg.style.color = "red";
		}*/
		//不能少于6个字符
		else if (this.value.length < 6) {
			Passwd_msg.innerHTML = '密码不正确';
			this.value = '';
			Passwd_msg.style.color = "red";
		}
		else{
			Passwd_msg.style.display = "none";
		}
	}	
}
//验证表单是否已填写    
function checkInput(){
	var AllInput = document.getElementsByTagName('input');
	var PhoneNo = AllInput[0];
	var Passwd = AllInput[1];

	
	if (PhoneNo.value==null||PhoneNo.value==''||
		Passwd.value==null||Passwd.value==''
		){
		// alert('请填登录信息');
		return false;
	}
}