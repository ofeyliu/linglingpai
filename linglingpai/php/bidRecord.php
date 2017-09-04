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
{
    return(-1);
    // $accessToken="7e4ca856-e2a0-4283-8143-31f3aa004463";
    // $openID="d26996934b764f1d89c520995fbf474f";
}
    
$username=get_name($openID);

$url = "http://gw.open.ppdai.com/invest/BidService/BatchLenderBidList";


$temp =array("LenderNames"=> array($username) ,"TopIndex" => 10);
// $temp ='{"LenderNames":[' . (string)$username . '],"TopIndex":10}';
$request = json_encode($temp);
// echo($request);
// echo($temp);

$result = send($url, $request,$accessToken);

$dresult = json_decode($result);
// var_dump($dresult);

$result = $dresult->LendersBidsList[0]->Bids;
// var_dump($result);
// echo($result);

// $url = "http://gw.open.ppdai.com/invest/BidService/BidList";





// $listingid=0;
// $endtime=date("Y-m-d");
// $starttime= date('Y-m-d',mktime (0,0,0,date("m"),date("d")-30,date("Y")));

// $temp=array("ListingId" => $listingid, "StartTime" => $starttime,"EndTime" => $endtime,"PageIndex" => 1, "PageSize" =>20);
// $request=json_encode($temp);
// // var_dump($request);

// $result = send($url, $request,$accessToken);

// $dresult = json_decode($result);
// // var_dump($dresult);

// $result = $dresult->BidList;
// // var_dump($result);

echo "<table border='1'>
<tr>
<th>标编号</th>

<th>评级</th>
<th>标题</th>
<th>期数</th>
<th>利率</th>
<th>标的金额</th>
<th>投标金额</th>
<th>投标状态</th>
<th>时间</th>
</tr>";
 
foreach($result as $each)
{
    echo "<tr>";
    echo "<td>" . $each->ListingId . "</td>";  
    echo "<td>" . $each->CreditCode . "</td>";
    echo "<td>" . $each->Title . "</td>";
    echo "<td>" . $each->Months . "</td>";
    echo "<td>" . $each->Rate . "</td>";
    echo "<td>" . $each->Amount . "</td>";
    echo "<td>" . $each->BidAmount . "</td>";
    // echo "<td>" . $each->StatusId . "</td>";
    if($each->StatusId==1)
        echo "<td>" . "成功" . "</td>";
    else
        echo "<td>" . "流标" . "</td>";
    echo "<td>" . $each->BidDateTime . "</td>";
    echo "</tr>";
}
echo "</table>";



/*加解密*/
// $data = "test";
// $encrypted = encrypt($data);
// $decrypted = decrypt($encrypted);
// echo "Encrypted: ".$encrypted."<br>";
// echo "Decrypted: ".$decrypted;
