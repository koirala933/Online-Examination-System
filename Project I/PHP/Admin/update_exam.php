<?php 
include '../link.php';
if(isset($_REQUEST['usubmit'])){
$id=$_REQUEST['id'];
$usname=$_REQUEST['usname'];
	$sql="update exam set sname='$usname'where Id='$id'";
if (mysqli_query($conn,$sql)) {
	header("location: http://localhost/project I/PHP/Admin/exam.php");
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
	<title>Update User</title>
	<style type="text/css">
		
		input {
    display: block;
    width: 173px;
    padding: 10px;
    margin-top: 20px;
    border-radius: 20px;
}
input[type="submit"]{
    width: 200px;
    padding: 15px;
    margin: 18px auto auto 0px;
    display:block;
    letter-spacing: 1px;
    font-size: 20px;
    border: none;
    cursor: pointer;
}
.frm{
	margin-left:550px;
	margin-top: 100px;
	}
	</style>
</head>
<body>
	<?php 
	$id=$_REQUEST['id'];
	$sqli="select sname from exam where Id='$id'";
	$result=mysqli_query($conn,$sqli);
	if(mysqli_num_rows($result)>0){
		while ($rows=mysqli_fetch_assoc($result)) {
	 ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="frm">
		<input type="hidden" name="uid" value="<?php echo "$rows[Id]"; ?>">
		<input type="text" name="usname" value="<?php echo "$rows[sname]"; ?>">
		<input type="submit" name="usubmit" value="Update">

	</form>
<?php 
}
} 
?>
</body>
</html>
