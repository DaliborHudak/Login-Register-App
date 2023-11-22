<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_server = "localhost:3306";
$db_user = "root";
$db_pass = "password";
$db_name = "customprojectdb";
$conn = "";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

// only uncomment for testing purposes

/* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully"; */

?>
