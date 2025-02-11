<?php
if (isset($_REQUEST['submit'])) {
$conn=mysqli_connect('localhost','root','','project') or die("Connection error");
$email=$_REQUEST['username'];
$password=$_REQUEST['password'];
$sql="select Id,FirstName,LastName,Email,Role from users where Email='$email' and Password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while ($rows=mysqli_fetch_assoc($result)) {
		session_start();
		$_SESSION['Name']=$rows['Email'];
		$_SESSION['fname']=$rows['FirstName'];
		$_SESSION['lname']=$rows['LastName'];
		$_SESSION['Id']=$rows['Id'];
		$_SESSION['Role']=$rows['Role'];
		if($_SESSION['Role']=='Admin'){
header("location: http://localhost/project i/PHP/Admin/index.php");
}else{
header("location: http://localhost/project i/PHP/User/index.php");
}
	}
}
else{
		echo "Email and password doesn't match";
	}
}
?>