<?php 
include '../link.php';
if(isset($_REQUEST['submit'])) {
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$password=($_REQUEST['password']);
	
		$sql="select Email from users where Email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo "Provided Email address is already used..";
		}
		else{
			$sqli="insert into users(FirstName,LastName,Email,Password,Role)values('$fname','$lname','$email','$password','Normal user')";
			if (mysqli_query($conn,$sqli)) {
				header("location: http://localhost/project i/PHP/Admin/index.php");
			}
			else{
				echo "Query Failed";
			}
		}
		}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Examination</title>
	<style type="text/css">
		body{
			background-color: #c6bfbc;
		}
		
		input {
    font-family: sans-serif;
    display: block;
    border-radius: 20px;
    width: 200px;
    margin: 10px;
    padding: 15px;
    font-size: 14px;
    margin-left: 500px;
}
input[type="submit"]{
    width: 200px;
    padding: 15px;
    margin: 10px;
    display:block;
    font-size: 20px;
    border: none;
    cursor: pointer;
    margin-left: 500px;
}
	</style>

	
</head>
<body>
		<div class="AddUsers" id="AU">
		<form id="register_info" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" name="fname" placeholder="Enter your First Name" required onfocus >
				<input type="text" name="lname" placeholder="Enter your Last Name" required onfocus>
				<input type="email" name="email" id="emailadd" placeholder="Valid Email Address" required autocomplete="off">
				<input type="password" name="password" placeholder="password" required autocomplete="off">
				<input type="submit" value="Add" name="submit">
			</form>
	</div>
</body>
</html>