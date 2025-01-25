<?php
include 'connect.php';

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $routeName = $_POST['route_name'];
    $startPoint = $_POST['start_point'];
    $endPoint = $_POST['end_point'];
    $stopName = $_POST['stop_name'];
    $description = $_POST['description'];

    // Insert data into the database
    $insertSql = "INSERT INTO `routes` (`RouteName`, `StartPoint`, `EndPoint`, `StopName`, `Description`) VALUES ('$routeName', '$startPoint', '$endPoint', '$stopName', '$description')";

    $insertResult = mysqli_query($con, $insertSql);

    // Check if insertion was successful
    if ($insertResult) {
        header('Location: display.php');
        exit;
    } else {
        echo "Error inserting route: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Route</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Add Route</h2>
        <form method="post">
            <div class="mb-3">
                <label for="route_name" class="form-label">Route Name</label>
                <input type="text" class="form-control" id="route_name" name="route_name">
            </div>
            <div class="mb-3">
                <label for="start_point" class="form-label">Start Point</label>
                <input type="text" class="form-control" id="start_point" name="start_point">
            </div>
            <div class="mb-3">
                <label for="end_point" class="form-label">End Point</label>
                <input type="text" class="form-control" id="end_point" name="end_point">
            </div>
            <div class="mb-3">
                <label for="stop_name" class="form-label">Stop Name</label>
                <input type="text" class="form-control" id="stop_name" name="stop_name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Route</button>
        </form>
    </div>
</body>

</html>
