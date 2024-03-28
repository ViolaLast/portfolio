<?php
$envFilePath = '.env';
if (!file_exists($envFilePath)) {
    die("Error: .env file not found");
}

$env = parse_ini_file($envFilePath);
if (!$env) {
    die("Error: Unable to parse .env file");
}

// Access the database credentials
$dbHost = $env["DB_HOST"] ?? '';
$dbUser = $env["DB_USER"] ?? '';
$dbPassword = $env["DB_PASSWORD"] ?? '';
$dbName = $env["DB_NAME"] ?? '';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

