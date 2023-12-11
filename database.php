<?php
// error reporting
/* error_reporting(E_ALL);
ini_set('display_errors', 1); */

// Načítaj konfiguračné údaje
// Load config
include('config.php');

$conn = new mysqli($config['db_server'], $config['db_user'], $config['db_pass'], $config['db_name']);

// odkomentuj len na testovacie účely pre pripojenie do db
// only uncomment for connection testing purposes

/* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully"; */

?>
