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
	'advertiser_id' => '321',
	'targeting_name' => 321,
	'description' => 321,
	'targeting_setting' => 321,
	'outer_targeting_id' => 321,
	'targeting_setting' => 321,
	'targeting_setting' => 321,



);

//$response = $spa->get('/advertiser/read?advertiser_id=123');

//$req = $spa->sendRequest('post', '/mod/asdf/act//?qweqwe', $params);

//var_dump($req);

//var_dump($response->getHttpStatusCode());

$modules = $spa->getModules();


$response = $modules->targeting->create->send($params);
var_dump($response);
//var_dump($modules::ADVERTISER);

//var_dump($spa->getClient()->getBaseUrl());

//var_dump($req->getUrl());
//var_dump($test);
//var_dump($test->getAccessToken()->getValue());



//end of script
