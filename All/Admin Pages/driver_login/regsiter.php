<?php
include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $license_details = mysqli_real_escape_string($conn, $_POST['license_details']);
   $service_start = mysqli_real_escape_string($conn, $_POST['service_start']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $pnumber = mysqli_real_escape_string($conn, $_POST['pnumber']);
   $driver_img = $_FILES['driver_img']['name'];
   $license_img = $_FILES['license_img']['name'];
   $driver_img_tmp_name = $_FILES['driver_img']['tmp_name'];
   $license_img_tmp_name = $_FILES['license_img']['tmp_name'];
   $driver_img_folder = 'driver_images/'.$driver_img;
   $license_img_folder = 'license_images/'.$license_img;

   $select = mysqli_query($conn, "SELECT * FROM `driver` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'Driver already exists'; 
   } else {
      $insert = mysqli_query($conn, "INSERT INTO `driver`(name, license_details, service_start, age, email, password, pnumber, driver_img, license_img) VALUES('$name', '$license_details', '$service_start', '$age', '$email', '$password', '$pnumber', '$driver_img', '$license_img')") or die('query failed');

      if($insert){
         move_uploaded_file($driver_img_tmp_name, $driver_img_folder);
         move_uploaded_file($license_img_tmp_name, $license_img_folder);
         $message[] = 'Driver registered successfully!';
         header('location: login.php'); // Redirect to login page after successful registration
         exit(); 
      } else {
         $message[] = 'Registration failed!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Driver Registration</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Driver Registration</h3>
      <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter Name" class="box" required>
      <input type="text" name="license_details" placeholder="Enter License Number" class="box" required>
      <label>Enter Service Start Date</label>
      <input type="date" name="service_start" placeholder=" " class="box" required>
      <input type="number" name="age" placeholder="Enter Age" class="box" required>
      <input type="email" name="email" placeholder="Enter Email" class="box" required>
      <input type="password" name="password" placeholder="Enter Password" class="box" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" class="box" required>
      <input type="number" name="pnumber" placeholder="Enter Phone Number" class="box" required>
      <label for="driver_img" class="image-label">Choose Driver Image</label>
      <input type="file" name="driver_img" id="driver_img" class="box" accept="image/jpg, image/jpeg, image/png" required>
      <label for="license_img" class="image-label">Choose License Image</label>
      <input type="file" name="license_img" id="license_img" class="box" accept="image/jpg, image/jpeg, image/png" required>
      <input type="submit" name="submit" value="Register" class="btn">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>
