<?php 
include '../link.php';
if(isset($_REQUEST['submit'])){
$id=$_REQUEST['id'];
$ename=$_REQUEST['ename'];
	$sql="update Exam set ename='$ename'where exam_id='$id'";
if (mysqli_query($conn,$sql)) {
	header("location: http://localhost/project i/PHP/Admin/exam.php");
	}
else{
echo "Unable to update";

}
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Updat exam</title>
	<style >
		body{
		background-color: #e1dcdc;
	}
	}
nav
{
    flex: 1;
    position: fixed;
    right: 0;
}
nav ul 
{
    display: inline-block;
    list-style: none;
}
nav ul li
{
    display: inline-block;
    margin-left: 1200px;
    margin-top: 17px;
}
nav ul li a
{
    text-decoration: none;
    font-size: 20px;
    color: blue;
    font-family: sans-serif;
}
nav ul li a:hover
{
    color: saddlebrown;
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
	<nav>
	<ul id='MenuItems'>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
	<?php 
	$Id=$_REQUEST['id'];
	$sqli="select ename from exam where exam_id='$Id'";
	$result=mysqli_query($conn,$sqli);
	if(mysqli_num_rows($result)>0){
		while ($rows=mysqli_fetch_assoc($result)) {
	 ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $Id; ?>">
		<input type="text" name="ename" value="<?php echo "$rows[ename]"; ?>">
		<input type="submit" name="submit" value="Update">

	</form>
<?php 
}
} 
?>
</body>
</html>
