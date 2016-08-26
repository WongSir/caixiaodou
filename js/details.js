window.onload = function(){


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

  amountNum = 1;

  var inc = document.getElementById('increase');
  var dec = document.getElementById('decrease');
  var amount = document.getElementById('amount-input');

  amount.onfocus = function(){

    var num = amount.value;
    if(isNaN(num) || num<1){
      num = 1;
      amount.value = num;
    }
    amountNum = num;
  }

    amount.onblur = function(){
    var num = amount.value;
    if(isNaN(num) || num<1){
      num = 1;
      amount.value = num;
    }

    amountNum = num;
  }

  inc.onclick = function(){

    amountNum = parseInt(amount.value);
    amountNum = amountNum+1;
    
    amount.value = amountNum;
  }

  dec.onclick = function(){

    amountNum = parseInt(amount.value);
    amountNum -= 1;
    if(amountNum <1 ){
      amountNum = 1;
    }
    amount.value = amountNum;
  }

  var showimg = document.getElementsByClassName('imgS');
  
  for(var i=0; i<showimg.length; ++i){

    (function(){

      var temp = i;

      showimg[i].onclick = function(){

        for(var j=0; j<showimg.length; ++j){
          showimg[j].style.border = '1px solid #fff';
          // alert(j);
        }
       
        showimg[temp].style.border = '1px solid #E25850';       
      }

    })(); 

  };


  var info = document.getElementById('info');
  var method = document.getElementById('method');
  var evaluation = document.getElementById('evaluation');

  info.onclick = function(){

    $("#info").attr("class" , "info showline");
    $("#method").attr("class" , "method");
    $("#evaluation").attr("class" , "evaluation");

    $('#details-body').attr("class" , "details-body");
    $('#recipeStep').attr("class" , "recipeStep hide");
    $('#J_Reviews').attr("class" , "J_DetailsSection hide");
  }

  method.onclick = function(){

    $("#info").attr("class" , "info");
    $("#method").attr("class" , "method showline");
    $("#evaluation").attr("class" , "evaluation");

    $('#details-body').attr("class" , "details-body hide");
    $('#recipeStep').attr("class" , "recipeStep");
    $('#J_Reviews').attr("class" , "J_DetailsSection hide");
  }

  evaluation.onclick = function(){

    $("#info").attr("class" , "info");
    $("#method").attr("class" , "method");
    $("#evaluation").attr("class" , "evaluation showline");

    $('#details-body').attr("class" , "details-body hide");
    $('#recipeStep').attr("class" , "recipeStep hide");
    $('#J_Reviews').attr("class" , "J_DetailsSection");
  }


  var txt_show = document.getElementById('block_txt_show');
  var txt_hide = document.getElementById('block_txt_hide');

  txt_show.onclick = function(){
    $('#block_txt').attr("class" , "block_txt block_txt_all");
    txt_show.style.display = 'none';
    txt_hide.style.display = 'block';
  }

  txt_hide.onclick = function(){
    $('#block_txt').attr("class" , "block_txt");
    txt_show.style.display = 'block';
    txt_hide.style.display = 'none';
  }
  
}


function addToCart(action,id,name,price){
    
  // alert("flag");
  var xmlhttp;
  
  if (window.XMLHttpRequest){ 
    
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
  else{ 
    // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
      var num = xmlhttp.responseText;

      if(num >99){
        num = '99+'; 
        $("#myFood").attr("class" , "more");
      }
      document.getElementById("myFood").innerHTML=num;
      
    }
  }//"test01.php?q="+str,true22
  
  xmlhttp.open("GET","index.php?route="+'addToCart'+"&action="+action+"&id="+id+"&name="+name+"&price="+price+"&num="+amountNum,true);
  xmlhttp.send();
}
