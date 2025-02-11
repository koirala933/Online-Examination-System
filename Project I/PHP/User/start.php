<?php 
$id=$_GET['id'];
include '../link.php';
$name=$_SESSION['Name'];
$d= date("Y/m/d");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>start exam</title>
	<style >
		body{
			background-color:#e1dcdc;
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
form{
	margin-left: 100px;
	margin-top: 30px;
}
input{
	border: none;
	width: 100%;
}
input[type="submit"]{
	width: 100px;
	padding: 10px;
    margin: 10px;
    display:block;
    font-size: 15px;
    border: none;
    cursor: pointer;
    margin-left: 300px;
	}
	</style>

</head>
<body bgcolor="black">
<nav>
	<ul id='MenuItems'>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav><br><br>
 <?php 	 
$s="select * from questions where exam_id='$id'";
$count=mysqli_num_rows(mysqli_query($conn,$s));
$sql="select * from questions where exam_id='$id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
?>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="examid" value="<?php echo $id; ?>">
	<input type="hidden" name="count" value="<?php echo $count; ?>">
	<input type="hidden" name="date" value="<?php echo $d ?>">
	<?php 
	while($row=mysqli_fetch_assoc($result)){
		$qid=$row['id'];
	 ?>
	 <input type="hidden" name="ques[<?php echo"$row[id]"; ?>]" value="<?php echo "$row[id]"; ?>">
	 <?php 
	 $sqli="SELECT options.id FROM options INNER JOIN questions ON options.title=questions.answer where options.exam_id='$id'";
$resulti=mysqli_query($conn,$sqli);
if(mysqli_num_rows($resulti)>0){
	while($rowi=mysqli_fetch_assoc($resulti)){
		$coid=$rowi['id'];
	  ?>
	 <input type="hidden" name="coid[<?php echo $coid; ?>]" value="<?php echo $coid; ?>">
	<?php }} ?>
<h4><?php echo "$row[question]"; ?></h4>
	 <?php 
	  $s="select * from options where question_id='$qid'";
		$r=mysqli_query($conn,$s);
		if(mysqli_num_rows($r)>0){
		while($ro=mysqli_fetch_assoc($r)){ 
	 ?>
	<input type="radio" value="<?php echo"$ro[id]"; ?>" name="option[<?php echo"$ro[question_id]"; ?>]" required><?php echo "$ro[title]"; ?>
<?php }} ?>
<?php } ?>
<input type="submit" name="submit" >
</form>
<?php } ?>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
	$a=0;
	$date=$_POST['date'];
$examid=$_POST['examid'];
$count=$_POST['count'];
$question_id=$_POST['ques'];
$coid=$_POST['coid'];
 $option=$_POST['option'];
 $option=implode(" ",$option);
 $option=explode(" ",$option);
 $coid=implode(" ",$coid);
 $coid=explode(" ",$coid);
 print_r($coid);
 $coid[]="a";
 $coid[]="b";
 $coid[]="c";
 for($i=0;$i<$count;$i++){
 	for($j=$i;$j<$count;$j++){
 	if($coid[$j]==$option[$i]){
 		$a++;
 	}
 }
 }
 $name="$_SESSION[Name]";
// $question_id=implode(" ",$question_id);
// $question_id=explode(" ",$question_id);
$sqlii="insert into result(exam_id,student,marks,date)value";
  $sqlii.="('$examid','$name','$a','$date'),";
$sqlii=rtrim($sqlii,",");
 if(mysqli_query($conn,$sqlii)){
 	header("location: http://localhost/project i/PHP/User/result.php");
 }
 }
 ?>