<?php
$servername = "localhost";
$username = "root";
$password = NULL
$mysql_db = "movies";
$error = "error";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

@mysql_select_db($mysql_db) or die($error);
?>