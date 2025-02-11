<?php  
include '../link.php';
if(isset($_POST['submit'])){
	$ename=$_POST['exam'];
	$sql="insert into Exam(ename)values('$ename')";
	$result=mysqli_query($conn,$sql);
	header("location: http://localhost/project i/PHP/Admin/Exam.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>addexam</title>
<style >
	body{
		background-color: #e1dcdc;
	}
	input {
    font-family: sans-serif;
    display: block;
    border-radius: 20px;
    width: 200px;
    margin: 10px;
    padding: 15px;
    font-size: 14px;
    margin-left: 300px;
    margin-top: 10px;
    padding: 20px;
}
	}
</style>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="">
	<input type="text" name="exam" placeholder="Add Exam">
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>