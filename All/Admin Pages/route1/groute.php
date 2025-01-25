<?php
// Database connection code here
include 'connect.php';

// Retrieve selected route, start point, and end point
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedRoute = $_POST["route"];
    $startPoint = $_POST["start_point"];
    $endPoint = $_POST["end_point"];

    // Fetch stops for the selected route
    $sql = "SELECT StopName FROM Routes WHERE RouteName = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $selectedRoute);
    $stmt->execute();
    $result = $stmt->get_result();
    $stops = array();
    while ($row = $result->fetch_assoc()) {
        $stops[] = $row['StopName'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Stop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 500px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        select, input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 18px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="proute.php" method="post">
        <input type="hidden" name="route" value="<?php echo htmlspecialchars($selectedRoute); ?>">
        <input type="hidden" name="start_point" value="<?php echo htmlspecialchars($startPoint); ?>">
        <input type="hidden" name="end_point" value="<?php echo htmlspecialchars($endPoint); ?>">

        <label for="stop">Select Stop:</label>
        <select name="stop" id="stop">
            <?php foreach ($stops as $stop) { ?>
                <option value="<?php echo htmlspecialchars($stop); ?>"><?php echo htmlspecialchars($stop); ?></option>
            <?php } ?>
        </select>

        <label for="time">Select Time:</label>
        <select name="time" id="time">
            <option value="07:00:00">7:00:00 AM</option>
            <option value="07:45:00">7:45:00 AM</option>
            <option value="10:00:00">10:00:00 AM</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
