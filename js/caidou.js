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
   }
   //封装getElemtByClassName函数

    var basketTable = document.getElementById('basketTable');//菜篮子表格
    var tr = basketTable.children[1].rows;//行
    var checkInputs = document.getElementsByClassName('check');//所有复选框
    var checkOneInputs = document.getElementsByClassName('check-one');//商品复选框
    var checkAllInputs = document.getElementsByClassName('check-all');//全选复选框
    var selectTotal = document.getElementById('selectTotal');//
    var price = document.getElementById('price');//单价
    var priceTotal = document.getElementById('priceTotal');//价格总计
    var add = document.getElementsByClassName('add');//增加商品数目
    var reduce = document.getElementsByClassName('reduce');  //减少商品数目   
    var selectedViewList = document.getElementById('selectedViewList');//已选商品浏览
    var deleteOne = document.getElementById('deleteOne'); //删除单个商品
    var deleteAll = document.getElementById('deleteAll');  //  删除全部商品
    var foot = document.getElementById('foot');//
    var selected = document.getElementById('selected');//已选商品数目容器
    // var productId = document.getElementById('price');//单价
    //var inputNum = document.getElementsByTagName('input');



    //选择跟计算
	 function getTotal() {
	 	var selected = 0;
	 	var price = 0;
	 	var HTMLstr = '';
	 	for (var i = 0; i < tr.length; i++) {
	 		if (tr[i].getElementsByTagName('input')[0].checked){
	 			tr[i].className = 'on';
	 			selected += parseInt(tr[i].getElementsByTagName('input')[1].value);
	 			price += parseFloat(tr[i].cells[4].innerHTML);
	 			HTMLstr += '<div><img src="'+tr[i].getElementsByTagName('img')[0].src+'" /><span class="del" index="'+i+'">取消选择</span></div>'
	 		}
	 		else{
	 			tr[i].className = '';
	 		}
	 	}//修改总数量和总价格
	 	selectTotal.innerHTML = selected;
	 	priceTotal.innerHTML = price.toFixed(2) ;
	 	selectedViewList.innerHTML = HTMLstr;
    if (selected == 0){
      foot.className = 'foot';
    }
	 }

  //点击复选框
 	for (var i = 0; i < checkInputs.length; i++) {
 		checkInputs[i].onclick = function () {
 			if (this.className === 'check-all check'){
 				for (var j = 0; j < checkInputs.length; j++) {
 					checkInputs[j].checked = this.checked;
 				};
 			}
      //非全选全选框不勾
 			if (this.checked === false){
 				for (var k = 0; k < checkAllInputs.length; k++) {
 					checkAllInputs[k].checked = false;
 				};
 			}
      //全选时全选框勾
 			function CekAll(){
 					for (var m = 0; m < checkOneInputs.length; m++) {
 						if (checkOneInputs[m].checked === false) return false;
 					};
 					return true;
 			}
 			if (CekAll()){
 				for (var k = 0; k < checkAllInputs.length; k++) {
 					checkAllInputs[k].checked = true;
 				};
 			}
      //更新总计
 			getTotal();
 		}
 	}

  //显示已选商品弹层
  selected.onclick = function (){
    if (foot.className == 'foot'){
      if(selectTotal.innerHTML != 0){
        foot.className = 'foot show';
      }
      
    }
    else{
      foot.className = 'foot';
    }
  }

  //计算单行价格
   function getSubtotal(tr) {
        var cells = tr.cells;
        var price = parseFloat(cells[2].innerHTML);//单价
        var subprice= parseFloat(cells[4].innerHTML);//小计td 

        var counts = parseInt(tr.getElementsByTagName('input')[1].value);//input数目   
        var span = tr.getElementsByTagName('span')[1];//减号

        // //计算写入HTML
        cells[4].innerHTML = (parseFloat(price*counts)).toFixed(2);
        
        //处理减号
        if (counts.value == 1) {
          span.innerHTML = '';
        }else{
          span.innerHTML = '-';
        }
   }

   //每次加减购物车一个数量
   function changeNum(action,id,num){
  
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
        // document.getElementById("myFood").innerHTML=xmlhttp.responseText;
         var num = xmlhttp.responseText;

        if(num >99){
          num = '99+'; 
          $("#myFood").attr("class" , "more");
        }
        else{
          $("#myFood").attr("class" , "less");
        }
        document.getElementById("myFood").innerHTML=num;
      }
    }//"test01.php?q="+str,true
  
  xmlhttp.open("GET","index.php?route="+'addToCart'+"&action="+action+"&id="+id,true);
  xmlhttp.send();
}

  //一次性修改购物车数量
   function modNum(action,id,num){
  
  var xmlhttp;
  // if (str.length==0){ 
 //     document.getElementById("txtHint1").innerHTML="";
 //     return;
 //   }
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
         var num = xmlhttp.responseText;

        if(num >99){
          num = '99+'; 
          $("#myFood").attr("class" , "more");
        }
        else{
          $("#myFood").attr("class" , "less");
        }
        document.getElementById("myFood").innerHTML=num;
        // document.getElementById("myFood").innerHTML=xmlhttp.responseText;
      }
    }//"test01.php?q="+str,true
  
  xmlhttp.open("GET","index.php?route="+'addToCart'+"&action="+action+"&id="+id+"&num="+num,true);
  xmlhttp.send();
}

  //已选商品弹层中的取消选择按钮
  selectedViewList.onclick = function (e) {
    var e;
    e = e || window.event;
    var el = e.target||e.srcElement;
    if (el.className == 'del') {
      var index = el.getAttribute('index');
      var input = tr[index].getElementsByTagName('input')[0];
      input.checked = false;
      input.onclick();
    }
  }
 
  for (var i = 0; i < tr.length; i++) {
    tr[i].onclick = function (e){
      var e;
      e = e||window.event;
      var el = e.target||e.srcElement;
      var cls = el.className;
      var input = this.getElementsByTagName('input')[1];
      var val = parseInt(input.value);
      var reduce = this.getElementsByTagName('span')[1];
      var subprice = parseFloat(this.getElementsByClassName('sub-total').innerHTML);
      var price = parseFloat(this.getElementsByClassName('price').innerHTML);

      var inputId = this.getElementsByTagName('input')[2];
      var valId = parseInt(inputId.value);

      switch(cls){
        case 'add':
              input.value = val + 1;
              reduce.innerHTML = '-';
              getSubtotal(this);
              changeNum('add',valId);
              break;
        case 'reduce':
              if (val > 1) {
                input.value = val - 1;
                getSubtotal(this);
                changeNum('reduce',valId);
              }
              if (input.value <= 1){
                reduce.innerHTML = '';
              }
              break;
        case 'delete':
              var conf = confirm('确定要删除吗？');
              if (conf) {
                changeNum('delete',valId);
                this.parentNode.removeChild(this);  
              }
              break;
        default:
              break;
      }

      getTotal();
      if (selectTotal.innerHTML == 0){
        for (var j = 0; j < checkAllInputs.length; j++) {
          checkAllInputs[j].checked = false;
        }   
      }
    }
    tr[i].getElementsByTagName('input')[1].onkeyup = function (){
    var val = parseInt(this.value); 
    var tr = this.parentNode.parentNode;
    var reduce = tr.getElementsByTagName('span')[1];

    var inputId1 = tr.getElementsByTagName('input')[2];
    var valId1 = parseInt(inputId1.value);

    if (isNaN(val)||val <1) {
      val = 0;  
    }
    this.value = val;

    if (val == 1){
      reduce.innerHTML = '';
    }
    else{
      reduce.innerHTML = '-';
    }

    getSubtotal(tr);
    getTotal();

    //根据输入框来需改购物车数量
    modNum('modify',valId1,this.value);
    //alert(this.value);

  };  
 }
 deleteAll.onclick = function () {
  if(selectTotal.innerHTML != 0) {
    var conf = confirm('确定要删除这些吗？');
    if (conf) {
      for (var i = 0; i < tr.length; i++) {
        var input = tr[i].getElementsByTagName('input')[0];
        if (input.checked) {
          changeNum('deleteAll');
          tr[i].parentNode.removeChild(tr[i]); 
          i--;
        }
      };
      getTotal();
      if (selectTotal.innerHTML == 0){
        for (var j = 0; j < checkAllInputs.length; j++) {
          checkAllInputs[j].checked = false;
        }   
      }
    }
  }
 }
 checkInputs[0].checked = true;
 checkInputs[0].onclick();
}
