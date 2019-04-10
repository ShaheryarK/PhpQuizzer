<?php session_start();?>
<!DOCTYPE html>

<html>
<head>
<meta charset ="utf-8"/>
<title> PHP Quizzer</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body>
<header>

</header>
<main>
<div class=" container">
<h2>You're Done!</h2>
<p> Congrats! you have completed the test</p>
<p> Final Score: <?php echo $_SESSION['score'];?></p>
<?php session_unset();?>
<a href="question.php?n=1" class="start">Take Again</a>

</div>
</main>
<footer>
<div class ="container">
</div>
Copyright &copy; 2017, Reality Studio
</footer>
</body>
</html>