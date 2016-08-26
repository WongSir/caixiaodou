window.onload = function () {

	var AllInput = document.getElementsByTagName('input');
	var Name = AllInput[0];
	var PhoneNo = AllInput[1];
	var PhoneBtn = AllInput[2];
	var PhoneP = AllInput[3];
	var Passwd = AllInput[4];
	var FrPasswd = AllInput[5];
	// var check_Box = AllInput[5];
	// var CheckNo = AllInput[6];
	// var submit = AllInput[8];
	var Name_msg = document.getElementById('name');
	var PhoneNo_msg = document.getElementById('phnum');
	// var EmailAdr_msg = document.getElementById('emailadd');
	var PhoneP_msg = document.getElementById('phpass');
	var Passwd_msg = document.getElementById('passwd');
	var FrPasswd_msg = document.getElementById('frpasswd');
	// var Yzm_msg = document.getElementById('yzm');
	var Name_length = 0;

	function getlength (str) {
		return str.replace(/[^\x00-xff]/g,"xx").length;
	}
		
//用户名
	//1、数字，字母（部分大小写）、汉字，下划线
	//2、4--12个字符
	//a-zA-Z0-9 \w
	//unicode \u4e00-\u9fa5 汉字
	var reName = /[\w\u4e00-\u9fa5]/g;
	// var reName = /[a-zA-Z\u4e00-\u9fa5][^.$]*$/g;
	Name.onfocus = function () {
		Name_msg.style.display = "inline";
		Name_msg.innerHTML = '<img src=images/icons/input.png>&nbsp;2-16个字符，一个汉字为两个字符';
		Name_msg.style.color = "#666";

	}

	Name.onblur = function () {
		Name_length = getlength (this.value);
		//不能为空
		if (!this.value) {
			// Name.focus();
			Name_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请填写用户名';
			Name_msg.style.color = "#E25850";
		}
		
		//长度超过12个字符
		else if (Name_length > 16) {
			// Name.focus();
			Name_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;用户名太长，最多16个字符';
			Name_msg.style.color = "#E25850";
			this.value = '';
			return true;
		}
		//长度短于1个字符
		else if (Name_length < 2) {			
			// Name.focus();
			Name_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;用户名太短，至少2个字符';
			Name_msg.style.color = "#E25850";
			this.value = '';
		}
		//含非法字符
		else if (!reName.test(this.value)) {
			// Name.focus();
			Name_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;用户名只能用汉字、英文和数字';
			Name_msg.style.color = "#E25850";
			this.value = '';
		}
		//OK
		else{
			Name_msg.innerHTML = '<img src=images/icons/ok.png>';
		}
	}

//手机号码
	// var rePoneNo = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/g;
	var rePoneNo = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	
	// }	
	PhoneNo.onblur = function () {
		// alert(this.value.length);
		PhoneNo_msg.style.display = "inline";
		//不能为空
		if (this.value.length == 0) {
			// PhoneNo.focus();
			PhoneNo_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请填写手机号码';
			PhoneNo_msg.style.color = "#E25850";
		}
		//要以1开头
		else if (!rePoneNo.test(this.value)) {
			// PhoneNo.focus();
			PhoneNo_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请填写正确的手机号码';
			PhoneNo_msg.style.color = "#E25850";
			this .value = '';
		}
		//OK
		else{
			PhoneNo_msg.innerHTML = '<img src=images/icons/ok.png>';
		}
	}

	//获取验证码
	PhoneBtn.onclick =function() {
		var str ="";
		for(var i=0;i<6;i++){
			str += parseInt(10*Math.random());
		}
		PhoneP_msg.style.display = "inline";
		PhoneP_msg.innerHTML = '<img src=images/icons/ok.png>&nbsp;';
		PhoneP.value = str;

	}

	//验证码
	// PhoneP.onfocus = function () {
	// 	PhoneP_msg.style.display = "inline";
	// 	PhoneP_msg.innerHTML = '请填写手机验证码';
	// 	PhoneP_msg.style.color = "#666";
	// }	
	PhoneP.onblur = function () {
		// alert(this.value.length);
		PhoneP_msg.style.display = "inline";
		//不能为空
		if (this.value.length == 0) {
			// Passwd.focus();
			PhoneP_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请填写短信动态号码';
			PhoneP_msg.style.color = "#E25850";
		}
		//OK
		else{
			PhoneP_msg.innerHTML = '<img src=images/icons/ok.png>&nbsp;';
		}
	}

//密码
	Passwd.onfocus = function () {
		Passwd_msg.style.display = "inline";
		Passwd_msg.innerHTML = '<img src=images/icons/input.png>&nbsp;请创建密码(6个字符以上)';
		Passwd_msg.style.color = "#666";
	}	
	Passwd.onblur = function () {
		// alert(this.value.length);
		//不能为空
		if (this.value.length == 0) {
			// Passwd.focus();
			Passwd_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请创建密码';
			Passwd_msg.style.color = "#E25850";
		}
		
		//不能少于6个字符
		else if (this.value.length < 6) {
			// Passwd.focus();
			Passwd_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;密码太短，至少6个字符';
			Passwd_msg.style.color = "#E25850";
			this.value = '';
		}
		//OK
		else{
			Passwd_msg.innerHTML = '<img src=images/icons/ok.png>&nbsp;';
		}
	}
//确认密码
	// FrPasswd.onfocus = function () {
	// 	FrPasswd_msg.style.display = "inline";
	// 	// FrPasswd_msg.innerHTML = '请填写确认密码';
	// 	// FrPasswd_msg.style.color = "#666";
	// }	
	FrPasswd.onblur = function () {
		// alert(this.value.length);
		FrPasswd_msg.style.display = "inline";
		//两次密码不一样
		if (!this.value) {
			// FrPasswd.focus();
			FrPasswd_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请再次输入密码';
			this.value = '';
			FrPasswd_msg.style.color = "#E25850";
		}
		else if (this.value != Passwd.value ) {
			// Passwd.focus();
			FrPasswd_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;两次输入密码不一致，请重新输入';
			this.value = '';
			FrPasswd_msg.style.color = "#E25850";
			Passwd.value = '';
		}
		//OK
		else{
			FrPasswd_msg.innerHTML = '<img src=images/icons/ok.png>&nbsp;';
		}
	}

//填写验证码
	// Yzm_Box.onfocus = function(){
	// 	Yzm_msg.style.display = "inline";
	// 	Yzm_msg.innerHTML = '请输入图片验证码';
	// 	Yzm_msg.style.color = "#666";
	// }	
	// Yzm_Box.onblur = function () {
	// 	// alert(this.value.length);
	// 	//两次密码不一样
	// 	if (!this.value) {
	// 		Yzm_msg.innerHTML = '验证码不能为空';
	// 		this.value = '';
	// 		Yzm_msg.style.color = "red";
	// 	}
	// 	else if (this.value != Passwd.value ) {
	// 		FrPasswd_msg.innerHTML = '两次密码不一样';
	// 		this.value = '';
	// 		FrPasswd_msg.style.color = "red";
	// 	}
	// 	//OK
	// 	else{
	// 		FrPasswd_msg.innerHTML = '两次密码一致';
	// 		FrPasswd_msg.style.color = "#3C0";
	// 	}
	// }
//是否已阅读协议
	// check_Box.onclick = function () {
	// 	if (!check_Box.checked) {
	// 		alert('请确认已阅读会员政策');
	// 	}
	// }
	// check_Box.checked = true;

	Name.focus();
	
}

//验证表单是否已填写    
function checkInput(){
	var AllInput = document.getElementsByTagName('input');
	var Name = AllInput[0];
	var PhoneNo = AllInput[1];
	var PhoneBtn = AllInput[2];
	var PhoneP = AllInput[3];
	var Passwd = AllInput[4];
	var FrPasswd = AllInput[5];

	var Name_msg = document.getElementById('name');
	var PhoneNo_msg = document.getElementById('phnum');
	// var EmailAdr_msg = document.getElementById('emailadd');
	var PhoneP_msg = document.getElementById('phpass');
	var Passwd_msg = document.getElementById('passwd');
	var FrPasswd_msg = document.getElementById('frpasswd');

	var rePoneNo = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;

	if(PhoneNo.value==null||PhoneNo.value==''||rePoneNo.test(!PhoneNo.value) || PhoneNo.value.length != 11) {

		PhoneNo_msg.style.display = "inline";
		PhoneNo_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请填写正确的手机号码';
		PhoneNo_msg.style.color = "#E25850";
	}

	if(PhoneP.value ==null || PhoneP.value==''){
		PhoneP_msg.style.display = "inline";
		PhoneP_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请填写短信动态号码';
		PhoneP_msg.style.color = "#E25850";
	}

	if(Passwd.value==null||Passwd.value==''||Passwd.value.length <6){
		Passwd_msg.style.display = "inline";
		Passwd_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请创建密码';
		Passwd_msg.style.color = "#E25850";
	}

	if(FrPasswd.value==null || FrPasswd.value==''){
		FrPasswd_msg.style.display = "inline";
		FrPasswd_msg.innerHTML = '<img src=images/icons/waite.png>&nbsp;请再次输入密码';
		FrPasswd_msg.style.color = "#E25850";
	}


	// var rePoneNo = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/g;

	if(Name.value == null || Name.value == '' || Name.value.length >10){
		Name.focus();
		return false;
	}

	else if(PhoneNo.value==null||PhoneNo.value==''||
		rePoneNo.test(!PhoneNo.value) || 
		PhoneNo.value.length != 11         ){
		PhoneNo.focus();
		return false;
	}

	else if(PhoneP.value ==null || PhoneP.value==''){
		PhoneP.focus();
		return false;
	}

	else if(Passwd.value==null||Passwd.value==''||Passwd.value.length <6){
		Passwd.focus();
		return false;
	}

	else if(FrPasswd.value==null || FrPasswd.value==''){
		FrPasswd.focus();
		return false;
	}

	
	else if(FrPasswd.value !== Passwd.value){

		var FrPasswd_msg = document.getElementById('frpasswd');
		
		FrPasswd_msg.innerHTML = '两次密码不一样';
		FrPasswd.value = '';
		FrPasswd_msg.style.color = "#E25850";

		Passwd.value = "";
		Passwd.focus();
		return false;
	}
	return true;
}	