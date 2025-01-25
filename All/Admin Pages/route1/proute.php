<?php
// Database connection code here
include 'connect.php';

// Initialize variables to store selected stop and time
$selectedStop = '';
$selectedTime = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected stop and time
    $selectedStop = $_POST["stop"];
    $selectedTime = $_POST["time"];

    // Fetch list of buses for the selected stop and time
    $sql = "SELECT BusNumber, BusName FROM BusSchedule WHERE StopName = ? AND ArrivalTime = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $selectedStop, $selectedTime);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any buses are found
    if ($result->num_rows > 0) {
        // Output the list of buses
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>List of Buses</title>";
        echo "<style>";
        echo "body {";
        echo "    font-family: Arial, sans-serif;";
        echo "    background-color: #f4f4f4;";
        echo "}";
        echo "table {";
        echo "    width: 80%;";
        echo "    border-collapse: collapse;";
        echo "    margin: 20px auto;"; // Center align the table
        echo "    border-radius: 10px;";
        echo "    overflow: hidden;";
        echo "    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);";
        echo "}";
        echo "th, td {";
        echo "    padding: 12px;";
        echo "    text-align: left;";
        echo "    border-bottom: 1px solid #ddd;";
        echo "}";
        echo "th {";
        echo "    background: linear-gradient(to right, #667eea, #764ba2);";
        echo "    color: white;";
        echo "}";
        echo "tr:nth-child(even) {";
        echo "    background-color: #f2f2f2;";
        echo "}";
        echo "tr:hover {";
        echo "    background-color: #ddd;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<h2 style='text-align: center;'>List of Buses at $selectedStop ($selectedTime)</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Bus Number</th>";
        echo "<th>Bus Name</th>";
        echo "<th>Route Link</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            // Display bus details
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['BusNumber']) . "</td>";
            echo "<td>" . htmlspecialchars($row['BusName']) . "</td>";
            
            // Conditional statement to display route link
            if ($row['BusName'] == "Varadha") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            } else if ($row['BusName'] == "Krishna") {
                echo "<td><p><a href='../../map/map2.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Kaveri") {
                echo "<td><p><a href='../../map/map2.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Tunga") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Sharavathi") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Varahi") {
                echo "<td><p><a href='../../map/map2.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Netravathi") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Bhadra") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Bhima") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Kabini") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }else if ($row['BusName'] == "Godavari") {
                echo "<td><p><a href='../../map/map1.html'>Click here to view the bus location</a></p></td>";
            }

            
            echo "</tr>";
        }
        echo "</table>";
        echo "</body>";
        echo "</html>";
    } else {
        // No buses found for the selected stop and time
        echo "<p>No buses found for $selectedStop at $selectedTime.</p>";
    }
} else {
    // Redirect back to the form page if accessed directly without form submission
    //header("Location: select_stop.php");
    exit;
}
?>
