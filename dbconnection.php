<?php
// Create connection
$con=mysqli_connect("localhost","root","","ehsphp");

// Check connection
if (!$con)
  {
  echo "Failed To Connect With MySQL: " . mysqli_connect_error();
  }
?>