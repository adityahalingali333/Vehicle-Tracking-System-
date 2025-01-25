<?php
include 'connect.php'; // Ensure you have established a connection to your database

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $license_details = $_POST['license_details'];
    $service_start = $_POST['service_start'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
   
    $driver_img = $_FILES['driver_img']['name'];
    $driver_img_tmp_name = $_FILES['driver_img']['tmp_name'];
    $driver_img_folder = 'uploaded_driver_img/'.$driver_img;

    $license_img = $_FILES['license_img']['name'];
    $license_img_tmp_name = $_FILES['license_img']['tmp_name'];
    $license_img_folder = 'uploaded_license_img/'.$license_img;

    // Create directories if they don't exist
    if (!file_exists('uploaded_driver_img')) {
        mkdir('uploaded_driver_img', 0777, true);
    }
    if (!file_exists('uploaded_license_img')) {
        mkdir('uploaded_license_img', 0777, true);
    }

    // Move uploaded images to the respective folders
    move_uploaded_file($driver_img_tmp_name, $driver_img_folder);
    move_uploaded_file($license_img_tmp_name, $license_img_folder);

    // Insert data into database
    $sql = "INSERT INTO `driver` (name, license_details, service_start, age, email, pnumber, driver_img, license_img) 
          VALUES ('$name', '$license_details', '$service_start', '$age', '$email', '$pnumber', '$driver_img_folder', '$license_img_folder')";

    $result = mysqli_query($con, $sql);
    
    if ($result) {
        header('location:display.php'); // Redirect to display.php upon successful insertion
    } else {
        die(mysqli_error($con)); // Print any error if insertion fails
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .image-label {
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

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
            </div>
            <div class="form-group">
                <label>License Details</label>
                <input type="text" class="form-control" placeholder="Enter License Details" name="license_details" required>
            </div>
            <div class="form-group">
                <label>Service Start Date</label>
                <input type="date" class="form-control" name="service_start" required>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" placeholder="Enter Age" name="age" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter your phone number" name="pnumber" required>
            </div>

            <div class="form-group">
                <label for="driver_img" class="image-label">Choose your Photo</label>
                <input type="file" name="driver_img" id="driver_img" class="form-control" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="license_img" class="image-label">Choose your license Photo</label>
                <input type="file" name="license_img" id="license_img" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
