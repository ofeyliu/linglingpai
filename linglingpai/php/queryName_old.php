<?php
include 'PHP/openapi_client.php';
include 'PHP/datasql.php';

/*step 1 通过code获取授权信息*/
// $code = "52c974893a46478bbf8a0d993a169c8c";
// $authorizeResult = authorize($code);
// var_dump($authorizeResult) ;
// $json_string = file_get_contents('../data/access.json');
 
// // 把JSON字符串转成PHP数组
// $data = json_decode($json_string);
// //var_dump($data);

// $openID = (string)$data->OpenID;
// $accessToken = $data->AccessToken;
// $refreshToken = $data->RefreshToken;

if (isset($_COOKIE["user"]))
{
	$openID=$_COOKIE["user"];
	$accessToken=search_data($openID);
}
	
else
{
	$accessToken="7e4ca856-e2a0-4283-8143-31f3aa004463";
	$openID="d26996934b764f1d89c520995fbf474f";
	
}
	
	
// $accessToken="69f96ee0-a37e-4a58-86d1-e7d58c064e2e";
// var_dump($accessToken);

// // $openID=search_data($accessToken);
// var_dump($openID);
// var_dump($openID);
 //var_dump($accessToken);

/*保存用户授权信息后可获取做权限内的接口调用*/
// $url = "http://gw.open.ppdai.com/open/openApiPublicQueryService/QueryUserNameByOpenID";
// $url = "http://gw.open.ppdai.com/auth/authservice/sendsmsauthcode";
// $url = "http://gw.open.ppdai.com/auth/LoginService/AutoLogin";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/LoanList";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingInfos";
$url = "http://gw.open.ppdai.com/open/openApiPublicQueryService/QueryUserNameByOpenID";
$temp=array("OpenID" => $openID);
$request=json_encode($temp);

// var_dump($request);
 // $request = '{"OpenID":' . $openID .'}';
// $request = '{"Mobile": "15026671512","DeviceFP": "123456"}';
// $request = '{"Timestamp": "2017-03-14 19:15:22"}';
// $request = '{"PageIndex": 1,"StartDateTime": "2015-11-11 12:00:00.000"}';
// $request = '{"ListingIds": [100001,123456]}';
// echo($request);



$result = send($url, $request,$accessToken);
$dresult = json_decode($result);
// var_dump($dresult);

$name=$dresult->UserName;
 // var_dump($name);

/*加解密*/
// $data = "test";
// $encrypted = encrypt($data);
$decrypted = decrypt($name);
// echo "Encrypted: ".$encrypted."<br>";
echo $decrypted;
