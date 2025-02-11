<?php 
include 'link.php';
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$cpassword=$_REQUEST['cpassword'];
	if($password===$cpassword){
		$sql="select Email from users where Email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo "Provided Email address is already used..";
		}
		else{
			$sqli="insert into users(FirstName,LastName,Email,Password,Role)values('$fname','$lname','$email','$password','Normal User')";
			if (mysqli_query($conn,$sqli)) {
				header("location: http://localhost/project i/HTML/index.html");
			}
			else{
				echo "Query Failed";
			}
		}
	}
	else{
		echo "Password is not match";
	}
 ?>