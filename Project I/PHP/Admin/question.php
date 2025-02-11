<?php  
include '../link.php';
$Id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>question</title>
	<style>
	body{
		padding: 20px;
background-color: #e1dcdc;
	}
	div{
		margin-left: 200px;
		padding: 20px;
	}
table{
	margin: 0;
	padding: 0;
}
	</style>
</head>
<body>
	<?php 	 
$sql="select id,question,answer from questions where exam_id='$Id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	?>
<table border="1px solid black" cellpadding="10" cellspacing="0">
	<tr>
	<th>
		Id
	</th>
	<th>Question Title</th>
	<th>Right Answer</th>
	<th>Delete</th>
</tr>
<?php  
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
	<td><?php echo "$row[id]"; ?></td>
	<td><?php echo "$row[question]"; ?></td>
	<td><?php echo "$row[answer]"; ?></td>
	<td><a href="deletequestion.php?id=<?php echo "$row[id]"; ?>&ID=<?php echo $Id; ?>" onclick="return del()">Delete</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<div>
<a href="questionform.php?id=<?php echo $Id; ?>">Add Question</a>
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