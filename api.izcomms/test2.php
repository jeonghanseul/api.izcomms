<?
header("Content-Type: text/html; charset=UTF-8");

$ch = curl_init();
$url = 'http://apis.data.go.kr/1130000/MllInfoService/getMllCmpNmInfo'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=4rK3pfrFk0uDLW0wscGvBivYPbeoL7cC2FPVZ5C6dL2yfFNBEOp8sj8kvd1koi%2FslxJOhGM5Qgc13Wuqa5eAjg%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('bupNm') . '=' . urlencode('네이버'); /*상호*/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);

// var_dump($response);

$object = simplexml_load_string($response);
curl_close($ch);

// $items = $object['header']['resultMsg'];
$totalCount = $object->body->totalCount;
$items= $object->body->items->item;

foreach ($items as $items){
	$bupNm = $items->bupNm;
	$dmnNm= $items->dmnNm;
	$seq= $items->seq;
	
	echo "=================================================================<br />";
	echo $bupNm."<br />";
	echo $dmnNm."<br />";
	echo $seq."<br />";
	
	$tel_ch = curl_init();
	$tel_url = 'http://apis.data.go.kr/1130000/MllInfoService/getMllInfoDetail'; /*URL*/
	$tel_queryParams = '?' . urlencode('ServiceKey') . '=4rK3pfrFk0uDLW0wscGvBivYPbeoL7cC2FPVZ5C6dL2yfFNBEOp8sj8kvd1koi%2FslxJOhGM5Qgc13Wuqa5eAjg%3D%3D'; /*Service Key*/
	$tel_queryParams .= '&' . urlencode('seq') . '=' . $seq; /*상호*/
	
// 	echo $tel_url.$tel_queryParams."<br />";
	curl_setopt($tel_ch, CURLOPT_URL, $tel_url . $tel_queryParams);
	curl_setopt($tel_ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($tel_ch, CURLOPT_HEADER, FALSE);
	curl_setopt($tel_ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$tel_response = curl_exec($tel_ch);
	
	$tel_object = simplexml_load_string($tel_response);
	curl_close($tel_ch);
	
	$telNo = $tel_object->body->items->item->repTelno;
	
	echo $telNo."<br />";
	echo "=================================================================<br />";
}

// echo " ddddd : ".$items;

// print_r($object);

?>