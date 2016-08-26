window.onload = function () {
	//弹层
	function show () {
		//获取页面宽度和高度
		var sWidth = document.body.scrollWidth;
		var sHeight = document.body.scrollHeight;
		//获取可视区域高度,宽度使用屏幕宽度
		var cHeight = document.documentElement.clientHeight;
		//创建一个div
		var Mask = document.createElement("div");
			Mask.id = "mask";
			Mask.style.height = sHeight  + "px";
			Mask.style.width = sWidth + "px";
			//尾部追加div
			document.body.appendChild(Mask);

		var Addr = document.createElement("div");
			Addr.id = "address";
			// Addr.innerHTML = "<p id='seHead'>取菜地址<select name='subAddress' id='subAddress'><option value='【请点击修改选择您取菜的便利店】'>--便利店选择--</option><option value='便利店1'>便利店1</option><option value='便利店2'>便利店2</option><option value='便利店3'>便利店3</option><option value='便利店4'>便利店4</option></select></p><hr /><br /><p>取菜人&nbsp;&nbsp;&nbsp;<input class='Input' id='usName' type='text' value='请填写您的姓名' name='name'/></p><hr /><p>联系方式<input class='Input' id='usPhone' type='text' value='请填写您的手机号码' name='phoneNumbers'/></p><hr /><p>取菜时间<input class='Input' id='time' type='text' value='2015.8.20' name='time'/></p><hr /><input id='subMit' type='button' value='确定'/>";
			// document.body.appendChild(Addr);


			var d=new Date(); 
		var str = "";
		var YM = d.getFullYear().toString()  + "-" + (d.getMonth()+1).toString() + "-";
		var D = d.getDate().toString();
		var addD =  (d.getDate()+1).toString() ;

			str = str + "<select name='times_YM' id='time_YM'>";
			str = str + "<option value='"+YM+ "'>"+YM+ "</option>";
			str = str + "</select>";
			str = str + "<select name='times_D' id='time_D'>";
			str = str + "<option value='"+D+ "'>"+D+ "日</option>";
			str = str + "<option value='"+addD+ "'>"+addD+ "日</option>";
			str = str + "</select>";

			str = str + "<select name='times_h' id='time_h'>";
			for (var h = 4; h <=9; h++) {
				str = str + "<option value='"+0 + h + "'>"+0 + h + "时</option>";
			};
			for (h = 10; h <= 23; h++) {
			    str = str + "<option value='" + h +"'>" + h + "时</option>";
			}
			str = str + "</select>";

			str = str + "<select name='times_m' id='time_m'>";
			for (m = 0; m <= 9; m++) {
			    str = str + "<option value='"+0 + m + "'分>"+0 + m + "分</option>";
			}
			for (m = 10; m <= 59; m++) {
			    str = str + "<option value='" + m + "'分>" + m + "分</option>";
			}
			str = str + "</select>";
			// alert(str);
			Addr.innerHTML = "<p id='seHead'>取菜地址<select name='subAddress' id='subAddress'><option value='美宜佳'>--便利店选择--</option><option value='美宜佳'>美宜佳</option></select></p><hr /><br /><p>用户名字:<input class='Input' id='usName' type='text' value='' name='name'/></p><hr /><p>联系方式:<input class='Input' id='usPhone' type='text' value='' name='phoneNumbers'/></p><hr /><p>取菜时间:<input class='Input' id='time' type='border-style:none' value='2015.8.20' name='time' readonly /></p><hr /><p>修改时间：<span id='choise'></span><input id='changeTime' type='button' value='修改'/></p><hr/><input id='subMit' type='button' value='提交'/>";
			// Addr.innerHTML = "<p id='seHead'>取菜地址<select name='subAddress' id='subAddress'><option value='美宜佳'>--便利店选择--</option><option value='美宜佳'>美宜佳</option></select></p><hr /><br /><p>取菜人&nbsp;&nbsp;&nbsp;<input class='Input' id='usName' type='text' value='请填写您的姓名' name='name'/></p><hr /><p>联系方式<input class='Input' id='usPhone' type='text' value='请填写您的手机号码' name='phoneNumbers'/></p><hr /><p>取菜时间<input class='Input' id='time' type='border-style:none' value='2015.8.20' name='time' readonly /></p><hr /><p>修改时间:&nbsp;<span id='choise'></span><input id='changeTime' type='button' value='修改'/></p><hr /><input id='subMit' type='button' value='提交'/>";
			
			document.body.appendChild(Addr);
		var choise = document.getElementById('choise');
			choise.innerHTML = str;


		var yearMonth = document.getElementById('time_YM');
		var day = document.getElementById('time_D');
		var hour = document.getElementById('time_h');
		var min = document.getElementById('time_m');
		var timeCome = document.getElementById('time');
		var changeTime = document.getElementById('changeTime');
		// alert(changeTime.type);
		
		var strtime = '';
			strtime = strtime + yearMonth.value;
			strtime = strtime + time_D.value + '日';
			strtime = strtime + hour.value + '时';
			strtime = strtime + min.value + '分';

			timeCome.value = strtime;

			changeTime.onclick = function () {
				var strtime = '';
				strtime = strtime + yearMonth.value;
				strtime = strtime + time_D.value + '日';
				strtime = strtime + hour.value + '时';
				strtime = strtime + min.value + '分';
				timeCome.value = strtime;
			}



			// function aa (){
			// 	alert('dd');
			// }
			// Addr.setAttribute("onsubmit","alert('sd')");
		//获取弹窗宽高		
		var AdrHeight = Addr.offsetHeight;
		var AdrWidth = Addr.offsetWidth;
			Addr.style.left = sWidth/2 - AdrWidth/2 + "px";
			Addr.style.top = cHeight/2 - AdrHeight/2 + "px";
		//处理地址
		var AddrBTN = document.getElementById('subMit');

		var usName = document.getElementById('usName');
		var usPhone = document.getElementById('usPhone');
		var time = document.getElementById('time');
		var Name = document.getElementById('Name');
		var confName = document.getElementById('confName');
		var Phone = document.getElementById('Phone');
		var confPhone = document.getElementById('confPhone');
		var Addr = document.getElementById('Addr');
		
		var confAddr = document.getElementById('confAddr');
		var Time = document.getElementById('Time');
		var confTime = document.getElementById('confTime');
		//获取两个下拉框值
		var Adderss = document.getElementById('Adderss').value;
		
		//不知原因 又要获取一次节点Addr
		var addr = document.getElementById('address');
		//修改地址关闭弹层
		AddrBTN.onclick = function () {
			var subAddress = document.getElementById('subAddress').value;
			var strtime = '';
				strtime = strtime + yearMonth.value;
				strtime = strtime + time_D.value + ' ';
				strtime = strtime + hour.value + ':';
				strtime = strtime + min.value + ':';
				strtime = strtime + '00';
				timeCome.value = strtime;

			document.body.removeChild(addr);
			document.body.removeChild(Mask);
			Name.innerHTML = usName.value;
			
			Phone.innerHTML = usPhone.value;
			Time.innerHTML = strtime;
			Addr.innerHTML = Adderss + subAddress;
			confTime.innerHTML = strtime;
			confName.value = Name.innerHTML;
			confPhone.value = Phone.innerHTML;
			confAddr.value = Addr.innerHTML;
			confTime.value = strtime;



		}
		usName.focus();
	}

	show();


		var inputs = document.getElementsByTagName('input');
		var payStyle = document.getElementById('Pay');
		inputs[1].onclick = function () {payStyle.value = "支付宝支付";}
		inputs[2].onclick = function () {payStyle.value = "线下支付";}

		//输入框js
		var inputN = document.getElementById('usName');
		var inputP = document.getElementById('usPhone');
		var subtn = document.getElementById('subMit');
		
			inputN.onfocus = function () {
				if(this.value == ""){
					this.value = "";
				}
			}
			inputP.onfocus = function () {
				if(this.value == ""){
					this.value = "";
				}
			}
			inputN.onblur = function () {
				if(this.value == ""||this.value == null){
					this.value = "";
				}
			}
			inputP.onblur = function () {
				if(this.value == ""||this.value == null){
					this.value = "";
				}
			}


		var button = document.getElementById('btn1');
		button.onclick = function () {
			show();
			var usName = document.getElementById('usName');
			var usPhone = document.getElementById('usPhone');
			var time = document.getElementById('time');

			var Name = document.getElementById('Name');
			var Phone = document.getElementById('Phone');
			var Time = document.getElementById('Time');

			usName.value = Name.innerHTML;
			usPhone.value = Phone.innerHTML;
			time.value = Time.innerHTML;

			return false;
		}


}      
