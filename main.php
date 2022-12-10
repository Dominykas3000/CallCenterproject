<?php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


if (isset($_REQUEST['num'])) {
    $to_number = $_REQUEST["num"];
}

$plus = "+";
$to_number = $plus.$to_number;
echo "$to_number\r\n";

$lines = file('/var/www/html/twillio.txt', FILE_IGNORE_NEW_LINES);
list($account_sid, $auth_token, $twilio_number) = $lines;
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