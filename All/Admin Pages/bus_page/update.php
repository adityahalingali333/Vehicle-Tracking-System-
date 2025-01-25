<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `bus` WHERE `bus_id` = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$BusNo = $row['bus_no'];
$BusRegNo = $row['bus_reg_no'];
$EngineNo = $row['engine_no'];
$ChassisNo = $row['chassis_no'];
$FC = $row['f_c'];
$NextFC = $row['next_f_c'];
$Service = $row['service'];
$NService = $row['n_service'];
$DateStart = $row['date_start'];
$BusInStand = $row['bus_in_stand'];
$BusForService = $row['bus_for_service'];
$rc_img = $row['rc_img'];
$emission_img = $row['emission_img'];
$insurance_img = $row['insurance_img'];

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form data
    $BusNo = mysqli_real_escape_string($con, $_POST['bus_no']);
    $BusRegNo = mysqli_real_escape_string($con, $_POST['bus_reg_no']);
    $EngineNo = mysqli_real_escape_string($con, $_POST['engine_no']);
    $ChassisNo = mysqli_real_escape_string($con, $_POST['chassis_no']);
    $FC = mysqli_real_escape_string($con, $_POST['f_c']);
    $NextFC = mysqli_real_escape_string($con, $_POST['next_f_c']);
    $Service = mysqli_real_escape_string($con, $_POST['service']);
    $NService = mysqli_real_escape_string($con, $_POST['n_service']);
    $DateStart = mysqli_real_escape_string($con, $_POST['date_start']);
    $BusInStand = mysqli_real_escape_string($con, $_POST['bus_in_stand']);
    $BusForService = mysqli_real_escape_string($con, $_POST['bus_for_service']);

    // Upload new images if provided
    $targetDir = "uploads/";
    $rc_img = uploadImage('rc_img', $targetDir, $rc_img);
    $emission_img = uploadImage('emission_img', $targetDir, $emission_img);
    $insurance_img = uploadImage('insurance_img', $targetDir, $insurance_img);

    // Prepare and execute SQL update statement
    $sql = "UPDATE `bus` 
            SET 
            `bus_no` = '$BusNo',
            `bus_reg_no` = '$BusRegNo',
            `engine_no` = '$EngineNo',
            `chassis_no` = '$ChassisNo',
            `f_c` = '$FC',
            `next_f_c` = '$NextFC',
            `service` = '$Service',
            `n_service` = '$NService',
            `date_start` = '$DateStart',
            `bus_in_stand` = '$BusInStand',
            `bus_for_service` = '$BusForService',
            `rc_img` = '$rc_img',
            `emission_img` = '$emission_img',
            `insurance_img` = '$insurance_img'
            WHERE `bus_id` = $id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: display.php'); // Redirect to display page after successful update
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Function to upload image and return the path
function uploadImage($inputName, $targetDir, $previousPath) {
    if ($_FILES[$inputName]['size'] > 0) {
        $fileName = basename($_FILES[$inputName]['name']);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFilePath);
        return $targetFilePath;
    } else {
        // Keep the previous image path if no new image is uploaded
        return $previousPath;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        img {
            margin-top: 10px;
            display: block;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Update Bus Information</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Bus Number</label>
                <input type="text" class="form-control" name="bus_no" value="<?php echo $BusNo; ?>">
            </div>
            <div class="form-group">
                <label>Bus Registration Number</label>
                <input type="text" class="form-control" name="bus_reg_no" value="<?php echo $BusRegNo; ?>">
            </div>
            <div class="form-group">
                <label>Engine Number</label>
                <input type="text" class="form-control" name="engine_no" value="<?php echo $EngineNo; ?>">
            </div>
            <div class="form-group">
                <label>Chassis Number</label>
                <input type="text" class="form-control" name="chassis_no" value="<?php echo $ChassisNo; ?>">
            </div>
            <div class="form-group">
                <label>Fitness Certification</label>
                <input type="date" class="form-control" name="f_c" value="<?php echo $FC; ?>">
            </div>
            <div class="form-group">
                <label>Next Fitness Certification</label>
                <input type="date" class="form-control" name="next_f_c" value="<?php echo $NextFC; ?>">
            </div>
            <div class="form-group">
                <label>Last Service Date</label>
                <input type="date" class="form-control" name="service" value="<?php echo $Service; ?>">
            </div>
            <div class="form-group">
                <label>Next Service Date</label>
                <input type="date" class="form-control" name="n_service" value="<?php echo $NService; ?>">
            </div>
            <div class="form-group">
                <label>Date of Inclusion</label>
                <input type="date" class="form-control" name="date_start" value="<?php echo $DateStart; ?>">
            </div>
            <div class="form-group">
                <label>Bus in Stand</label><br>
                <label class="radio-inline"><input type="radio" name="bus_in_stand" value="yes" <?php if ($BusInStand == 'yes') echo 'checked'; ?>>Yes</label>
                <label class="radio-inline"><input type="radio" name="bus_in_stand" value="no" <?php if ($BusInStand == 'no') echo 'checked'; ?>>No</label>
            </div>
            <div class="form-group">
                <label>Bus for Service</label><br>
                <label class="radio-inline"><input type="radio" name="bus_for_service" value="yes" <?php if ($BusForService == 'yes') echo 'checked'; ?>>Yes</label>
                <label class="radio-inline"><input type="radio" name="bus_for_service" value="no" <?php if ($BusForService == 'no') echo 'checked'; ?>>No</label>
            </div>
            <div class="form-group">
                <label>RC Image</label>
                <input type="file" class="form-control" name="rc_img">
                <?php echo '<img src="' . $rc_img . '" alt="RC Image">'; ?>
            </div>
            <div class="form-group">
                <label>Emission Image</label>
                <input type="file" class="form-control" name="emission_img">
                <?php echo '<img src="' . $emission_img . '" alt="Emission Image">'; ?>
            </div>
            <div class="form-group">
                <label>Insurance Image</label>
                <input type="file" class="form-control" name="insurance_img">
                <?php echo '<img src="' . $insurance_img . '" alt="Insurance Image">'; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
