<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];
  $sql = "DELETE FROM `bus` WHERE bus_id=$id";
  $result = mysqli_query($con, $sql);
  if ($result) {
    //echo "Data deleted successfully";
    header('location:display.php');
  } else {
    die(mysqli_error($con));
  }
}
?>
