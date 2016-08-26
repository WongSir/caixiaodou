window.onload = function () {

  orderShow('paying' ,1);

  if (!document.getElementsByClassName){
    document.getElementsByClassName = function (ClassName){
      var ret = [];
      var els = document.getElementsByTagName('*');
      for (var i = 0; i < els.length-1; i++){
          if (els[i].className === ClassName
              || els[i].className.indexOf(ClassName + ' ') >= 0
              || els[i].className.indexOf(' ' + ClassName + ' ') >= 0
              || els[i].className.indexOf(' ' + ClassName) >= 0){
              ret.push(els[i]);
          }
      }
      return ret;
    }
  }//封装getElemtByClassName函数

  var lis_order = document.getElementsByClassName('_body');
  var lis_user = document.getElementsByClassName('_user');
  var show_order = document.getElementsByClassName('menu_right_order');
  var show_user = document.getElementsByClassName('menu_right');


  var spans = document.getElementsByTagName('span');
  var EmailAdr = document.getElementById('chngInput_exp');
  var EmailAdr_msg = document.getElementById('emailAdr');
  var Name = document.getElementById('chngInput_name');
  NameV = Name.value;
  EmailAdrV = EmailAdr.value;
  var Name_msg = document.getElementById('nickName');

  var OldPass = document.getElementById("chngInput_OldPass");
  var OldPass_msg = document.getElementById('boolPassTrue');
  var NewPass = document.getElementById("chngInput_NewPass");
  var NewPass_msg = document.getElementById('NewPass');
  var Passf = document.getElementById("chngInput_Passf");
  var Passf_msg = document.getElementById('Passf');

  var page = 1;

  function getlength (str) {
    return str.replace(/[^\x00-xff]/g,"xx").length;
  }

  //使用ajax异步刷新订单
  for (var i = 0; i < lis_order.length; i++) {
    (function(){
      var temp = i;
      lis_order[i].onclick = function () {
        page +=1;
        for(var j=0; j<show_user.length; j++){
          show_user[j].id = '';
        };

        for(var j=0; j<show_order.length; j++){
          show_order[j].id = 'show';
         };
        // show[temp].id = 'show';
        var flag=document.getElementById(temp).getAttribute("value");
        orderShow(flag,1);
        // alert(lis.length);
      }
    })();  
  };

  //显示编辑用户界面

  for (var i = 0; i < lis_user.length; i++) {
    (function(){
      var temp = i;
      lis_user[i].onclick = function () {

        for(var j=0; j<show_order.length; j++){
          show_order[j].id = '';
         };

        for(var k=0; k < show_user.length; k++){
          show_user[k].id = '';
        };
        show_user[temp].id = 'show';

        OldPass.focus();
      }
    })();  
  };


  //显示修改用户密码界面

  //用户名
  //1、数字，字母（部分大小写）、汉字，下划线
  //2、4--12个字符
  //a-zA-Z0-9 \w
  //unicode \u4e00-\u9fa5 汉字
  var reName = /[^\w\u4e00-\u9fa5]/g;
  Name.onfocus = function () {
    Name_msg.style.display = "inline";
    Name_msg.innerHTML = '请输入1~10字符的昵称';
    Name_msg.style.color = "#666";
  }
  
  Name.onblur = function () {
    Name_length = getlength (this.value);
  
    //含非法字符
    if (reName.test(this.value)) {
      Name_msg.innerHTML = '含有非法字符，请重新输入';
      Name_msg.style.color = "red";
      this.value = NameV;

    }
    //不能为空
    else if (!this.value) {
      Name.focus();
      Name_msg.innerHTML = '昵称不能为空哦';
      Name_msg.style.color = "red";
    }
    //长度超过12个字符
    else if (Name_length > 10) {
      Name.focus();
      Name_msg.innerHTML = '昵称不能超过10个字符哦';
      Name_msg.style.color = "red";
      this.value = NameV;
    }
    //长度短于1个字符
    else if (Name_length < 1) {
      Name.focus();
      Name_msg.innerHTML = '昵称不能为空哦';
      Name_msg.style.color = "red";
      this.value = NameV;
    }
    //OK
    else{
      Name_msg.innerHTML = '新昵称可以用了';
      Name_msg.style.color = "#3C0";
      // NameV = this.value;
    }
  }

  //邮箱正则表达
  var reEmailAdr = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
  EmailAdr.onfocus = function () {
    EmailAdr_msg.style.display = "inline";
    EmailAdr_msg.innerHTML = '请输入新电子邮箱';
    EmailAdr_msg.style.color = "#666";
  } 

  EmailAdr.onblur = function () {
    //不能为空
    if (this.value.length == 0) {
      EmailAdr_msg.innerHTML = '您没有修改邮箱';
      this.value = EmailAdrV;
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
    }
  }

  //旧密码输入框
  OldPass.onfocus = function(){
    OldPass_msg.style.display = "inline";
    OldPass_msg.innerHTML = "请输入旧密码";
    OldPass_msg.style.color = "#666";
  }

  OldPass.onblur = function(){

    if (!this.value) {
      OldPass.focus();
      OldPass_msg.innerHTML = '旧密码不能为空哦';
      OldPass_msg.style.color = "red";
    }
    else if(OldPass.value.length < 1 ){
      OldPass.focus();
      OldPass_msg.innerHTML = '旧密码不能为空哦';
      OldPass_msg.style.color = "red";
    }
    else{
       OldPass_msg.innerHTML = '旧密码输入成功';
      OldPass_msg.style.color = "#3C0";
    }

  }

  //新密码输入框
  NewPass.onfocus = function(){
    NewPass_msg.style.display = "inline";
    NewPass_msg.innerHTML = "请输6个字符以上密码";
    NewPass_msg.style.color = "#666";
  }

  NewPass.onblur = function(){

    //不能为空
    if (this.value.length == 0) {
      NewPass.focus();
      NewPass_msg.innerHTML = '新密码不能为空哦';
      NewPass_msg.style.color = "red";
    }
    //不能少于6个字符
    else if (this.value.length < 6) {
      NewPass.focus();
      NewPass_msg.innerHTML = '新密码不能少于6个字符';
      NewPass_msg.style.color = "red";
      this.value = '';
    }
    //OK
    else{
      NewPass_msg.innerHTML = '新密码输入成功';
      NewPass_msg.style.color = "#3C0";
    }
  }

  //确认密码输入框
  Passf.onfocus = function(){
    Passf_msg.style.display = "inline";
    Passf_msg.innerHTML = "请输6个字符以上密码";
    Passf_msg.style.color = "#666";
  }

  Passf.onblur = function(){

    //不能为空
    if (this.value.length == 0) {
      Passf.focus();
      Passf_msg.innerHTML = '确认密码不能为空哦';
      Passf_msg.style.color = "red";
    }
    else if (this.value != NewPass.value ) {
      Passf_msg.innerHTML = '两次密码不一致';
      Passf_msg.style.color = "red";
      NewPass.focus();
      NewPass.value = '';
      this.value = '';
     
    }
    //OK
    else{
      Passf_msg.innerHTML = '新密码输入成功';
      Passf_msg.style.color = "#3C0";
    }
  }


}

  //验证用户修改信息是否正确    
  function checkInfo(){

    var Name = document.getElementById('chngInput_name');
    var Name_msg = document.getElementById('nickName');

    var reEmailAdr = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
    var EmailAdr = document.getElementById('chngInput_exp');
    var EmailAdr_msg = document.getElementById('emailAdr');

    
    if(Name.value == null || Name.value == '' || Name.value.length > 10){
      Name.focus();
      Name_msg.innerHTML = '昵称不能超过10个字符哦';
      Name_msg.style.color = "red";
      return false;
    }

    else if(EmailAdr.value == 0 || !reEmailAdr.test(EmailAdr.value)){
      EmailAdr.focus();
      EmailAdr_msg.innerHTML = '邮箱输入不正确哦';
      EmailAdr_msg.style.color = "red";
      return false;
    }

    else{
      NameV = Name.value;
      return true;
    }
    
  }

  //验证用户确认密码是否正确    
  function checkPass(){

    var Name = document.getElementById('chngInput_name');
    var Name_msg = document.getElementById('nickName');

    var reEmailAdr = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
    var EmailAdr = document.getElementById('chngInput_exp');
    var EmailAdr_msg = document.getElementById('emailAdr');

    
    if(Name.value == null || Name.value == '' || Name.value.length > 10){
      Name.focus();
      Name_msg.innerHTML = '昵称不能超过10个字符哦';
      Name_msg.style.color = "red";
      return false;
    }

    else if(EmailAdr.value == 0 || !reEmailAdr.test(EmailAdr.value)){
      EmailAdr.focus();
      EmailAdr_msg.innerHTML = '邮箱输入不正确哦';
      EmailAdr_msg.style.color = "red";
      return false;
    }

    else{
      NameV = Name.value;
      return true;
    }
    
  }


window.orderFlag = "";

//根据不同选择来显示各种订单
function orderShow(flag , page){
  
  if(flag !=0){
    window.orderFlag = flag;
    window.page = page;

  }
 
  var xmlhttp;
  
  if (window.XMLHttpRequest){ 
    
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
  else{ 
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  //alert(num);
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
       {
       
        document.getElementById("orderFlag").innerHTML=xmlhttp.responseText;
       
      }
    }//"test01.php?q="+str,true
  
  xmlhttp.open("GET","index.php?route="+'orderFlag'+"&Flag="+window.orderFlag+"&page="+page,true);
  xmlhttp.send();
  }



  //详情响应函数
  function showDetail(id){


    var xmlhttp;
  
  if (window.XMLHttpRequest){ 
    
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
  else{ 
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  //alert(num);
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
       {
       
        document.getElementById("tb_detail").innerHTML=xmlhttp.responseText;
       
      }
    }//"test01.php?q="+str,true
  
  xmlhttp.open("GET","index.php?route="+'orderDetail'+"&orderId="+id,true);
  xmlhttp.send();
  
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

    var detail = document.getElementById('tb_detail');
    var out = document.getElementById('out'); 

    detail.style.display = "block";
    out.style.display = "block";



    var mask = document.getElementById('mask'); 
    // var detialShow = document.getElementById('tb_detail'); 


    out.onclick = function () {
      document.body.removeChild(mask);
      detail.style.display = 'none';
      out.style.display = 'none';
    }

  }

//采取ajax操作来取消订单
function cancle(id){
   
  //通过隐藏的 input 来获取处于取消状态的订单数量
  var num = document.getElementById('cancled').value;
  cancled_num = parseInt(num) + 1;
 
  var xmlhttp;
  
  if (window.XMLHttpRequest){ 
    
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else{ 
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  //alert(num);
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
       {
        
    document.getElementById("span_pay").innerHTML=xmlhttp.responseText;
       
    document.getElementById("span_cancle").innerHTML=cancled_num;
    // alert(cancled_num);
    orderShow(window.orderFlag , window.page);
      }
    }//"test01.php?q="+str,true
  
  xmlhttp.open("GET","index.php?route="+'orderCancle'+"&id="+id,true);
  xmlhttp.send();
}


//响应分页点击操作
function fy_onclick(v,num){

    switch(v){
        case 'first':
            window.page = 1;
            break;
        case 'pre':
            if(window.page <=1){
                window.page = 1;
                break;
            }
            window.page -=1;
            break;
        case 'next':
            if(window.page >=num){
                window.page = num;
                break;
            }
            window.page +=1;
            break;
        case 'last':
            window.page =num;
            break;
        default :
            window.page =1;
            break;    
    }

    orderShow(window.orderFlag , window.page);
}

function getKey(){  
  e=arguments.callee.caller.arguments[0] || window.event; 

  if(e.keyCode==13){  
   userModify();
  }     
}  

function getKey1(){  
  e=arguments.callee.caller.arguments[0] || window.event; 

  if(e.keyCode==13){  
   userPassChange(); 
  }        
}  

function userModify(){
 
  var xmlhttp;
  
  var phNum = document.getElementById("chngInput_phNum").value;
  var name = document.getElementById("chngInput_name").value;
  var email = document.getElementById("chngInput_exp").value;

  var temp = document.getElementsByName("salution");
  for(var i=0;i<temp.length;i++)
  {
   if(temp[i].checked)
         var sex = temp[i].value;
  }

  if (window.XMLHttpRequest){ 

  // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else{ 
  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function() {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
      
      document.getElementById("nameB").innerHTML=name;

    }
  }//"test01.php?q="+str,true
  if( checkInfo() ){
    var url = 'index.php?route='+'userModify'+'&phNum='+phNum+'&name='+name+'&sex='+sex+'&email='+email;
    url = encodeURI(url);
    xmlhttp.open("GET",url,true);
    // xmlhttp.open("GET",{'index.php?route':'userModify', 'phNum':phNum , 'name':name , 'sex':sex , 'email':email , 'timeStamp':new Date().getTime()});
    xmlhttp.send();
  }
  else{
    return false;
  }
  
}


function userPassChange(){
  
  var xmlhttp;
  // if (str.length==0){ 
 //     document.getElementById("txtHint1").innerHTML="";
 //     return;
 //   }
    var OldPass = document.getElementById("chngInput_OldPass").value;
    var NewPass = document.getElementById("chngInput_NewPass").value;
    var Passf = document.getElementById("chngInput_Passf").value;

  if (window.XMLHttpRequest){ 
    
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
  else{ 
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
       {
        // document.getElementById("nameA").innerHTML=xmlhttp.responseText;
        document.getElementById("boolPassTrue").innerHTML=xmlhttp.responseText;
        // document.getElementById("nameB").innerHTML=NewPass;

      }
    }//"test01.php?q="+str,true
  
  xmlhttp.open("POST","index.php?route="+'userPassChange'+"&OldPass="+OldPass+"&NewPass="+NewPass+"&Passf="+Passf,true);
  xmlhttp.send();
}