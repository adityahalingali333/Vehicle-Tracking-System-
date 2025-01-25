<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .btn {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 5px;
            display: inline-block;
        }

        .table thead th {
            background-color: #4CAF50;
            color: white;
            border-color: #4CAF50;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }

        .btn-primary,
        .btn-danger {
            transition: background-color 0.3s ease;
            min-width: 100px;
            border: none;
        }

        .btn-group {
            display: flex;
            align-items: center;
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
    </style>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="insert_route.php" class="text-light">Add Route</a>
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Route Name</th>
                    <th scope="col">Start Point</th>
                    <th scope="col">End Point</th>
                    <th scope="col">Stop Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';
                $sql = "SELECT * FROM `routes`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $routeName = $row['RouteName'];
                        $startPoint = $row['StartPoint'];
                        $endPoint = $row['EndPoint'];
                        $stopName = $row['StopName'];
                        $description = $row['Description'];

                        echo '
                            <tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $routeName . '</td>
                                <td>' . $startPoint . '</td>
                                <td>' . $endPoint . '</td>
                                <td>' . $stopName . '</td>
                                <td>' . $description . '</td>
                                <td class="btn-group">
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
</body>

</html>
