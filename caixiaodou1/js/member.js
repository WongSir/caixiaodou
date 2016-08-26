window.onload = function () {

  if (!document.getElementsByClassName) {
      document.getElementsByClassName = function (ClassName) {
          var ret = [];
          var els = document.getElementsByTagName('*');
          for (var i = 0; i < els.length; i++) {
              if (els[i].className === ClassName
                  || els[i].className.indexOf(ClassName + ' ') >= 0
                  || els[i].className.indexOf(' ' + ClassName + ' ') >= 0
                  || els[i].className.indexOf(' ' + ClassName) >= 0) {
                  ret.push(els[i]);
              }
          }
          return ret;
      }
  }//封装getElemtByClassName函数

  var lis = document.getElementsByClassName('_body');
  var show = document.getElementsByClassName('menu_right');
  var spans = document.getElementsByTagName('span');
  var EmailAdr = document.getElementById('chngInput_exp');
  var EmailAdr_msg = document.getElementById('emailAdr');

//订单切换
  for (var i = 0; i < lis.length; i++) {
    (function(){
      var temp = i;
      lis[i].onclick = function () {
        for (var j = 0; j < show.length; j++) {
          show[j].id = '';
        };
        show[temp].id = 'show';
      }
    })();  
  };
//邮箱正则表达
  var reEmailAdr = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
    EmailAdr.onfocus = function () {
      EmailAdr_msg.style.display = "inline";
      EmailAdr_msg.innerHTML = '请输入新电子邮箱';
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
        EmailAdr_msg.innerHTML = '';
      }
    }

}