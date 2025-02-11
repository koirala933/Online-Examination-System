<?php 	
include '../link.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
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
}
	</style>
</head>
<body>
	<nav>
	<ul id='MenuItems'>
	<li><a href="index.php">Home</a></li>
	<li><a href="Exam.php">Exam</a></li>
	<li><a href="result.php">Result</a></li>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
<?php
$sql="SELECT exam.ename,exam.exam_id,result.student,result.marks,result.date FROM result INNER JOIN exam on result.exam_id=exam.exam_id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
?>
<table border="1" cellspacing="0" cellpadding="6">
	<tr>
		<th>
			Student Email
		</th>
		<th>
			Subject
		</th>
		<th>
			Marks
		</th>
		<th>
			Date
		</th>
	</tr>
	<?php 
	while($row=mysqli_fetch_assoc($result)){
	 ?>
	<tr>
		<td>
			<?php echo "$row[student]"; ?>
		</td>
		<td>
			<?php echo"$row[ename]"; ?>
		</td>
		<td>
			<?php echo "$row[marks]"; ?>
		</td>
		<td>
			<?php echo "$row[date]"; ?>
		</td>
	</tr>
<?php } ?>
</table>
<?php } ?>
<!-- <a href="dres.php">Delete result</a> -->
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<input type="radio" name="sh" value="SHOW">SHOW
	<input type="radio" name="sh" value="HIDE">HIDE
	<input type="submit" name="submit">
</form>
</body>
</html>
<?php if(isset($_POST['submit'])){
	$sh=$_POST['sh'];
	$sql="update show_hide set show_hide='$sh'";
	mysqli_query($conn,$sql);
}
?>