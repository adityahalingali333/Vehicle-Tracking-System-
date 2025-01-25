<?php
$con=new mysqli('localhost','root','','bus_routes');
if(!$con)
{
  die(mysqli_error($con));

}
?>