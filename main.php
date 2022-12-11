<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
if (isset($_REQUEST['num'])) {
    $to_number = $_REQUEST["num"];
} else echo "number requested denied \n";
$plus = "+";
$to_number = $plus.$to_number;
echo "$to_number\r\n";

$lines = file('/var/www/html/data.txt', FILE_IGNORE_NEW_LINES);
list($account_sid, $auth_token, $twilio_number, $privateip, $databasename,  $databaseuser, $password) = $lines;
echo $account_sid;
echo $auth_token;
echo $twilio_number;

try {
        echo "Trying to creat a client\n";
        $client = new Client($account_sid, $auth_token);
            echo "Account created \n";
        echo $client;
        $client->calls->create(
                $to_number,
                $twilio_number,
                [
                     "twiml" => "<Response><Say>Hello im calling from microsoft your computer has virus</Say></Response>"
                ]
        );
            echo "after the client was created \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo $privateip;
echo $databasename;
echo $databaseuser;
echo $password;

$connectionstring = "host=$privateip port=5432 dbname=$databasename user=$databaseuser password=$password";
$connection = pg_connect($connectionstring);
if ($connection) { //checking if the connection is established
    echo "MainFrame hacked we are in..\n";
} else echo "Error:( Web servers is not connected to the main frame.\n";


$data = array(
    "phone_number" => $to_number,
    "started_at" => $time
);

// Main frame the data into the database
$result = pg_insert($connection, "CallLog", $data);

// Check if the main frame operation was successful
if ($result) {
    echo "The call information was successfully main framed into the database.\n";
} else {
    echo "Error: The call information could not be main framed into the database.\n";
}
?>
