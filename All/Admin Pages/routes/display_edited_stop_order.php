<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edited Stop Orders</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }
    h2 {
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    li {
        margin-bottom: 10px;
        padding: 12px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    li:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    li::before {
        content: "\2022";
        color: #007bff;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
</style>
</head>
<body>
    <h2>Edited Stop Orders</h2>
    <?php
    // Database connection
    include 'connect.php';

    // Array to hold bus names
    $busNames = array("Varadha", "Krishna", "Kaveri", "Tunga", "Sharavathi", "Varahi", "Netravathi", "Bhadra", "Bhima", "Kabini", "Hemavathi", "Godavari");

    // Loop through each bus name and retrieve its edited stop order
    foreach ($busNames as $busName) {
        // Query to retrieve edited stop order for the current bus name
        $sql = "SELECT * FROM editedbusstops WHERE BusName = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $busName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<h3>Stop Order for Bus Number {$row['BusNumber']} ({$row['BusName']}) at {$row['Time']}</h3>";
                echo "<ul>";
                $stops = explode(', ', $row['EditedStopOrder']);
                foreach ($stops as $stop) {
                    echo "<li>$stop</li>";
                }
                echo "</ul>";
            }
        } else {
            echo "<p>No edited stop order found for $busName.</p>";
        }
    }
    // Close connection
    $con->close();
    ?>
</body>
</html>
