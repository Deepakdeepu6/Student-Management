<?php 
session_start();
include("process.php");
if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:second.php');
exit;}

?>
<!DOCTYPE html>
<html>
<head>
</head>
<?php
  if(isset($_POST['submit']))
  {    $id=$_POST['id'];
$username=$_SESSION['username'];
	  $answer=$_POST['answer'];
	  if(!empty($answer))
	  {  $sl="update question set answers='$answer',answered='$username' where id='$id'";
          if(mysqli_query($conn,$sl))
		  
			  header("location:answering.php?answer=successfully answered the question");
			 else
                      "not success";				 
		  
	  }
	  else
		  echo "answer field is empty <a href='answering.php'>go back</a>";
	  
	  
  } 



?>
<body>
  <form action="" method="post">
  id:<input type="number" name="id">
  answers:<textarea name="answer"></textarea>
  <input type="submit" name="submit" >
  
  </form>
  
  
  

</body>

</html>