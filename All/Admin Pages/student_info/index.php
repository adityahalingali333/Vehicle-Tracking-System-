<!DOCTYPE html>
<html>
<head>
    <title>Student Info</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f7f7f7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        th, td {
            transition: background-color 0.3s;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        canvas {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php
// Database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = "YES"; // Change this to your database password
$dbname = "student_info"; // Change this to your database name

// Create connection
$conn = new mysqli('localhost','root','', 'student_info');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all student data along with their stops, branch, bus timing, and year
$sql_students = "SELECT id, stop, student_branch, bus_timing, student_year FROM user_form";

// Execute query
$result_students = $conn->query($sql_students);

// Array to store student counts for each stop and route
$student_counts = array();

// Fetch student data and count students for each stop and route
if ($result_students->num_rows > 0) {
    while($row = $result_students->fetch_assoc()) {
        $stop = $row['stop'];
        $student_id = $row['id'];
        $branch = $row['student_branch'];
        $bus_timing = $row['bus_timing'];
        $year = $row['student_year'];

        // Increment student count for the stop
        if (!isset($student_counts[$stop])) {
            $student_counts[$stop] = array('count' => 1, 'branch' => $branch, 'bus_timing' => $bus_timing, 'year' => $year);
        } else {
            $student_counts[$stop]['count']++;
        }
    }
}

// Display results in a table
echo "<table>
        <tr>
            <th>Stop</th>
            <th>Student Count</th>
            <th>Branch</th>
            <th>Bus Timing</th>
            <th>Year</th>
        </tr>";

foreach ($student_counts as $stop => $data) {
    echo "<tr>
            <td>".$stop."</td>
            <td>".$data['count']."</td>
            <td>".$data['branch']."</td>
            <td>".$data['bus_timing']."</td>
            <td>".$data['year']."</td>
          </tr>";
}

echo "</table>";

// Close connection
$conn->close();
?>

<canvas id="myChart"></canvas>

<script>
    var stops = <?php echo json_encode(array_keys($student_counts)); ?>;
    var counts = <?php echo json_encode(array_column($student_counts, 'count')); ?>;

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: stops,
            datasets: [{
                label: 'Student Count',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
