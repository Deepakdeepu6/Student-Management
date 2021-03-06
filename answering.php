<?php 
session_start();
include("process.php");

?>
<!DOCTYPE html>
<html>
<head>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<style>
table{
	max-width:100px;
	text-transform:uppercase;
	font-size:20px;
	font-style:vardana;
	margin:auto;
	font-weight:bold;
}
textarea{
	height:100px;
	width:300px;
	
}
.heading{
	width:100%;
	font-size:20px;
	font-weight:bold;

}
.left{
	left:0%;
	position:relative;
}
</style>

<body>
<div class="container-fluid">
<div class="card heading">
<div class="card-header text-center ">
  <div class="left"><a href="submit.php"><img src="back.png" width="30px">Profile</a></div> <?php 
if(isset($_POST['submit1']))
{
	$sl="select * from question";
	$res=mysqli_query($conn,$sl);
	
	$i=1;
	while($row=mysqli_fetch_array($res))
	{
while($i<=$row['id'])
{   	if(!empty($_POST["answer_{$i}"]))
	{
	$ans=$_POST["answer_{$i}"];
	$username=$_SESSION['username'];
mysqli_query($conn,"update question set answers='$ans',answered='$username' where id={$i}");
echo "Successfully Updated ";
	}
    $i++;
 }
	}
}





?>
</div>
</div>
</div>
<?php echo @$_GET['answer'];?>
</div>

 <?php 
 if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:second.php');
 exit;}
 else
	 {
 $sl="select * from question
 
 join handling on section=sem1 or section=sem2 or section=sem3 or section=sem4 where semail='".$_SESSION['email']."' order by id desc";
 $result=mysqli_query($conn,$sl);
 while($row=mysqli_fetch_array($result))
 {    
      if ($_SESSION['username']==$row['answered'])
		  $row['answered']='yourself';
	 ?>           

		<form action="" method="post">
		<div class="container">
	
    <table class="table table-light table-striped table-bordered table table-xs">
	<thead>
	  <tr><td scope="col">question number</td><td scope="col"><?php echo $row['id'];?></td></tr>
	 
	  <tr><td scope="col">question</td><td scope="col"><?php echo $row['questions'];?></td></tr>
	   
       <tr><td scope="col">answer</td><td scope="col"><textarea name="answer_<?php echo $row['id'];?>" id="answer_<?php echo $row['id'];?>" ><?php echo $row['answers']?></textarea></td>
         <tr><td scope="col">questionby</td><td scope="col"><?php echo $row['questionby'];?>(<?php echo $row['section'];?>)</td></tr>
	   <tr><td scope="col">answered by(lecturer)</td><td scope="col"><?php echo $row['answered'];?></td></tr>
	   	  
	  <tr ><td scope="col" colspan="2"><input type="submit" name="submit1" class="btn btn-success btn-lg btn-block"value="submit"></td></tr
	 <tr><td> </td><td></tr>
	  
	<tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	  </div>
	 
	  
	  </form>
	  
	 <?php
 }
      
	 }  
	 
	   ?>



</body>