<!--
Author: Li Yang
Date: 2017-06-23
-->
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
?>
<html>
<head>
    <title>零零拍</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="./templet/bootstrap.min.css">
    <link rel="stylesheet" href="./templet/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="./templet/main.css">
    <link rel="shortcut icon" href="diting.jpg">

    <script src="lib/echarts.min.js"></script>
    <script src="lib/jquery-3.1.0.min.js"></script>
<!-- for table-->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style rel="stylesheet">
         .title
         {
          font-size:20px;
          margin-top: 30px;
          margin-bottom: 20px;
          font-family: Georgia;
         }
	 .txtwrap
	 {
	  padding: .8em;
          color: #888888;
	 }
         .subtitle, .notation
         {font-family: Georgia;}
         .notation{margin-bottom: 10px;}
    </style>
</head>
<body id="top">
    <!-- ############################################################### -->
    <div class="wrapper row1">
      <header id="header" class="hoc clear"> 
        <div id="logo" class="fl_left">
            <h1><a href="index.html">零零拍</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li class="active"><a href="index.php">首页</a></li>
                <!-- <li><a href="learn.html">快速入门</a></li> -->
                <li><a href="bidding.html">懒人投标</a></li>
                <li><a href="http://www.ppdai.com/">拍拍贷</a></li>
                <li><a href="info.php">个人中心</a></li>
            </ul>
        </nav>
      </header>
    </div>
    <!-- ############################################################## -->

    <div class="wrapper bgded overlay">
      <div id="pageintro" class="hoc clear"> 
        <article class="introtxt">
          <h2 class="heading">The <strong>easiest</strong> way to manage money matters</h2>
          <!-- <p> ~~~</p> -->
       	  <footer>
            <ul class="nospace inline pushright">
              <li><a id="sign_in" class="btn" href="https://ac.ppdai.com/oauth2/login?AppID=3bec630951ea46beb1acf8768c486dcd&ReturnUrl=http://106.14.115.248/linglingpai/info.php">登  录</a>
	      </li>
              <li><a id="sign_up" class="btn inverse" href="https://ac.ppdai.com/User/Register">注  册</a>
              </li>
            </ul>
          </footer>
        </article>
      </div>
      </div>
      <div class="wrapper">
        <section class="hoc container clear">
          <h2 class="font-x3 uppercase btmspace-80 underlined">
	    <a href="#">借款人的一些人>口基本统计信息</a>
	  </h2>
          <div id="part2">
            <div style="height:350px; float:left; width:60%;" >
              <div id="user_age" style="width: 500px;height:350px;float:left"></div>              <br>
            </div>
	    <div style="float: left;">
       	      <div id="P2_user_gender" style="width: 300px;height:200px;"></div>
              <div class="txtwrap">
        	<time datetime="2015-01-01">
		  1
		  <sup>th</sup> 
		  January 2015  ~ 30
		  <sup>th</sup> 
 		  January 2017
		</time>
        	<p>数据来源：拍拍贷</p>
              </div>
            </div>
	  </div>
        </section>
      </div>
      <div class="wrapper row2">
        <section class="hoc container clear bottom_padd">
    	  <h2 class="font-x3 uppercase btmspace-80 underlined">
	    <a href="#">行业分析</a>
	  </h2>
    	  <ul class="nospace elements">
      	    <li class="one_third first"></li>
      	    <li class="one_third">

              <div id="money_amount" style="width: 450px;height:200px;"></div>

              <div class="txtwrap">
                <!-- <h6 class="heading">Tristique nisl mauris</h6> -->
                <time datetime="2015-01-01">1<sup>th</sup> January 2015  ~ 30<sup>th</sup> January 2017</time>
       <!--     <p>数据来源：拍拍贷</p> -->
              </div>
            </li>
            <!-- <li class="one_third">
              <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
                <div class="txtwrap">
                  <h6 class="heading">Finibus purus id</h6>
                  <time datetime="2045-04-04">4<sup>th</sup> April 2045</time>
                  <p>Turpis egestas phasellus vulputate ac dolor ac elementum nullam leo&hellip;</p>
                </div>
              </article>
            </li> -->
          </ul>
        </section>
      </div>

<script>
var xmlhttp2;
 // document.getElementById("sign_up").style.visibility='hidden';
if (window.XMLHttpRequest)
{
  xmlhttp2=new XMLHttpRequest();
}
else
{
    // IE6, IE5 浏览器执行代码
    xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp2.onreadystatechange=function()
  {
    if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
      console.log(parseInt(xmlhttp2.responseText))
      if(parseInt(xmlhttp2.responseText)==0)
      {
        document.getElementById("sign_in").style.visibility='hidden';
        document.getElementById("sign_up").style.visibility='hidden';
      }
      else
      {
        document.getElementById("sign_in").style.visibility='visible';
        document.getElementById("sign_up").style.visibility='visible';
      }
      
    }
  }
  xmlhttp2.open("GET","/linglingpai/php/issignin.php",true);
  xmlhttp2.send();

</script>


<script type="text/javascript" src="js/P2_user_stat.js"></script>

<script type="text/javascript">
  var myChart = echarts.init(document.getElementById("P2_user_gender") );
  option = {
    title : {
        text: '性别分布',
        textStyle:{"fontFamily":"Georgia"},
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: []//['Null','男','女','保密']
    },
    series : [
        {
            name: 'Gender',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data:[
                {value:221946, name:'男'},
                {value:106607, name:'女'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

myChart.setOption(option);
</script>
<!-- ################################################################################################ -->
<!-- <div class="wrapper row2">
  <section class="hoc container clear bottom_padd"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"><a href="#">行业分析</a></h2>
    <ul class="nospace elements">
      <li class="one_third first">
        <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <div class="txtwrap">
            <h6 class="heading">Facilisis proin in</h6>
            <time datetime="2045-04-06">6<sup>th</sup> April 2045</time>
            <p>Dictum tempus nulla eros posuere arcu ut mattis lectus nisi vel nulla&hellip;</p>
            <footer><a href="#">Read More &raquo;</a></footer>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <div class="txtwrap">
            <h6 class="heading">Tristique nisl mauris</h6>
            <time datetime="2045-04-05">5<sup>th</sup> April 2045</time>
            <p>Odio vitae fringilla lacus habitant morbi tristique senectus et netus&hellip;</p>
            <footer><a href="#">Read More &raquo;</a></footer>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><img src="images/demo/320x220.png" alt=""></a>
          <div class="txtwrap">
            <h6 class="heading">Finibus purus id</h6>
            <time datetime="2045-04-04">4<sup>th</sup> April 2045</time>
            <p>Turpis egestas phasellus vulputate ac dolor ac elementum nullam leo&hellip;</p>
            <footer><a href="#">Read More &raquo;</a></footer>
          </div>
        </article>
      </li>
    </ul>
  </section>
</div> -->
 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">莱昂那</a></p>
    <p class="fl_right"><a target="_blank">上海交通大学</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>
