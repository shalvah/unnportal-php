<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$ch = curl_init();

$cookieFile="cookie.txt";
$userAgent="Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36";

$siteUrl="http://unnportal.unn.edu.ng/";
$loginUrl="http://unnportal.unn.edu.ng/landing.aspx";

$f=fopen("log.txt", "w");

$username='2013/188435';
$password='ask010297';

curl_setopt($ch, CURLOPT_URL, $siteUrl);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$result = curl_exec($ch);

$state=htmlExtractValue($result, "__VIEWSTATE");
$validation=htmlExtractValue($result, "__EVENTVALIDATION");

$postfields = array(
	'__EVENTVALIDATION' => $validation, 
	'__EVENTARGUMENT' => "",
	'__EVENTTARGET' => "",
	'__VIEWSTATE' => $state,
	'inputUsername' => $username,
	'inputPassword' => $password,
	'login' => 'Login');

curl_setopt($ch, CURLOPT_REFERER, $siteUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Cookie: ssupp.vid=xymHWCFyyHPP5CYxu6XQhRofqpViWemRrK51250910122016',
	'Origin: http://unnportal.unn.edu.ng',
'Upgrade-Insecure-Requests: 1',
'Accept-Encoding: gzip, deflate',
'Accept-Language: en-US,en;q=0.8'));
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_STDERR, $f);

curl_setopt($ch, CURLOPT_URL, $loginUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));

$result=curl_exec($ch);

echo $result;

function htmlExtractValue($htmlString, $value)
{
    $str=stristr($htmlString, "id=\"$value\" value=\"");
    $vals=explode('value="', $str);
    return stristr($vals[1], '"', true);
}
