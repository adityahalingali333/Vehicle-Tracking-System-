<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];
  $sql = "DELETE FROM `routes` WHERE id=$id";
  $result = mysqli_query($con, $sql);
  if ($result) {
    //echo "Data deleted successfully";
    header('location:display.php');
    exit; // Add exit to prevent further execution
  } else {
    die(mysqli_error($con));
  }
}
?>
