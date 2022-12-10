<?php

$lines = file('data.txt', FILE_IGNORE_NEW_LINES);
list($account_sid, $auth_token, $twilio_number, $privip, $dbname, $dbuser, $passwd) = $lines;


$connstring = "host=$privip port=5432 dbname=$dbname user=$dbuser password=$passwd";
$conn = pg_connect($connstring);

if (!$conn) {
   die('Connection failed: ' . pg_last_error());
}

$query = 'SELECT * FROM callas';
$result = pg_query($conn, $query);

if ($result) {
  while ($row = pg_fetch_assoc($result)) {
    echo "<p>from:{$row["call_number"]} on:{$row["call_time"]}</p>";
  }
} else {
  echo "Error: " . pg_last_error($conn);
}


?>