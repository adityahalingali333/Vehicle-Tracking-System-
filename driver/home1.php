<?php

include 'config.php';
session_start();
$driver_id = $_SESSION['driver_id'];

if(!isset($driver_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($driver_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `driver` WHERE id = '$driver_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['driver_img'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="driver_images/'.$fetch['driver_img'].'">';
         }
      ?>
   
      <h4><?php echo $fetch['name']; ?></h4>
      <h5>Phone Number: <?php echo $fetch['pnumber']; ?></h5>
      <a href="apply_leave.php" class="btn">Apply Leave</a>
      <a href="home.php?logout=<?php echo $driver_id; ?>" class="delete-btn">Logout</a>
   </div>

</div>

</body>
</html>
