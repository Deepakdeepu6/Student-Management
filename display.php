<?php

include("process.php");

?>

<!DOCTYPE html>
<html>
<head>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<style>
.header{
	margin:auto;
	width:100%;
	font-size:30px;
	font-weight:300;
	font-style:vardana;
	color:white;
	background-color:violet;
	text-align:center;
	text-transform:uppercase;
	
	
}
.content{

	position:absolute;
	font-size:30px;
	font-weight:300;
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
	
	font-size:30px;
	text-transform:uppercase;
}
</style>


<body>
<div class="header">
    individual lecturer's profile
</div>


<?php
 $sl="select * from users order by id desc ";
 $res=mysqli_query($conn,$sl);

  while($row=mysqli_fetch_array($res))
  {  
        ?>
    <table class="table table-dark table table-sm">
	<thead>
	  <tr><td scope="col">NAME</td><td scope="col"><?php echo $row['username'];?></td></tr>
	  <tr><td scope="row">photo</td><td scope="col"><?php echo "<img src='images/" .$row['image']."' >"?></td></tr>
	  <tr><td scope="col">qualification</td><td scope="col"><?php echo $row['qual'];?></td></tr>
	   <tr><td scope="col">birth date</td><td scope="col"><?php echo $row['birth'];?></td></tr>
	   <tr><td scope="col">date of joining</td><td scope="col"><?php echo $row['dat'];?></td></tr>
	   <tr><td scope="col">address</td><td scope="col"><?php echo $row['address'];?></td></tr>
	  
	   <tr><td scope="col">designation</td><td scope="col"><?php echo $row['designation'];?></td></tr>
	  <tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	  <?php
	 
  }
?>



</body>

</html>
