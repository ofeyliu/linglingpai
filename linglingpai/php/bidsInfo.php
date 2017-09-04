<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

include 'PHP/openapi_client.php';
include 'PHP/datasql.php';
// $json_string = file_get_contents('../data/access.json');


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
// $username="pdu2138477680";
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
// $url = "http://gw.open.ppdai.com/invest/RepaymentService/FetchLenderRepayment";

echo "<table border='1'>
<tr>
<th>标编号</th>
<th>标状态</th>
<th>投标人数</th>
 </tr>";

foreach($result as $each)
{
    $temp=array();
    $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingStatusInfos";
    array_push($temp,$each->ListingId);
    $request2=json_encode(array("ListingIds"=>$temp));
    // var_dump($request2);
    $result2=send($url, $request2);
    // var_dump($result2);
    // get num of lenders
    $url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingBidInfos";
    $result3=send($url, $request2);
    // var_dump($result3);
    $res2=json_decode($result2);
    $res3=json_decode($result3);
    // var_dump($res2);
    // var_dump($res3);
    echo "<tr>";
    echo "<td>" . $each->ListingId . "</td>";
    if($res2->Infos[0]->Status==0)
        echo "<td>" . "流标" . "</td>";
    elseif($res2->Infos[0]->Status==1)
        echo "<td>" . "满标" . "</td>";
    elseif($res2->Infos[0]->Status==2)
        echo "<td>" . "投标中" . "</td>";
    elseif($res2->Infos[0]->Status==3)
        echo "<td>" . "借款成功" . "</td>";
    elseif($res2->Infos[0]->Status==4)
        echo "<td>" . "审核失败" . "</td>";
    elseif($res2->Infos[0]->Status==5)
        echo "<td>" . "撤标" . "</td>";
    else
        echo "<td>" . "未知" . "</td>";
    echo "<td>" . count($res3->ListingBidsInfos[0]->Bids) . "</td>";

    echo "</tr>";
}


?>


