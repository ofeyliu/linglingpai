<?php
include 'openapi_client.php';

$url = "http://gw.open.ppdai.com/invest/LLoanInfoService/BatchListingInfos";
$request = '{
  "ListingIds": [
    53411777, 
    53477675
  ]
}';
$result = send($url, $request);
echo $result;

?>