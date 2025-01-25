<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver Display</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
  <div class="container">
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">License Details</th>
          <th scope="col">Service Start</th>
          <th scope="col">Age</th>
          <th scope="col">Email</th>
          <th scope="col">Phone number</th>
          <th scope="col">Driver's Image</th>
          <th scope="col">Driver's License Image</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM `driver`";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $license_details = $row['license_details'];
            $service_start = $row['service_start'];
            $age = $row['age'];
            $email = $row['email'];
            $pnumber = $row['pnumber'];
            $driver_img = $row['driver_img'];
            $license_img = $row['license_img'];
             // Assuming the column name for PDF is 'license_pdf'

            echo '
            <tr>
                <th scope="row">' . $id . '</th>
                <td>' . $name . '</td>
                <td>' . $license_details . '</td>
                <td>' . $service_start . '</td>
                <td>' . $age . '</td>
                <td>' . $email . '</td>
                <td>' . $pnumber . '</td>
                <td><img src="' . $driver_img . '" alt="Driver Image" style="max-width: 100px;"></td>
                <td><a href="' . $license_img . '" target="_blank">View License PDF</a></td>
                <td>
                    <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                </td>
            </tr>';
          }
        }
        ?>

      </tbody>
    </table>
  </div>
</body>

</html>
