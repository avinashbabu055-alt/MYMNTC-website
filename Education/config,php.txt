<?php
$host = "localhost";
$user = "root";      // DB username
$pass = "mntc12345";          // DB password
$db   = "mntc_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
