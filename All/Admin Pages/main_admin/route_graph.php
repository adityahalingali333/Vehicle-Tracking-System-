<?php
include 'connect4.php';

// Query to retrieve data from the routes table and count the number of stops for each route
$sql = "SELECT RouteName, COUNT(*) AS NumStops FROM routes GROUP BY RouteName";
$result = mysqli_query($con, $sql);

// Initialize arrays to store route names and number of stops
$routeNames = [];
$numStops = [];

// Fetch data and populate arrays
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $routeNames[] = $row['RouteName'];
        $numStops[] = $row['NumStops'];
    }
}

// Format data for JavaScript consumption
$data = [
    'routeNames' => $routeNames,
    'numStops' => $numStops
];

// Convert data to JSON format
$jsonData = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route Graph</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="new-users">
        <h2>Graphs</h2>
        <div class="user-list">
            <div class="user">
                <canvas id="routeChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Retrieve data from PHP
        var routeData = <?php echo $jsonData; ?>;

        // Extract route names and number of stops
        var routeNames = routeData.routeNames;
        var numStops = routeData.numStops;

        // Create a bar chart using Chart.js
        var ctx = document.getElementById('routeChart').getContext('2d');
        var routeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: routeNames,
                datasets: [{
                    label: 'Number of Stops',
                    data: numStops,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Stops'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Route Name'
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
