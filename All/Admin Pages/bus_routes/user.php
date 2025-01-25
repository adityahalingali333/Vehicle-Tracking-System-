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

  // Ensure you establish a connection to your database first
  // $con = mysqli_connect("localhost", "username", "password", "database_name");

  $sql = "INSERT INTO `bus` (bus_no, bus_reg_no, engine_no, chassis_no, f_c, next_f_c, service, n_service, date_start, bus_in_stand, bus_for_service) 
  VALUES ('$BusNo', '$BusRegNo', '$EngineNo', '$ChassisNo', '$FC', '$NextFC', '$Service', '$NService', '$DateStart', '$BusInStand', '$BusForService')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    //echo "Data inserted successfully";
    header('location:display.php');
  } else {
    die(mysqli_error($con));
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
        <input type="text" class="form-control" placeholder="Enter Bus Number" name="bus_no">
      </div>
      <div class="form-group my-2 ">
        <label>Bus Registration Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus  Registration Number" name="bus_reg_no">
      </div>
      <div class="form-group my-2">
        <label>Engine Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus Engine Number" name="engine_no">
      </div>
      <div class="form-group my-2">
        <label>Chassis Number</label>
        <input type="text" class="form-control" placeholder="Enter Bus Chassis Number" name="chassis_no">
      </div>
      <div class="form-group my-2">
        <label>Fitness Certification</label>
        <input type="date" class="form-control" placeholder="Enter Fitness Certification Date" name="f_c">
      </div>
      <div class="form-group my-2">
        <label>Next Fitness Certification</label>
        <input type="date" class="form-control" placeholder="Enter Next Fitness Certification Date" name="next_f_c">
      </div>
      <div class="form-group my-2">
        <label>Service</label>
        <input type="date" class="form-control" placeholder="Enter Last Service Date" name="service">
      </div>
      <div class="form-group my-2">
        <label>Next Service</label>
        <input type="date" class="form-control" placeholder="Enter Next Service Date" name="n_service">
      </div>
      <div class="form-group my-2">
        <label>Date of Inclusion</label>
        <input type="date" class="form-control" placeholder="Enter The Inclusion Date" name="date_start">
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
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</body>

</html>