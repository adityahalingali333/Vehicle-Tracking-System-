<?php
include 'connect.php';

// Check if delete ID is provided in the URL
if (isset($_GET['deleteid'])) {
    // Get the delete ID from the URL
    $id = $_GET['deleteid'];

    // Delete the bus route from the database
    $deleteSql = "DELETE FROM `busschedule` WHERE `id` = $id";
    $deleteResult = mysqli_query($con, $deleteSql);

    // Check if deletion was successful
    if ($deleteResult) {
        header('Location: display_bus_route.php');
        exit;
    } else {
        echo "Error deleting bus route: " . mysqli_error($con);
    }
} else {
    echo "Delete ID not provided.";
    exit;
}
?>
