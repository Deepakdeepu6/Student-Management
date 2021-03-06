<?php 
session_start();
include("process.php");
?>
<!DOCTYPE html>
<html>
<head>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<?php
   if(isset($_POST['submit']))
   {
	   $username=$_POST['suser'];
	   $password=$_POST['spass'];
   if($username=="" || $password=="")
	   {
		   echo "<script>alert('Enter the credentials properly')</script>";
	   }
	   else{
		   
	   $result=mysqli_query($conn,"select * from student where usn='$username' and password='$password'")
                          or die("failed to connect".mysqli_error());
						  $row=mysqli_fetch_array($result);
						   
                               
	if($row['usn']== $username && $row['password'] == $password)
		
		{    
	          
	          $_SESSION['susername']=$row['username'];
			  $_SESSION['usn']=$row['usn'];
			  $_SESSION['section']=$row['section'];
			  header("location:sprofile.php");
			if(isset($_POST['check'])){
				setcookie("myemail","$username",time()+(10*365*24*60*60));
				setcookie("mypass","$password",time()+(10*365*24*60*60));
			}
			
		}
		
	   else
		   echo "<script>alert('Invalid username or password')</script>";
   }
   }
   

if(isset($_POST['submit1']))
{
	$sname=$_POST['user'];
	$sword=$_POST['pass'];
	$confirm=$_POST['cpass'];
	$usn=$_POST['usn'];
	$email=$_POST['em'];
	
	if($sword==$confirm)
	{
		$s="select * from student";
		$res=mysqli_query($conn,$s);
		  
		$row=mysqli_fetch_array($res);
		if($row['email']==$email)
			echo"sorry";
	   else{
		   if(strlen($usn)>=6)
		   {
			   $sname=mysqli_real_escape_string($conn,$sname);
			   $sword=mysqli_real_escape_string($conn,$sword);
			   $confirm=mysqli_real_escape_string($conn,$confirm);
			   $usn=mysqli_real_escape_string($conn,$usn);
			   $email=mysqli_real_escape_string($conn,$email);
			   $vkey=md5(time().$sname);
			   
         $sl="insert into student(username,password,email,usn,vkey) values('$sname','$sword','$email','$usn','$vkey')";
		 $res=mysqli_query($conn,$sl);
		 if($res){
		      $to=$email;	 
		 $subject="Email verification";
		 $message="Registered";
		 $headers = "From: infopedia.org4@gmail.com";
		 $headers .= "MIME-Version: 1.0" . "\r\n";
		 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		 
		 mail($to,$subject,$message,$headers);
		echo "<script>alert('Successfully registered');</script>";
     
		 }
		 else
			 echo "not possible";
		 
		 
		 
		   }
		   else
			   echo "<script>alert('There is a mistake with your USN or with username(note:String length must be atleast 6)')</script>";
	   }
	}
	else
	{  
        
		header("location:student.php?password=Sorry Password is not Matching");
	}
	
}


?>
<style>

		 .ph{color:red;
		   text-transform:uppercase;
		    text-align:center;}

.form{
	font-size:20px;
	font-style:vardana;
	font-weight:bold;
	color:black;
	
	
}
body{
	
	background-image:url(student.jpeg);
	height:100%;
	width:100%;
	background-size:100% 100%;
	background-attachment:fixed;
}

.col-12{
	max-width:400px;
	margin:150px auto;
}
</style>
<body>

<div class="container">
<div class="row log">
<div class="col-12">
<div class="card">
<div class="card-header">
<h1>LOGIN HERE</h1></div>
<div class="card-body">
<form action="" method="post" class="form">
 <label for="user" class="text-center">USN:</label> <input type="text" name="suser" class="form-control" id="user" value="<?php if(isset($_COOKIE['myemail']))echo $_COOKIE['myemail'];?>">
  <label for="pass" class="text-center">Password:</label><input type="password" name="spass" class="form-control" id="pass" value="<?php if(isset($_COOKIE['mypass']))echo $_COOKIE['mypass'];?>" >
 <input type="checkbox" name="check" class="" id="check"> <small><label for="check" class="text-center">Remember me</label></small>
  <center><input type="submit" name="submit"  class="btn btn-outline-success btn-lg"></center>
</form>
</div>
</div>
</div>
</div>

<!-- <div class="col-md">
<div class="card">
<div class="card-header">
<h1>REGISTER HERE</h1>
<form action="" method="post" class="form">
<h1 style="color:red;"><?php echo @$_GET['password'];?></h1>
<h2 style="color:red;"><?php echo @$_GET['loginfail'];?></h2>
 <label for="user" >Name:</label> <input type="text" name="user" class="form-control" id="user" required pattern="^[A-Za-z]+"> 
 <label for="user" >Usn:</label> <input type="text" name="usn" class="form-control" id="user" required> 
  <label for="pass" >Password:</label><input type="password" name="pass" class="form-control" id="pass" required pattern="^[A-Za-z0-9@.]+">
  <label for="pass" >Confirm Password:</label><input type="password" name="cpass" class="form-control" id="pass" required pattern="^[A-Za-z0-9@.]+">
  <label for="em" >Email:</label><input type="email" name="em" class="form-control" id="em" required>
  <center> <input type="submit" name="submit1" id="submit" class="btn btn-outline-success btn-lg"></center>
</form>
</div>
</div>
</div> -->
</div>
</div>
  


</body>
</html>