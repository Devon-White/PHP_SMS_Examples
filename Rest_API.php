<?php

require_once('vendor/autoload.php'); // Import the SignalWire SDK

use SignalWire\Rest\Client;


$ProjectID = "Project ID Here";
$Auth = "Auth Token Here";
$spaceName = "example.signalwire.com";

$SwNum = "Sw Number Here";
$DestinationNumber = "Destination Number Here";

// Your SignalWire account SID and auth token
$signalwire = new Client($ProjectID, $Auth, ['signalwireSpaceUrl' => $spaceName]);

// Send the SMS message
$message = $signalwire->messages->create(
    $DestinationNumber, // The phone number to send the SMS to
    [
        'from' => $SwNum, // Your SignalWire phone number
        'body' => 'Hello, this is a test message sent from PHP using the SignalWire client SDK!',
        'MediaUrl' => "https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
    ]
);

// Print the message SID to the console
echo 'Message SID: ' . $message->sid;

?>
