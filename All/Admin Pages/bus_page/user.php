<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $BusNo = $_POST['bus_no'];
    $BusRegNo = $_POST['bus_reg_no'];
    $EngineNo = $_POST['engine_no'];
    $ChassisNo = $_POST['chassis_no'];
    $FC = $_POST['f_c'];
    $NextFC = $_POST['next_f_c'];
    $Service = $_POST['service'];
    $NService = $_POST['n_service'];
    $DateStart = $_POST['date_start'];
    $BusInStand = isset($_POST['bus_in_stand']) ? $_POST['bus_in_stand'] : '';
    $BusForService = isset($_POST['bus_for_service']) ? $_POST['bus_for_service'] : '';

    // File Uploads
    $rc_img = uploadFile('rc_img', 'uploaded_rc_img/');
    $insurance_img = uploadFile('insurance_img', 'uploaded_insurance_img/');
    $emission_img = uploadFile('emission_img', 'uploaded_emission_img/');

    // Insert data into database
    $sql = "INSERT INTO `bus` (bus_no, bus_reg_no, engine_no, chassis_no, f_c, next_f_c, service, n_service, date_start, bus_in_stand, bus_for_service, rc_img, insurance_img, emission_img) 
            VALUES ('$BusNo', '$BusRegNo', '$EngineNo', '$ChassisNo', '$FC', '$NextFC', '$Service', '$NService', '$DateStart', '$BusInStand', '$BusForService', '$rc_img', '$insurance_img', '$emission_img')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:display.php'); // Redirect to display.php upon successful insertion
    } else {
        die(mysqli_error($con)); // Print any error if insertion fails
    }
}

// Function to handle file uploads
function uploadFile($fileInputName, $targetDirectory)
{
    $file = $_FILES[$fileInputName]['name'];
    $tmpFilePath = $_FILES[$fileInputName]['tmp_name'];

    // Create target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Move the uploaded file to the target directory
    $targetFilePath = $targetDirectory . basename($file);
    move_uploaded_file($tmpFilePath, $targetFilePath);

    return $targetFilePath;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BUS Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Custom CSS for Bus Registration Form */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #f8f9fa;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.radio-inline {
    display: inline-block;
    margin-right: 20px;
}

.radio-inline label {
    margin-right: 10px;
}

.radio-inline input[type="radio"] {
    margin-top: 2px;
}

@media (max-width: 576px) {
    .form-group {
        margin-bottom: 15px;
    }

    .radio-inline {
        margin-right: 10px;
    }
}


    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4">BUS Registration</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Bus Number</label>
                <input type="text" class="form-control" placeholder="Enter Bus Number" name="bus_no" required>
            </div>
            <div class="form-group">
                <label>Bus Registration Number</label>
                <input type="text" class="form-control" placeholder="Enter Bus Registration Number" name="bus_reg_no" required>
            </div>
            <div class="form-group">
                <label>Engine Number</label>
                <input type="text" class="form-control" placeholder="Enter Bus Engine Number" name="engine_no" required>
            </div>
            <div class="form-group">
                <label>Chassis Number</label>
                <input type="text" class="form-control" placeholder="Enter Bus Chassis Number" name="chassis_no" required>
            </div>
            <div class="form-group">
                <label>Fitness Certification</label>
                <input type="date" class="form-control" name="f_c" required>
            </div>
            <div class="form-group">
                <label>Next Fitness Certification</label>
                <input type="date" class="form-control" name="next_f_c" required>
            </div>
            <div class="form-group">
                <label>Service</label>
                <input type="date" class="form-control" name="service" required>
            </div>
            <div class="form-group">
                <label>Next Service</label>
                <input type="date" class="form-control" name="n_service" required>
            </div>
            <div class="form-group">
                <label>Date of Inclusion</label>
                <input type="date" class="form-control" name="date_start" required>
            </div>
            <div class="form-group">
                <label>Bus in Stand</label><br>
                <label class="radio-inline"><input type="radio" name="bus_in_stand" value="yes">Yes</label>
                <label class="radio-inline"><input type="radio" name="bus_in_stand" value="no">No</label>
            </div>
            <div class="form-group">
                <label>Bus for Service</label><br>
                <label class="radio-inline"><input type="radio" name="bus_for_service" value="yes">Yes</label>
                <label class="radio-inline"><input type="radio" name="bus_for_service" value="no">No</label>
            </div>
            <div class="form-group">
                <label>RC Image</label>
                <input type="file" class="form-control" name="rc_img" required>
            </div>
            <div class="form-group">
                <label>Insurance Image</label>
                <input type="file" class="form-control" name="insurance_img" required>
            </div>
            <div class="form-group">
                <label>Emission Image</label>
                <input type="file" class="form-control" name="emission_img" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
