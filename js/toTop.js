
//第一个参数是按钮id；第二个参数是一个布尔值，true是一直显示按钮，false是当滚动距离不为0时，显示按钮 
function toTop(id,show){ 
	var oTop = document.getElementById(id); 
	var bShow = show; 
	if(!bShow){ 
	oTop.style.display = 'none'; 
	setTimeout(btnShow,10); 
	} 
	oTop.onclick = scrollToTop; 
	function scrollToTop(){ 
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop; 
	var iSpeed = Math.floor(-scrollTop/16); 
	if(scrollTop <= 0){ 
	if(!bShow){ 
	oTop.style.display = 'none'; 
	} 
	return; 
	} 
	document.documentElement.scrollTop = document.body.scrollTop = scrollTop + iSpeed; 
	setTimeout(arguments.callee,10); 
	} 
	function btnShow(){ 
	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop; 
	if(scrollTop <= 0 ){ 
	oTop.style.display = 'none'; 
	}else{ 
	oTop.style.display = 'block'; 
	} 
	setTimeout(arguments.callee,10); 
	} 
} 

// //鼠标移到标签 top 时
// function ontop(){
// 	var span_top = document.getElementById('span-top');
// 	span_top.style.display = 'block';
// }

// //鼠标移开标签 top 时
// function outtop(){
// 	var span_top =document.getElementById('span-top');
// 	span_top.style.display = 'none';
// }

// //鼠标移到标签 vote 时
// function onvote(){
// 	var span_vote = document.getElementById('span-vote');
// 	span_vote.style.display = 'block';
// }

// //鼠标移开标签 vote 时
// function outvote(){
// 	var span_vote =document.getElementById('span-vote');
// 	span_vote.style.display = 'none';
// }

// //鼠标移到标签 help 时
// function onhelp(){
// 	var span_help = document.getElementById('span-help');
// 	span_help.style.display = 'block';
// }

// //鼠标移开标签 help 时
// function outhelp(){
// 	var span_help =document.getElementById('span-help');
// 	span_help.style.display = 'none';
// }