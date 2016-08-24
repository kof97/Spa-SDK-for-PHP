<?php 

require_once __DIR__ . '/../src/Tsa/autoload.php';

use Tsa\Object\Enum\SuperReport\SelectAdgroupDailyEnum;

// var_dump(PHP_VERSION);

// $conf = array(
//     'uid'               => 'false',
//     'appid'             => 'false',
//     'appkey'            => 'false',
//     'http_client_type'  => '',
//     'version'           => 'v3'
// );

// $tsa = new Tsa\Tsa($conf);


// $test = $tsa->getApp();

// $params = array(
//     'advertiser_id' => '10',
//     SelectAdgroupDailyEnum::DATE_RANGE => '{"start_date":"2016-12-11","end_date": "2016-12-19"}',
//     'targeting_name' => 321,
//     'description' => 321,
//     'advertiser_id' => 321,
//     'filter' => array('{"field":"end_date","operator": "2016-12-19","value":"1"}'),
//     'bid_type' => 321,
//     'bid_amount' => 321,
//     'begin_date' => '2016-12-11',
//     'end_date' => '2016-12-11',
//     'site_set' => array(),
//     'product_type' => 'PRODUCT_TYPE_QZONE_PAGE_ARTICLE',
//     'ui_visibility' => 4654,



// );

// //$response = $tsa->get('/advertiser/read?advertiser_id=123');

// //$req = $tsa->sendRequest('post', '/mod/asdf/act//?qweqwe', $params);

// //var_dump($req);

// //var_dump($response->getHttpStatusCode());

// $modules = $tsa->getModules();


// $response = $modules->targeting->create->send($params, array(), 'qweqweqwe');
// //$res = $modules->image->create_by_url->send($params);
// //var_dump($response);
//var_dump($modules::ADVERTISER);

//var_dump($tsa->getClient()->getBaseUrl());

//var_dump($req->getUrl());
//var_dump($test);
//var_dump($test->getAccessToken()->getValue());
//
//$params = array(
//    'advertiser_id' => '123',
//);
//$headers = array(
//    'Authorization' => 'Bearer ',
//);
//$conf = array('appid' => 'appid', 'appkey' => 'appkey');
//$tsa = new Tsa\Tsa($conf);
//
//var_dump($tsa->getVersion());
//
//$modules = $tsa->getModules();
//try {
//    $response = $modules->advertiser->read->sendWithAccessToken($params, $headers, 'Bearer ');
//} catch (Exception $e) {
//    echo $e->getMessage();
//}
//
//var_dump($response);


use Tsa\Object\Enum\Advertiser\SignupEnum;

$params = array(
    SignupEnum::LOGIN_NAME => '',
    SignupEnum::ADVERTISER_NAME => '',
    SignupEnum::CORPORATION_NAME => '',
    SignupEnum::ADDRESS => '',
);










var_dump($params);


//end of script
