<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Display</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <button class="btn btn-primary my-5">
      <a href="user.php" class="text-light">Add User</a>
    </button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">BUS ID</th>
          <th scope="col">BUS NUMBER</th>
          <th scope="col">BUS REGISTRATION NUMBER</th>
          <th scope="col">BUS ENGINE NUMBER</th>
          <th scope="col">BUS CHASSIS NUMBER</th>
          <th scope="col">LAST FITNESS CERTIFICATION DATE</th>
          <th scope="col">NEXT FITNESS CERTIFICATION DATE</th>
          <th scope="col">LAST SERVICE DATE</th>
          <th scope="col">NEXT SERVICE DATE</th>
          <th scope="col">DATE OF INCLUSION</th>
          <th scope="col">BUS IN STAND</th>
      <th scope="col">BUS FOR SERVICE</th>
          <th scope="col">OPERATIONS</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM `bus`";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['bus_id'];
            $BusNo = $row['bus_no'];
            $BusRegNo = $row['bus_reg_no'];
            $EngineNo = $row['engine_no'];
            $ChassisNo = $row['chassis_no'];
            $FC = $row['f_c'];
            $NextFC = $row['next_f_c'];
            $Service = $row['service'];
            $NService = $row['n_service'];
            $DateStart = $row['date_start'];
            $BusInStand = $row['bus_in_stand']; // Retrieve value for "Bus in Stand" radio button
        $BusForService = $row['bus_for_service']; // Retrieve value for "Bus for Service" radio button
            echo '
    <tr>
        <th scope="row">' . $id . '</th>
        <td>' . $BusNo . '</td>
        <td>' . $BusRegNo . '</td>
        <td>' . $EngineNo . '</td>
        <td>' . $ChassisNo . '</td>
        <td>' . $FC . '</td>
        <td>' . $NextFC . '</td>
        <td>' . $Service . '</td>
        <td>' . $NService . '</td>
        <td>' . $DateStart . '</td>
        <td>' . $BusInStand . '</td>
        <td>' . $BusForService . '</td>
        <td>
  <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
  <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
</td>

      </tr>
    ';
          }
        }
        ?>



        <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>-->
      </tbody>
    </table>
  </div>
</body>

</html>