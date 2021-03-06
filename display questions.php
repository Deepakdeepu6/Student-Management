<?php

include("process.php");
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
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
#header{
	

	font-size:30px;
	font-weight:300;
	font-style:vardana;
	color:white;
	background-color:black;
	text-align:center;
	text-transform:uppercase;
	
	
}

.content{

	position:absolute;
	font-size:10px;
	font-weight:200;
	font-style:vardana;
	margin-left:500px;
	text-transform:uppercase;
}
.content table{
	width:100%;
	
	
	color:white;
	
}
@media only screen and (max-width:800px)
{
	
	
	.content 
	{
		
		width:100%;
		margin-left:0px;
		
		
	}
}
img{
	
	
	width:150px;
	height:120px;
}
table{
	
	font-size:20px;
	text-transform:uppercase;
}
#select{
	margin:auto;
	max-width:300px;
}
.left{
	
	color:red;
	width:20px;
	heigth:10px;
	position:relative;
}
</style>


<body>



<div class="container-fluid" id="header"><div class="row">
    <div class="col-xs" ><a href="index.html">&larr;BACK TO HOME</a></div><div class="col-lg " id="header">QUESTIONS AND ANSWERS INTERACTION
	
	<form action="" method="get">
	<small>choose according to your choice:</small>
	<select name="sel" id="select" class="form-control " onchange="this.form.submit()">
	
	<option value="0" id="s" disabled selected>Default is from latest</option>
	<option value="from latest to old" id="s" >from  latest</option>
	<option value="from old to latest" id="s" >from old to latest</option>
	
	</select>

	</form>
	
</div>
</div>
</div>


<?php
if(isset($_GET['sel']))
{
	$sel=$_GET['sel'];
	if($sel=="from latest to old"){

 
 $sl="select * from question  order by id desc";
 if(mysqli_query($conn,$sl))
 {$res=mysqli_query($conn,$sl);}
   else die("".mysqli_error($conn));

  while($row=mysqli_fetch_array($res))
  {  
        ?>
		<div class="container">
		<div class="table-responsive">
    <table class="table table-light table table-md-4">
	<thead>
	  <tr><td scope="col">question number</td><td scope="col"><?php echo $row['id'];?></td></tr>
	  <tr><td scope="row">question</td><td scope="col"><?php echo $row['questions']?></td></tr>
	  <tr><td scope="col">answer</td><td scope="col"><?php echo $row['answers'];?></td></tr>
	   <tr><td scope="col">question by</td><td scope="col"><?php echo $row['questionby'];?>(<?php echo $row['section'];?>)</td></tr>
	   <tr><td scope="col">answer by(lecturer)</td><td scope="col"><?php echo $row['answered'];?></td></tr>
	 <tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	  </div>
	  </div>
  
	  <?php
  }
  }
  else if($sel=="from old to latest")
  {
	  $sl="select * from question  order by id asc";
 if(mysqli_query($conn,$sl))
 {$res=mysqli_query($conn,$sl);}
   else die("".mysqli_error($conn));

  while($row=mysqli_fetch_array($res))
  {  
        ?>
		<div class="container">
		<div class="table-responsive">
    <table class="table table-light table table-md-4">
	<thead>
	  <tr><td scope="col">question number</td><td scope="col"><?php echo $row['id'];?></td></tr>
	  <tr><td scope="row">question</td><td scope="col"><?php echo $row['questions']?></td></tr>
	  <tr><td scope="col">answer</td><td scope="col"><?php echo $row['answers'];?></td></tr>
	   <tr><td scope="col">question by</td><td scope="col"><?php echo $row['questionby'];?></td></tr>
	   <tr><td scope="col">answer by(lecturer)</td><td scope="col"><?php echo $row['answered'];?></td></tr>
	 <tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	  </div>
	  </div>
  
	  <?php
	  
  }
  }
}
    else 
  {
	  $sl="select * from question  order by id desc";
 if(mysqli_query($conn,$sl))
 {$res=mysqli_query($conn,$sl);}
   else die("".mysqli_error($conn));

  while($row=mysqli_fetch_array($res))
  {  
        ?>
		<div class="container">
		<div class="table-responsive">
    <table class="table table-light table table-md-4">
	<thead>
	  <tr><td scope="col">question number</td><td scope="col"><?php echo $row['id'];?></td></tr>
	  <tr><td scope="row">question</td><td scope="col"><?php echo $row['questions']?></td></tr>
	  <tr><td scope="col">answer</td><td scope="col"><?php echo $row['answers'];?></td></tr>
	   <tr><td scope="col">question by</td><td scope="col"><?php echo $row['questionby'];?></td></tr>
	   <tr><td scope="col">answer by(lecturer)</td><td scope="col"><?php echo $row['answered'];?></td></tr>
	 <tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	  </div>
	  </div>
  
	  <?php
	  
  }
  }

?>



</body>

</html>