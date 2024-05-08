<?php
// Database connection details
$servername = "db";
$databasename = "sqli"; // Make sure this matches your actual database name
$username = "mysql";
$password = "root";

// Create a connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>