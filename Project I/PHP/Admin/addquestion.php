<?php 
include '../link.php';
if(isset($_POST['submit'])){
 $id=$_POST['exam_id'];
	$qname=$_POST['question'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$ans=$_POST['answer'];
	 $sql="insert into questions(exam_id,question,answer)values('$id','$qname','$ans')";
	 $result=mysqli_query($conn,$sql);
	$sq="select id from questions where exam_id='$id'";
	$re=mysqli_query($conn,$sq);
	if(mysqli_num_rows($re)>0){
		while($ro=mysqli_fetch_assoc($re)){
			$ID= $ro['id'];
		}}
	 $sqli="insert into options(question_id,title,exam_id)values('$ID','$option1','$id');";
	 $sqli.="insert into options(question_id,title,exam_id)values('$ID','$option2','$id');";
	 $sqli.="insert into options(question_id,title,exam_id)values('$ID','$option3','$id');";
	 $sqli.="insert into options(question_id,title,exam_id)values('$ID','$option4','$id')";
	 $resulti=mysqli_multi_query($conn,$sqli);
	 if($result&&$resulti){
	 header("location: http://localhost/project i/PHP/Admin/question.php?id=$id");

}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add question</title>
	<style >
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
    margin-right: 80px;
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
		body{
		background-color: #e1dcdc;
	}
	input {
    font-family: sans-serif;
    display: block;
    border-radius: 20px;
    width: 200px;
    margin: 10px;
    padding: 15px;
    font-size: 14px;
    margin-left: 300px;
    margin-top: 10px;
    padding: 20px;
}
	}
	</style>
</head>
<body>
	<nav>
	<ul id='MenuItems'>
	<li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<textarea name="question">Title of question</textarea>
	<input type="text" name="option1" placeholder="option1">
	<input type="text" name="option2" placeholder="option2">
	<input type="text" name="option3" placeholder="option3">
	<input type="text" name="option4" placeholder="option4">
	<input type="text" name="answer" placeholder="right answer">
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>