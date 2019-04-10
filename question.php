<?php include 'db.php';?>
<?php
//set question number
$number=(int)$_GET['n'];
//GET total
	$query ="Select * from questions";
	//Get Results
	$results=$mysqli->query($query) or die($mysqli->error);
	$total=$results->num_rows;
/*
Get Question
*/
$query="Select * from questions where Qno=$number";
//Get Result
$result=$mysqli->query($query)or die($mysqli->error);
$question=$result->fetch_assoc();


/*
Get choices
*/
$query="Select * from choices where Qno=$number";
//Get Result
$choices=$mysqli->query($query)or die($mysqli->error);
?>
<!DOCTYPE html>

<html>
<head>
<meta charset ="utf-8"/>
<title> PHP Quizzer</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
<header>
<div class="container">
<h1>PHP Quizzer</h1>
</header>
<main>
<div class="container">
<div class="current">Question <?php echo $question['Qno']; ?> of <?php echo $total;?></div>
<p class="question">
<?php
echo $question['text'];
?>
</p>
<form method="post" action="process.php">
<ul class="choice">
<?php while($row=$choices->fetch_assoc()):?>
<li> <input name="choice" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li>
<?php endwhile;?>
</ul>
<input type="submit" value="submit"/>
<input type="hidden" name ="number" value ="<?php echo $number;?>"/>
</form>
</div>
</main>
<footer>
<div class ="container">
</div>
Copyright &copy; 2017, Reality Studio
</footer>
</body>
</html>