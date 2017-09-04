<!DOCTYPE html>
<!--
Author: Li Yang
Date: 2017-06-23
-->

<?php
include 'php/PHP/openapi_client.php';
include 'php/PHP/datasql.php';

// echo("test");
// $q = isset($_GET['code'])? htmlspecialchars($_GET['code']) : '';
// echo("first");
if(isset($_GET['code'])) 
{
  // echo("test");
  $code = $_GET['code'];
  // var_dump($code);
  $authorizeResult = authorize($code);
  // var_dump($authorizeResult);
  
  save_data($authorizeResult);

  $data = json_decode($authorizeResult);
  $count=0;
  foreach($data as $rs)
  {
    $count=$count+1;
  } 
    
  // var_dump($data);
  // echo("size" . $count);

  if ($count == 4)
  {
    if (isset($_COOKIE["user"]))
      setcookie("user", "", time()-3600);
    
    setcookie("user", $data->OpenID, time()+3600*24);
  }
  else
    echo("no set cookies");
  
} 

  // $code = "3ef7cf162ff04b1caff3d4bab9647d27";
  // $authorizeResult = authorize($code);
  // file_put_contents('data/access.json', $authorizeResult);

?>

<html>
<head>
    <title>零零拍</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="layout/styles/personal.css">
</head>
<body id="top">
<!-- ################################################################################################ -->
<div class="wrapper row2">
    <ul id="top_info">
      <li>欢迎！<span id="userName"> </span</li>
    </ul>                          
</div> 
<div class="wrapper row1">
    <header id="header" class="hoc clear"> 
        <div id="logo" class="fl_left">
            <h1><a href="index.html">零零拍</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="index.php">主页</a></li>
                <!-- <li><a href="learn.html">快速入门</a></li> -->
                <li><a href="bidding.html">懒人投标</a></li>
                <li><a href="http://www.ppdai.com/">拍拍贷</a></li>
                <li class="active"><a href="info.php">个人中心</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-- ################################################################################################ -->


<script>
var xmlhttp3;
if (window.XMLHttpRequest)
{
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp3=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp3.onreadystatechange=function()
  {
    if (xmlhttp3.readyState==4 && xmlhttp3.status==200)
    {
      document.getElementById("userName").innerHTML=xmlhttp3.responseText;
    }
  }
  xmlhttp3.open("GET","/linglingpai/php/queryName.php",true);
  xmlhttp3.send();
  var userstr=document.getElementById("userName").value;
  </script>


<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"><a href="#">账户余额: </a><span id="balance"> </span> 元</h2>
    <ul class="nospace elements"> </ul>
  </section>
</div>

<script>
var xmlhttp;
if (window.XMLHttpRequest)
{
    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("balance").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","/linglingpai/php/queryBalance.php",true);
  xmlhttp.send();
  </script>

<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
      <h2 class="font-x3 uppercase btmspace-80 underlined"><a href="#">投标记录:</a></h2>
      <div id="bidRecord"><b></b></div>
      <ul class="nospace elements"> </ul>
  </section>
</div>

<script>
var xmlhttp2;

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
      document.getElementById("bidRecord").innerHTML=xmlhttp2.responseText;
    }
  }
  xmlhttp2.open("GET","/linglingpai/php/bidRecord.php",true);
  xmlhttp2.send();


</script>


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