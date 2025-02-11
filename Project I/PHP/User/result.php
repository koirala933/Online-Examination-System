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
	 <nav>
	<ul id='MenuItems'>
	<li><a href="result.php">Result</a></li>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
<?php  
$sh="select show_hide from show_hide";
$co=mysqli_query($conn,$sh);
if(mysqli_num_rows($co)>0){
while($roo=mysqli_fetch_assoc($co)){
	$sh=$roo['show_hide'];
}
}
$name=$_SESSION['Name'];
$sql="SELECT exam.ename,exam.exam_id,result.student,result.marks,result.date FROM result INNER JOIN exam on result.exam_id=exam.exam_id where Student='$name'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
?>
<?php if($sh=="SHOW"){ ?>
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
			<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
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
<?php }
else{
	echo "Your result will publis soon come back later.....";
}
 ?>
<?php } ?>
</body>
</html>