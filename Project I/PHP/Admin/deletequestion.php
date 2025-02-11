<?php   
include '../link.php';
$id=$_REQUEST['id'];
$ID=$_REQUEST['ID'];
$sql="delete from questions where id='$id';";
$sql.="delete from options where question_id='$id'";
if (mysqli_multi_query($conn,$sql)){
	header("location: http://localhost/project i/PHP/Admin/question.php?id=$ID");
	}
else{
echo "Unable to update";

}	
?>