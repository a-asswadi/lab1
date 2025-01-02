<?php

$server = "localhost";
$dbName = "f_project";
$userName = "root";
$dbPass = "";
$dbType = "mysql";

try {
    $dsn = "$dbType:host=$server;dbname=$dbName";
    $pdo = new PDO($dsn, $userName, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "ok";
} catch (Exception $e) {
    echo "فشل الاتصال بقاعدة البيانات " . $e->getMessage();
}

?>
