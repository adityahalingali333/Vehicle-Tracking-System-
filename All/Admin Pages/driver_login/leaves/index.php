<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'leaves') or die('connection failed');

// Fetch existing leave records from the database
$query = "SELECT * FROM drivers";
$result = mysqli_query($conn, $query);

// Initialize variables to store existing leave data
$existing_leaves = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Store leave data in an array
        $existing_leaves[] = $row;
    }
}

// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Driver Leaves</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bus Driver Leaves</h1>
    <form id="leaveForm">
        <label for="name">Driver's Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" required>
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" required>
        <button type="submit">Submit</button>
    </form>
    <div id="output">
        <h2>Leave Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Driver's Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($existing_leaves as $leave) : ?>
                    <tr>
                        <td><?php echo $leave['name']; ?></td>
                        <td><?php echo $leave['start_date']; ?></td>
                        <td><?php echo $leave['end_date']; ?></td>
                        <td><?php echo $leave['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
