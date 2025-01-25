<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `driver` WHERE `id` = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$license_details = $row['license_details'];
$service_start = $row['service_start'];
$age = $row['age'];
$email = $row['email'];
$pnumber = $row['pnumber'];
$driver_img = $row['driver_img'];
$license_img = $row['license_img'];

if (isset($_POST['submit'])) {
    // Collect updated form data
    $name = $_POST['name'];
    $license_details = $_POST['license_details'];
    $service_start = $_POST['service_start'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    
    // Check if new images are uploaded
    if ($_FILES['driver_img']['size'] > 0) {
        $driver_img = 'uploaded_driver_img/' . $_FILES['driver_img']['name'];
        move_uploaded_file($_FILES['driver_img']['tmp_name'], $driver_img);
    }
    if ($_FILES['license_img']['size'] > 0) {
        $license_img = 'uploaded_license_img/' . $_FILES['license_img']['name'];
        move_uploaded_file($_FILES['license_img']['tmp_name'], $license_img);
    }

    // Prepare and execute SQL update statement
    $sql = "UPDATE `driver` 
            SET 
            `name` = '$name',
            `license_details` = '$license_details',
            `service_start` = '$service_start',
            `age` = '$age',
            `email` = '$email',
            `pnumber` = '$pnumber',
            `driver_img` = '$driver_img',
            `license_img` = '$license_img'
            WHERE `id` = $id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: display.php'); // Redirect to display page after successful update
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Driver Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        img {
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
            display: block;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Driver Information</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label>License Details</label>
                <input type="text" class="form-control" name="license_details" value="<?php echo $license_details; ?>">
            </div>
            <div class="form-group">
                <label>Service Start</label>
                <input type="date" class="form-control" name="service_start" value="<?php echo $service_start; ?>">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="pnumber" value="<?php echo $pnumber; ?>">
            </div>
            <div class="form-group">
                <label>Driver's Image</label>
                <input type="file" class="form-control" name="driver_img">
                <img src="<?php echo $driver_img; ?>" alt="Driver's Image">
            </div>
            <div class="form-group">
                <label>License Image</label>
                <input type="file" class="form-control" name="license_img">
                <img src="<?php echo $license_img; ?>" alt="License Image">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
