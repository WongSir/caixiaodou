<?php 
require_once 'include.php';
checkLogined();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="http://www.caixiaodou.com">菜小兜</a></div>
            <h3 class="head_text fr">菜小兜电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
       <!--   <div class="link fl"><a href="#">慕课</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>-->
        <div class="link fr">
            <b>欢迎您
            <?php 
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
            ?>
            
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="icon icon_i">首页</a><span></span><a href="" class="icon icon_j">前进</a><span></span><a href="" class="icon icon_t">后退</a><span></span><a href="" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span  id="change1" style="color:#E25850;">*</span><b onclick="show('menu1','change1')">商品管理</b></h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                            <dd><a href="listPro.php" target="mainFrame">商品列表</a></dd>
                        </dl>
                    </li>
                   
                    <li>
                        <h3><span   id="change3"  style="color:#E25850;">*</span><b onclick="show('menu3','change3')">订单管理</b></h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="listOrder.php" target="mainFrame">订单查询</a></dd>
                            
                    </li>
                    <li>
                        <h3><span  id="change4" style="color:#E25850;">*</span><b onclick="show('menu4','change4')">用户管理</b></h3>
                        <dl id="menu4" style="display:none;">
                        	<!-- <dd><a href="addUser.php" target="mainFrame">添加用户</a></dd> -->
                            <dd><a href="listUser.php" target="mainFrame">用户列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span  id="change5" style="color:#E25850;" >*</span><b onclick="show('menu5','change5')">管理员管理</b></h3>
                        <dl id="menu5" style="display:none;">
                        	<dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                    
                         <li>
                        <h3><span  id="change6" style="color:#E25850;" >*</span><b onclick="show('menu6','change6')">图片管理</b></h3>
                        <dl id="menu6" style="display:none;">
                            <dd><a href="listProImages.php" target="mainFrame">商品图片</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="*"){
	    				change.innerHTML="*";
	        	}else{
						change.innerHTML="*";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>