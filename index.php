<?php
header("Access-Control-Allow-Origin: *");
if(isset($_GET["symbol"]))
{
    $lookUpURL1="http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=".$_GET["symbol"];
    $jsonFile1 = file_get_contents($lookUpURL1);
    echo $jsonFile1 ;
}
if(isset($_GET["formalsymbol"]))
{
    $lookUpURL3="http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=".$_GET["formalsymbol"];
    $jsonFile3 = file_get_contents($lookUpURL3);
    echo $jsonFile3 ;
}
if(isset($_GET["highchart"]))
{
    $lookUpURL2="http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters=".$_GET["highchart"];
    $jsonFile2 = file_get_contents($lookUpURL2);
    echo $jsonFile2 ;
}

if (isset($_GET['news'])) 
{
    // Replace this value with your account key
    $accountKey = 'j5TXfOhAVMcOM5zui9fGIA5ycFQAEbPJpvX0d3D5gGU';            
    $context = stream_context_create(array(
                'http' => array(
                'request_fulluri' => true,
                'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
                )
    ));
    $request = "https://api.datamarket.azure.com/Bing/Search/v1/News?Query=%27".urlencode('\''.$_GET['news'].'\'')."%27&"."$"."format"."=json";             
    $response = file_get_contents($request, 0, $context);
    echo $response;
} 

?>