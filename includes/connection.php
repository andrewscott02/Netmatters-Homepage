<?php

$env = parse_ini_file('.env');

$connection = $env["DB_CONNECTION"];
$host = $env["DB_HOST"];
$port = $env["DB_PORT"];
$database = $env["DB_DATABASE"];
$user = $env["DB_USER"];
$pass = $env["DB_PASS"];

// $db = new mysqli("localhost", $user, $pass, $database) or die("Unable to connect");



try
{
    $db = new PDO($connection . ":host=" . $host . ';port=' . $port, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo "Unable to connect to database";
    echo $e->getMessage(); //Calls the getMessage function on the exception object
    exit;
}