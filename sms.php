<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$spaceUrl = "example.signalwire.com";
$projectID = "ProjectID Here";
$authToken = "Auth Token Here";

$base64 = base64_encode("$projectID:$authToken");

$client = new Client();
$headers = [
    'Content-Type' => 'application/x-www-form-urlencoded',
    'Authorization' => "Basic $base64"
];
$options = [
    'form_params' => [
        'From' => '+1XXXXXXXXXX',
        'To' => '+1YYYYYYYYYY',
        'Body' => 'Hello from SignalWire!',
        'MediaUrl' => "https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
    ]];
$request = new Request('POST', "https://$spaceUrl/api/laml/2010-04-01/Accounts/$projectID/Messages", $headers);
$res = $client->sendAsync($request, $options)->wait();
echo $res->getBody();
