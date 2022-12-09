<?php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


if (isset($_REQUEST['num'])) {
    $to_number = $_REQUEST["num"];
}

$plus = "+";
$to_number = $plus.$to_number;
echo "$to_number\r\n";

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACf06bd2e866a6e35ecbb8f5de41dd3dd0';
$auth_token = '1c0581c52aaa4d67c2239c196e7edf30';

$twilio_number = "+13854583767";
try {
        echo "bandymas\n";
        $client = new Client($account_sid, $auth_token);
        echo "acc skurtas";
        echo $client;
        $client->calls->create(
                $to_number,
                $twilio_number,
                [
                    "twiml" => "<Response><Say>Ahoy, World! I don't know if im gonna pass this course but i'll sure hope i do, i hope those all nighters will pay themselves off</Say></Response>"
                ]
        );
        echo "po client";
} catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>