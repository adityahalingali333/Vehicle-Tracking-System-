<?php
include 'connect.php';

// Check if update ID is provided in the URL
if (isset($_GET['updateid'])) {
    // Get the update ID from the URL
    $id = $_GET['updateid'];
    
    // Retrieve schedule details based on the update ID
    $sql = "SELECT * FROM `busschedule` WHERE `id` = $id";
    $result = mysqli_query($con, $sql);

    // Check if the schedule is found
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Assign schedule details to variables
        $busNumber = $row['BusNumber'];
        $busName = $row['BusName'];
        $stopName = $row['StopName'];
        $arrivalTime = $row['ArrivalTime'];

        // Check if form is submitted
        if (isset($_POST['submit'])) {
            // Retrieve updated schedule details from the form
            $updatedBusNumber = $_POST['bus_number'];
            $updatedBusName = $_POST['bus_name'];
            $updatedStopName = $_POST['stop_name'];
            $updatedArrivalTime = $_POST['arrival_time'];

            // Update schedule details in the database
            $updateSql = "UPDATE `busschedule` SET 
                `BusNumber` = '$updatedBusNumber',
                `BusName` = '$updatedBusName',
                `StopName` = '$updatedStopName',
                `ArrivalTime` = '$updatedArrivalTime'
                WHERE `id` = '$id'";

            $updateResult = mysqli_query($con, $updateSql);

            // Check if update was successful
            if ($updateResult) {
                header('Location: display_bus_route.php');
                exit;
            } else {
                echo "Error updating bus schedule: " . mysqli_error($con);
            }
        }
    } else {
        echo "No bus schedule found with the provided ID.";
        exit;
    }
} else {
    echo "Update ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 30px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        h2 {
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Bus Schedule</h2>
        <form method="post">
            <div class="mb-3">
                <label for="bus_number" class="form-label">Bus Number</label>
                <input type="text" class="form-control" id="bus_number" name="bus_number" value="<?php echo $busNumber; ?>">
            </div>
            <div class="mb-3">
                <label for="bus_name" class="form-label">Bus Name</label>
                <input type="text" class="form-control" id="bus_name" name="bus_name" value="<?php echo $busName; ?>">
            </div>
            <div class="mb-3">
                <label for="stop_name" class="form-label">Stop Name</label>
                <input type="text" class="form-control" id="stop_name" name="stop_name" value="<?php echo $stopName; ?>">
            </div>
            <div class="mb-3">
                <label for="arrival_time" class="form-label">Arrival Time</label>
                <input type="time" class="form-control" id="arrival_time" name="arrival_time" value="<?php echo $arrivalTime; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update Bus Schedule</button>
        </form>
    </div>
</body>

</html>

