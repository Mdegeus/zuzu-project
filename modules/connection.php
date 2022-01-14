<?php

$host = "localhost";
$dbname = "zuzu";
$password = "";
$root = "root";


try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname; password=$password;", $root);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}