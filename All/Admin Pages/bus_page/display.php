<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            vertical-align: middle !important;
            text-align: right;
        }

        th {
            background-color: #343a40;
            color: #ffffff;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle !important;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light">Add User</a>
        </button>
        <div class="row justify-content-end"> <!-- Wrapping table inside this div -->
            <table class="table table-striped table-hover">
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
                        <th scope="col">RC IMG</th>
                        <th scope="col">EMISSION IMG</th>
                        <th scope="col">INSURANCE IMG</th>
                        <th scope="col">OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'connect.php';
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
                        $BusInStand = $row['bus_in_stand'];
                        $BusForService = $row['bus_for_service'];
                        $RCImage = $row['rc_img'];
                        $EmissionImage = $row['emission_img'];
                        $InsuranceImage = $row['insurance_img'];
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
                            <td><a href="' . $RCImage . '" target="_blank">View RC Image</a></td>
                            <td><a href="' . $EmissionImage . '" target="_blank">View Emission Image</a></td>
                            <td><a href="' . $InsuranceImage . '" target="_blank">View Insurance Image</a></td>
                            <td>
                                <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                    }
                }
                ?>
             </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>