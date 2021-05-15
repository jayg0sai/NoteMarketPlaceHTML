<?php

$db['db_server'] = 'localhost';
$db['db_username'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'notemarket_place';

foreach($db as $key => $value) {
    define(strtoupper($key),$value);
}
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASS, DB_NAME);

if(!$connection) {
    echo "Not connected" . mysqli_error($connection);
}

?>