<?php #getLocation.php

include_once("Zend/Http/Client.php");

$client = new Zend_Http_Client();
$client->setUri('http://www.instamapper.com/api');
$client->setConfig(array(
    'maxredirects' => 0,
    'timeout'      => 30));

$client->setParameterGet(array(
	'action'	=>	'getPositions',
	'key'		=>	'8173994452511214612'
));

if (isset($_GET['num'])) 
	$client->setParameterGet('num',$_GET['num']);
if (isset($_GET['from'])) {
	$client->setParameterGet('from_ts',$_GET['from']);
	$client->setParameterGet('num','1000');
}

$response = $client->request();

if ($response->isSuccessful()) {
	echo $response->getBody();
} else {
	echo "You're fucked.";
}
?>