<?php
include 'PHP/openapi_client.php';
include 'PHP/datasql.php';



// $openID = $data->OpenID;
// $accessToken = $data->AccessToken;
// $refreshToken = $data->RefreshToken;

if (isset($_COOKIE["user"]))
{
	$openID=$_COOKIE["user"];
	$accessToken=search_data($openID);
}
else
{
	return(-1);
}
	
// else
// 	return(-1);

// var_dump($accessToken);

/*保存用户授权信息后可获取做权限内的接口调用*/
// $url = "http://gw.open.ppdai.com/open/openApiPublicQueryService/QueryUserNameByOpenID";
// $url = "http://gw.open.ppdai.com/auth/authservice/sendsmsauthcode";
// $url = "http://gw.open.ppdai.com/auth/LoginService/AutoLogin";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/LoanList";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingInfos";
$url = "http://gw.open.ppdai.com/balance/balanceService/QueryBalance";

// $request = '{"OpenID": "be47e5e4b9444047b0f8fe9311a8ea29"}';
// $request = '{"Mobile": "15026671512","DeviceFP": "123456"}';
// $request = '{"Timestamp": "2017-03-14 19:15:22"}';
// $request = '{"PageIndex": 1,"StartDateTime": "2015-11-11 12:00:00.000"}';
// $request = '{"ListingIds": [100001,123456]}';
$request = '{

}';


$result = send($url, $request,$accessToken);
$dresult = json_decode($result);

// var_dump($dresult);
foreach ($dresult->Balance as $value)
{
	if($value->AccountCategory == "用户备付金.用户现金余额")
	{
		$balance = $value->Balance;
		break;
	}
	else
		$balance=0;
		
}


echo $balance;
// var_dump($balance); 
// echo $result;

/*加解密*/
// $data = "test";
// $encrypted = encrypt($data);
// $decrypted = decrypt($encrypted);
// echo "Encrypted: ".$encrypted."<br>";
// echo "Decrypted: ".$decrypted;
