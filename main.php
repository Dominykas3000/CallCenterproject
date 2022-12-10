<?php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


if (isset($_REQUEST['num'])) {
    $to_number = $_REQUEST["num"];
} else echo "tavo mama skambino";

$plus = "+";
$to_number = $plus.$to_number;
echo "$to_number\r\n";

$lines = file('/var/www/html/twillio.txt', FILE_IGNORE_NEW_LINES);
list($account_sid, $auth_token, $twilio_number) = $lines;
echo $account_sid;
echo $auth_token;
echo $twilio_number;

try {
        echo "bandymas\n";
        $client = new Client($account_sid, $auth_token);
        echo "acc skurtas";
        echo $client;
        $client->calls->create(
                $to_number,
                $twilio_number,
                [
                    "twiml" => "<Response><Say>Hello plz worky ?</Say></Response>"
                ]
        );
        echo "po client";
} catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo $account_sid;
echo $auth_token;
echo $twilio_number;
echo $to_number;
?>
