<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

include 'PHP/openapi_client.php';

$listingid=$_GET["bidId"];

// $listingid=53776952;
// 把JSON字符串转成PHP数组

 //var_dump($accessToken);

/*保存用户授权信息后可获取做权限内的接口调用*/
// $url = "http://gw.open.ppdai.com/open/openApiPublicQueryService/QueryUserNameByOpenID";
// $url = "http://gw.open.ppdai.com/auth/authservice/sendsmsauthcode";
// $url = "http://gw.open.ppdai.com/auth/LoginService/AutoLogin";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/LoanList";
// $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingInfos";
//$url = "http://gw.open.ppdai.com/balance/balanceService/QueryBalance";
$url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingInfos";
// $request = '{"OpenID": "be47e5e4b9444047b0f8fe9311a8ea29"}';
// $request = '{"Mobile": "15026671512","DeviceFP": "123456"}';
// $request = '{"Timestamp": "2017-03-14 19:15:22"}';
// $request = '{"PageIndex": 1,"StartDateTime": "2015-11-11 12:00:00.000"}';
// $request = '{"ListingIds": [100001,123456]}';
// $request = '{}';
// $temp=array("ListingIds" => $listingid);
// $request=json_encode($temp);
// var_dump((string)$listingid);

$request = '{"ListingIds":[' . (string)$listingid . ']}';
// var_dump($request);

$result = send($url, $request);

$dresult = json_decode($result);
// var_dump($dresult);

$result = $dresult->LoanInfos;
// var_dump($result);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>年龄</th>
<th>投标人数</th>
<th>剩余可投金额</th>
<th>截止时间</th>
<th>成功借款次数</th>
<th>失败借款次数</th>
</tr>";
 

{
    echo "<tr>";
    echo "<td>" . $result[0]->ListingId . "</td>";
    echo "<td>" . $result[0]->Age . "</td>";
    echo "<td>" . $result[0]->LenderCount . "</td>";
    echo "<td>" . $result[0]->RemainFunding . "</td>";
    echo "<td>" . $result[0]->DeadLineTimeOrRemindTimeStr . "</td>";
    echo "<td>" . $result[0]->SuccessCount . "</td>";
    echo "<td>" . $result[0]->FailedCount . "</td>";
    echo "</tr>";
}
echo "</table>";



/*加解密*/
// $data = "test";
// $encrypted = encrypt($data);
// $decrypted = decrypt($encrypted);
// echo "Encrypted: ".$encrypted."<br>";
// echo "Decrypted: ".$decrypted;
