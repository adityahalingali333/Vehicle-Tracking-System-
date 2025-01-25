<?php
// Database connection
include 'connect.php';

// Retrieve parameters from the GET request
$busName = $_GET['busName'];
$busNumber = $_GET['busNumber'];
$time = $_GET['time'];

// Create connection

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Prepare and execute SQL query to fetch stops for the selected bus name, bus number, and time
$stmt = $con->prepare("SELECT StopName FROM busschedule WHERE BusName = ? AND BusNumber = ? AND ArrivalTime = ?");
$stmt->bind_param("sis", $busName, $busNumber, $time);
$stmt->execute();
$result = $stmt->get_result();

// Fetch stops and store them in an array
$stops = array();
while ($row = $result->fetch_assoc()) {
    $stops[] = $row['StopName'];
}

// Close the prepared statement and database connection
$stmt->close();
$con->close();

// Return stops as JSON
echo json_encode($stops);
?>
