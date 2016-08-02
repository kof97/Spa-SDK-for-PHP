<?php 

require_once __DIR__ . '/../src/Spa/autoload.php';

use Spa\Object\Enum\Account\CheckPaipaiWhiteListEnum;

var_dump(PHP_VERSION);

$conf = array(
	'uid'				=> 'false',
	'appid'				=> 'false',
	'appkey'			=> 'false',
	'http_client_type'	=> '',
	'version'			=> 'v3'
);

$spa = new Spa\Spa($conf);


$test = $spa->getApp();

$params = array(
	'advertiser_id' => '10',
	'adgroup_id' => '922311112',
	'campaign_id' => 321,
	'adgroup_name' => 321,
	'targeting_id' => 321,
	'configured_status' => 321,
	'bid_type' => 321,
	'bid_amount' => 321,
	'product_type' => 'PRODUCT_TYPE_APP_IOS',
	'destination_url' => 'https://www.google.com.hk/search?newwindow=1&safe=strict&q=php+%E5%8C%B9%E9%85%8Durl&oq=php+%E5%8C%B9%E9%85%8D&gs_l=serp.3.5.0l6.7573.11290.0.14336.14.12.0.0.0.0.143.1022.9j3.12.0....0...1c.1j4.64.serp..3.11.960...0i12.eF-ARseu1QY',
	'image_url' => 321,
	'outer_version' => 4654,



);

//$response = $spa->get('/advertiser/read?advertiser_id=123');

//$req = $spa->sendRequest('post', '/mod/asdf/act//?qweqwe', $params);

//var_dump($req);

//var_dump($response->getHttpStatusCode());

$modules = $spa->getModules();


$response = $modules->adgroup->sync->send($params);
//$res = $modules->image->create_by_url->send($params);
var_dump($response);
//var_dump($modules::ADVERTISER);

//var_dump($spa->getClient()->getBaseUrl());

//var_dump($req->getUrl());
//var_dump($test);
//var_dump($test->getAccessToken()->getValue());



//end of script
