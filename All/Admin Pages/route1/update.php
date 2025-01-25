<?php
include 'connect.php';

// Check if update ID is provided in the URL
if (isset($_GET['updateid'])) {
    // Get the update ID from the URL
    $id = $_GET['updateid'];
    
    // Retrieve route details based on the update ID
    $sql = "SELECT * FROM `routes` WHERE `id` = $id";
    $result = mysqli_query($con, $sql);

    // Check if the route is found
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Assign route details to variables
        $routeName = $row['RouteName'];
        $startPoint = $row['StartPoint'];
        $endPoint = $row['EndPoint'];
        $stopName = $row['StopName'];
        $description = $row['Description'];

        // Check if form is submitted
        if (isset($_POST['submit'])) {
            // Retrieve updated route details from the form
            $updatedRouteName = $_POST['route_name'];
            $updatedStartPoint = $_POST['start_point'];
            $updatedEndPoint = $_POST['end_point'];
            $updatedStopName = $_POST['stop_name'];
            $updatedDescription = $_POST['description'];

            // Update route details in the database
            $updateSql = "UPDATE `routes` SET 
                `RouteName` = '$updatedRouteName',
                `StartPoint` = '$updatedStartPoint',
                `EndPoint` = '$updatedEndPoint',
                `StopName` = '$updatedStopName',
                `Description` = '$updatedDescription'
                WHERE `id` = '$id'";

            $updateResult = mysqli_query($con, $updateSql);

            // Check if update was successful
            if ($updateResult) {
                header('Location: display.php');
                exit;
            } else {
                echo "Error updating route: " . mysqli_error($con);
            }
        }
    } else {
        echo "No route found with the provided ID.";
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
    <title>Update Route</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            width: 100%;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0d6efd;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.5);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Update Route</h2>
        <form method="post">
            <div class="mb-3">
                <label for="route_name" class="form-label">Route Name</label>
                <input type="text" class="form-control" id="route_name" name="route_name" value="<?php echo $routeName; ?>">
            </div>
            <div class="mb-3">
                <label for="start_point" class="form-label">Start Point</label>
                <input type="text" class="form-control" id="start_point" name="start_point" value="<?php echo $startPoint; ?>">
            </div>
            <div class="mb-3">
                <label for="end_point" class="form-label">End Point</label>
                <input type="text" class="form-control" id="end_point" name="end_point" value="<?php echo $endPoint; ?>">
            </div>
            <div class="mb-3">
                <label for="stop_name" class="form-label">Stop Name</label>
                <input type="text" class="form-control" id="stop_name" name="stop_name" value="<?php echo $stopName; ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update Route</button>
        </form>
    </div>
</body>

</html>
