<?php

// Database credentials
$host = "localhost";
$user = "root";
$password = "";
$dbname = "belizebuscompanion";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

// Close connection
//mysqli_close($conn);

?>