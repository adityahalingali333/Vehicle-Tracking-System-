<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'leaves') or die('connection failed');

// Retrieve action and id from the request
$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'];
$id = $data['id'];

// Update leave status based on the action
$status = ($action === 'approve') ? 'Approved' : 'Not Approved';
$sql = "UPDATE drivers SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Leave $action successfully";
} else {
    echo "Error updating leave: " . $conn->error;
}

// Close database connection
mysqli_close($conn);
?>
