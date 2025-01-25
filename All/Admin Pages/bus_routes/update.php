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
  $BusInStand = $_POST['bus_in_stand']; // Corrected assignment
  $BusForService = $_POST['bus_for_service']; // Corrected assignment

  if (empty($BusInStand)) {
    $BusInStand = 'no';
}
if (empty($BusForService)) {
    $BusForService = 'no';
}

  // Prepare the SQL update statement
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
  `bus_for_service` = '$BusForService'
  WHERE `bus_id` = $id";
          

  // Execute the update statement
  $result = mysqli_query($con, $sql);

  // Check if update was successful
  if ($result) {
    //echo "Updated successfully";
    header('location:display.php');
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }
}
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BUS Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="form-group my-2">
        <label>Bus Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus Number" name="bus_no" value=<?php echo $BusNo;?>>
      </div>
      <div class="form-group my-2 ">
        <label>Bus Registration Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus  Registration Number" name="bus_reg_no"value=<?php echo $BusRegNo;?>>
      </div>
      <div class="form-group my-2">
        <label>Engine Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus Engine Number" name="engine_no"value=<?php echo $EngineNo;?>>
      </div>
      <div class="form-group my-2">
        <label>Chassis Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus Chassis Number" name="chassis_no"value=<?php echo $ChassisNo;?>>
      </div>
      <div class="form-group my-2">
        <label>Fitness Certification</label>
        <input type="date" class="form-control" placeholder="Enter Fitness Certification Date" name="f_c"value=<?php echo $FC;?>>
      </div>
      <div class="form-group my-2">
        <label>Next Fitness Certification</label>
        <input type="date" class="form-control" placeholder="Enter Next Fitness Certification Date" name="next_f_c"value=<?php echo $NextFC;?>>
      </div>
      <div class="form-group my-2">
        <label>Service</label>
        <input type="date" class="form-control" placeholder="Enter Last Service Date" name="service"value=<?php echo $Service;?>>
      </div>
      <div class="form-group my-2">
        <label>Next Service</label>
        <input type="date" class="form-control" placeholder="Enter Next Service Date" name="n_service"value=<?php echo $NService;?>>
      </div>
      <div class="form-group my-2">
        <label>Date of Inclusion</label>
        <input type="date" class="form-control" placeholder="Enter The Inclusion Date" name="date_start"value=<?php echo $DateStart;?>>
      </div>
      <div class="form-group my-2">
        <label>Bus in Stand</label><br>
        <label class="radio-inline"><input type="radio" name="bus_in_stand" value="yes">Yes</label>
        <label class="radio-inline"><input type="radio" name="bus_in_stand" value="no">No</label>
      </div>
      <div class="form-group my-2">
        <label>Bus for Service</label><br>
        <label class="radio-inline"><input type="radio" name="bus_for_service" value="yes">Yes</label>
        <label class="radio-inline"><input type="radio" name="bus_for_service" value="no">No</label>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</body>

</html>