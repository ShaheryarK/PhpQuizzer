<?php include 'db.php';?>
<?php session_start();?>
<?php

//Check to see if the score is set
if(!isset($_SESSION['score']))
{
	$_SESSION['score']=0;
}
if($_POST)
{
	$number=$_POST['number'];
	$selected_choice=$_POST['choice'];
	$next=$number+1;
	
	//GET total
	$query ="Select * from questions";
	//Get Results
	$results=$mysqli->query($query) or die($mysqli->error);
	$total=$results->num_rows;
	
	//GET Correct Choice
   $query="Select * from  choices where Qno=$number AND is_correct =1"	;
   
   //Get Result
   $result=$mysqli->query($query) or die($mysqli->error);
   
   //Get Row
   $row=$result->fetch_assoc();
   //Set Correct choice
   $correct_choice=$row['id'];
   //compare
   
   
   if($correct_choice ==$selected_choice)
	   
   {
	   $_SESSION['score']++;
   }
   if($number==$total)
   {
	   header("Location: final.php");
   }
   else
   {
	   header("Location: question.php?n=".$next);
   }
}
?>