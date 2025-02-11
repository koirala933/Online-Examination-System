<?php   
include '../link.php';
$id=$_REQUEST['id'];
$sql="delete from users where Id='$id'";
if (mysqli_query($conn,$sql)) {
	header("location: http://localhost/project i/PHP/Admin/index.php");
	}
else{
echo "Unable to update";

}	
?>