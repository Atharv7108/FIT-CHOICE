<?php
$servername = "localhost";
$username = "root";
$password = "India@11"; // Replace with your MySQL password
$dbname = "db_fitChoice";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
