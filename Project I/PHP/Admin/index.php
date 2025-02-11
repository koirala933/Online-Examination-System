<?php  
include '../link.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
	<link rel="stylesheet" href="../Admin/phpstyle.css">
</head>
<body>
	<?php  
	$sql="select Id,FirstName,LastName,Email,Role from users";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
	?>
	<nav>
	<ul id='MenuItems'>
	<li><a href="index.php">Home</a></li>
	<li><a href="Exam.php">Exam</a></li>
	<li><a href="result.php">Result</a></li>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
<table border="1px solid black" cellpadding="10" cellspacing="0">
<tr>
	<th rowspan="2">Id</th>
	<th colspan="2">Name</th>
	<th rowspan="2">Email</th>
	<th rowspan="2">Role</th>
	<th rowspan="2" colspan="2">Operation</th>
</tr>
<tr>
	<th>First Name</th>
	<th>Last Name</th>
</tr>
<?php 
while ($rows=mysqli_fetch_assoc($result)) {
?>
<tr>
	<td><?php echo "$rows[Id]"; ?></td>
	<td><?php echo "$rows[FirstName]"; ?></td>
	<td><?php echo "$rows[LastName]"; ?></td>
	<td><?php echo "$rows[Email]"; ?></td>
	<td><?php echo "$rows[Role]"; ?></td>
	<td><a href="../Admin/Update.php?id=<?php echo"$rows[Id]";?>">Update</a></td>
	<td><a href="../Admin/Delete.php?id=<?php echo "$rows[Id]"; ?>" onclick="return del()">Delete</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<div>
<a href="AddUsers.php">AddUsers</a>
</div>
<script type="text/javascript">
	function del(){
if(confirm("Do you really want to delete")==true){
return true;
}else{
return false;
}
}
</script>
</body>
</html>