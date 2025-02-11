<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style >
		body{
			background-color: #e1dcdc;
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
table{
	padding: 50px;
	margin-left:300px;
		}
		div {
			 margin-left: 350px;
			 border-radius: 1px solid black;
		}

	</style>

</head>
<body>
	<?php 	 
	include '../link.php';
$sql="select * from Exam";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
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
		<th>
			Id
		</th>
		<th>
			Exam Title
		</th>
		<th>
			Question
		</th>
		<th>
			delete
		</th>
		<th>
			Edit
		</th>
	</tr>
	<?php  
		while($row=mysqli_fetch_assoc($result)){
			?>
	<tr>
		<td><?php echo "$row[exam_id]"; ?></td>
		<td><?php echo "$row[ename]"; ?></td>
		<td><a href="question.php?id=<?php echo "$row[exam_id]"; ?>">Question</a></td>
		<td><a href="deleteexam.php?id=<?php echo "$row[exam_id]"; ?>" onclick="return del()">Delete</a></td>
		<td><a href="updateexam.php?id=<?php echo "$row[exam_id]"; ?>">Edit</a></td>
	</tr>
<?php } ?>
</table>
<?php }?>
<div>
<a href="addexam.php">Add Exam</a>
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