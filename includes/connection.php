<?php

$env = parse_ini_file('.env');

$connection = $env["DB_CONNECTION"];
$host = $env["DB_HOST"];
$port = $env["DB_PORT"];
$database = $env["DB_DATABASE"];
$user = $env["DB_USER"];
$pass = $env["DB_PASS"];

// $db = new mysqli("localhost", $user, $pass, $database) or die("Unable to connect");

function DebugDBValues($dsn, $user, $pass)
{
    //Should be mysql:host=127.0.0.1;dbname=netmatters_database;port=3306
    echo "DSN=" . $dsn . "/end";
    echo "\nUSER=" . $user . "/end";
    echo "\nPASS=" . $pass . "/end";
}

try
{
    $dsn = $connection . ":host=" . $host . ';dbname=' . $database . ';port=' . $port;
    // DebugDBValues($dsn, $user, $pass);
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo "Unable to connect to database";
    echo $e->getMessage(); //Calls the getMessage function on the exception object
    exit;
}