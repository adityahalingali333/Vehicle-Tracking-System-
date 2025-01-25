<?php
// Database connection
include 'connect.php'; // Assuming the database connection is established here

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $busName = $_POST['busName'];
    $busNumber = $_POST['busNumber'];
    $time = $_POST['time'];
    $stopOrder = json_decode($_POST['stopOrder']);

    // Convert the stop order array back to a comma-separated string
    $editedStopOrder = implode(', ', $stopOrder);

    // Check if the data for the specific bus name, bus number, and time already exists in the database
    $checkQuery = $con->prepare("SELECT * FROM EditedBusStops WHERE BusName = ? AND BusNumber = ? AND Time = ?");
    $checkQuery->bind_param("sis", $busName, $busNumber, $time);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        // If data exists, update the stop order for the specific bus name, bus number, and time
        $stmt = $con->prepare("UPDATE EditedBusStops SET EditedStopOrder = ? WHERE BusName = ? AND BusNumber = ? AND Time = ?");
        $stmt->bind_param("ssss", $editedStopOrder, $busName, $busNumber, $time);
        $action = "Updated";
    } else {
        // If data does not exist, insert new data into the EditedBusStops table
        $stmt = $con->prepare("INSERT INTO EditedBusStops (BusName, BusNumber, Time, EditedStopOrder) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $busName, $busNumber, $time, $editedStopOrder);
        $action = "Inserted";
    }

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "$action successfully.";
    } else {
        echo "Error: " . $con->error;
    }

    // Close the prepared statement
    $stmt->close();
    // Close the check query
    $checkQuery->close();
    // Close the database connection
    $con->close();
} else {
    // If the request method is not POST, return an error
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
