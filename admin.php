<?php include 'db.php';?>
<?php 
if(isset($_POST['submit']))
{
	$question_number=$_POST['question_number'];
	$question_text=$_POST['question_text'];
	$correct_choice=$_POST['correct_choice'];
	// choices array
	$choices =array();
	$choices[1]=$_POST['choice1'];
	$choices[2]=$_POST['choice2'];
	$choices[3]=$_POST['choice3'];
	$choices[4]=$_POST['choice4'];
	$choices[5]=$_POST['choice5'];
	//Question query
	$query="Insert into questions (Qno,text) values ('$question_number' , '$question_text')";
	$insert_row=$mysqli->query($query) or die($mysqli->error);
	//validate insert
	if($insert_row)
	{
		foreach($choices as $choice=>$value)
		{
			if($value!= '')
			{
				if($correct_choice==$choice)
				{
				$is_correct=1;	
				}
				else
				{
					$is_correct=0;
				}
				//choice query
				$query="Insert into choices (Qno,is_correct,text) values ('$question_number','$is_correct','$value')";
				//Run query 
				$insert_row=$mysqli->query($query) or die($mysqli->error);
				//validate insertion
				if($insert_row)
				{continue;}
			else
			{
				die('Error :('.$mysqli->errno.')'.$mysqli->error);
			}
			}
		}
		$msg='Question has been added';
	}
}
// Get Total Questions
$query="Select *from questions";
//Get Results
$result=$mysqli->query($query)or die($mysqli->error);

$total=$result->num_rows;
$next=$total+1;

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
<h2>Add a Question</h2>
<?php
if(isset($msg))
{
	echo '<p>'.$msg.'</p>';
}
?>
<form method="post" action="admin.php">
<p>
<label>Question Number: </label>
<input type ="number" name ="question_number" value="<?php echo $next?>"/>
</p>
<p>
<label>Question Text: </label>
<input type ="text" name ="question_text"/>
</p>
<p>
<label>Choice #1: </label>
<input type ="text" name ="choice1"/>
</p>
<p>
<label>Choice #2: </label>
<input type ="text" name ="choice2"/>
</p>
<p>
<label>Choice #3: </label>
<input type ="text" name ="choice3"/>
</p>
<p>
<label>Choice #4: </label>
<input type ="text" name ="choice4"/>
</p>
<p>
<label>Choice #5: </label>
<input type ="text" name ="choice5"/>
</p>
<p>
<label>Correct Choice Number: </label>
<input type ="number" name ="correct_choice"/>
</p>
<p>
<input type="submit" name="submit" value="Submit"/>
</p>
</main>
<footer>
<div class ="container">
</div>
Copyright &copy; 2017, Reality Studio
</footer>
</body>
</html>