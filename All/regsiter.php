<?php

include 'config.php';

function validateUSN($usn) {
    // Define the regular expression pattern
    $pattern = '/^\d{1}[A-Za-z]{2}\d{2}[A-Za-z]{2}\d{3}$/';

    // Perform the regular expression match
    return preg_match($pattern, $usn);
}

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $usn = mysqli_real_escape_string($conn, ($_POST['USN']));
   $stop = mysqli_real_escape_string($conn, ($_POST['stop']));
   $bus_timing = mysqli_real_escape_string($conn, ($_POST['bus_timing']));
   $student_year = mysqli_real_escape_string($conn, ($_POST['student_year']));
   $student_branch = mysqli_real_escape_string($conn, ($_POST['student_branch']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exists'; 
   } else {
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      } elseif($image_size > 2000000){
         $message[] = 'Image size is too large!';
      } elseif(!validateUSN($usn)){
         $message[] = 'Invalid USN format! ';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, USN,stop,image,bus_timing,student_year,student_branch) VALUES('$name', '$email', '$pass', '$usn','$stop','$image','$bus_timing','$student_year','$student_branch')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location:login.php');
            exit(); 
         } else {
            $message[] = 'Registration failed!';
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
   <title>Register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register Now</h3>
      <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<div class="message">'.$msg.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="text" name="USN" placeholder="Enter your USN " class="box" required>
      <select name="stop" class="box" required>
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
   <select name="bus_timing" class="box">
      <option  selected="selected">Select Bus Timings</option>
            <option value="7.00 AM">7.00 AM</option>
            <option value="8.00 AM">8.00 AM</option>
            <option value="10.00 AM">10.00 AM</option>
   </select>
   <select name="student_year" class="box">
      <option  selected="selected">Select which Year you are in?</option>
            <option value="1st year">1st year</option>
            <option value="2nd year">2nd year</option>
            <option value="3rd year">3rd year</option>
            <option value="4th year">4th year</option>
   </select>
   <select name="student_branch" class="box">
      <option  selected="selected">Select which Branch are you?</option>
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
   <label for="image" class="image-label">Choose your Photo (OPTIONAL)</label>
<input type="file" name="image" id="image" class="box" accept="image/jpg, image/jpeg, image/png" >
<input type="submit" name="submit" value="Register Now" class="btn">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>
