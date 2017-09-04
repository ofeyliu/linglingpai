<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

include 'PHP/openapi_client.php';

$creditcode = isset($_GET['creditcode'])? htmlspecialchars($_GET['creditcode']) : '';
$amount = isset($_GET['amount'])? htmlspecialchars($_GET['amount']) : '';
$rate = isset($_GET['rate'])? htmlspecialchars($_GET['rate']) : '';
$months = isset($_GET['months'])? htmlspecialchars($_GET['months']) : '';
// $creditcode = $_GET['creditcode'];
// $amount = $_GET['amount'];
// $rate=$_GET['rate'];
// $months=$_GET['months'];


$url = "http://gw.open.ppdai.com/invest/LLoanInfoService/LoanList";
$request = '{
  "PageIndex": 1, 
  "StartDateTime": "2016-07-01 12:00:00.000"
}';

$data="";
$data = send($url, $request);

$obj=json_decode($data);
$outp = "";
$count=0;
$outp=array();
foreach($obj->LoanInfos as $rs) 
{
    if(!empty($creditcode))
    {
        if($creditcode==1 and $rs->CreditCode >= 'B')
            continue;  
        if($creditcode==2 and ($rs->CreditCode < 'B' or $rs->CreditCode > 'C'))
            continue;
        if($creditcode==3 and $rs->CreditCode < 'D')
            continue;

    }

    if(!empty($rate))
    {
        if($rate==1 and $rs->Rate > 13)
            continue;
        elseif ($rate==2 and ($rs->Rate <=13 or $rs->Rate>21))
            continue;
        elseif ($rate==3 and $rs->Rate<22)
            continue;
    }
    if(!empty($months))
    {
        if ($months==1 and $rs->Months > 6)
            continue;
        elseif ($months==2 and ($rs->Months<= 6 or $rs->Months>=12))
            continue;
        elseif ($months==3 and $rs->Months !=12)
            continue;
        elseif($months==4 and $rs->Months<=12)
            continue;
    }

    $remainPercent=($rs->RemainFunding/$rs->Amount)*100%100;

    if(!empty($amount))
    {
        if ($amount==1 and $remainPercent > 20)
            continue;
        elseif ($amount==2 and ($remainPercent<= 20 or $remainPercent>40))
            continue;
        elseif ($amount==3 and ($remainPercent<= 40 or $remainPercent>70))
            continue;
        elseif($amount==4 and $remainPercent<70)
            continue;
    }


    $temp=array();
    
    $str=(string)$remainPercent . "%";
    array_push($temp,$rs->ListingId);
    array_push($temp,$rs->Title);
    array_push($temp,$rs->CreditCode);
    array_push($temp,$rs->Amount);
    array_push($temp,$rs->Rate);
    array_push($temp,$rs->Months);
    array_push($temp,$rs->RemainFunding);
    array_push($temp,$str);
    array_push($outp,$temp);
}


//$outp ='{"data":['.$outp.']}';
$outp =array('data'=>$outp);

$outp = json_encode($outp,JSON_UNESCAPED_UNICODE);

echo($outp);

?>