<?php   
include '../link.php';
$id=$_REQUEST['id'];
$sql="delete from exam where exam_id='$id'";
if (mysqli_query($conn,$sql)){
	header("location: http://localhost/project i/PHP/Admin/exam.php");
	}
else{
echo "Unable to update";

}	
?>