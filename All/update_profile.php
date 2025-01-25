<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_usn = mysqli_real_escape_string($conn, $_POST['update_usn']); // Added line to get updated USN
   $update_stop = mysqli_real_escape_string($conn, $_POST['update_stop']); // Added line to get updated stop
   $bus_timing = mysqli_real_escape_string($conn, $_POST['bus_timing']);
   $student_branch = mysqli_real_escape_string($conn, $_POST['student_branch']);
   $student_year = mysqli_real_escape_string($conn, $_POST['student_year']);


   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email', USN = '$update_usn', stop = '$update_stop',bus_timing='$bus_timing' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
   

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'Old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'Updated successfully!!!';
      }
   }
   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
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
   <title>Update Profile</title>

   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="update-profile">
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
   <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username:</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>Your Email:</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
            <span>Update Your USN:</span>
            <input type="text" name="update_usn" value="<?php echo $fetch['USN']; ?>" class="box">
            <span>Update Your Stop:</span>
            <select name="update_stop" class="box">
            <option value="<?php echo $fetch['stop']; ?>"><?php echo $fetch['stop']; ?></option>
            <optgroup label="Sahyadri College to JNNCE">
    <option value="Sahyadri College">Sahyadri College</option>
          <option value="Sandal Colony">Sandal Colony</option>
          <option value="Mahadevi Theatre">Mahadevi Theatre</option>
          <option value="Shankar Mutt">Shankar Mutt</option>
          <option value="Sheshadripuram">Sheshadripuram</option>
          <option value="Mahaveera Circle">Mahaveera Circle</option>
          <option value="Kamala Nursing Home">Kamala Nursing Home</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
    </optgroup>
    <optgroup label="Marigaddige to JNNCE">
    <option value="Marigaddige">Marigaddige</option>
          <option value="Kote Police Station">Kote Police Station</option>
          <option value="Krishna Cafe">Krishna Cafe</option>
          <option value="DVS Circle">DVS Circle</option>
          <option value="Mahaveera Circle">Mahaveera Circle</option>
          <option value="Kamala Nursing Home">Kamala Nursing Home</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>
    </optgroup>
      
      <optgroup label="Gopala Gowda Extension to JNNCE">
      <option value="LT. Office">I.T  Office</option>
          <option value="Sagar Road Cross">Sagar Road Cross</option>
          <option value="Katte Subbanna Kalyana Mantapa Cross">Katte Subbanna Kalyana Mantapa Cross</option>
          <option value="Damodara Colony Cross">Damodara Colony Cross</option>
          <option value="Good Luck Circle">Good Luck Circle</option>
          <option value="APMC Road">APMC Road</option>
          <option value="50 ft. Road Cross">50 ft. Road Cross</option>
          <option value="I Auto Stand">I Auto Stand</option>
          <option value="Laxmi Theatre">Laxmi Theatre</option>
          <option value="Nirmala Nursing Home">Nirmala Nursing Home</option>
          <option value="Gandhi Nagar">Gandhi Nagar</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>

          </optgroup>
          <optgroup label="Tempo Stand to JNNCE">
          <option value="Tempo Stand">Tempo Stand</option>
          <option value="Bus Stand">Bus Stand</option>
          <option value="Mc.Gann Gate">Mc.Gann Gate</option>
          <option value="Circuit House Circle">Circuit House Circle</option>
          <option value="Sharavathi Nagar">Sharavathi Nagar</option>
          <option value="60ft. Road">60ft. Road</option>
          <option value="Vinobanagar Ist Auto Stand">Vinobanagar Ist Auto Stand</option>
          <option value="Laxmi Theatre">Laxmi Theatre</option>
          <option value="Gandhi Nagar">Gandhi Nagar</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>

          </optgroup>
          <optgroup label="Tempo Stand to JNNCE">
          <option value="P&T Colony">P&T Colony</option>
          <option value="Kashi Pura Cross">Kashi Pura Cross</option>
          <option value="Cambridge School">Cambridge School</option>
          <option value="Professor Park">Professor Park</option>
          <option value="Kariyann Building">Kariyann Building</option>
          <option value="Savi Bakery">Savi Bakery</option>
          <option value="Police Chowki">Police Chowki</option>
          <option value="DVS">DVS</option>
          <option value="I Auto Stand">I Auto Stand</option>
          <option value="Laxmi Theatre">Laxmi Theatre</option>
          <option value="Nirmala Nursing Home">Nirmala Nursing Home</option>
          <option value="Gandhi Nagar">Gandhi Nagar</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>
   </optgroup>
   <optgroup label="Gopala to JNNCE">
   <option value="Gopi Shetty Koppa Cross">Gopi Shetty Koppa Cross</option>
          <option value="City Bus stop">City Bus stop</option>
          <option value="Draupadamma Circle">Draupadamma Circle</option>
          <option value="Netaji circle">Netaji circle</option>
          <option value="Double Road Cross">Double Road Cross</option>
          <option value="Vijaya Nagara">Vijaya Nagara</option>
          <option value="Circuit House">Circuit House</option>
          <option value="Doctors Quarters">Doctors Quarters</option>
          <option value="Jail Circle">Jail Circle</option>
          <option value="Z.P. Office">Z.P. Office</option>
          <option value="Kamal Nursing Home">Kamal Nursing Home</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>
   </optgroup>
   <optgroup label="Girls Hostel to JNNCE">
   <option value="Girls Hostel">Girls Hostel</option>
   </optgroup>
   <optgroup label="K.E.B Circle to JNNCE">
   <option value="Mahaveer Circle">Mahaveer Circle</option>
   <option value="Shivamurthy Circle">Shivamurthy Circle</option>
   <option value="Kamal Nursing Home">Kamal Nursing Home</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>
   <option value="Ganapathi Temple">Ganapathi Temple</option>
</optgroup>
<optgroup label="Sahyadri Colony to JNNCE">
<option value="Sahyadri Colony">Sahyadri Colony</option>
<option value="Devaraj Urs Badavane">Devaraj Urs Badavane</option>
<option value="P&T Colony Cross">P&T Colony Cross</option>
<option value="Police Chowki">Police Chowki</option>
          <option value="DVS">DVS</option>
          <option value="I Auto Stand">I Auto Stand</option>
          <option value="Laxmi Theatre">Laxmi Theatre</option>
          <option value="Nirmala Nursing Home">Nirmala Nursing Home</option>
          <option value="Gandhi Nagar">Gandhi Nagar</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>

   </optgroup>
   <optgroup label="Karnataka Sangha to JNNCE">
   <option value="Karnataka Sangha">Karnataka Sangha</option>
          <option value="S.N. Market">S.N. Market</option>
          <option value="Gopicircle">Gopicircle</option>
          <option value="J.P.N. Road">J.P.N. Road</option>
          <option value="Ganapathi Temple">Ganapathi Temple</option>
          <option value="Jyothi Garden">Jyothi Garden</option>
         <option value="Jail Circle">Jail Circle</option>
         <option value="Z.P. Office">Z.P. Office</option>
         <option value="S.M Circle">S.M Circle</option>
          <option value="Kamal Nursing Home">Kamal Nursing Home</option>
          <option value="Parvathi Nursing Home">Parvathi Nursing Home</option>
          <option value="Ashwathnagar">Ashwathnagar</option>
          <option value="Navule">Navule</option>
   </optgroup>
   <optgroup label="Bhadravathi to JNNCE">
   <option value="Old Bhadravathi">Old Bhadravathi</option>
   <option value="New Bhadravathi">New Bhadravathi</option>
   </optgroup>
            </select>
            <span>Your Branch:</span>
            <select name="student_branch" class="box">
         <option selected="selected">Select which Branch are you?</option>
            <option value="INFORMATION SCIENCE AND ENGINEERING">INFORMATION SCIENCE AND ENGINEERING</option>
            <option value="COMPUTER SCIENCE AND ENGINEERING">COMPUTER SCIENCE AND ENGINEERING</option>
            <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
            <option value="MECHANICAL ENGINEERING">MECHANICAL ENGINEERING</option>
            <option value="ELECTRICAL AND ELECTRONICS ENGINEERING">ELECTRICAL AND ELECTRONICS ENGINEERING</option>
            <option value="ELECTRONICS AND COMMUNICATION ENGINEERING">ELECTRONICS AND COMMUNICATION ENGINEERING</option>
            <option value="ELECTRONICS AND TELECOMMUNICATION ENGINEERINGG">ELECTRONICS AND TELECOMMUNICATION ENGINEERING</option>
            <option value="ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING">ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING</option>
            <option value="ROBOTICS AND ARTIFICIAL INTELLIGENCE">ROBOTICS AND ARTIFICIAL INTELLIGENCE</option>
            
   </select>
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old Password:</span>
            <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
            <span>New Password:</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm Password:</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
            <span>Bus Timing</span>
            <select name="bus_timing" class="box">
            <option value="7.00 AM">7.00 AM</option>
            <option value="8.00 AM">8.00 AM</option>
            <option value="10.00 AM">10.00 AM</option>
            </select>
            <span>Your Current Year:</span>
            <select name="student_year"  class="box">
      <option  selected="selected">Select which Year you are in?</option>
            <option value="1st year">1st year</option>
            <option value="2nd year">2nd year</option>
            <option value="3rd year">3rd year</option>
            <option value="4th year">4th year</option>
  
         </div>
      </div>
      <input type="submit" value="Update Profile" name="update_profile" class="btn">
      <a href="Admin pages/route1/sroute.php" class="delete-btn">Select your Route</a>
      
   </form>

</div>

</body>
</html>
