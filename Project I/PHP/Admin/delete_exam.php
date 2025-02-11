<?php   
include '../link.php';
$id=$_REQUEST['id'];
$sql="delete from exam where Id='$id'";
if (mysqli_query($conn,$sql)) {
	header("location: http://localhost/Project I/PHP/Admin/exam.php");
	}
else{
echo "Unable to update";

}	
?>