<?php
include 'connect.php';

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $busNumber = $_POST['bus_number'];
    $busName = $_POST['bus_name'];
    $stopName = $_POST['stop_name'];
    $arrivalTime = $_POST['arrival_time'];

    // Insert data into the database
    $insertSql = "INSERT INTO `busschedule` (`BusNumber`, `BusName`, `StopName`, `ArrivalTime`) 
                  VALUES ('$busNumber', '$busName', '$stopName', '$arrivalTime')";

    $insertResult = mysqli_query($con, $insertSql);

    // Check if insertion was successful
    if ($insertResult) {
        header('Location: display_bus_route.php');
        exit;
    } else {
        echo "Error inserting bus entry: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Add Bus Entry</h2>
        <form method="post">
            <div class="mb-3">
                <label for="bus_number" class="form-label">Bus Number</label>
                <input type="text" class="form-control" id="bus_number" name="bus_number">
            </div>
            <div class="mb-3">
                <label for="bus_name" class="form-label">Bus Name</label>
                <input type="text" class="form-control" id="bus_name" name="bus_name">
            </div>
            <div class="mb-3">
                <label for="stop_name" class="form-label">Stop Name</label>
                <input type="text" class="form-control" id="stop_name" name="stop_name">
            </div>
            <div class="mb-3">
                <label for="arrival_time" class="form-label">Arrival Time</label>
                <input type="time" class="form-control" id="arrival_time" name="arrival_time">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Bus Entry</button>
        </form>
    </div>
</body>

</html>
