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
    margin-left: 400px;
    margin-top: 10px;
    padding: 20px;
}
textarea{
     font-family: sans-serif;
    display: block;
    border-radius: 20px;
    width: 200px;
    margin: 10px;
    padding: 15px;
    font-size: 14px;
    margin-left: 400px;
    margin-top: 10px;
    padding: 20px;

}
    </style>
</head>
<body>
    <nav>
    <ul id='MenuItems'>
    <li><a href="../Logout.php">Logout</a></li>
</ul>
     </nav>
     <?php $id=$_GET['id'];?>
<form method="post" action="addquestion.php" onsubmit="return addquestion()">
    <textarea name="question" placeholder="Title of question"></textarea>
    <input type="text" name="exam_id" value="<?php echo $id;?>">
    <input type="text" name="option1" placeholder="option1" id="opt1">
    <input type="text" name="option2" placeholder="option2" id="opt2">
    <input type="text" name="option3" placeholder="option3" id="opt3">
    <input type="text" name="option4" placeholder="option4" id="opt4">
    <input type="text" name="answer" placeholder="right answer" id="ans1">
    <input type="submit" name="submit" value="Submit">
</form>
<script type="text/javascript">
    
    function addquestion(){
    var k=document.getElementById('opt1').value;
    var t=document.getElementById('opt2').value;
    var y=document.getElementById('opt3').value;
    var z=document.getElementById('opt4').value;
    var v=document.getElementById('ans1').value;
        if((k===v)||(t===v)||(y===v)||(z===v)){
            return true;
        }else{
            alert("Correct answer is must included from the above options only");
            return false;
        }
    }
</script>
</body>
</html>