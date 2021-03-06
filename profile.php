<?php
session_start();
include("process.php");
if(!isset($_SESSION['susername'])){
   
    header('location:student.php');
    exit;
}
else if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:student.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width">
 <title>YOUR PROFILE</title>
 </head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
	  <style>
	  form {
		color:black;
		font-weight:bold;
		font-style:verdana;
		width:100%;
	  }
	
	
	 
		img{
			max-width:120px;
			width:100%;
			height:120px;
		}     
		.page-header
		{  
		  font-size:30px;
		  color:green;
		  font-style:vardana;
		  font-weight:bold;
			background-color:lime;
		}
		
		.section 
		{
			width:100px;
		}
		a:link{
			text-decoration:none;
		}
		.container{
		
			border:1px solid black;
			box-shadow:2px 2px 2px 2px grey;
		}
		body {
			background-image:linear-gradient(to left,#D1F2EB ,#D6EAF8 );
		}
		.container {
			background-color:white;
			
			
		}
		
		 </style>
 <body>
 <?php
	      include("process.php");
		  $user=$_SESSION['susername'];
		  $sl="select * from student where username='$user'";
		  $res=mysqli_query($conn,$sl);
		  $row=mysqli_fetch_array($res);
		  if($row)
	   
	   {
	  
	  
	  ?>
	 
	 
	    <div class="page-header text-center ">
		<a href="sprofile.php"><i class="fa fa-home"></i></a><?php echo @$_GET['success'];?>
		</div>
		<div class="container">
		 <div class="row">
		   <div class="col-md-12 ">
		   
			 <center><?php echo "<img src='images/".$row['image']."'>
		       
		 
			   "?></center>
				 
		
			 <form action="profileupdate.php" method="post" enctype="multipart/form-data">
			 <center><input type="text" name="section" class="form-control  section" placeholder="SECTION:" value="<?php echo $row['section'];?>" required></center>NAME:
			  
			  <input type="text" name="name"  class="form-control" placeholder="NAME" value="<?php echo $row['username'];?>" size="30" required><hr>
			   DATE OF BIRTH:<input type="date" name="birth"  class="form-control" value="<?php echo $row['date'];?>" size="30" required><br /><hr>
				  <hr>FATHER NAME:<input type="text" name="fname" class="form-control" value="<?php echo $row['fname'];?>" size="25" required><br /><hr>
				MOTHER NAME:<input type="text"  class="form-control" placeholder="" name="mname" value="<?php echo $row['mname'];?>" size="30" required><hr><p></p>ADDRESS:<textarea name="address" required><?php echo $row['address']; ?></textarea><br /><hr>
				CONTACT NO:<input type="text" name="scontact" class="form-control" value="<?php echo $row['scontact'];?>" size="25" required><br /><hr>
                FATHER NO:<input type="text" name="fcontact" class="form-control" value="<?php echo $row['fcontact'];?>" size="25" required><br /><hr>
                MOTHER NO:<input type="text" name="mcontact" class="form-control" value="<?php echo $row['mcontact'];?>" size="25" required><br /><hr>
                 <p align="center-right">UPLOAD IMAGE:<input type="file" name="image" value="<?php echo $row['image']['name']?>"</p>
				 <input type="submit"   value="Update" class="btn btn-success btn-lg btn-block"/>
				
				 <br />
				 <br />
				
				 </form>
				 <a href='logout.php'><button class='btn btn-warning btn-lg btn-block'>Logout</button></a>
			 </div>
			</div>
		 </div>
			
			 
			
	   <?php
	   
	   }
	   ?>
		
 </body>
 </html>