/*
 * jQuery JavaScript Library Marquee Plus 1.0
 * http://mzoe.com/
 *
 * Copyright (c) 2009 MZOE
 * Dual licensed under the MIT and GPL licenses.
 *
 * Date: 2009-05-13 18:54:21
 */
(function($) {
	$.fn.marquee = function(o) {
		// advert(1);
		o = $.extend({
			speed:		parseInt($(this).attr('speed')) || 5, 
			step:		parseInt($(this).attr('step')) || 1, 
			direction:	$(this).attr('direction') || 'up', 
			pause:		parseInt($(this).attr('pause')) || 4000 
		}, o || {});
		var dIndex = jQuery.inArray(o.direction, ['right', 'down']);
		if (dIndex > -1) {
			o.direction = ['left', 'up'][dIndex];
			o.step = -o.step;
		}
		var mid;
		var div 		= $(this); 
		var divWidth 	= div.innerWidth(); 
		var divHeight 	= div.innerHeight(); 
		var ul 			= $("ul", div);
		var li 			= $("li", ul);
		var liSize 		= li.size(); 
		var liWidth 	= li.width(); 
		var liHeight 	= li.height(); 
		var width 		= liWidth * liSize;
		var height 		= liHeight * liSize;
		if ((o.direction == 'left' && width > divWidth) || 
			(o.direction == 'up' && height > divHeight)) {
			
			if (o.direction == 'left') {
				ul.width(2 * liSize * liWidth);
				if (o.step < 0) div.scrollLeft(width);
			} else {
				ul.height(2 * liSize * liHeight);
				if (o.step < 0) div.scrollTop(height);
			}
			ul.append(li.clone()); 
			mid = setInterval(_marquee, o.speed);
			div.hover(
				function(){clearInterval(mid);},
				function(){mid = setInterval(_marquee, o.speed);}
			);
		}
		function _marquee() {
			
			if (o.direction == 'left') {
				var l = div.scrollLeft();
				if (o.step < 0) {
					div.scrollLeft((l <= 0 ? width : l) + o.step);
				} else {
					div.scrollLeft((l >= width ? 0 : l) + o.step);
				}
				if (l % liWidth == 0) 
					_pause();
			} else {
				var t = div.scrollTop();
				if (o.step < 0) {
					div.scrollTop((t <= 0 ? height : t) + o.step);
				} else {
					div.scrollTop((t >= height ? 0 : t) + o.step);
				}
				if (t % liHeight == 0) 
					_pause();
			}
		}
		function _pause() {
			
			if (o.pause > 0) {
				var tempStep = o.step;
				o.step = 0;
				setTimeout(function() {
					o.step = tempStep;
				}, o.pause);
			}
		}
	};
})(jQuery);

$(document).ready(function(){
	// advert(1);
	$(".marquee").each(function() {
		// advert(2);
		$(this).marquee();		
	});
});


//获取首页对口味的选择 
function advert(){


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
        document.getElementById("rotation-bg").innerHTML=xmlhttp.responseText;
        // $("#showKind").html(xmlhttp.responseText);
        // alert(xmlhttp.responseText);
      }
    }//"test01.php?q="+str,true

  xmlhttp.open("GET","index.php?route="+'advert',true);
  xmlhttp.send();
}