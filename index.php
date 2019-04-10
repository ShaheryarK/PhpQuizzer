<?php include 'db.php';?>
<?php 
// Get Total Questions
$query="Select *from questions";
//Get Results
$result=$mysqli->query($query)or die($mysqli->error);

$total=$result->num_rows;
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
<h2> Test Your PHP Knowledge</h2>
<p> This is a multiple choice quiz to test your knowledge of PHP</p>
<ul>
<li> <strong> Number of Qustions :</strong> <?php echo $total;?></li>
<li><strong> Type:</strong> Multiple Choice </li>
<li><strong>Estimated Time: </strong><?php echo $total*.5 ;?> Minutes</li>
</ul>
<a href= "question.php?n=1" class="start">Start Quiz</a>
</div>
</main>
<footer>
<div class ="container">
</div>
Copyright &copy; 2017, Reality Studio
</footer>
</body>
</html>