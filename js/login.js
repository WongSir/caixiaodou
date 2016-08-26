window.onload = function () {

	
	var PhoneNo = document.getElementById('input_phNum');
	var Passwd = document.getElementById('input_pass');
	var submit = document.getElementById('autologin');
	var PhoneNo_msg = document.getElementById('phnum');
	var Passwd_msg = document.getElementById('passwd');

//手机号码
	var rePoneNo = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;
	
	PhoneNo.onblur = function () {
		PhoneNo_msg.style.fontSize = "11px";
		//不能为空
		if (this.value.length == 0) {
			PhoneNo_msg.innerHTML = '手机号码不能为空';
			PhoneNo_msg.style.color = "#E25850";
		}
		//要以1开头
		else if (!rePoneNo.test(this.value)) {
			PhoneNo_msg.innerHTML = '请输入正确的手机号码';
			PhoneNo_msg.style.color = "#E25850";
		}
		//要11位
		else if (this.value.length != 11) {
			PhoneNo_msg.innerHTML = '手机号码位数不正确';
			PhoneNo_msg.style.color = "#E25850";
		}
		else{
			PhoneNo_msg.style.display = "none";
		}
	}

	PhoneNo.focus();	
}
//验证表单是否已填写    
function checkInput(){
	var PhoneNo = document.getElementById('input_phNum');
	var Passwd = document.getElementById('input_pass');
	
	if (PhoneNo.value==null||PhoneNo.value==''||
		Passwd.value==null||Passwd.value==''
		){
		// alert('请填登录信息');
		return false;
	}
}