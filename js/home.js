window.onload = function(){

  CityName = "";

  AreaName = "";

  MetroName = "";

  AddrName = "";

  MetroId = 1;

  foodKind = "";

  foodName = "";

  foodNameId = 1;

  //初始化右下角导航
  toTop('top',false); 
  
  // 初始化首页 home 主页
  init_home();

  var adrr_init = document.getElementById('CompeleteAdrr');
  var food_choosed = document.getElementById('food-choosed');

  productAddr(adrr_init.innerHTML , food_choosed.innerHTML);
  // alert(food_choosed.innerHTML);
}

function init_home(){

    if (!document.getElementsByClassName) {

      document.getElementsByClassName = function (ClassName) {

        var ret = [];
        var els = document.getElementsByTagName('*');

        for (var i = 0; i < els.length-1; i++) {

          if (els[i].className === ClassName|| els[i].className.indexOf(ClassName + ' ') >= 0 || els[i].className.indexOf(' ' + ClassName + ' ') >= 0 || els[i].className.indexOf(' ' + ClassName) >= 0) {
            ret.push(els[i]);
          }
    
        }
        
        return ret;
      }
    }//封装getElemtByClassName函数
  }

// function Kind(k){
    
//   KindShow(k);
// }
  
//获取首页根据不同地址获取商品 
function productAddr(productAddr , foodName){


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
        document.getElementById("showKind").innerHTML=xmlhttp.responseText;
        // $("#showKind").html(xmlhttp.responseText);
        // alert(xmlhttp.responseText);
      }
    }//"test01.php?q="+str,true

  var url = 'index.php?route='+'productAddr'+'&productAddr='+productAddr+'&foodName='+foodName;
  url = encodeURI(url);

  xmlhttp.open("GET",url,true);
  xmlhttp.send();
}

function ChoiceAddr(AddrName , foodName){

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
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

      // document.getElementById(id).innerHTML=xmlhttp.responseText;
    }
  }//"test01.php?q="+str,true22 
  var url = 'index.php?route='+'ChoiceAddr'+'&AddrName='+AddrName+'&foodName='+foodName;
  url = encodeURI(url);
  xmlhttp.open("GET",url,true);
  xmlhttp.send();
}

function Show(id){
  var id = document.getElementById(id);

  id.style.display = "block";
}

function Hide(id){
  var id =document.getElementById(id);
  id.style.display = "none";
}

function selectStoreTab(id){

  if(id ===0){
    $("#CityTab").attr("class" , "curr");
    $("#CityShow").attr("class" , "mc");

    $("#AreaTab").attr("class" , "curr hide");
    $("#AreaShow").attr("class" , "mc hide");

    $("#MetroTab").attr("class" , "curr hide");
    $("#MetroShow").attr("class" , "mc hide");

    var city = document.getElementById('city');
    city.innerHTML = "请选择";

  }

  if(id ===1){
    $("#CityTab").attr("class" , "curr hideline");
    $("#CityShow").attr("class" , "mc hide");

    $("#AreaTab").attr("class" , "curr");
    $("#AreaShow").attr("class" , "mc");

    $("#MetroTab").attr("class" , "curr hide");
    $("#MetroShow").attr("class" , "mc hide");

    var area = document.getElementById('area');
    area.innerHTML = "请选择";

  }
}


function selectCity(id , name){
  CityName = name;

  var city = document.getElementById('city');
  city.innerHTML = CityName;

  $("#CityTab").attr("class" , "curr hideline");
  $("#CityShow").attr("class" , "mc hide");

  $("#AreaTab").attr("class" , "curr") 
  $("#AreaShow").attr("class" , "mc");

}

function selectArea(id , name){
  AreaName = name;

  var area = document.getElementById('area');
  area.innerHTML = AreaName;

  $("#CityTab").attr("class" , "curr hideline");
  $("#CityShow").attr("class" , "mc hide");

  $("#AreaTab").attr("class" , "curr hideline")
  $("#AreaShow").attr("class" , "mc hide");

  $("#MetroTab").attr("class" , "curr");
  $("#MetroShow").attr("class" , "mc");

  $("#MetroShow"+MetroId).attr("class" , "mc hide");
  MetroId = id;

  $("#MetroShow"+id).attr("class" , "mc");
}

function onclickMetro(id , name){
  MetroName = name;

  Hide("store-content");

  AddrName = CityName + AreaName + MetroName;
  var Adrr = document.getElementById('CompeleteAdrr');

  Adrr.innerHTML = AddrName;

  foodName = document.getElementById('food-choosed').innerHTML;

  ChoiceAddr(AddrName , foodName);

  productAddr(AddrName , foodName);
}

function selectFoodTab(id){
  if(id ===0){
    $("#foodKindTab").attr("class" , "curr");
    $("#foodKindShow").attr("class" , "mc");

    $("#foodNameTab").attr("class" , "curr hide");
    $("#foodNameShow").attr("class" , "mc hide");

    var foodkind = document.getElementById('foodKind');
    foodkind.innerHTML = "请选择分类";

  }
}

function selectFoodKind(id , name){
  foodKind = name;
  // alert(id);
  var foodk = document.getElementById('foodKind');
  foodk.innerHTML = foodKind;

  $("#foodKindTab").attr("class" , "curr hideline");
  $("#foodKindShow").attr("class" , "mc hide");

  $("#foodNameTab").attr("class" , "curr")

  $("#foodNameShow").attr("class" , "mc");

  $("#foodNameShow" + foodNameId).attr("class" , "mc hide");

  foodNameId = id;

  $("#foodNameShow" + id).attr("class" , "mc");

}

function selectFoodName(id , name){
  foodName = name;

  Hide("food-content");

  var foodN = document.getElementById('food-choosed');
 
  foodN.innerHTML = foodName;
  
  AddrName = document.getElementById('CompeleteAdrr').innerHTML;
  
  productAddr(AddrName , foodName);
}
