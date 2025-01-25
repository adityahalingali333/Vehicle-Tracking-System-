<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Schedule Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary,
        .btn-danger {
            transition: background-color 0.3s ease;
            min-width: 100px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .btn-group {
            display: flex;
            align-items: center;
        }

        .btn-group .btn {
            flex: 1;
        }

        .btn-group a {
            text-decoration: none;
            color: white;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            opacity: 0.8;
        }

        .btn-primary {
            background-color: #2196F3;
        }

        .btn-danger {
            background-color: #F44336;
        }

        .table {
            width: 100%;
        }

        .table thead th {
            background-color: #4CAF50;
            color: white;
            border-color: #4CAF50;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="insert_bus_route.php" class="text-light">Add Bus Schedule</a>
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Bus Number</th>
                    <th scope="col">Bus Name</th>
                    <th scope="col">Stop Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';
                $sql = "SELECT * FROM `busschedule`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $busNumber = $row['BusNumber'];
                        $busName = $row['BusName'];
                        $stopName = $row['StopName'];
                        $arrivalTime = $row['ArrivalTime'];

                        echo '
                            <tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $busNumber . '</td>
                                <td>' . $busName . '</td>
                                <td>' . $stopName . '</td>
                                <td>' . $arrivalTime . '</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary"><a href="update_bus_route.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                        <button class="btn btn-danger"><a href="delete_bus_route.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                                    </div>
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
