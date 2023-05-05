<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$spaceUrl = "example.signalwire.com";
$projectID = "Project ID here";
$authToken = "Auth Token Here";

$base64 = base64_encode("$projectID:$authToken");

$client = new Client();
$headers = [
    'Content-Type' => 'application/x-www-form-urlencoded',
    'Authorization' => "Basic $base64"
];
$options = [
    'form_params' => [
        'From' => '+1XXXXXXXXX',
        'To' => '+1YYYYYYYYY',
        'Body' => 'Hello from SignalWire!'
    ]];
$request = new Request('POST', "https://$spaceUrl/api/laml/2010-04-01/Accounts/$projectID/Messages", $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();
