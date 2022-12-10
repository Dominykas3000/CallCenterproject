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
list($account_sid, $auth_token, $twilio_number, $privip, $dbname, $dbuser, $passwd) = $lines;
echo $account_sid;
echo $auth_token;
echo $twilio_number;
echo $privip;
echo $dbname;
echo $dbuser;
echo $passwd;
try {
        echo "bandymas\n";
        $client = new Client($account_sid, $auth_token);
        echo "Account created \n";
        echo $client;
        $client->calls->create(
                $to_number,
                $twilio_number,
                [
                    "twiml" => "<Response><Say>Hello plz worky ?</Say></Response>"
                ]
        );
        echo "after the client was created ";
} catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo $account_sid;
echo $auth_token;
echo $twilio_number;
echo $to_number;

$connstring = "host=$privip port=5432 dbname=$dbname user=$dbuser password=$passwd";
$conn = pg_connect($connstring);
if (!$conn) { //checking if the connection is established
    echo "Error:( Web servers is not connected to the main frame.\n";
    exit;
}

echo "MainFrame hacked.\n";

$data = array(
    "phone_number" => $to_number,
    "started_at" => $time
);

// Main frame the data into the database
$result = pg_insert($conn, "CallLog", $data);

// Check if the main frame operation was successful
if ($result) {
    echo "The call information was successfully main framed into the database.\n";
} else {
    echo "Error: The call information could not be main framed into the database.\n";
}
?>