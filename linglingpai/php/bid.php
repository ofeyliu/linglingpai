<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

include 'PHP/openapi_client.php';
include 'PHP/datasql.php';


// $json_string = file_get_contents('../data/access.json');
 
// // 把JSON字符串转成PHP数组
// $data = json_decode($json_string);
// //var_dump($data);

// $openID = $data->OpenID;
// $accessToken = $data->AccessToken;
// $refreshToken = $data->RefreshToken;

if (isset($_COOKIE["user"]))
{
	$openID=$_COOKIE["user"];
	$accessToken=search_data($openID);
}
	
else
	return(-1);

$listingid = $_GET['bidId'];
$amount = $_GET['Amount'];
// $listingid = 54016177;
// $amount = 49;
// var_dump($accessToken);

/*保存用户授权信息后可获取做权限内的接口调用*/
// $url = "http://gw.open.ppdai.com/open/openApiPublicQueryService/QueryUserNameByOpenID";
// $url = "http://gw.open.ppdai.com/auth/authservice/sendsmsauthcode";
// $url = "http://gw.open.ppdai.com/auth/LoginService/AutoLogin";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/LoanList";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingInfos";
//$url = "http://gw.open.ppdai.com/balance/balanceService/QueryBalance";
$url = "http://gw.open.ppdai.com/invest/BidService/Bidding";
// $request = '{"OpenID": "be47e5e4b9444047b0f8fe9311a8ea29"}';
// $request = '{"Mobile": "15026671512","DeviceFP": "123456"}';
// $request = '{"Timestamp": "2017-03-14 19:15:22"}';
// $request = '{"PageIndex": 1,"StartDateTime": "2015-11-11 12:00:00.000"}';
// $request = '{"ListingIds": [100001,123456]}';
// $request = '{}';
$temp=array("ListingId" => $listingid, "Amount" => $amount,"UseCoupon" => "true");
$request=json_encode($temp);
// $request = '{
//   "ListingId": , 
//   "Amount": 150,
//   "UseCoupon":"true"
// }';
// var_dump($accessToken);
// var_dump($request);

$result = send($url, $request,$accessToken);
// var_dump($result);

$dresult = json_decode($result);

$bidResult= $dresult->Result;

echo((string)$bidResult);
// var_dump($dresult);
// var_dump($balance); 
// echo $result;

/*加解密*/
// $data = "test";
// $encrypted = encrypt($data);
// $decrypted = decrypt($encrypted);
// echo "Encrypted: ".$encrypted."<br>";
// echo "Decrypted: ".$decrypted;
