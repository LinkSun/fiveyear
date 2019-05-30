<?php
/**
 * Created by PhpStorm.
 * User: HeXiangHui
 * Date: 2017/12/6
 * Time: 18:19
 */


$customer_id = !empty($_GET['customer_id']) ? $_GET['customer_id'] : '1002851186';

define('ENV', 'dev');
if (ENV == 'local') {
    // 本地
    $app_id = 'SAKLJkdhbsajfbsdfeasd';
    $secret = 'hup7myUNeG2VXf5BUY69AKvxIFS3DSdSBjAqnXdO';
    $redirect_uri = '';
    $url = 'http://oauth2.newcolourlife.pw/';
} else if (ENV == 'dev') {
    // 测试
    $app_id = 'ICESMJHZF-548C-JQXE-EN8Q-5E1IFBN57PDL';
//    $app_id = 'ICECZY00-F26F-42B8-988C-27F4AEE3292A';
    $secret = 'IISCk25XrEpnbPoyBeen';
//    $secret = 'LkbMwVxeDIsN3nIaExIq';
    $redirect_uri = 'https://scanpay-backyardtest.colourlife.com';
//    $redirect_uri = 'http://efees.test.colourlife.com';
    $url = 'http://oauth2-czytest.colourlife.com/';
} else if(ENV == 'beta') {
    // 预发
    $app_id = 'SAKLJkdhbsajfbsdfeasd';
    $secret = 'hup7myUNeG2VXf5BUY69AKvxIFS3DSdSBjAqnXdO';
    $redirect_uri = 'http://efees.czybeta.colourlife.com';
    $url = 'http://oauth2czy-czybeta.colourlife.com/';
} else {
    // 正式
    $app_id = 'ICESMJHZF-HNK8-EVBX-OVEN-QFYR9NX2FAMJ';//'ICEEZX00-689C-455A-B614-FCD341A94B05';
    $secret = 'inSbXJJbctpn3sgcNZmP';//'rrfzlH6ae4aK8QMWBojU';
    $redirect_uri = 'https://scanpay-backyard.colourlife.com';//'http://zxb.ezxvip.com';
    $url = 'http://oauth2czy.colourlife.com/';
}
echo $redirect_uri . PHP_EOL;

//$interface = 'oauth2/authorize';
//$interface = 'oauth2/need/authorize';

$ts = time();

$data = [
    'user_id' => $customer_id,
    'application_id' => $app_id,
    'redirect_uri' => $redirect_uri,
    'response_type' => 'code',
    'scope' => '[]',
    'state' => 'colourLife',
    'device_uuid' => '588',
    'ts' => $ts,
];

$data['sign'] = md5($data['user_id'].$data['device_uuid'].$data['ts'].'colourlife');
$interface = 'oauth/code';
$content = json_decode(file_get_contents($url . $interface . '?' . http_build_query($data)), true);

echo $interface . ' 请求地址：' . $url . $interface . '?' . http_build_query($data);
echo '<br/>' . $interface . ' 请求结果：';
debug($content);
//exit;


echo '<br/>---------------------<br/>';

parse_str(parse_url($content['content']['redirect_uri'])['query'], $query_data);
$data = [
    'application_id' => $data['application_id'],
    'secret' => $secret,
    'grant_type' => 'authorization_code',
    'code' => $query_data['code'],
];

$interface = 'oauth/access_token';
$content = json_decode(file_get_contents($url . $interface . '?' . http_build_query($data)), true);

echo $interface . ' 请求地址：' . $url . $interface . '?' . http_build_query($data);
echo '<br/>' . $interface . ' 请求结果：';
echo PHP_EOL . json_encode($content);
debug($content);

echo '<br/>---------------------<br/>';

$data = [
    'access_token' => $content['content']['access_token'],
];

$interface = 'oauth/user/info';
$content = json_decode(file_get_contents($url . $interface . '?' . http_build_query($data)), true);

echo $interface . ' 请求地址：' . $url . $interface . '?' . http_build_query($data);
echo '<br/>' . $interface . ' 请求结果：';
debug($content);

function debug ($content) {
    var_dump($content);
}


