<?php
// Database connection code here
include 'connect.php';
// Function to fetch route information based on route name
function getRouteInfo($routeName, $con) {
    $sql = "SELECT RouteName, StartPoint, EndPoint, StopName FROM Routes WHERE RouteName = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $routeName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

// Function to fetch all stops for a given route
function getStopsForRoute($routeName, $con) {
    $sql = "SELECT StopName FROM Routes WHERE RouteName = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $routeName);
    $stmt->execute();
    $result = $stmt->get_result();
    $stops = array();
    while ($row = $result->fetch_assoc()) {
        $stops[] = $row['StopName'];
    }
    return $stops;
}

// Initialize variables to store route information
$routeInfo = array();
$selectedRoute = "";
$selectedStop = "";

// Assuming form submission method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedRoute = $_POST["route"];

    // Retrieve route information
    $routeInfo = getRouteInfo($selectedRoute, $con);

    // Retrieve stops for the selected route
    $stops = getStopsForRoute($selectedRoute, $con);

    // Retrieve selected stop if set
    $selectedStop = isset($_POST["stop"]) ? $_POST["stop"] : "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Route and Stop</title>
    <script>
        function populateFields() {
            var selectedRoute = document.getElementById("route").value;
            var routeParts = selectedRoute.split(": ");
            var startEndPoint = routeParts[1].split(" to ");
            var startPoint = startEndPoint[0];
            var endPoint = startEndPoint[1];

            var selectedRoute = document.getElementById("route").value;
            var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var stops = JSON.parse(xhr.responseText);
            var stopSelect = document.getElementById("stop");
            stopSelect.innerHTML = ""; // Clear existing options
            for (var i = 0; i < stops.length; i++) {
                var option = document.createElement("option");
                option.value = stops[i];
                option.textContent = stops[i];
                stopSelect.appendChild(option);
            }
        }
    };
    xhr.open("GET", "get_stops.php?route=" + selectedRoute, true);
    xhr.send();
            document.getElementById("start_point").value = startPoint;
            document.getElementById("end_point").value = endPoint;
        }
    </script>
</head>
<body>
    <form action="" method="post" onchange="populateFields()">
        <label for="route">Select Route:</label>
        <select name="route" id="route" onchange="populateFields()">
            <option value="Route No. 1: Sahyadri College to JNNCE">Route No. 1: Sahyadri College to JNNCE</option>
            <option value="Route No. 2: Marigaddige to JNNCE">Route No. 2: Marigaddige to JNNCE</option>
            <option value="Route No. 3: Gopala Gowda Extension to JNNCE">Route No. 3: Gopala Gowda Extension to JNNCE</option>
            <option value="Route No. 4: Tempo Stand to JNNCE">Route No. 4: Tempo Stand to JNNCE</option>
            <option value="Route No. 5: Vinobanagar to JNNCE">Route No. 5: Vinobanagar to JNNCE</option>
            <option value="Route No. 6: Gopala to JNNCE">Route No. 6: Gopala to JNNCE</option>
            <option value="Route No. 7: Girls Hostel to JNNCE">Route No. 7: Girls Hostel to JNNCE</option>
            <option value="Route No. 8: K.E.B. Circle to JNNCE">Route No. 8: K.E.B. Circle to JNNCE</option>
            <option value="Route No. 9: Sahyadri Colony to JNNCE">Route No. 9: Sahyadri Colony to JNNCE</option>
            <option value="Route No. 10: Karnataka Sangha to JNNCE">Route No. 10: Karnataka Sangha to JNNCE</option>
            <option value="Route No. 11: New town Bhadravathi to JNNCE">Route No. 11: New town Bhadravathi to JNNCE</option>
            <option value="Route No. 12: Old town Bhadravathi to JNNCE">Route No. 12: Old town Bhadravathi to JNNCE</option>
        </select>

        <label for="start_point">Start Point:</label>
<input type="text" id="start_point" name="start_point" readonly value="<?php echo isset($routeInfo['StartPoint']) ? $routeInfo['StartPoint'] : ''; ?>">


<label for="end_point">End Point:</label>
<input type="text" id="end_point" name="end_point" readonly value="<?php echo isset($routeInfo['EndPoint']) ? $routeInfo['EndPoint'] : ''; ?>">


        <label for="stop">Select Stop:</label>
        <select name="stop" id="stop">
            <?php foreach ($stops as $stop) { ?>
                <option value="<?php echo $stop; ?>"><?php echo $stop; ?></option>
            <?php } ?>
        </select>

        <input type="submit" value="Submit">
    </form>

    <!-- Display selected route and stop -->
    <?php if ($selectedRoute && $selectedStop) { ?>
        <p>Selected Route: <?php echo $routeInfo['RouteName']; ?></p>
        <p>Start Point: <?php echo $routeInfo['StartPoint']; ?></p>
        <p>End Point: <?php echo $routeInfo['EndPoint']; ?></p>
        <p>Selected Stop: <?php echo $selectedStop; ?></p>
    <?php } ?>
</body>
</html>
