window.onload = function () {
	var AllInput = document.getElementsByTagName('input');
	var Name = AllInput[0];
	var PhoneNo = AllInput[1];
	var EmailAdr = AllInput[2];
	var Passwd = AllInput[3];
	var FrPasswd = AllInput[4];
	var CheckNo = AllInput[6];
	var check_Box = AllInput[7];
	var submit = AllInput[8];
	var Name_msg = document.getElementById('name');
	var PhoneNo_msg = document.getElementById('phnum');
	var EmailAdr_msg = document.getElementById('emailadd');
	var Passwd_msg = document.getElementById('passwd');
	var FrPasswd_msg = document.getElementById('frpasswd');
	var Name_length = 0;

	function getlength (str) {
		return str.replace(/[^\x00-xff]/g,"xx").length;
	}
		
//用户名
	//1、数字，字母（部分大小写）、汉字，下划线
	//2、4--12个字符
	//a-zA-Z0-9 \w
	//unicode \u4e00-\u9fa5 汉字
	var reName = /[^\w\u4e00-\u9fa5]/g;
	Name.onfocus = function () {
		Name_msg.style.display = "inline";
		Name_msg.innerHTML = '请输入1~6个字(一个汉字为两个字符)';
		Name_msg.style.color = "#666";

	}

	Name.onblur = function () {
		Name_length = getlength (this.value);
		// alert(this.value.length);
		//含非法字符
		if (reName.test(this.value)) {
			Name_msg.innerHTML = '含有非法字符，请重新输入';
			Name_msg.style.color = "red";

		}
		//不能为空
		else if (!this.value) {
			Name_msg.innerHTML = '昵称不能为空哦';
			Name_msg.style.color = "red";
		}
		//长度超过12个字符
		else if (Name_length > 12) {
			Name_msg.innerHTML = '昵称不能超过12个字符哦';
			Name_msg.style.color = "red";
		}
		//长度短于1个字符
		else if (Name_length < 1) {
			Name_msg.innerHTML = '昵称不能为空哦';
			Name_msg.style.color = "red";
		}
		//OK
		else{
			Name_msg.innerHTML = '昵称可用了';
			Name_msg.style.color = "#3C0";
		}
	}

//手机号码
	var rePoneNo = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/g;
	PhoneNo.onfocus = function () {
		PhoneNo_msg.style.display = "inline";
		PhoneNo_msg.innerHTML = '请输入您的手机号码';
		PhoneNo_msg.style.color = "#666";
	}	
	PhoneNo.onblur = function () {
		// alert(this.value.length);
		//不能为空
		if (this.value.length == 0) {
			PhoneNo_msg.innerHTML = '手机号码不能为空的';
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
		//OK
		else{
			PhoneNo_msg.innerHTML = '输入成功！';
			PhoneNo_msg.style.color = "#3C0";
		}
	}
//邮箱
	var reEmailAdr = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
	EmailAdr.onfocus = function () {
		EmailAdr_msg.style.display = "inline";
		EmailAdr_msg.innerHTML = '请输入您的电子邮箱';
		EmailAdr_msg.style.color = "#666";
	}	
	EmailAdr.onblur = function () {
		// alert(this.value.length);
		//不能为空
		if (this.value.length == 0) {
			EmailAdr_msg.innerHTML = '';
		}
		//要完整
		else if (!reEmailAdr.test(this.value)) {
			// alert(reEmailAdr.test('dfhadrf@gsdg'));
			EmailAdr_msg.innerHTML = '请输入正确的邮箱地址';
			EmailAdr_msg.style.color = "red";
		}
		//OK
		else{
			EmailAdr_msg.innerHTML = '邮箱输入成功';
			EmailAdr_msg.style.color = "#3C0";
		}
	}
//密码
	Passwd.onfocus = function () {
		Passwd_msg.style.display = "inline";
		Passwd_msg.innerHTML = '请输入密码(6个字符以上)';
		Passwd_msg.style.color = "#666";
	}	
	Passwd.onblur = function () {
		// alert(this.value.length);
		//不能为空
		if (this.value.length == 0) {
			Passwd_msg.innerHTML = '密码不能为空哦';
			Passwd_msg.style.color = "red";
		}
		//不能多于20个字符
		/*else if (this.value.length > 20) {
			Passwd_msg.innerHTML = '密码不能多于20个字符';
			this.value = '';
			Passwd_msg.style.color = "red";
		}*/
		//不能少于6个字符
		else if (this.value.length < 6) {
			Passwd_msg.innerHTML = '密码不能少于6个字符';
			this.value = '';
			Passwd_msg.style.color = "red";
		}
		//OK
		else{
			Passwd_msg.innerHTML = '密码输入成功';
			Passwd_msg.style.color = "#3C0";
		}
	}
//确认密码
	FrPasswd.onfocus = function () {
		FrPasswd_msg.style.display = "inline";
		FrPasswd_msg.innerHTML = '请再次输入密码';
		FrPasswd_msg.style.color = "#666";
	}	
	FrPasswd.onblur = function () {
		// alert(this.value.length);
		//两次密码不一样
		if (!this.value) {
			FrPasswd_msg.innerHTML = '密码不能为空';
			this.value = '';
			FrPasswd_msg.style.color = "red";
		}
		else if (this.value != Passwd.value ) {
			FrPasswd_msg.innerHTML = '两次密码不一样';
			this.value = '';
			FrPasswd_msg.style.color = "red";
		}
		//OK
		else{
			FrPasswd_msg.innerHTML = '两次密码一致';
			FrPasswd_msg.style.color = "#3C0";
		}
	}
//是否已阅读协议
	check_Box.onclick = function () {
		if (!check_Box.checked) {
			alert('请确认已阅读会员政策');
		}
	}
	check_Box.checked = true;
	
}

//验证表单是否已填写    
function checkInput(){
	var AllInput = document.getElementsByTagName('input');
	var Name = AllInput[0];
	var PhoneNo = AllInput[1];
	var EmailAdr = AllInput[2];
	var Passwd = AllInput[3];
	var FrPasswd = AllInput[4];
	var CheckNo = AllInput[6];
	var check_Box = AllInput[7];
	var submit = AllInput[8];
	
	if (Name.value==null||Name.value==''||
		PhoneNo.value==null||PhoneNo.value==''||
		Passwd.value==null||Passwd.value==''||
		FrPasswd.value==null||FrPasswd.value==''||
		CheckNo.value==null||CheckNo.value==''||
		check_Box.value==null||check_Box.value==''
		){
		// alert('东哥你傻逼吗？请填写个人信息');
		return false;
	}
}
		