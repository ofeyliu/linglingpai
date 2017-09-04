<?php
include 'PHP/datasql.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");


$test=array("OpenID" => "212ab36f894c45cfbfddf932eb906d98",
       "AccessToken" => "33f96ee0-a37e-4a58-86d1-e7d58c064e2e",
       "RefreshToken" => "2890da19-a14f-4d50-9534-cdec40a41373",
       "ExpiresIn"=> "22600");

$data=json_encode($test);

var_dump($data);
save_data($data);

 // $openid="012ab36f894c45cfbfddf932eb906d98";
 // check_data($openid);

if (isset($_COOKIE["user"]))
	echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
	echo "普通访客!<br>";

if (isset($_COOKIE["user"]))
{
	$openID=$_COOKIE["user"];
	$accessToken=search_data($openID);
	var_dump($accessToken);
}


// $accessToken="69f96ee0-a37e-4a58-86d1-e7d58c064e2e";

// $openID=search_data($accessToken);

// echo($openID);

?>