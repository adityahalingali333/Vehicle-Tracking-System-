<?php
$conn = mysqli_connect('localhost', 'root', '', 'leaves') or die('connection failed');

$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$start_date = $data['startDate'];
$end_date = $data['endDate'];

$sql = "INSERT INTO drivers (name, start_date, end_date) VALUES ('$name', '$start_date', '$end_date')";

if ($conn->query($sql) === TRUE) {
    echo "Leave submitted successfully";

    // Retrieve leaves data from the database for the same driver within the given date range
    $query = "SELECT * FROM drivers WHERE name='$name' AND start_date='$start_date' AND end_date='$end_date'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<br>Status: " . $row['status']; // Assuming 'status' is a column in your 'drivers' table
        echo "<br>Start Date: " . $row['start_date'];
        echo "<br>End Date: " . $row['end_date'];
    } else {
        echo "<br>No status found for the same driver within the specified date range.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
