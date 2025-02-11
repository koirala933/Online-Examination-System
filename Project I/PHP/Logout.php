<?php 
$conn=mysqli_connect("localhost","root","","project");
session_start();
session_unset();
session_destroy();
header("location: http://localhost/project i/HTML/");
 ?>