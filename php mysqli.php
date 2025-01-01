<?php

$server = "localhost";
$dbName = "f_project";
$userName = "root";
$dbPass = "";

$db = new mysqli($server, $userName, $dbPass, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

echo "Connection successful";

?>
