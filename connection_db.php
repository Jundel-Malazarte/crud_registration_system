<?php 
servername = "localhost";
username = "root";
password = "";
dbname = "registration.sql";

$conn = new mysqli(servername, username, password, dbname);

// Print connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>