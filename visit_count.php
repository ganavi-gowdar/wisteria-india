<?php

// Database configuration
$servername = "localhost";
$username = "gpcfindi_naturecount";
$password = "Oogway@12345";
$dbname = "gpcfindi_naturecount";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the visitor's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Check if the IP address is already in the database
$sql = "SELECT id FROM visitor WHERE ip_address = '$ip_address'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // If the IP address is not in the database, insert it
    $insert_sql = "INSERT INTO visitor (ip_address) VALUES ('$ip_address')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "New visit recorded.";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
} else {
    echo "Welcome back!";
}

// Count the total number of unique visits
$count_sql = "SELECT COUNT(DISTINCT ip_address) AS unique_visitor FROM visitor";
$count_result = $conn->query($count_sql);
$row = $count_result->fetch_assoc();
$unique_visitor = $row['unique_visitor'];

echo "<br>Impressions : " . $unique_visitor;

// Close the connection
$conn->close();
?>