<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "results";

// Create connection korsi
$conn = new mysqli($servername, $username, $password, $db);

// Check connection kora akhane
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>