<?php  
include '../link.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style >
		body{
			background-color: #e1dcdc;;
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
    margin-right: 90px;
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
table
{
    margin-top: 0;
    padding: 90px;
    padding-top: 150px;
    border: none;
    margin-left: 300px;
}

	</style>
</head>
<body>
	<?php 
	$sql="select * from exam";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	 ?>
	 <nav>
	<ul id='MenuItems'>
	<li><a href="result.php">Result</a></li>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
<table border="1px solid black" cellpadding="10" cellspacing="0">
	<tr>
		<th>
			Id
		</th>
		<th>
			Exam Title
		</th>
		<th>
			Start
		</th>
	</tr>
			<?php  
while($row=mysqli_fetch_assoc($result)){
		?>
	<tr>
		<td>
			<?php echo"$row[exam_id]"; ?>
		</td>
		<td>
			<?php echo"$row[ename]"; ?>
		</td>
		<td>
			<a href="start.php?id=<?php echo"$row[exam_id]"; ?>">Start</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php } ?>
</body>
</html>